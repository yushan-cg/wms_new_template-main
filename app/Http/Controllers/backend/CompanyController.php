<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
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
        // Get the currently authenticated user
   // Get the currently authenticated user
$user = auth()->user();

// Get the companies that belong to the user
$companies = Company::where('user_id', $user->id)->get();

// Return the view with the companies data
return view('backend.company.detail_company', compact('companies'));

    }

    public function getUsers()
    {
        $users = User::all();
    
        return response()->json($users);
    }
    

    

        public function showCompanyDetail(Request $request)
    {
        $user = auth()->user();
        $company = Company::where('user_id', $user)->firstOrFail();
        return view('backend.company.detail_company', ['company' => $company]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.company.create_company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request)
    {
        // Validate the input
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:companies,email',
        ]);
    
        // Create a new company instance
        $company = new Company();
    
        // Assign the input values to the company object
        $company->company_name = $request->input('company_name');
        $company->address = $request->input('address');
        $company->phone_number = $request->input('phone_number');
        $company->email = $request->input('email');
        $company->user_id = auth()->user()->id;
    
        // Save the company object to the database
        $company->save();
    
        // Redirect back to the previous page with a success message
         return redirect()->route('customerproductadd')->with('success', 'Company details added successfully!');
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get the company by ID from the database
        $company = Company::findOrFail($id);

        // Return the view with the company to be edited
        return view('backend.company.edit_company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,'.$id,
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        // Update data in the companies table
        $company = Company::findOrFail($id);
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->address = $data['address'];
        $company->phone_number = $data['phone_number'];
        $company->save();

        if ($company) {
            return Redirect()->route('company.index')->with('success','Company updated successfully');
        } else {
            $notification=array(
                'message'=>'error ',
                'alert-type'=>'error'
            );
            return Redirect()->route('company.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete the company from the database
        $company = Company::findOrFail($id);
        $company->delete();

        if ($company) {
            return Redirect()->route('company.index')->with('success','Company deleted successfully');
        } else {
            $notification=array(
                'message'=>'error ',
                'alert-type'=>'error'
            );

        }

    }


    public function showAll()
    {
        $companies = Company::all();

        return view('backend.company.company_list', compact('companies'));
    }
            
}