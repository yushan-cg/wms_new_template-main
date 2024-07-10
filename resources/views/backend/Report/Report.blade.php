@extends('backend.layouts.app')
@section('content')
    <style>
        body {
            background-color: #000;
        }

        .padding {
            padding: 2rem !important;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            margin: 20mm;
            /* Added margin */
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            /* Remove the border */
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium';
        }

        .text-dark {
            color: #3d405c !important;
        }

        table.table-striped tbody tr {
            border-bottom: 1px solid #D48E15;
        }

        .d-flex {
            justify-content: flex-start;
            align-items: center;
        }

        .logo-container {
            text-align: center;
            margin-right: 10px;
        }

        .text-container {
            text-align: left;
        }

        .logo-container {
            text-align: left !important;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .strong {
            font-weight: bold;
        }

        .end-of-statement {
            font-size: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 50px */
        }
    </style>

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4" style="padding-bottom: 0 !important; padding-left: 22px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-start">
                        <!--<div class="image-container">-->
                        <!--    <img src="{{ asset('public/Image/Arkod.jpg') }}" alt="ARKOD"-->
                        <!--        style="width: 31.68mm; height: 6.97mm;">-->
                        <!--</div>-->
                        <div class="text-container">
                            <a class="pt-2 d-inline-block" data-abc="true"
                                style="color: #D48E15; font-weight: bold; font-size: 10px; padding-bottom: 22px; ">ARKOD
                                SMART LOGITECH SDN BHD (1396015-V)</a>
                        </div>
                    </div>
                    <div class="float-right">
                        <p class="text-right"
                            style="font-family: Arial; font-size: 8px; margin-bottom:0; padding-top: 46px">
                            <span class="text-muted">www.arkod.com.my</span><br>
                            GF LOT 1451, SECTION 66, KTLD, JALAN KELULI<br>
                            BINTAWA INDUSTRIAL ESTATE<br>
                            93450 KUCHING SARAWAK<br>
                            sales@arkod.com.my<br>
                            (6012) 323 - 1698
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body" style="padding-top: 0 !important;">
                <div class="card-header p-4" style="padding: 0 !important;">
                    <a class="pt-2 d-inline-block" data-abc="true"
                        style="color: #D48E15; font-weight: bold; padding-top:0 !important;">{{ $data->first()->company_name ?? NULL}}</a>
                    <p class="text-left" style="font-family: Arial; font-size: 8px;">
                        {{ $data->first()->address ?? NULL}}<br>
                        Email: {{ $data->first()->email ?? NULL}}<br>
                        Phone No.: {{ $data->first()->phone_number ?? NULL}}
                    </p>
                </div>

                <div class="card-header p-4" style="padding: 0 !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0" style="font-size: 14px; color: #D48E15;">MONTHLY REPORT</h5>
                        <p class="text-right mb-0" style="font-family: Arial; font-size: 8px;">Created on:
                            {{ now()->format('Y-m-d') }}
                        </p>
                    </div>
                    <p class="text-black" style="font-size: 12px;">{{ $startDate->format('Y-m-d') }} -
                        {{ $endDate->format('Y-m-d') }}</p>
                </div>

                {{-- TABLE --}}
                <div class="table-responsive-sm">
                    <table class="table table-striped" style="border-collapse: collapse; border-spacing: 0;">
                        <thead>
                            <tr>
                                <th class="center" style="color: #D48E15; font-size: 8px; padding: 2px;">#</th>
                                <th style="color: #D48E15; font-size: 8px; padding: 2px;">Item</th>
                                <th style="color: #D48E15; font-size: 8px; padding: 2px; width: 40%;">Description</th>
                                <th class="right" style="color: #D48E15; font-size: 8px; padding: 2px; width: 15%;">Price
                                </th>
                                <th class="center" style="color: #D48E15; font-size: 8px; padding: 2px; width: 15%;">
                                    Quantity on Hand</th>
                                <th class="right" style="color: #D48E15; font-size: 8px; padding: 2px;">Stock Value</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="center" style="font-size: 8px;">{{ $row->id }}</td>
                                    <td class="left strong" style="font-size: 8px;">{{ $row->product_name }}</td>
                                    <td class="left" style="font-size: 8px;">{{ $row->product_desc }}</td>
                                    <td class="right" style="font-size: 8px;">RM {{ $row->product_price }}</td>
                                    <td class="center" style="font-size: 8px;">{{ $row->remaining_quantity }}</td>
                                    <td class="right" style="font-size: 8px;">RM
                                        {{ $row->remaining_quantity * $row->product_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <table class="table " style="border-collapse: collapse; border-spacing: 0;">
                        <h5 class="m-0" style="font-size: 14px; color: #D48E15;">REPORT DETAILS</h5>
                        {{-- <tr>
                            <th style="font-size: 14px;">Beginning of month inventory count </th>
                            <td style="font-size: 14px;">{{ $beginningInventory }} units</td>
                        </tr>
                        <tr>
                            <th style="font-size: 14px;">End of month inventory count </th>
                            <td style="font-size: 14px;">{{ $endingInventory }} units</td>
                        </tr> --}}
                        <tr>
                            <th style="font-size: 14px;">Warehouse capacity utilization rate </th>
                            <td style="font-size: 14px;">{{ $utilizationRate }} %</td>
                        </tr>
                        <tr>
                            <th style="font-size: 14px;">Number of orders fulfilled during the month </th>
                            <td style="font-size: 14px;">{{ $ordersFulfilled }} units</td>
                        </tr>
                        <tr>
                            <th style="font-size: 14px;">Top selling products </th>
                            <td style="font-size: 14px;">
                                @if (!empty($topSellingProducts))
                                    <ul>
                                        @foreach ($topSellingProducts as $product)
                                            <li>{{ $product->product_name }} - Cartons:
                                                {{ $product->sold_carton_quantity }}, Items:
                                                {{ $product->sold_item_quantity }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No top-selling products found.</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="font-size: 14px;">Least selling products </th>
                            <td style="font-size: 14px;">
                                <!-- Display the low-selling products -->
                                @if (!empty($lowSellingProducts))
                                    <ul>
                                        @foreach ($lowSellingProducts as $product)
                                            <li>{{ $product->product_name }} - Cartons:
                                                {{ $product->sold_carton_quantity }}, Items:
                                                {{ $product->sold_item_quantity }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No low-selling products found.</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th style="font-size: 14px;">Total Sales Volume </th>
                            <td style="font-size: 14px;">{{ $totalSalesVolume }} units sold this month</td>
                        </tr>
                    </table>

                    <h5 class="m-0" style="font-size: 14px; color: #D48E15;">RETURN DETAILS</h5>
                    <!-- Add a new section for Return Stock Metrics -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $currentProduct = null;
                            @endphp
                            @foreach ($returnMetrics as $row)
                                <tr>
                                    @if ($currentProduct !== $row->product_name)
                                        <td rowspan="{{ $rowspanValue[$row->product_name] }}">{{ $row->product_name }}
                                        </td>
                                        @php
                                            $currentProduct = $row->product_name;
                                        @endphp
                                    @endif
                                    <td>{{ $row->total_quantity }}</td>
                                    <td>{{ $row->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="end-of-statement">End of Statement</p>

                </div>

            </div>
            {{-- FOOTER --}}
            <div class="card-footer bg-white">
                <p class="text-center mb-0" style="font-weight: bold; color: black; font-size: 8px;">ARKOD SMART LOGITECH
                    SDN BHD</p>
            </div>

        </div>
    </div>
@endsection
@section('page content overlay')
	<!-- page content overlay -->

	<!-- Vendor JS -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
	
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/progressbar.js-master/dist/progressbar.js') }}"></script>
	<script>
		document.getElementById('e').value = new Date().toISOString().substring(0, 10);
	</script>
	
	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
	<script src="{{ asset('assets/js/pages/dashboard2.js') }}"></script>
@endsection