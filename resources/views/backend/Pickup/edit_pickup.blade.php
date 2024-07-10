@extends('backend.Layouts.app')
@section('content')
    <title>Edit Pickup</title>
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">General Form</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i
                                            class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Forms</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Pickup</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit Pickup</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ URL::to('/update_pickup/' . $edit->pickup_id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-briefcase"></i> Pickup Info</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">From Address</label>
                                        <input class="form-control" id="from_address" type="text" name="sender_address"
                                            placeholder="Enter Sender Address" value="{{ $edit->sender_address }}">
                                    </div>
                                </div>

                                <hr class="my-15">

                                <div class="form-group">
                                    <label class="form-label">From State</label>
                                    <input class="form-control" id="from_state" type="text" name="sender_state"
                                        placeholder="Enter Sender State" value="{{ $edit->sender_state }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">From Postcode</label>
                                    <input class="form-control" id="from_postcode" type="text" name="sender_postcode"
                                        placeholder="Enter Sender Postcode" value="{{ $edit->sender_postcode }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sender Contact Person</label>
                                    <input class="form-control" id="sender_name" type="text" name="sender_name"
                                        placeholder="Enter Sender Name" value="{{ $edit->sender_name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sender Phone No.</label>
                                    <input class="form-control" id="sender_contact_no" type="text"
                                        name="sender_contact_no" placeholder="Enter Sender Contact No."
                                        value="{{ $edit->sender_contact_no }}">
                                </div>

                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-light-bulb"></i>To Info</h4>
                                <div class="form-group">
                                    <label class="form-label">To Address</label>
                                    <input class="form-control" id="to_address" type="text" name="receiver_address"
                                        value="{{ $edit->receiver_address }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">To State</label>
                                    <input class="form-control" id="to_state" type="text" name="receiver_state"
                                        placeholder="Enter Receiver State" value="{{ $edit->receiver_state }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">To Postcode</label>
                                    <input class="form-control" id="to_postcode" type="text" name="receiver_postcode"
                                        placeholder="Enter Receiver Postcode" value="{{ $edit->receiver_postcode }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Receiver Contact Person</label>
                                    <input class="form-control" id="receiver_name" type="text" name="receiver_name"
                                        placeholder="Enter Receiver Name" value="{{ $edit->receiver_name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Receiver Phone No.</label>
                                    <input class="form-control" id="receiver_contact_no" type="text"
                                        name="receiver_contact_no" placeholder="Enter Sender Contact No."
                                        value="{{ $edit->receiver_contact_no }}">
                                </div>

                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-light-bulb"></i>Product Info</h4>
                                <div class="form-group">
                                    <label for="carton_quantity">Carton Quantity:</label>
                                    <input type="number" id="carton_quantity" name="carton_quantity"
                                        placeholder="Enter Carton Quantity" value="{{ $edit->carton_quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="pallet_quantity">Pallet Quantity (1000kg/Pallet):</label>
                                    <input type="number" id="pallet_quantity" name="pallet_quantity"
                                        placeholder="Enter Pallet Quantity" value="{{ $edit->pallet_quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="date_pickup">Pickup Date:</label>
                                    <input type="date" id="date_pickup" name="date_pickup"
                                        placeholder="Enter Pickup Date" value="{{ $edit->date_pickup }}">
                                </div>
                                <div class="form-group">
                                    <label for="time_pickup">Pickup Time:</label>
                                    <input type="time" id="time_pickup" name="time_pickup"
                                        placeholder="Enter Pickup Time" value="{{ $edit->time_pickup }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Remarks</label>
                                    <input class="form-control" id="remarks" type="text" name="remarks"
                                        placeholder="Enter Remarks" value="{{ $edit->remarks }}">
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer text-end">
                                    <button type="button" class="btn btn-warning me-1">
                                        <i class="ti-trash"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Save Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('page content overlay')
    <!-- Page Content overlay -->

    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <!-- ... (your existing code) ... -->
    <!-- Deposito Admin App -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/pages/advanced-form-element.js') }}"></script>
@endsection
