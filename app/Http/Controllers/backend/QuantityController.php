<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Company;
use App\Models\Cart;




class QuantityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ProductQuantityList(Request $request)
    {
        $quantities = DB::table('quantities')
            ->join('products', 'quantities.product_id', '=', 'products.id')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->select('products.id', 'companies.company_name', 'products.product_name', 'quantities.total_quantity', 'quantities.remaining_quantity')
            ->get();
        return view('backend.quantity.list_quantity', compact('quantities'));
    }

    public function MyStockLevel(Request $request)
{
    // Get the authenticated user's ID
    $user_id = auth()->user()->id;

    $quantities = DB::table('quantities')
        ->join('products', 'quantities.product_id', '=', 'products.id')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->where('companies.user_id', $user_id) // Filter by the user's ID
        ->select('products.id', 'companies.company_name', 'products.product_name','products.product_desc','products.weight_per_item','products.weight_per_carton',   'quantities.total_quantity', 'quantities.remaining_quantity')
        ->get();

    // Calculate the stock level
    $stockLevel = false;
    foreach ($quantities as $quantity) {
        $progress = ($quantity->remaining_quantity / $quantity->total_quantity) * 100;
        if ($progress <= 30) {
            $stockLevel = true;
            break;
        }
    }

    return view('backend.quantity.my_stock', compact('quantities', 'stockLevel'));
}

    
    
    
    


}

