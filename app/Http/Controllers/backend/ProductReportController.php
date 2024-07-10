<?php

namespace App\Http\Controllers\backend;

use App\Models\Quantity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PDF;
use Carbon\Carbon;

use App\Models\ProductReport;
use App\Models\Product;
use App\Models\Company;
use App\Models\User;
use App\Models\Rack;
use App\Models\Floor;
use App\Models\Restock;
use App\Models\ProductRequest;
use App\Models\Order;

class ProductReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();
        
       if ($user->role == 3) {
        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        //Request the product ID
        $productId = $request->id;

        // Query the database to calculate the total units sold for the product during the month
        $totalUnitsSold = Order::where('product_id', $productId)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->sum('quantity');

        // Calculate the product's total revenue generated > orders.quantity * products.product_price
        $revenue = Order::where('product_id', $productId)
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->sum(\DB::raw('quantity * product_price'));
        
        // Calculate the beginning inventory
        $beginningInventory = Product::where('id', $productId)
        ->value('item_per_carton') * Quantity::where('product_id', $productId)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->value('remaining_quantity');

        // Calculate the ending inventory
        $endingInventory = Product::where('id', $productId)
        ->value('item_per_carton') * Quantity::where('product_id', $productId)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->orderBy('created_at', 'desc')
        ->value('remaining_quantity');
        } 

        // Query the database to calculate the number of unique customers who purchased the product during the month
        $totalCustomers = Order::where('product_id', $productId)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->distinct('user_id')
            ->count('user_id');

        return view('backend.report.Product-Report', compact('totalUnitsSold', 'revenue', 'beginningInventory', 'endingInventory', 'totalCustomers'));

        //$pdf = PDF::loadView('backend.report.Product-Report', compact(''));

        //return $pdf->stream('report.pdf');     // This line generate an error 126 (Software incompatibility with M1 Mac models)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductReport $productReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductReport $productReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductReport $productReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductReport $productReport)
    {
        //
    }
}