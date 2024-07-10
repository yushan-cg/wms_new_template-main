@extends('backend.layouts.app')
@section('content')
<title>Client List</title>
<style>
    .active-row {
        background-color: #f0f0f0; /* Light gray background for customer rows */
    }
</style>

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
                        <li class="breadcrumb-item active" aria-current="page">Client List</li>
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
    <div class="box" style="padding-bottom: 20px;">
        @include('backend.company.customer-table')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Client List</h3>
                    {{-- add button for client --}}
                    <button class="btn btn-success" style="width: 150px; float: right; padding-right: 5px;" data-bs-toggle="modal" data-bs-target="#addModalClient" title="Add Client">Add Client</button>

                </div>


                <div class="box-body">
                    <div class="table-responsive">
                        <table id="clientlist" class="table table-hover no-wrap" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Attention</th>
                                    <th>Tel</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr class="client-row" data-client-id="{{ $client['id'] }}">
                                        <td>{{ $client['name'] }}</td>
                                        <td>{{ $client['email'] }}</td>
                                        <td>{{ $client['address'] }}</td>
                                        <td>{{ $client['attention'] }}</td>
                                        <td>{{ $client['tel'] }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Add Customer Button -->
                                                <button class="text-info me-2 add-customer-btn" style="border: none; background: none;" data-client-id="{{ $client['id'] }}" data-bs-toggle="modal" data-bs-target="#addModalCustomer" title="Add Customer">
                                                    <i class="ti-plus" alt="alert"></i>
                                                </button>

                                                <!-- Update Client Button -->
                                                <button class="text-info me-2 update-client-btn" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#updateModalClient{{ $client['id'] }}" title="Update Client">
                                                    <i class="ti-marker-alt" alt="alert"></i>
                                                </button>

                                                <!-- Delete Form -->
                                                <form id="deleteForm{{ $client->id }}" action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="text-danger sa-params" style="border: none; background: none;" data-bs-toggle="tooltip" data-bs-original-title="Delete" alt="alert" onclick="confirmDelete('{{ $client->id }}')">
                                                        <i class="ti-trash" alt="alert"></i>
                                                    </button>
                                                </form>
                                            </div>


                                        </td>
                                    </tr>

<!-- Modal for updating client -->
                                    <div class="modal fade" id="updateModalClient{{ $client['id'] }}" tabindex="-1" aria-labelledby="updateModalClientLabel{{ $client['id'] }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalClientLabel{{ $client['id'] }}">Update Client</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Update Client Form -->
                                                    <form id="updateClientForm{{ $client['id'] }}" action="{{ route('clients.update', $client['id']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name{{ $client['id'] }}">Client Name</label>
                                                            <input type="text" name="name" class="form-control" id="name{{ $client['id'] }}" value="{{ $client['name'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email{{ $client['id'] }}">Client Email</label>
                                                            <input type="email" name="email" class="form-control" id="email{{ $client['id'] }}" value="{{ $client['email'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address{{ $client['id'] }}">Client Address</label>
                                                            <input type="text" name="address" class="form-control" id="address{{ $client['id'] }}" value="{{ $client['address'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="attention{{ $client['id'] }}">Attention</label>
                                                            <input type="text" name="attention" class="form-control" id="attention{{ $client['id'] }}" value="{{ $client['attention'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel{{ $client['id'] }}">Telephone</label>
                                                            <input type="text" name="tel" class="form-control" id="tel{{ $client['id'] }}" value="{{ $client['tel'] }}">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary">Update Client</button>
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

    <!-- Add Modal Client-->
    <div class="modal fade" id="addModalClient" tabindex="-1" aria-labelledby="addModalClientLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalClientLabel">Add Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Client Form -->
                    <form id="addClientForm" action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nameClient">Client Name</label>
                            <input type="text" name="name" class="form-control" id="nameClient" placeholder="Enter client name" required>
                        </div>
                        <div class="form-group">
                            <label for="emailClient">Client Email</label>
                            <input type="email" name="email" class="form-control" id="emailClient" placeholder="Enter client email" required>
                        </div>
                        <div class="form-group">
                            <label for="addressClient">Client Address</label>
                            <input type="text" name="address" class="form-control" id="addressClient" placeholder="Enter client address" required>
                        </div>
                        <div class="form-group">
                            <label for="attentionClient">Attention</label>
                            <input type="text" name="attention" class="form-control" id="attentionClient" placeholder="Enter attention" required>
                        </div>
                        <div class="form-group">
                            <label for="telClient">Telephone</label>
                            <input type="text" name="tel" class="form-control" id="telClient" placeholder="Enter telephone" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Client</button>
                        </div>
                    </form>
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
                        <input type="hidden" name="client_id" id="client_id">
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
<!-- /.content -->
<script>
    $(document).ready(function () {
        // Function to close customer table and toggle associated customer table
        function toggleCustomerTable(clientId) {
            // Close all open customer tables
            $('.customer-row').hide();

            // Toggle associated customer table
            $('.customer-row[data-client-id="' + clientId + '"]').toggle();
        }

        // Click event handler for client rows
        $('.client-row').click(function () {
            var clientId = $(this).data('client-id');
            toggleCustomerTable(clientId);

            // Remove active class from all rows
            $('.client-row').removeClass('active-row');
            // Add active class to the clicked row
            $(this).addClass('active-row');

            // Dynamically Update Customer Title
            var clientName = $(this).find('td:first').text(); // Assuming the client name is in the first column
            $('#client-name').text('Customer List - ' + clientName);
        });

        // Prevent toggling when clicking buttons
        $('.client-row button').click(function (e) {
            e.stopPropagation();
        });

        // Handle "Add Customer" button click
        $('.add-customer-btn').click(function() {
            var clientId = $(this).data('client-id');
            $('#client_id').val(clientId);
        });

        // Initialize DataTable with pagination
        $('#clientlist').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 10 // Number of rows per page
        });

    });

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });

    //delete confirmation
    function confirmDelete(clientId) {
        if (confirm('Are you certain you wish to remove this record?')) {
            document.getElementById('deleteForm' + clientId).submit();
        }
    }

    // Automatically close the success alert after 3 seconds
    setTimeout(function() {
        document.getElementById('successAlert').style.display = 'none';
    }, 3000); // 3000 milliseconds = 3 seconds
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
