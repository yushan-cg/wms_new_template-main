<div class="table-responsive">
    <div class="box-header with-border">
        <h3 class="box-title" id="client-name">Client List</h3>
    </div>

    <table id="customerlist" class="table table-hover no-wrap">
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
            @foreach ($clients as $client)
                @foreach ($client['customers'] as $customer)
                    <!-- Customer Rows (Hidden by default) -->
                    <tr class="customer-row" data-client-id="{{ $client['id'] }}" style="display: none;">
                        <td>{{ $customer['name'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['address'] }}</td>
                        <td>{{ $customer['attention'] }}</td>
                        <td>{{ $customer['tel'] }}</td>
                        <td>
                            <button class="text-info me-10 update-customer-btn" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#updateModalCustomer{{ $customer['id'] }}" title="Update Customer">
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
                    <div class="modal fade" id="updateModalCustomer{{ $customer['id'] }}" tabindex="-1" aria-labelledby="updateModalCustomerLabel{{ $customer['id'] }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalCustomerLabel{{ $customer['id'] }}">Update Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Update Customer Form -->
                                    <form id="updateCustomerForm{{ $customer['id'] }}" action="{{ route('customers.update', $customer['id']) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="client_id" value="{{ $client['id'] }}">
                                        <div class="form-group">
                                            <label for="name{{ $customer['id'] }}">Customer Name</label>
                                            <input type="text" name="name" class="form-control" id="name{{ $customer['id'] }}" value="{{ $customer['name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email{{ $customer['id'] }}">Customer Email</label>
                                            <input type="email" name="email" class="form-control" id="email{{ $customer['id'] }}" value="{{ $customer['email'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address{{ $customer['id'] }}">Customer Address</label>
                                            <input type="text" name="address" class="form-control" id="address{{ $customer['id'] }}" value="{{ $customer['address'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attention{{ $customer['id'] }}">Attention</label>
                                            <input type="text" name="attention" class="form-control" id="attention{{ $customer['id'] }}" value="{{ $customer['attention'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tel{{ $customer['id'] }}">Telephone</label>
                                            <input type="text" name="tel" class="form-control" id="tel{{ $customer['id'] }}" value="{{ $customer['tel'] }}">
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
            @endforeach
        </tbody>
    </table>
</div>
