<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

       // public function index()
    // {
    //     // Retrieve all clients with their associated customers
    //     $clients = Client::with('customers')->get();


    //     return view('backend.company.client_list', compact('clients'));
    // }

    public function index()
    {
        $clients = Client::with('customers')->get();
        $view = $this->getViewBasedOnRole();

        $client = Client::where('uid', $this->user->id)->first();

        return view($view, compact('clients', 'client'));
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'address' => 'required|string',
    //         'attention' => 'required|string',
    //         'tel' => 'required|string'
    //     ]);

    //     Client::create($validatedData);

    //     return redirect()->back()->with('success', 'Client added successfully');
    // }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string',
        'attention' => 'required|string',
        'tel' => 'required|string'
    ]);

    // Assuming $user is the authenticated user
    $user = Auth::user();

    // Create the client with the user's ID as 'uid'
    Client::create([
        'uid' => $user->id,
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'address' => $validatedData['address'],
        'attention' => $validatedData['attention'],
        'tel' => $validatedData['tel'],
    ]);

    return redirect()->back()->with('success', 'Client added successfully');
}


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'attention' => 'required|string',
            'tel' => 'required|string'
        ]);

        $client->update($validatedData);

        return redirect()->back()->with('success', 'Client updated successfully');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->back()->with('success', 'Client deleted successfully!');
    }

    private function getViewBasedOnRole()
    {
        switch ($this->user->role) {
            case 1:
                return 'backend.company.client_list';
            case 3:
                return 'backend.user.user_detail';
            default:
                // Handle other roles or scenarios as needed
                return 'backend.default.view'; // Example of a default view
        }
    }
}
