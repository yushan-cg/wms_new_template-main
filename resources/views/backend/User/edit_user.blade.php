@extends('backend.Layouts.app')
@section('content')
<title>Edit User</title>
<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Genaral Form</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
						  <h4 class="box-title">Edit User for {{ $edit->name }}</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" action="{{ URL::to('/update_user/'.$edit->id) }}" method="post">
                        @csrf
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
								<hr class="my-15">
								<div class="row">
								<div class="form-group">
                                @php 
                                    if($edit->role == 1) {
                                        echo 'Present Permission is: <b>Admin</b>';
                                    }
                                    if($edit->role == 2) {
                                        echo 'Present Permission is: <b>Picker</b>';
                                    }
                                    if($edit->role == 3) {
                                        echo 'Present Permission is: <b>User</b>';
                                    }
                                @endphp
                                <br>
                                  <div class="form-group">
                                    <label class="form-label">Change the Permission</label>
                                    <select class="form-select" name="role">
                                    <option value="1">Admin</option>
                                    <option value="2">Picker</option>
                                    <option value="3">User</option>
                                    </select>
                                    </div>
								</div>
                                <div class="form-group">
								  <label class="form-label">Change the User's Name</label>
								  <input class="form-control" type="text" name="name" value="{{ $edit->name }}" placeholder="Select Company Name">
								</div>
								</div>
							<!-- /.box-body -->
							<div class="box-footer text-end">
								<button type="button" class="btn btn-warning me-1">
								  <i class="ti-trash"></i> Cancel
								</button>
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
	<!-- Vendor JS -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
	
	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
	
	<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>
	

@endsection
