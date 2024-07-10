@extends('backend.Layouts.app')
@section('content')
    <title>Pickup Form</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Pickup</li>
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
                            <h4 class="box-title">Pickup Form</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ route('pickup_store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info mb-0"><i class="ti-briefcase"></i> Sender Info (FROM)</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="sender_address" class="form-label">Sender's Address:</label>
                                        <input type="text" id="sender_address" name="sender_address" required
                                            class="form-control">
                                    </div>
                                </div>
                                <hr class="my-15">
                                <div class="form-group">
                                    <label for="sender_state" class="form-label">Sender's State:</label>
                                    <input type="text" id="sender_state" name="sender_state" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sender_postcode" class="form-label">Sender's Postcode:</label>
                                    <input type="text" id="sender_postcode" name="sender_postcode" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sender_name" class="form-label">Sender's Name:</label>
                                    <input type="text" id="sender_name" name="sender_name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sender_contact_no" class="form-label">Sender's Contact Number:</label>
                                    <input type="text" id="sender_contact_no" name="sender_contact_no" required
                                        class="form-control">
                                </div>
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-light-bulb"></i>Receiver Info (TO)</h4>
                                <div class="form-group">
                                    <label for="receiver_address" class="form-label">Receiver's Address:</label>
                                    <input type="text" id="receiver_address" name="receiver_address" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="receiver_state" class="form-label">Receiver's State:</label>
                                    <input type="text" id="receiver_state" name="receiver_state" required
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="receiver_postcode" class="form-label">Receiver's Postcode:</label>
                                    <input type="text" id="receiver_postcode" name="receiver_postcode" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="receiver_name" class="form-label">Receiver's Name:</label>
                                    <input type="text" id="receiver_name" name="receiver_name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="receiver_contact_no" class="form-label">Receiver's Contact Number:</label>
                                    <input type="text" id="receiver_contact_no" name="receiver_contact_no" required
                                        class="form-control">
                                </div>
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-light-bulb"></i>Product Info</h4>
                                <div class="form-group">
                                    <label for="carton_quantity" class="form-label">Carton Quantity:</label>
                                    <input type="number" id="carton_quantity" name="carton_quantity" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pallet_quantity" class="form-label">Pallet Quantity (1000kg Per Pallet) :</label>
                                    <input type="number" id="pallet_quantity" name="pallet_quantity" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="date_pickup" class="form-label">Pickup Date:</label>
                                    <input type="date" id="date_pickup" name="date_pickup" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="time_pickup" class="form-label">Pickup Time:</label>
                                    <input type="time" id="time_pickup" name="time_pickup" required
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="remarks" class="form-label">Remarks:</label>
                                    <input type="text" id="remarks" name="remarks" required class="form-control">
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
    </div>
@endsection
@section('page content overlay')
    <!-- Page Content overlay -->

    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/iCheck/icheck.min.js') }}"></script>

    <!-- Deposito Admin App -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/pages/advanced-form-element.js') }}"></script>
@endsection
