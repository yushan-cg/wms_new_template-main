<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Company;
use App\Models\Floor;


class FloorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function FloorList(Request $request)
    {

        $list = DB::table('floor_locations')->get();
        return view('backend.floor.list_floor', compact('list'));
    }
    public function getProductsByFloorkId($floorId)
    {
        $floor = floor_locations::find($floorId);
        $products = $floor->products; // Assuming a 'products' relationship in the Rack model

        return response()->json($products);
    }
    public function FloorQR()
    {

        return view('backend.floor.qr_floors');
    }
    public function getFloorQRInfo($locationCode)
    {
        // Query the database using $locationCode and return the floor information as JSON
        $floor = Floor::where('location_codes', $locationCode)->with('products')->first();

        if (!$floor) {
            return response()->json(['error' => 'Floor not found'], 404);
        }

        return response()->json(['floor' => $floor, 'products' => $floor->products]);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     // get the authenticated user
    //     $user = auth()->user();

    //     // check if the authenticated user is an admin (role 1)
    //     if ($user->role == 1) {
    //         // if admin, get all products from the database
    //         $flooring = DB::table('floor_locations')
    //         ->leftJoin('products', 'floor_locations.id', '=', 'products.floor_id')
    //         ->leftJoin('companies', 'products.company_id', '=', 'companies.id')
    //         ->leftJoin(DB::raw('(SELECT product_id, SUM(remaining_quantity) AS remaining_quantity FROM quantities GROUP BY product_id) q'), 'products.id', '=', 'q.product_id')
    //         ->select('floor_locations.location_codes','floor_locations.occupied', 'companies.company_name', 'products.product_name', 'floor_locations.capacity', DB::raw('IFNULL(q.remaining_quantity, 0) AS remaining_quantity'))
    //         ->whereRaw('(SELECT COUNT(*) FROM products WHERE floor_id = floor_locations.id) < floor_locations.capacity')
    //         ->get();

    //     } else {
    //         // if not admin, get products owned by the user
    //         $flooring = DB::table('floor_locations')->where('user_id', $user->id)->get();
    //     }

    //     // return the view with the list of products
    //     return view('backend.floor.list_floor', compact('flooring'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Floor $floor)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Floor $floor)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Floor $floor)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Floor $floor)
    // {
    //     //
    // }
}
