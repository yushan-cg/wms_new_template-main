<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

use App\Models\Product;
use App\Models\Company;
use App\Models\User;
use App\Models\Rack;
use App\Models\Floor;
use App\Models\Restock;
use App\Models\ProductRequest;
use App\Models\Order;
use App\Models\Quantity;
use App\Models\WeeklyReport;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showReport()
    {
        // Get the authenticated user
        $user = auth()->user();

        if ($user->role == 3) {
            // If the user is of role 3, get products owned by the user with role 3

            // Get the start and end dates of the desired month
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();

            $data = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->join('companies', 'products.company_id', '=', 'companies.id')
                ->join('weights', 'products.id', '=', 'weights.product_id')
                ->join('product_request', 'companies.id', '=', 'product_request.company_id')
                ->select(
                    'products.id',
                    'weights.weight_of_product',
                    'product_request.product_price',
                    'companies.company_name',
                    'companies.address',
                    'companies.email',
                    'companies.phone_number',
                    'products.product_name',
                    'products.product_desc',
                    'products.item_per_carton',
                    'products.carton_quantity',
                    'quantities.total_quantity',
                    'quantities.remaining_quantity',
                    'products.weight_per_item',
                    'products.weight_per_carton',
                    'products.product_dimensions',
                    'products.product_image',
                    'products.date_to_be_stored',
                    'quantities.sold_carton_quantity',
                    'quantities.sold_item_quantity'
                )
                ->where('products.user_id', $user->id)
                ->distinct()
                ->get();

            // Calculate the revenue for each product
            $data = $data->map(function ($item) {
                $salesVolume = $item->sold_carton_quantity + $item->sold_item_quantity;
                $revenue = $salesVolume * $item->product_price;
                $item->revenue = $revenue;
                return $item;
            });

            // Get the total sales volume
            $totalSalesVolume = $data->sum(function ($item) {
                return $item->sold_carton_quantity + $item->sold_item_quantity;
            });

            // Calculate the total revenue
            $totalRevenue = $data->sum('revenue');

            // Retrieve the beginning inventory count
            $beginningInventory = DB::table('quantities')
                ->whereDate('created_at', '>=', now()->startOfMonth())
                ->orderBy('created_at')
                ->value('total_quantity');

            // Retrieve the ending inventory count
            $endingInventory = DB::table('quantities')
                ->whereDate('created_at', '<=', now()->endOfMonth())
                ->orderByDesc('created_at')
                ->value('total_quantity');

            // Get the total capacity of the warehouse
            $totalCapacity = DB::table('rack_locations')
            ->join('products', 'products.rack_id', '=', 'rack_locations.id')
            ->where('products.user_id', $user->id)
            ->sum('capacity');

            // Get the current occupied capacity of the warehouse
            $occupiedCapacity = DB::table('rack_locations')
            ->join('products', 'products.rack_id', '=', 'rack_locations.id')
            ->where('products.user_id', $user->id)
            ->sum('occupied');

            $utilizationRate = 0;

            if($occupiedCapacity != null){
            // Calculate the utilization ratw
            $utilizationRate = ($occupiedCapacity / $totalCapacity) * 100;

            // Round the utilization rate to two decimal places
            $utilizationRate = round($utilizationRate, 2);
            }


            // Retrieve the number of orders fulfilled during the month
            $ordersFulfilled = DB::table('orders')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->whereBetween('orders.created_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->where('products.user_id', $user->id)
                ->count();

            // Retrieve the top-selling products based on inventory movement
            $topSellingProducts = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->select('products.product_name', 'quantities.sold_carton_quantity', 'quantities.sold_item_quantity')
                ->where('products.user_id', $user->id)
                ->orderByRaw('(quantities.sold_carton_quantity + quantities.sold_item_quantity) DESC')
                ->take(1) // Adjust the number as per your requirement
                ->get()
                ->toArray(); // Convert the collection to an array

            // Retrieve the low-selling products based on inventory movement
            $lowSellingProducts = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->select('products.product_name', 'quantities.sold_carton_quantity', 'quantities.sold_item_quantity')
                ->where('products.user_id', $user->id)
                ->orderByRaw('(quantities.sold_carton_quantity + quantities.sold_item_quantity) ASC')
                ->take(1) // Adjust the number as per your requirement
                ->get()
                ->toArray(); // Convert the collection to an array

            $returnMetrics = DB::table('pickers')
                ->join('products', 'products.id', '=', 'pickers.product_id')
                ->select('products.product_name', 'pickers.status', DB::raw('SUM(pickers.quantity) as total_quantity'))
                ->groupBy('products.product_name', 'pickers.status')
                ->orderBy('products.product_name')
                ->where('products.user_id', $user->id)
                ->get();

            // Prepare $rowspanValue array
            $rowspanValue = [];
            foreach ($returnMetrics as $row) {
                if (!isset($rowspanValue[$row->product_name])) {
                    $rowspanValue[$row->product_name] = 1;
                } else {
                    $rowspanValue[$row->product_name]++;
                }
            }
        }
        return view('backend.report.Report', compact('startDate', 'endDate', 'data', 'totalSalesVolume', 'totalRevenue', 'beginningInventory', 'endingInventory', 'occupiedCapacity', 'totalCapacity', 'utilizationRate', 'ordersFulfilled', 'topSellingProducts', 'lowSellingProducts', 'returnMetrics', 'rowspanValue'));
    }

    public function generateReport()
    {
        // Get the authenticated user
        $user = auth()->user();

        if ($user->role == 3) {
            // If the user is of role 3, get products owned by the user with role 3

            // Get the start and end dates of the desired month
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();

            $data = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->join('companies', 'products.company_id', '=', 'companies.id')
                ->join('weights', 'products.id', '=', 'weights.product_id')
                ->join('product_request', 'companies.id', '=', 'product_request.company_id')
                ->select(
                    'products.id',
                    'weights.weight_of_product',
                    'product_request.product_price',
                    'companies.company_name',
                    'companies.address',
                    'companies.email',
                    'companies.phone_number',
                    'products.product_name',
                    'products.product_desc',
                    'products.item_per_carton',
                    'products.carton_quantity',
                    'quantities.total_quantity',
                    'quantities.remaining_quantity',
                    'products.weight_per_item',
                    'products.weight_per_carton',
                    'products.product_dimensions',
                    'products.product_image',
                    'products.date_to_be_stored',
                    'quantities.sold_carton_quantity',
                    'quantities.sold_item_quantity'
                )
                ->where('products.user_id', $user->id)
                ->distinct()
                ->get();

            // Calculate the revenue for each product
            $data = $data->map(function ($item) {
                $salesVolume = $item->sold_carton_quantity + $item->sold_item_quantity;
                $revenue = $salesVolume * $item->product_price;
                $item->revenue = $revenue;
                return $item;
            });

            // Get the total sales volume
            $totalSalesVolume = $data->sum(function ($item) {
                return $item->sold_carton_quantity + $item->sold_item_quantity;
            });

            // Calculate the total revenue
            $totalRevenue = $data->sum('revenue');

            // Retrieve the beginning inventory count
            $beginningInventory = DB::table('quantities')
                ->whereDate('created_at', '>=', now()->startOfMonth())
                ->orderBy('created_at')
                ->value('total_quantity');

            // Retrieve the ending inventory count
            $endingInventory = DB::table('quantities')
                ->whereDate('created_at', '<=', now()->endOfMonth())
                ->orderByDesc('created_at')
                ->value('total_quantity');

            // Get the total capacity of the warehouse
            $totalCapacity = DB::table('rack_locations')
            ->join('products', 'products.rack_id', '=', 'rack_locations.id')
            ->where('products.user_id', $user->id)
            ->sum('capacity');

            // Get the current occupied capacity of the warehouse
            $occupiedCapacity = DB::table('rack_locations')
            ->join('products', 'products.rack_id', '=', 'rack_locations.id')
            ->where('products.user_id', $user->id)
            ->sum('occupied');

            $utilizationRate = 0;
            
            if($occupiedCapacity != null){
            // Calculate the utilization ratw
            $utilizationRate = ($occupiedCapacity / $totalCapacity) * 100;

            // Round the utilization rate to two decimal places
            $utilizationRate = round($utilizationRate, 2);
            }


            // Retrieve the number of orders fulfilled during the month
            $ordersFulfilled = DB::table('orders')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->whereBetween('orders.created_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->where('products.user_id', $user->id)
                ->count();

            // Retrieve the top-selling products based on inventory movement
            $topSellingProducts = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->select('products.product_name', 'quantities.sold_carton_quantity', 'quantities.sold_item_quantity')
                ->where('products.user_id', $user->id)
                ->orderByRaw('(quantities.sold_carton_quantity + quantities.sold_item_quantity) DESC')
                ->take(1) // Adjust the number as per your requirement
                ->get()
                ->toArray(); // Convert the collection to an array

            // Retrieve the low-selling products based on inventory movement
            $lowSellingProducts = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->select('products.product_name', 'quantities.sold_carton_quantity', 'quantities.sold_item_quantity')
                ->where('products.user_id', $user->id)
                ->orderByRaw('(quantities.sold_carton_quantity + quantities.sold_item_quantity) ASC')
                ->take(1) // Adjust the number as per your requirement
                ->get()
                ->toArray(); // Convert the collection to an array

            $returnMetrics = DB::table('pickers')
                ->join('products', 'products.id', '=', 'pickers.product_id')
                ->select('products.product_name', 'pickers.status', DB::raw('SUM(pickers.quantity) as total_quantity'))
                ->groupBy('products.product_name', 'pickers.status')
                ->orderBy('products.product_name')
                ->where('products.user_id', $user->id)
                ->get();

            // Prepare $rowspanValue array
            $rowspanValue = [];
            foreach ($returnMetrics as $row) {
                if (!isset($rowspanValue[$row->product_name])) {
                    $rowspanValue[$row->product_name] = 1;
                } else {
                    $rowspanValue[$row->product_name]++;
                }
            }
        }
        
        // Generate the report PDF using Dompdf
        $pdf = app('dompdf.wrapper')->loadView('backend.report.PDFReport', compact('data', 'startDate', 'endDate', 'data', 'totalSalesVolume', 'totalRevenue', 'beginningInventory', 'endingInventory', 'occupiedCapacity', 'totalCapacity', 'utilizationRate', 'ordersFulfilled', 'topSellingProducts', 'lowSellingProducts', 'returnMetrics', 'rowspanValue'));

        // Return the PDF for download or display 
        return $pdf->stream('report.pdf'); // This line generate an error 126 (Software incompatibility with M1 Mac models)
    }

    public function showWeeklyReport()
    {
        $companies = DB::table('companies')
            ->select('company_name', 'id')
            ->get();

        $weeklyReports = DB::table('weekly_reports')->get(); // Retrieve the weekly report data from the database

        return view('backend.report.Weekly-Report', ['weeklyReports' => $weeklyReports], compact('companies'));
    }

    public function generateWeeklyReports(Request $request) // This function generates weekly report based on the submitted date from the form
    {
        // Replace with the start and end dates of the week
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Build the query
        $query = DB::table('orders as o')
            ->join('products as p', 'o.product_id', '=', 'p.id')
            ->join('companies as c', 'o.company_id', '=', 'c.id')
            ->join('quantities as q', 'o.product_id', '=', 'q.product_id')
            ->leftJoin(
                DB::raw('(SELECT company_id, product_id, SUM(CASE WHEN quantity > 0 THEN quantity ELSE 0 END) AS quantity
                FROM orders GROUP BY company_id, product_id) as inflow'),
                function ($join) {
                    $join->on('o.company_id', '=', 'inflow.company_id')
                        ->on('o.product_id', '=', 'inflow.product_id');
                }
            )
            ->leftJoin(
                DB::raw('(SELECT company_id, product_id, SUM(ABS(quantity)) AS quantity
                FROM orders GROUP BY company_id, product_id) as outflow'),
                function ($join) {
                    $join->on('o.company_id', '=', 'outflow.company_id')
                        ->on('o.product_id', '=', 'outflow.product_id');
                }
            )
            ->select(
                'o.company_id',
                'c.company_name',
                DB::raw('WEEK(MIN(o.created_at)) AS week_number'),
                DB::raw('IFNULL(SUM(inflow.quantity), 0) AS total_inflow_quantity'),
                DB::raw('IFNULL(SUM(outflow.quantity), 0) AS total_outflow_quantity'),
                DB::raw('IFNULL(SUM(inflow.quantity), 0) - IFNULL(SUM(outflow.quantity), 0) AS net_change_quantity'),
                'q.remaining_quantity as remaining_quantity'
            )
            ->whereBetween('o.created_at', [$startDate, $endDate])
            ->where('o.company_id', $request->company_id)
            ->groupBy('o.company_id', 'c.company_name', 'q.remaining_quantity');

        if ($query->get('total_inflow_quantity') === null) {
            return redirect()->route('showWeeklyReport')->with('error', 'There is no data to be shown in this week.');
        } else 
        {
            // Execute the query and insert data into the weekly_reports table
            $weeklyReportsData = $query->get();
            foreach ($weeklyReportsData as $reportData) {
                WeeklyReport::create([
                    'company_id' => $reportData->company_id,
                    'company_name' => $reportData->company_name,
                    'week_number' => $reportData->week_number,
                    'total_inflow_quantity' => $reportData->total_inflow_quantity,
                    'total_outflow_quantity' => $reportData->total_outflow_quantity,
                    'net_change_quantity' => $reportData->net_change_quantity,
                    'remaining_quantity' => $reportData->remaining_quantity,
                ]);
            }
    
            // Optionally, you can return a response to indicate the success of the operation
            return redirect()->route('showWeeklyReport')->with('success', 'Weekly reports generated successfully.');
        }

    }

}