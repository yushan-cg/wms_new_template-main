@extends('backend.Layouts.app')
@section('content')
    <title>Delivery Form</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                            <h4 class="box-title">Delivery Form</h4>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ URL::to('/delivery/form_sent') }}" id="delivery_form">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Sender Name</label>
                                                <input class="form-control" id="sender_name" type="text"
                                                    name="sender_name" placeholder="Enter Sender Name" required>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Receiver Name</label>
                                                <input class="form-control" id="receiver_name" type="text"
                                                    name="receiver_name" placeholder="Enter Receiver Name" required>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Sender Address</label>
                                                <textarea class="form-control" id="sender_address" name="sender_address" placeholder="Enter Sender Address"
                                                    rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Receiver Address</label>
                                                <textarea class="form-control" id="receiver_address" name="receiver_address" placeholder="Enter Receiver Address"
                                                    rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Sender Postcode</label>
                                                <input class="form-control" id="sender_postcode" type="text"
                                                    name="sender_postcode" placeholder="Enter Sender Postcode" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Receiver Postcode</label>
                                                <input class="form-control" id="receiver_postcode" type="text"
                                                    name="receiver_postcode" placeholder="Enter Receiver Postcode" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Sender State</label>
                                                <select select class="form-control select2" id="sender_state"
                                                    name="sender_state">
                                                    <option value="Johor">Johor</option>
                                                    <option value="Kedah">Kedah</option>
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                    <option value="Labuan">Labuan</option>
                                                    <option value="Malacca">Malacca</option>
                                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                    <option value="Pahang">Pahang</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Perlis">Perlis</option>
                                                    <option value="Penang">Penang</option>
                                                    <option value="Sabah">Sabah</option>
                                                    <option value="Sarawak">Sarawak</option>
                                                    <option value="Selangor">Selangor</option>
                                                    <option value="Terengganu">Terengganu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Receiver State</label>
                                                <select select class="form-control select2" id="receiver_state"
                                                    name="receiver_state">
                                                    <option value="Johor">Johor</option>
                                                    <option value="Kedah">Kedah</option>
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                    <option value="Labuan">Labuan</option>
                                                    <option value="Malacca">Malacca</option>
                                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                    <option value="Pahang">Pahang</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Perlis">Perlis</option>
                                                    <option value="Penang">Penang</option>
                                                    <option value="Sabah">Sabah</option>
                                                    <option value="Sarawak">Sarawak</option>
                                                    <option value="Selangor">Selangor</option>
                                                    <option value="Terengganu">Terengganu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Sender Phone Number</label>
                                                <input class="form-control" id="sender_phone" type="text"
                                                    name="sender_phone" placeholder="Enter Sender Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Receiver Phone Number</label>
                                                <input class="form-control" id="receiver_phone" type="text"
                                                    name="receiver_phone" placeholder="Enter Receiver Phone Number"
                                                    required>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">Products</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Delivery Quantity</th>
                                                            <th scope="col">Weight</th>
                                                            <th scope="col">Remarks</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="product_table">

                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-center">Add Product</button>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal center-modal fade" id="modal-center" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Select Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Product Selection Form -->
                                                <form id="product_selection_form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="product_name">Product Name</label>
                                                        <select class="form-control" id="product_name"
                                                            name="product_name[]">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">
                                                                    {{ $product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="quantity">Quantity</label>
                                                        <input type="number" class="form-control" id="quantity"
                                                            name="quantity[]" placeholder="Enter quantity">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="delivery_quantity">Delivery Quantity(Carton)</label>
                                                        <input type="text" class="form-control" id="delivery_quantity"
                                                            name="delivery_quantity[]" placeholder="Enter delivery quantity">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">Weight(KG)</label>
                                                        <input type="number" class="form-control" id="weight"
                                                            name="weight[]" placeholder="Enter weight">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="remarks">Remarks (SKU)</label>
                                                        <input type="textbox" class="form-control" id="remarks"
                                                            name="remarks[]" placeholder="Enter remarks">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer modal-footer-uniform">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary float-end"
                                                    id="add_product_row">Add product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                <div class="form-actions mt-10">
                                    <button type="submit" class="btn btn-primary" id="submit_delivery"> <i
                                            class="fa fa-check"></i> Submit</button>
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>

                            </form>
                        </div>
                    </div>
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
    <script>
        $(document).ready(function() {
    // Show product modal
    $('#add_product_row').click(function() {
        $('#modal-center').modal('show');
    });

    // Add product row to the table
    $('#add_product_row').click(function() {
        // Add the product row to the table without refreshing the page
        var product_id = $('#product_name').val();
        var product_name = $('#product_name option:selected').text();
        var quantity = $('#quantity').val();
        var delivery_quantity = $('#delivery_quantity').val(); // New: Get delivery quantity
        var weight = $('#weight').val(); // New: Get weight
        var remarks = $('#remarks').val(); // New: Get remarks

        var newRow = '<tr>' +
            '<td><input type="hidden" name="product_id[]" value="' + product_id + '">' +
            product_name + '</td>' +
            '<td><input type="hidden" name="quantity[]" value="' + quantity + '">' + quantity +
            '</td>' +
            '<td><input type="hidden" name="delivery_quantity[]" value="' + delivery_quantity + '">' + delivery_quantity +
            '</td>' +
            '<td><input type="hidden" name="weight[]" value="' + weight + '">' + weight +
            '</td>' +
            '<td><input type="hidden" name="remarks[]" value="' + remarks + '">' + remarks +
            '</td>' +
            '<td><button class="btn btn-danger btn-sm remove_product_row">Remove</button></td>' +
            '</tr>';

        $('#product_table').append(newRow);

        // Clear the modal form
        $('#product_selection_form')[0].reset();

        // Close the modal
        $('#modal-center').modal('hide');
    });

    // Remove product row from the table
    $(document).on('click', '.remove_product_row', function() {
        $(this).closest('tr').remove();
    });

    // Submit delivery form
    $('#submit_delivery').click(function() {
        // Trigger form submission
        $('#delivery_form').submit();
    });
});

    </script>
@endsection
