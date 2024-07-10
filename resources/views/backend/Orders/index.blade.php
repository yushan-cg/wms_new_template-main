@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<title>Order List</title>
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Order List</li>
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
				  <h3 class="box-title">Order List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>#</th>
                                <th>Order No</th>
                                <th>User ID</th>
                                <th>Product ID</th>
                                <th>Rack ID</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th> 
							</tr>
						</thead>
						<tbody>
                        @forelse($orders as $orderGroup)
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                                <span class="btn btn-default btn-xs">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </td>
                            <td>{{ $orderGroup->first()->order_no }}</td>
                            <td>{{ $orderGroup->first()->user_id }}</td>
                            <td>{{ $orderGroup->first()->product_id }}</td>
                            <td>{{ $orderGroup->first()->rack_id }}</td>
                            <td>{{ $orderGroup->first()->quantity }}</td>
                            <td>{{ $orderGroup->first()->created_at }}</td>
                            <td>{{ $orderGroup->first()->updated_at }}</td>
                            <td>
                                <!-- Add a button to generate the invoice -->
                                <a href="{{ route('orderShow', ['order_no' => $orderGroup->first()->order_no]) }}" class="btn btn-primary">Generate Invoice</a>



                            </td>
                        </tr>
                        <tr class="expandable-body">
                            <td colspan="9">
                                <div class="p-0" style="display: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User ID</th>
                                                <th>Product ID</th>
                                                <th>Rack ID</th>
                                                <th>Quantity</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderGroup as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->user_id }}</td>
                                                    <td>{{ $order->product_id }}</td>
                                                    <td>{{ $order->rack_id }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No orders found.</td>
                        </tr>
                    @endforelse
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
