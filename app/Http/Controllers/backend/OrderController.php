<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Company;
use App\Models\Delivery;
use Illuminate\Support\Facades\View;
use PDF;



class OrderController extends Controller
{
    public function orderList($companyId)
{
    $orders = Order::select('orders.order_no', 'orders.user_id', 'orders.product_id', 'orders.rack_id', 'orders.quantity', 'orders.created_at', 'orders.updated_at')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('products.company_id', $companyId)
        ->groupBy('orders.order_no', 'orders.user_id', 'orders.product_id', 'orders.rack_id', 'orders.quantity', 'orders.created_at', 'orders.updated_at')
        ->orderBy('orders.created_at', 'desc')
        ->get()
        ->groupBy('order_no'); // Group the orders by order_no

    return view('backend.orders.index', compact('orders'));
}


// public function generateInvoice($order_no)
// {
//     // Retrieve the order and company data
//     $order = Order::where('order_no', $order_no)->first();
//     $company = Company::find($order->company_id);
//      $orderGroup = Order::where('order_no', $order_no)->get();

//     // Load the invoice view with the order and company data
//     $html = View::make('backend.invoice.invoice', compact('order'))->render();

//     // Generate the PDF
//     $pdf = PDF::loadHTML($html);

//     return $pdf->stream('invoice.pdf');
// }

public function show($orderNo)
{
    // Retrieve orders with the same order_no
    $orderGroup = Order::where('order_no', $orderNo)->get();

    if ($orderGroup->isEmpty()) {
        // Handle case when no orders with the specified order_no are found
        abort(404, 'Order not found');
    }

    // Retrieve company information (assuming it's related to the product)
    $companyId = $orderGroup->first()->product->company_id;
    $company = Company::find($companyId);

    // Retrieve delivery information
    $delivery = Delivery::where('id', $orderNo)->first();

    // Pass the data to the view
    return view('backend.invoice.order_list', compact('orderGroup', 'company', 'delivery'));
}



}
