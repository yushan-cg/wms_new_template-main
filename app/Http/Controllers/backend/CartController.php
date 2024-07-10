<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Floor;
use App\Models\Product;
use App\Models\Picker;
use App\Models\Rack;
use App\Models\Weight;
use App\Models\Order;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function ItemList(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'];
        }


        // get the authenticated user
        $user = auth()->user();

        // check if the authenticated user is an admin (role 1)
        if ($user->role == 1) {

            $deliveries = Delivery::all();
            // if admin, get all products and users info from the database
            $users = DB::table('users')->get();
            $list = DB::table('products')
                ->join('quantities', 'products.id', '=', 'quantities.product_id')
                ->join('companies', 'products.company_id', '=', 'companies.id')
                ->leftjoin('rack_locations', 'products.rack_id', '=', 'rack_locations.id')
                ->leftjoin('floor_locations', 'products.floor_id', '=', 'floor_locations.id')
                ->select('products.id', 'companies.company_name', 'rack_locations.location_code', 'floor_locations.location_codes', 'products.product_name', 'products.item_per_carton', 'quantities.remaining_quantity', 'products.product_image', 'products.weight_per_item')
                ->get();
        } else {
            // if not admin, get products owned by the user
            $list = DB::table('products')->where('user_id', $user->id)->get();
        }

        // return the view with the list of products and the cart data
        return view('backend.carts.cart_index', compact('list', 'cart', 'users', 'total', 'deliveries'));
    }


    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // $rack = Rack::findOrFail($id);
        // $floor = Floor::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Get the quantity to be deducted based on the input
        $quantity = $validatedData['quantity'];
        $num_cartons = ceil($quantity / $product->item_per_carton); // Use ceil instead of floor
        $num_items = $quantity % $product->item_per_carton;
        $quantity_deducted = $num_cartons * $product->item_per_carton + $num_items;

        // ...

        // Fetch the rack and floor based on the product's rack_id and floor_id
        $rack = Rack::find($product->rack_id);
        $floor = Floor::find($product->floor_id);

        if ($rack != null && $floor === null) {
            // Check if the product already exists in the cart
            $cart = session()->get('cart', []);
            $existingCartItem = $cart[$id] ?? null;

            if ($existingCartItem) {
                // Update the quantity if the product already exists in the cart
                $existingQuantity = $existingCartItem['quantity'];
                $newQuantity = $existingQuantity + $quantity;

                $cart[$id]['quantity'] = $newQuantity;
                session()->put('cart', $cart); // Update the cart in the session
            } else {
                // Add the item to the cart if it doesn't already exist
                $cart[$id] = [
                    'id' => $id,
                    'name' => $product->product_name,
                    'quantity' => $quantity,
                    'rack' => $rack->rack_id,
                    'image' => $product->product_image
                ];

                session()->put('cart', $cart); // Update the cart in the session
            }

        } else if ($floor != null && $rack === null) {
            // Check if the product already exists in the cart
            $cart = session()->get('cart', []);
            $existingCartItem = $cart[$id] ?? null;

            if ($existingCartItem) {
                // Update the quantity if the product already exists in the cart
                $existingQuantity = $existingCartItem['quantity'];
                $newQuantity = $existingQuantity + $quantity;

                $cart[$id]['quantity'] = $newQuantity;
                session()->put('cart', $cart); // Update the cart in the session
            } else {
                // Add the item to the cart if it doesn't already exist
                $cart[$id] = [
                    'id' => $id,
                    'name' => $product->product_name,
                    'quantity' => $quantity,
                    'floor' => $floor->floor_id,
                    'image' => $product->product_image
                ];

                session()->put('cart', $cart); // Update the cart in the session
            }

        } else {

        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }





    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully!');
        }

        return redirect()->back();
    }


    private function generatePONumber()
    {
        // Get the current timestamp
        $timestamp = time();

        // Generate a unique identifier based on the timestamp
        $identifier = substr($timestamp, -6); // Example: Use the last 6 digits of the timestamp

        // Construct the PO number with a prefix and the identifier
        $po_number = 'PO-' . $identifier;

        // Return the PO number
        return $po_number;
    }

    // public function assign(Request $request)
    // {
    //     // Get the cart items
    //     $cart = session()->get('cart', []);

    //     // Get the selected user ID
    //     $user_id = $request->input('user_id');
    //     $selected_delivery_id = $request->input('order_no'); // Retrieve the selected delivery order ID

    //     if (empty($user_id)) {
    //         return redirect()->back()->with('error', 'Please select a picker!');
    //     }

    //     if (empty($user_id) || empty($selected_delivery_id)) {
    //         return redirect()->back()->with('error', 'Please select a picker and a delivery order!');
    //     }

    //     $delivery = Delivery::find($selected_delivery_id); // Retrieve the delivery record

    //     if (empty($delivery)) {
    //         return redirect()->back()->with('error', 'Please select the delivery order!');
    //     }

    //     if (!$delivery) {
    //         return redirect()->back()->with('error', 'Selected delivery order not found!');
    //     }


    //     // Deduct the items from the remaining quantity and update the product and quantity
    //     foreach ($cart as $id => $item) {
    //         $quantity_to_deduct = $item['quantity'];

    //         $quantity = Quantity::where('product_id', $id)->firstOrFail();
    //         $product = Product::findOrFail($quantity->product_id);
    //         $num_cartons = floor($quantity_to_deduct / $product->item_per_carton);
    //         $num_items = $quantity_to_deduct % $product->item_per_carton;
    //         $quantity_deducted = $num_cartons * $product->item_per_carton + $num_items;

    //         // Check if the quantity is available
    //         if ($quantity->remaining_quantity < $quantity_deducted) {
    //             return redirect()->back()->with('error', 'Not enough stock!');
    //         }

    //         $quantity->remaining_quantity -= $quantity_deducted;
    //         $quantity->sold_carton_quantity += $num_cartons;
    //         $quantity->sold_item_quantity += $num_items; // Remove the calculation here
    //         $quantity->save();

    //         // ...

    //         // Calculate the total weight of the items and deduct it from the rack's occupied amount
    //         $total_weight = $product->weight_per_item * $quantity_deducted;
    //         $rack = Rack::where('id', $product->rack_id)->firstOrFail();
    //         $rack->occupied = max(0, $rack->occupied - $total_weight);
    //         $rack->save();

    //         $weight = Weight::where('product_id', $product->id)->firstOrFail();
    //         $weight->weight_of_product -= $total_weight;
    //         $weight->save();
    //     }

    //     // // Store the assigned products and quantity in the pickers table
    //     // foreach ($cart as $id => $item) {
    //     //     $picker = new Picker();
    //     //     $picker->user_id = $user_id;
    //     //     $picker->product_id = $id;
    //     //     $picker->rack_id = $product->rack_id; // Make sure to adjust this if necessary
    //     //     $picker->quantity = $item['quantity'];
    //     //     $picker->status = 'Pending';
    //     //     $picker->order_no = $selected_delivery_id;
    //     //     $picker->save();
    //     // }

    //     // Store the assigned products and quantity in the pickers table
    //     foreach ($cart as $id => $item) {
    //         $picker = new Picker();
    //         $picker->user_id = $user_id;
    //         $picker->product_id = $id;
    //         $picker->rack_id = $item['rack']; // Use $item['rack'] instead of $product->rack_id
    //         $picker->quantity = $item['quantity'];
    //         $picker->status = 'Pending';
    //         $picker->order_no = $selected_delivery_id;
    //         $picker->save();
    //     }

    //     // Clear the cart
    //     session()->forget('cart');

    //     return redirect()->back()->with('success', 'Order placed and products assigned successfully!');
    // }

    public function assign(Request $request)
    {
        // Get the cart items
        $cart = session()->get('cart', []);

        // Get the selected user ID
        $user_id = $request->input('user_id');
        $selected_delivery_id = $request->input('order_no'); // Retrieve the selected delivery order ID

        if (empty($user_id)) {
            return redirect()->back()->with('error', 'Please select a picker!');
        }

        if (empty($user_id) || empty($selected_delivery_id)) {
            return redirect()->back()->with('error', 'Please select a picker and a delivery order!');
        }

        $delivery = Delivery::find($selected_delivery_id); // Retrieve the delivery record

        if (empty($delivery)) {
            return redirect()->back()->with('error', 'Please select the delivery order!');
        }

        if (!$delivery) {
            return redirect()->back()->with('error', 'Selected delivery order not found!');
        }

        // Deduct the items from the remaining quantity and update the product and quantity
        foreach ($cart as $id => $item) {
            $quantity_to_deduct = $item['quantity'];

            $quantity = Quantity::where('product_id', $id)->firstOrFail();
            $product = Product::findOrFail($quantity->product_id);
            $num_cartons = floor($quantity_to_deduct / $product->item_per_carton);
            $num_items = $quantity_to_deduct % $product->item_per_carton;
            $quantity_deducted = $num_cartons * $product->item_per_carton + $num_items;

            // Check if the quantity is available
            if ($quantity->remaining_quantity < $quantity_deducted) {
                return redirect()->back()->with('error', 'Not enough stock!');
            }

            $quantity->remaining_quantity -= $quantity_deducted;
            $quantity->sold_carton_quantity += $num_cartons;
            $quantity->sold_item_quantity += $num_items;
            $quantity->save();

            // Calculate the total weight of the items and deduct it from the rack's or floor's occupied amount
            $total_weight = $product->weight_per_item * $quantity_deducted;

            if (isset($item['rack'])) {
                $rack = Rack::where('id', $item['rack'])->firstOrFail();
                $rack->occupied = max(0, $rack->occupied - $total_weight);
                $rack->save();
            } elseif (isset($item['floor'])) {
                $floor = Floor::where('id', $item['floor'])->firstOrFail();
                // Modify the floor's occupied amount based on your floor_location table structure
                // For example, if your floor_location table has a column 'occupied_weight', you would do:
                $floor->occupied_weight = max(0, $floor->occupied_weight - $total_weight);
                $floor->save();
            }

            $weight = Weight::where('product_id', $product->id)->firstOrFail();
            $weight->weight_of_product -= $total_weight;
            $weight->save();
        }

        // Store the assigned products and quantity in the pickers table
        foreach ($cart as $id => $item) {
            $picker = new Picker();
            $picker->user_id = $user_id;
            $picker->product_id = $id;
            $picker->rack_id = $item['rack'] ?? null; // Use $item['rack'] if available, otherwise use null
            $picker->floor_id = $item['floor'] ?? null; // Use $item['floor'] if available, otherwise use null
            $picker->quantity = $item['quantity'];
            $picker->status = 'Pending';
            $picker->order_no = $selected_delivery_id;
            $picker->save();
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->back()->with('success', 'Order placed and products assigned successfully!');
    }





    public function cartRemove($id)
    {
        $cart = session()->get('cart', []);

        // Remove the item from the cart
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }



    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }


}