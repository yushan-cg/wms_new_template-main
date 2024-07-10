<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use App\Models\Picker;
use App\Models\User;
use App\Models\ReturnStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnStockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function CustReturnStockForm(Request $request)
{
    // Get the user's ID
    $user_id = auth()->user()->id;

    // Get the user's company
    $company = Company::where('user_id', $user_id)->first();

    // Get the user's product
    $products = Product::where('user_id', $user_id)->get();
    
    if (!$company) {
        // If there's no company, show a message or redirect to a registration page
        return redirect()->route('company.create')->with('message', 'Please register a company before adding products.');
    }

    // Get all companies
    $companies = Company::where('id', $company->id)->get();

    // Return the view with the company and companies
    return view('backend.return_stock.return_stock_form', compact('company', 'companies','products'));
}

private function generateRONumber()
{
    // Get the current timestamp
    $timestamp = time();

    // Generate a unique identifier based on the timestamp
    $identifier = substr($timestamp, -6); // Example: Use the last 6 digits of the timestamp

    // Construct the PO number with a prefix and the identifier
    $ro_number = 'RO-' . $identifier;

    // Return the PO number
    return $ro_number;
}


public function storeReturnStock(Request $request)
{
    // Validate the input data
    $validatedData = $request->validate([
        'company_id' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'email' => 'required|email',
        'product_id.*' => 'required',
        'quantity.*' => 'required|numeric|min:1',
        'remark.*' => 'nullable|string',
        'status.*' => 'required|in:Dispose,Refurbish', // Added status validation
    ]);

    // Generate a unique PO number for the return_no column
    $returnNo = $this->generateRONumber();

    // Create the return stock record
    $returnStock = ReturnStock::create([
        'user_id' => auth()->user()->id,
        'company_id' => $validatedData['company_id'],
        'address' => $validatedData['address'],
        'phone_number' => $validatedData['phone_number'],
        'email' => $validatedData['email'],
        'return_no' => $returnNo,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Handle the product data
    $productData = [];

    // Loop through the product details, remarks, and statuses
    foreach ($validatedData['product_id'] as $index => $productId) {
        $productData[] = [
            'product_id' => $productId,
            'quantity' => $validatedData['quantity'][$index],
            'remark' => $validatedData['remark'][$index] ?? null,
            'status' => $validatedData['status'][$index], // Added status
        ];
    }

    // Attach the product data to the return stock record
    $returnStock->products()->attach($productData);

    $returnStock->receive_status = null;
    $returnStock->save();

    // Redirect or respond with a success message
    return redirect()->back()->with('success', 'Return stock information has been successfully saved.');
}



public function returnStockList()
{
    $user_id = auth()->user()->id;

    $returnStockList = ReturnStock::where('user_id', $user_id)->with('products')->get();
    $pickers = Picker::with('returnStock.products')
        ->whereHas('returnStock.products', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

    return view('backend.return_stock.return_stock_status_cust', compact('pickers'));
}






public function returnStockListAdmin()
{
    $pickers = Picker::all();
    $returnStockList = ReturnStock::with(['products', 'pickers'])->get();
    $users = User::all();

    return view('backend.return_stock.receive_return_stock_admin', compact('returnStockList', 'users', 'pickers'));
}






public function assignTask(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'return_stock_id' => 'required',
        'product_id' => 'required|array',
        'quantity' => 'required|array',
        'status' => 'required|array',
        'remark' => 'required|array'
    ]);

    $userId = $validatedData['user_id'];
    $returnStockId = $validatedData['return_stock_id'];
    $productIds = $validatedData['product_id'];
    $quantities = $validatedData['quantity'];
    $statuses = $validatedData['status'];
    $remarks = $validatedData['remark'];

    $pickerData = [];
    foreach ($productIds as $index => $productId) {
        $pickerData[] = [
            'user_id' => $userId,
            'return_stock_id' => $returnStockId,
            'product_id' => $productId,
            'quantity' => $quantities[$index],
            'status' => $statuses[$index],
            'remark' => $remarks[$index]
        ];
    }

    Picker::insert($pickerData);

    // Update the status in the return_stock table as "Received"
    $returnStock = ReturnStock::find($returnStockId);
    $returnStock->receive_status = 'Received';
    $returnStock->save();

    // Perform any other necessary actions

    return redirect()->back()->with('success', 'Task assigned successfully.');
}





}
