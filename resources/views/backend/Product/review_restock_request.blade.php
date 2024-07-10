@extends('backend.Layouts.app')
@section('content')
<title>Review Restock Request</title>
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Restock Request</li>
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
				  <h3 class="box-title">Restock Request</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped table table-hover table-expandable table-sticky-header">
						<thead>
							<tr>
                                <th>No.</th>
                                <th>Company Name</th>
                                <th>Product Name</th>
                                <th>Total Weight</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($restock as $index => $request)
                                @if ($request->status === 'Under Review')
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $request->company_name }}</td>
                                        <td>{{ $request->product_name }}</td>
                                        <td>{{ $request->total_weight }}</td>
                                        <td>
                                            <a href="{{ URL::to('approve_request/'.$request->id) }}" class="btn btn-success">Approve</a>
                                            {{-- <a href="{{ URL::to('remove_request/'.$request->id) }}" class="btn btn-danger">Reject</a> --}}
                                        </td>
                                    </tr>
                                    <tr class="expandable-content">
                                        <td colspan="5">
											<table>
                                            <p><strong>Product Image:</strong></p>
                                            <div class="col-sm-2">
                                                <img src="{{ asset('storage/Image/'.$request->product_image) }}" width="100">
                                            </div>
                                            <p><strong>Weight Per Item (kg):</strong> {{ $request->weight_per_item }}</p>
                                            <p><strong>Weight Per Carton (kg):</strong> {{ $request->weight_per_carton }}</p>
                                        </td>
                                    </tr>
									</table>
                                @endif
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
	<script src="{{ asset('assets/js/bootstrap-table-expandable.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table-expandable.css') }}">
@endsection