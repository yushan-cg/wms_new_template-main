@extends('backend.Layouts.app')
@section('content')
    <title>Pickup List</title>
    <style>
        .text-danger {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Data Tables</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i
                                        class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">List</li>
                            <li class="breadcrumb-item active" aria-current="page">Pickup List</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pickup List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pickup Information</th>
                                        <th>Edit Pickup || View Waybill || Download Waybill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pickups as $row)
                                        <tr>
                                            <td>{{ $row->pickup_id }}</td>
                                            <td>
                                                <div class="col-12 col-lg-6">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-center{{ $row->pickup_id }}">View Pickup
                                                        Info</button>
                                            </td>
                                            <td>
                                                {{-- Link to edit the pickups --}}
                                                @if (Auth::user()->role == 1)
                                                    <a href="{{ URL::to('/edit_pickup/' . $row->pickup_id) }}"
                                                        class="text-info me-10" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                @endif
                                                {{-- Link to view the waybill --}}
                                                <a href="{{ route('waybill', ['id' => $row->pickup_id, 'action' => 'display']) }}"
                                                    class="text-info me-10" data-bs-toggle="tooltip"
                                                    data-bs-original-title="View">
                                                    <i class="ti-eye"></i>
                                                </a>

                                                {{-- Link to download the waybill --}}
                                                <a href="{{ route('waybill', ['id' => $row->pickup_id, 'action' => 'download']) }}"
                                                    class="text-success me-10" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Download">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @foreach ($pickups as $row)
        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" id="modal-center{{ $row->pickup_id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pickup Request for {{ $row->pickup_id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="statusTable{{ $row->pickup_id }}" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Contact Person</th>
                                    <th>Phone Number</th>
                                    <th>From Address</th>
                                    <th>To Address</th>
                                    <th>Carton Quantity</th>
                                    <th>Pickup Date</th>
                                    <th>Pickup Time</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $Pickups = \App\Models\Pickup::where('pickup_id', $row->pickup_id)->get();
                                @endphp

                                @foreach ($Pickups as $pickupInfo)
                                    <tr>
                                        <td>{{ $pickupInfo->sender_name }}</td>
                                        <td>{{ $pickupInfo->sender_contact_no }}</td>
                                        <td>{{ $pickupInfo->sender_address }}</td>
                                        <td>{{ $pickupInfo->receiver_address }}</td>
                                        <td>{{ $pickupInfo->carton_quantity }}</td>
                                        <td>{{ $pickupInfo->date_pickup }}</td>
                                        <td>{{ $pickupInfo->time_pickup }}</td>
                                        <td>{{ $pickupInfo->remarks }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- /.modal -->
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
