<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
{
    $user = Auth::user();
    $client = Client::where('uid', $user->id)->first();

    if (!$client) {
        return redirect()->back()->withErrors(['error' => 'Client not found.']);
    }

    $client_id = $client->id;
    $customers = Customer::where('client_id', $client_id)->get();

    $view = $this->getViewBasedOnRole();

    return view($view, compact('customers', 'client'));
}


    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        if ($user->role == 1) {
            // Role 1: handle as per the previous 'create' and 'store' for role 1
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'address' => 'required|string',
                'attention' => 'required|string',
                'tel' => 'required|string',
                'client_id' => 'required|exists:clients,id'
            ]);

            Customer::create($validatedData);

            return redirect()->back()->with('success', 'Customer added successfully');

        } elseif ($user->role == 3) {
            // Role 3: handle as per the new 'store' method for role 3
            $client = Client::where('uid', $user->id)->first();

            if (!$client) {
                return redirect()->back()->withErrors(['error' => 'Client not found.']);
            }

            $client_id = $client->id;

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'address' => 'required|string',
                'attention' => 'required|string',
                'tel' => 'required|string',
            ]);

            $validatedData['client_id'] = $client_id;

            Customer::create($validatedData);

            return redirect()->back()->with('success', 'Customer added successfully');
        }

        // Handle other roles or default case
        return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'attention' => 'required|string',
            'tel' => 'required|string'
        ]);

        $customer->update($validatedData);

        return redirect()->back()->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Customer deleted successfully!');
    }

    private function getViewBasedOnRole()
    {
        switch ($this->user->role) {
            case 1:
                return 'backend.company.client_list';
            case 3:
                return 'backend.user.customer_detail';
            default:
                return 'backend.default.view';
        }
    }
}
