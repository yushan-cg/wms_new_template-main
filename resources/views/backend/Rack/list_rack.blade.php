@extends('backend.Layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <title>Rack List</title>
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Data Tables</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">List</li>
                            <li class="breadcrumb-item active" aria-current="page">Rack List</li>
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
                        <h3 class="box-title">Rack List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rack QR</th>
                                        <th>Rack Location</th>
                                        <th>Weight Occupied (KG)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{!! DNS2D::getBarCodeSVG($row->location_code, 'QRCODE') !!}</td>
                                            <td>{{ $row->location_code }}</td>
                                            <td> {{ $row->occupied }} / 200 </td>
                                            <td>
                                                <div class="col-12 col-lg-6">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-center{{ $row->id }}">View
                                                        Product</button>
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
    <!-- /.content -->

    @foreach ($list as $row)
        <!-- Modal -->
        <div class="modal center-modal fade" id="modal-center{{ $row->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Products for rack {{ $row->location_code }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="statusTable{{ $row->id }}" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Product Name</th>
                                    <th>Weight occupied (kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $productsForRack = \App\Models\Product::where('rack_id', $row->id)->get();
                                @endphp

                                @foreach ($productsForRack as $product)
                                    <tr>
                                        <td>{{ $product->company['company_name'] }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->item_per_carton * $product->carton_quantity * $product->weight_per_item }}
                                        </td>
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
