@extends('backend.Layouts.app')
@section('content')
<title>Task List</title>
<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Task List</li>
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
                                    <th>Order No.</th>
                                    <th>Rack Location</th>
                                    <th>Floor Location</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date of Pick Up</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Cancel</th>
								</tr>
							</thead>
							<tbody>
                            @foreach ($pickers as $picker)
                                    <tr>
                                        <td>{{ $picker->order_no }}</td>
                                        <td>{{ $picker->location_code }}</td>
                                        <td>{{ $picker->location_codes }}</td>
                                        <td>{{ $picker->product->product_name }}</td>
                                        <td>{{ $picker->quantity }}</td>
                                        <td>{{ $picker->created_at->format('d M, Y') }}</td>
                                        <td>
                                            @if ($picker->status == 'Collected')
                                                <span class="badge bg-success">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Pending')
                                                <span class="badge bg-warning">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Reracking')
                                                <span class="badge bg-warning">Please rerack</span>
                                            @else
                                                <span class="badge bg-danger">{{ $picker->status }}</span>
                                            @endif
                                        </td>
                                        <td class="status-cell">
                                            @if ($picker->status == 'Collected')
                                                <span class="badge bg-success">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Pending')
                                                <!-- Collect Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-collect"
                                                    data-toggle="modal"
                                                    data-target="#collectModal{{ $picker->id }}">Collect</button>

                                                <!-- Collect Modal -->
                                                <div class="modal fade" id="collectModal{{ $picker->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="collectModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="collectModalLabel{{ $picker->id }}">Collect
                                                                    Product</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('picker.confirm', ['id' => $picker->id, 'quantity' => $picker->quantity]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="report{{ $picker->id }}">Report:</label>
                                                                        <select class="form-control"
                                                                            id="status{{ $picker->id }}" name="report">
                                                                            <option value="Completed">Completed</option>
                                                                            <option value="Insufficient">Insufficient
                                                                            </option>
                                                                            <option value="Damaged">Damaged</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="remark{{ $picker->id }}">Remark:</label>
                                                                        <textarea class="form-control" id="remark{{ $picker->id }}" name="remark" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Proceed</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($picker->status == 'Reracking')
                                                <button type="button" class="btn btn-dark btn-sm btn-rerack"
                                                    data-toggle="modal"
                                                    data-target="#rerackModal{{ $picker->id }}">Rerack</button>

                                                <!-- Rerack Modal -->
                                                <div class="modal fade" id="rerackModal{{ $picker->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="rerackModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="rerackModalLabel{{ $picker->id }}">Rerack Product
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('rerackProductPicker', ['pickerId' => $picker->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to rerack this product?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-dark">Rerack</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($picker->status == 'Disposing')
                                                <button type="button" class="btn btn-danger btn-sm btn-dispose"
                                                    data-toggle="modal"
                                                    data-target="#disposeModal{{ $picker->id }}">Dispose</button>

                                                <!-- Dispose Modal -->
                                                <div class="modal fade" id="disposeModal{{ $picker->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="disposeModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="disposeModalLabel{{ $picker->id }}">Dispose
                                                                    Damaged Product</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('disposeProductPicker', ['pickerId' => $picker->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to dispose of this damaged
                                                                        product?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Dispose</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="badge bg-primary">Collected</span>
                                            @endif
                                        </td>
                                        <td>
                                                    <form method="post" action="{{ url('/delete-by-order-no') }}">
                                                        @csrf
                                                        <label for="order_no">Order Number:</label>
                                                        <input type="text" name="order_no" id="order_no">
                                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                    </form>
                                                    </td>
                                    </tr>
                                @endforeach
							</tbody>						
						</table>
                        <div class="text-center mt-4">
                        <button type="button" class="waves-effect waves-light btn mb-5 bg-gradient-success" id="proceed-to-packing"
                        @if (count($pickers->where('status', 'Pending'))) disabled @endif>Proceed to Packing</button>
                         </div>
					</div>
				  </div>
				</div>
			  </div>		  
		  </div>
    <script>
    $(document).ready(function() {
        $('#delete-picker-form').submit(function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete these records?')) {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success, e.g., show a success message
                        alert('Records deleted successfully.');
                        location.reload(); // Reload the page or update UI as needed
                    },
                    error: function(xhr) {
                        // Handle errors, e.g., show an error message
                        alert('Error deleting records.');
                    }
                });
            }
        });
    });
</script>
		</section>
		<!-- /.content -->
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