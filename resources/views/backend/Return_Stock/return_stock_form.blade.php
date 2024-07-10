@extends('backend.Layouts.app')
@section('content')
<title>Return Order Form</title>
<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
                <h4 class="page-title">Genaral Form</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Return Order</li>
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
					  <h4 class="box-title">Return Order Form</h4>
					</div>
				  <div class="box-body">
					<form action="#">
						<div class="form-body">
							<div class="row">
                            <div class="col-md-6">
									<div class="form-group">
									   <label class="fw-700 fs-16 form-label">Sender Name</label>
									   <input class="form-control" id="product_name" type="text" placeholder="Enter Product Name" value="{{ old('product_name') }}" required>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
									   <label class="fw-700 fs-16 form-label">Receiver Name</label>
									   <input class="form-control" id="product_name" type="text" placeholder="Enter Product Name" value="{{ old('product_name') }}" required>
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
                                        <input class="form-control" id="carton_quantity" type="number" name="carton_quantity" placeholder="Enter Quantity" value="{{ old('carton_quantity') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Receiver Address</label>
                                        <input class="form-control" id="item_per_carton" type="number" name="item_per_carton" placeholder="Enter Quantity" value="{{ old('item_per_carton') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Sender Postcode</label>
                                        <input class="form-control" id="carton_quantity" type="number" name="carton_quantity" placeholder="Enter Quantity" value="{{ old('carton_quantity') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Receiver Postcode</label>
                                        <input class="form-control" id="item_per_carton" type="number" name="item_per_carton" placeholder="Enter Quantity" value="{{ old('item_per_carton') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Sender State</label>
                                        <input class="form-control" id="product_dimensions" type="text" name="product_dimensions" placeholder="Enter Product Dimension" value="{{ old('product_dimension') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Receiver State</label>
                                        <input class="form-control" id="weight_per_item" type="text" name="weight_per_item" placeholder="Weight Per Item" step="0.1" onkeypress="return isNumberKey(this, event);" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Sender Phone Number</label>
                                        <input class="form-control" id="weight_per_carton" type="text" name="weight_per_carton" placeholder="Weight Per Carton" step="0.1" onkeypress="return isNumberKey(this, event);" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Receiver Phone Number</label>
                                        <input class="form-control" id="total_weight" type="text" name="total_weight" readonly>
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
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>

						  </tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
						</div>
						<div class="form-actions mt-10">
							<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
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
	
	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
		
@endsection
