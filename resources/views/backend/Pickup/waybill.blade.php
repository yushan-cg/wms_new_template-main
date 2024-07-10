<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waybill - #{{ $pickup->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .section, table { margin-bottom: 20px; }
        .header, h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>WAYBILL - #{{ $pickup->pickup_id}}</h1>
        </div>

        <table>
            <tr>
                <td>
                    {{-- <img alt= "logo_arkod" src="{{ asset('storage/image/ARKOD Logo v2.0.png') }}"> --}}
                </td>
            </tr>
            <tr>
                <th>Sender Name:</th>
                <td>{{ $pickup->sender_name }}</td>
            </tr>
            <tr>
                <th>Sender Contact No:</th>
                <td>{{ $pickup->sender_contact_no }}</td>
            </tr>
            <tr>
                <th>Sender Address:</th>
                <td>{{ $pickup->sender_address }}</td>
            </tr>
            <tr>
                <th>Sender State:</th>
                <td>{{ $pickup->sender_state }}</td>
            </tr>
            <tr>
                <th>Sender Postcode:</th>
                <td>{{ $pickup->sender_postcode }}</td>
            </tr>
            <tr>
                <th>Receiver Name:</th>
                <td>{{ $pickup->receiver_name }}</td>
            </tr>
            <tr>
                <th>Receiver Contact No:</th>
                <td>{{ $pickup->receiver_contact_no }}</td>
            </tr>
            <tr>
                <th>Receiver Address:</th>
                <td>{{ $pickup->receiver_address }}</td>
            </tr>
            <tr>
                <th>Receiver State:</th>
                <td>{{ $pickup->receiver_state }}</td>
            </tr>
            <tr>
                <th>Receiver Postcode:</th>
                <td>{{ $pickup->receiver_postcode }}</td>
            </tr>
            <tr>
                <th>Date Pickup:</th>
                <td>{{ $pickup->date_pickup }}</td>
            </tr>
            <tr>
                <th>Time Pickup:</th>
                <td>{{ $pickup->time_pickup }}</td>
            </tr>
            <tr>
                <th>Carton Quantity:</th>
                <td>{{ $pickup->carton_quantity }}</td>
            </tr>
            <tr>
                <th>Pallet Quantity:</th>
                <td>{{ $pickup->pallet_quantity }}</td>
            </tr>
            <tr>
                <th>Remarks:</th>
                <td>{{ $pickup->remarks }}</td>
            </tr>
        </table>

        <!-- Additional Details Here -->

        {{-- <div class="qr-code">
            <!-- QR Code can be dynamically generated and displayed here -->
        </div> --}}

        <div class="footer">
            <p>Thank You for Your Support!</p>
            <p>Reach out to us at <a href="mailto:sales@arkod.com.my">sales@arkod.com.my</a> or call +6012-323 1698 if you need additional assistance.</p>
        </div>
    </div>
</body>
</html>
