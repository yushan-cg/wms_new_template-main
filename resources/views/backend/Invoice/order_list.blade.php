@extends('backend.layouts.app')

@section('content')
<title>List of Order</title>
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
        <div class="col-12">
                <h4>
                <img src="{{ asset('assets/images/Arkod Invoice Logo.png') }}" alt="sik kelua" style="width:490px;height:135px;">
                </h4>
            </div>
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Invoice
                    <small class="float-right">Date: {{ $orderGroup->first()->created_at->format('Y-m-d') }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>{{ $delivery->sender_name }}</strong><br>
                    {{ $delivery->sender_address }}<br>
                    {{ $delivery->sender_postcode }}, {{ $delivery->sender_state }}<br>
                    Phone: {{ $delivery->sender_phone }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $delivery->receiver_name }}</strong><br>
                    {{ $delivery->receiver_address }}<br>
                    {{ $delivery->receiver_postcode }}, {{ $delivery->receiver_state }}<br>
                    Phone: {{ $delivery->receiver_phone }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $delivery->order_no }}</b><br>
                <br>
                <b>Order ID:</b> {{ $delivery->order_no }}<br>
                <b>Rack ID:</b> {{ $orderGroup->first()->rack_id }}<br>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Quantity (item)</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderGroup as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>RM{{ $order->product->product_price * $order->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        
        <!-- /.row -->
        <div class="row">

            <!-- /.col -->
            {{-- <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{ $orderGroup->first()->product->product_price * $orderGroup->first()->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Tax (0%):</th>
                            <td>$0.00</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>{{ $orderGroup->first()->product->product_price * $orderGroup->first()->quantity }}</td>
                        </tr>
                    </table>
                </div>
            </div> --}}
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.invoice -->

    <!-- Print Button -->
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
            {{-- <a href="{{ route('invoice.download', $orderGroup->first()->id) }}" class="btn btn-success">Download as PDF</a> --}}
        </div>
    </div>
@endsection
@section('page content overlay')
	<!-- Page Content overlay -->
	
	<!-- Vendor JS -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
	
	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
	    
	<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>
@endsection