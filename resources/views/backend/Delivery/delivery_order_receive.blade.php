@extends('backend.Layouts.app')
@section('content')
<title>List of Delivery Orders</title>
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">List of Delivery Orders</li>
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
				  <h3 class="box-title">List of Delivery Orders</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                            <th>Delivery No.</th>
                        <th>View The Detail of Delivery Order</th>
                        <th>Handled by</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($deliveryOrdersList as $deliveryOrder)
                        <tr>
                            <td>{{ $deliveryOrder->order_no }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#statusModal{{ $deliveryOrder->id }}">View Request</button>
                            </td>
                            <td>
                                @php
                                    $picker = $pickers->where('order_no', $deliveryOrder->id)->first();
                                    $pickerUser = $picker ? $users->where('id', $picker->user_id)->first() : null;
                                @endphp
                                @if($pickerUser)
                                    {{ $pickerUser->name }}
                                @endif
                            </td>
                        </tr>
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
@endsection
@section('page content overlay')
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<!-- Vendor JS -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
	
	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
	
	<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>
	

@endsection