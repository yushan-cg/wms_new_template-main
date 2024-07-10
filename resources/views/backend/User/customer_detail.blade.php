@extends('backend.layouts.app')
@section('content')
<title>Customer List</title>

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
                        <li class="breadcrumb-item active" aria-current="page">Customer List</li>
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
                    <h3 class="box-title">Customer List</h3>
                    <!-- Add button for customer -->
                    <button class="btn btn-success" style="width: 150px; float: right;" data-bs-toggle="modal" data-bs-target="#addModalCustomer" title="Add Customer">Add Customer</button>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="customerlist" class="table table-hover no-wrap" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Attention</th>
                                    <th>Tel</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->attention }}</td>
                                        <td>{{ $customer->tel }}</td>
                                        <td>
                                            <button class="text-info me-10 update-customer-btn" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#updateModalCustomer{{ $customer->id }}" title="Update Customer">
                                                <i class="ti-marker-alt" alt="alert"></i>
                                            </button>
                                            <!-- Delete Form -->
                                            <form id="deleteForm{{ $customer->id }}" action="{{ route('customers.destroy', ['id' => $customer->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="text-danger sa-params" style="border: none; background: none;" data-bs-toggle="tooltip" data-bs-original-title="Delete" alt="alert" onclick="confirmDelete('{{ $customer->id }}')">
                                                    <i class="ti-trash" alt="alert"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal for editing customer -->
                                    <div class="modal fade" id="updateModalCustomer{{ $customer->id }}" tabindex="-1" aria-labelledby="updateModalCustomerLabel{{ $customer->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalCustomerLabel{{ $customer->id }}">Update Customer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Update Customer Form -->
                                                    <form id="updateCustomerForm{{ $customer->id }}" action="{{ route('customers.update', $customer->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                        <div class="form-group">
                                                            <label for="name{{ $customer->id }}">Customer Name</label>
                                                            <input type="text" name="name" class="form-control" id="name{{ $customer->id }}" value="{{ $customer->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email{{ $customer->id }}">Customer Email</label>
                                                            <input type="email" name="email" class="form-control" id="email{{ $customer->id }}" value="{{ $customer->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address{{ $customer->id }}">Customer Address</label>
                                                            <input type="text" name="address" class="form-control" id="address{{ $customer->id }}" value="{{ $customer->address }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="attention{{ $customer->id }}">Attention</label>
                                                            <input type="text" name="attention" class="form-control" id="attention{{ $customer->id }}" value="{{ $customer->attention }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel{{ $customer->id }}">Telephone</label>
                                                            <input type="text" name="tel" class="form-control" id="tel{{ $customer->id }}" value="{{ $customer->tel }}">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary">Update Customer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal Customer-->
    <div class="modal fade" id="addModalCustomer" tabindex="-1" aria-labelledby="addModalCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalCustomerLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Customer Form -->
                    <form id="addCustomerForm" action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nameCustomer">Customer Name</label>
                            <input type="text" name="name" class="form-control" id="nameCustomer" placeholder="Enter customer name" required>
                        </div>
                        <div class="form-group">
                            <label for="emailCustomer">Customer Email</label>
                            <input type="email" name="email" class="form-control" id="emailCustomer" placeholder="Enter customer email" required>
                        </div>
                        <div class="form-group">
                            <label for="addressCustomer">Customer Address</label>
                            <input type="text" name="address" class="form-control" id="addressCustomer" placeholder="Enter customer address" required>
                        </div>
                        <div class="form-group">
                            <label for="attentionCustomer">Attention</label>
                            <input type="text" name="attention" class="form-control" id="attentionCustomer" placeholder="Enter attention" required>
                        </div>
                        <div class="form-group">
                            <label for="telCustomer">Telephone</label>
                            <input type="text" name="tel" class="form-control" id="telCustomer" placeholder="Enter telephone" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        // Initialize DataTable with pagination
        $('#customerlist').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 10 // Number of rows per page
        });

        // Automatically close the success alert after 3 seconds
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 3000); // 3000 milliseconds = 3 seconds
    });

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    // Delete confirmation
    function confirmDelete(clientId) {
        if (confirm('Are you certain you wish to remove this record?')) {
            document.getElementById('deleteForm' + clientId).submit();
        }
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
