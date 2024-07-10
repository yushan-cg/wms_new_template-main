<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Response;
//carbon use for time and date
use Carbon\Carbon;


class WaybillController extends Controller
{
    public function generateWaybill()
    {
        $data = [
            'date' => date('m/d/Y'), //Outputs: 23-03-2024
            'waybill_number' => 'INV-123456',
            'customer_id' => 'CUST1234',
            'company_name' => 'Your Company Name',
            'company_logo' => asset('assets/images/waybill-banner.png'), // Ensure you have a logo image in your public folder
            'items' => [
                ['description' => 'Item 1', 'quantity' => 2, 'price' => 50.00],
                ['description' => 'Item 2', 'quantity' => 1, 'price' => 75.00],
                // Add more items as needed
            ],
            'total' => 175.00,
        ];

        $pdf = PDF::loadView('backend/invoice/waybill', $data);
        //return $pdf->download('waybill.pdf');

        // Return the PDF as a response with appropriate headers
        return new Response(
            $pdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="waybill.pdf"' // Display PDF in browser
            ]
        );
    }
}
