<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pickup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class PickupController extends Controller
{
    public function create()
    {
        return view('backend.pickup.pickup_form');
    }
    public function pickupList()
    {
        $pickups = Pickup::all(); // Retrieve pickup data from your model

        return view('backend.pickup.pickup_list', compact('pickups'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->except('_token');

        $validator = Validator::make($request->all(), [
            'sender_address' => 'required|string|max:255',
            'sender_state' => 'required|string|max:255',
            'sender_postcode' => 'required|string|max:10',
            'sender_name' => 'required|string|max:255',
            'sender_contact_no' => 'required|string|max:20',
            'receiver_name' => 'required|string|max:255',
            'receiver_contact_no' => 'required|string|max:20',
            'receiver_address' => 'required|string|max:255',
            'receiver_state' => 'required|string|max:255',
            'receiver_postcode' => 'required|string|max:10',
            'time_pickup' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'], // Custom time validation
            'date_pickup' => 'required|date',
            'carton_quantity' => 'required|integer',
            'pallet_quantity' => 'required|integer',
            'remarks' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->route('pickup_form')
                ->withErrors($validator)
                ->withInput();
        }

        // Create the pickup record
        Pickup::create($validatedData);

        return redirect()->route('pickup_list')->with('success', 'Pickup scheduled successfully!');
    }

    public function PickupEdit($id)
    {
        // Retrieve the pickup record with the given ID
        $edit = Pickup::find($id);

        // Check if the pickup record exists
        if (!$edit) {
            return redirect()->route('pickup_list')->with('error', 'Pickup not found.');
        }

        // Return the edit view with the pickup data
        return view('backend.pickup.edit_pickup', compact('edit'));
    }

    // Update the edited pickup record
    public function PickupUpdate(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'sender_address' => 'required',
            'sender_state' => 'required',
            'sender_postcode' => 'required',
            'sender_name' => 'required',
            'sender_contact_no' => 'required',
            'receiver_name' => 'required',
            'receiver_contact_no' => 'required',
            'receiver_address' => 'required',
            'receiver_state' => 'required',
            'receiver_postcode' => 'required',
            'carton_quantity' => 'required|numeric',
            'pallet_quantity' => 'required|numeric',
            'date_pickup' => 'required|date',
            'time_pickup' => 'required',
            'remarks' => 'nullable',
        ]);

        // Find the pickup record with the given ID
        $pickup = Pickup::find($id);

        // Check if the pickup record exists
        if (!$pickup) {
            return redirect()->route('pickup_list')->with('error', 'Pickup not found.');
        }

        // Update the pickup record with the validated data
        $pickup->update($validatedData);

        // Redirect to the list page with a success message
        return redirect()->route('pickup_list')->with('success', 'Pickup updated successfully.');
    }
    public function waybill($id, $action)
    {
        // Retrieve the pickup record with the given ID
        $pickup = Pickup::find($id);

        // Check if the pickup record exists
        if (!$pickup) {
            return redirect()->route('pickup_list')->with('error', 'Pickup not found.');
        }

        // Generate PDF waybill
        $pdf = PDF::loadView('backend.pickup.waybill', compact('pickup'));

        // Define the file name
        $fileName = 'waybill_' . $pickup->id . '.pdf';

        // Determine the response based on the action parameter
        if ($action == 'display') {
            // Display the PDF in the browser
            return $pdf->stream($fileName);
        } elseif ($action == 'download') {
            // Download the PDF
            return $pdf->download($fileName);
        } else {
            // Invalid action parameter
            return redirect()->route('pickup_list')->with('error', 'Invalid action parameter.');
        }
    }
}
