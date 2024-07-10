<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Company;
use App\Models\Rack;

class RackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function RackList(Request $request)
    {

        $list = DB::table('rack_locations')->get();
        return view('backend.rack.list_rack', compact('list'));
    }
    public function getProductsByRackId($rackId)
    {
        $rack = rack_locations::find($rackId);
        $products = $rack->products; // Assuming a 'products' relationship in the Rack model

        return response()->json($products);
    }
    public function RackQR()
    {
        return view('backend.rack.qr_racks');
    }
    public function getRackQRInfo($locationCode)
    {
        // Query the database using $locationCode and return the rack information as JSON
        $rack = Rack::where('location_code', $locationCode)->with('products')->first();

        if (!$rack) {
            return response()->json(['error' => 'Rack not found'], 404);
        }

        return response()->json(['rack' => $rack, 'products' => $rack->products]);
    }


    /**
     * Display a listing of the resource.
     */
    // public function RackList(Request $request)
    // {
    //     // get the authenticated user
    //     $user = auth()->user();

    //     // check if the authenticated user is an admin (role 1)
    //     if ($user->role == 1) {
    //         // if admin, get all products from the database
    //         $racking = DB::table('rack_locations')
    //         ->leftJoin('products', 'rack_locations.id', '=', 'products.rack_id')
    //         ->leftJoin('companies', 'products.company_id', '=', 'companies.id')
    //         ->leftJoin(DB::raw('(SELECT product_id, SUM(remaining_quantity) AS remaining_quantity FROM quantities GROUP BY product_id) q'), 'products.id', '=', 'q.product_id')
    //         ->select('rack_locations.id','rack_locations.location_code','rack_locations.occupied', 'companies.company_name', 'products.product_name', 'rack_locations.capacity', DB::raw('IFNULL(q.remaining_quantity, 0) AS remaining_quantity'))
    //         ->whereRaw('(SELECT COUNT(*) FROM products WHERE rack_id = rack_locations.id) < rack_locations.capacity')
    //         ->get();

    //     } else {
    //         // if not admin, get products owned by the user
    //         $racking = DB::table('rack_locations')->where('user_id', $user->id)->get();
    //     }
    //     //dd($racking);
    //     // return the view with the list of products
    //     return view('backend.rack.list_rack', compact('racking'));
    // }
}
