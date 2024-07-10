@extends('backend.Layouts.app')
@section('content')
    <title>Return Task List</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Return Task List</li>
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
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
                                <thead>
                                    <tr>
                                        <th>Return No.</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($pickers as $picker)
                                        @if ($picker->status == 'Dispose' || $picker->status == 'Refurbish')
                                            <tr>
                                                <td>{{ $picker->return_no }}</td>
                                                <td>{{ $picker->product->product_name }}</td>
                                                <td>{{ $picker->quantity }}</td>
                                                <td>
                                                    @if ($picker->status == 'Dispose')
                                                        <span class="badge bg-danger">{{ $picker->status }}</span>
                                                    @elseif($picker->status == 'Refurbish')
                                                        <span class="badge bg-warning">{{ $picker->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $picker->remark }}</td>
                                                <td class="status-cell">
                                                    @if ($picker->status == 'Dispose')
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger btn-sm btn-dispose"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#disposeModal{{ $picker->id }}">Dispose this
                                                            item</button>

                                                        <!-- Dispose Modal -->
                                                        <div class="modal center-modal fade"
                                                            id="disposeModal{{ $picker->id }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="disposeModalLabel{{ $picker->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="disposeModalLabel{{ $picker->id }}">
                                                                            Dispose
                                                                            Product</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('disposeProductPicker', ['pickerId' => $picker->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to dispose of this
                                                                                product?
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Dispose</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($picker->status == 'Refurbish')
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-dark btn-sm btn-rerack"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rerackModal{{ $picker->id }}">Refurbish this
                                                            item</button>

                                                        <!-- Rerack Modal -->
                                                        <div class="modal center-modal fade"
                                                            id="rerackModal{{ $picker->id }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="rerackModalLabel{{ $picker->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rerackModalLabel{{ $picker->id }}">Rerack
                                                                            Product</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('refurbishedProduct', ['pickerId' => $picker->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to rerack this product?
                                                                            </p>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="rackLocation{{ $picker->id }}">Rack
                                                                                    Location:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rackLocation{{ $picker->id }}"
                                                                                    name="rack_location"
                                                                                    value="{{ $picker->product->rack->location_code ?? null }}"
                                                                                    readonly>
                                                                                <label
                                                                                    for="floorLocation{{ $picker->id }}">Floor
                                                                                    Location:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="floorLocation{{ $picker->id }}"
                                                                                    name="floor_location"
                                                                                    value="{{ $picker->product->rack->location_codes ?? null }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-dark">Rerack</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
