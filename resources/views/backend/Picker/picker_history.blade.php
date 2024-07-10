@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>History</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="vtabs customvtab">
                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                    @foreach ($dates as $date)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="vert-tabs-{{ $date }}-tab"
                                data-toggle="pill" href="#vert-tabs-{{ $date }}" role="tab"
                                aria-controls="vert-tabs-{{ $date }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $date }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="tab-content-container">
                    @foreach ($dates as $date)
                        <div class="tab-pane text-left fade {{ $loop->first ? 'show active' : '' }}"
                            id="vert-tabs-{{ $date }}" role="tabpanel"
                            aria-labelledby="vert-tabs-{{ $date }}-tab">
                            <h3>{{ $date }}</h3>
                            @php
                                $groupedOrders = $orders[$date]->groupBy('order_no');
                            @endphp

                            @foreach ($groupedOrders as $orderNo => $groupedOrder)
                                <h4>Order No: {{ $orderNo }}</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groupedOrder as $order)
                                            <tr>
                                                <td>{{ $order->product_name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page content overlay')
    <!-- Page Content overlay -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>

    <!-- Deposito Admin App -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/pages/data-table.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.nav-tabs a').on('click', function() {
                // Get the ID of the newly selected tab
                var selectedTabId = $(this).attr('href');

                // Hide all tab panes except the selected one
                $('#tab-content-container .tab-pane').not(selectedTabId).hide();

                // Show the selected tab pane
                $(selectedTabId).show();
            });
        });
    </script>
@endsection
