@extends('backend.layouts.app')
@section('content')
<title>Add Company</title>
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
								<li class="breadcrumb-item active" aria-current="page">Add Company</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">
			<div class="row">			  
				<div class="col-lg-6 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Add Company Details</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" action="{{URL::to('/insert_company')}}" method="post">
						@csrf
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-briefcase"></i> Company Info</h4>
								<hr class="my-15">
								<div class="row">
								<div class="form-group">
								  <label class="form-label">Company Name</label>
								  <input class="form-control" type="text" name="company_name" placeholder="Select Company Name">
								</div>
               				<div class="form-group">
								  <label class="form-label">Company Address</label>
								  <input class="form-control" type="text" name="address" placeholder="Enter Company Address">
								</div>
                			<div class="form-group">
								  <label class="form-label">Phone Number</label>
								  <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number">
								</div>
                			<div class="form-group">
								  <label class="form-label">Company Email</label>
								  <input class="form-control" type="text" name="email" placeholder="Enter Company Email">
								</div>
								</div>
							<!-- /.box-body -->
							<div class="box-footer text-end">
								<button type="submit" class="btn btn-primary">
								  <i class="ti-save-alt"></i> Save
								</button>
							</div>  
						</form>
					  </div>
					  <!-- /.box -->			
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