@extends('backend.layouts.app')

@section('content')
    <title>Client Detail</title>

    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Data Tables</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Client Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Client Information</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <!-- Update Client Form -->
                            <form id="updateClientForm" action="{{ route('clients.update', $client->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Client Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $client->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Client Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Client Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ $client->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="attention">Attention</label>
                                    <input type="text" name="attention" class="form-control" id="attention" value="{{ $client->attention }}">
                                </div>
                                <div class="form-group">
                                    <label for="tel">Telephone</label>
                                    <input type="text" name="tel" class="form-control" id="tel" value="{{ $client->tel }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary me-20" onclick="cancelUpdate()">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <script>
        function cancelUpdate() {
            location.reload();
        }
    </script>
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
