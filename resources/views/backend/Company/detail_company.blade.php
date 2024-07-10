@extends('backend.Layouts.app')
@section('content')
<title>Company Detail</title>
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Company List Owned</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        		<!-- Main content -->
		<section class="content">
			<div class="row">
            @foreach($companies as $company)
			  <div>
				<div class="box">			  
				  <div class="box-header with-border">
					<h4 class="box-title"><i class="ti-briefcase"></i> Company List Owned</h4>
				  </div>
				  <div class="box-body">
                  <dl class="row">
                <dt class="col-sm-4">Company Name</dt>
                <dd class="col-sm-8">{{ $company->company_name }}</dd>
                <dt class="col-sm-4">Company Address</dt>
                <dd class="col-sm-8">{{ $company->address }}</dd>
                <dt class="col-sm-4">Phone Number</dt>
                <dd class="col-sm-8">{{ $company->phone_number }}</dd>
                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{ $company->email }}</dd>
            </dl>
				  </div>
				</div>
                @endforeach
			</div>
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