@extends('backend.layouts.app')
@section('content')
    <title>List of Returned Order</title>
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Return Stock List</li>
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
				  <h3 class="box-title">Return Stock List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                            <th>Return No.</th>
                            <th>View The Detail of Returned Product</th>
                            <th>Handle by</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($returnStockList as $returnStock)
                        <tr>
                            <td>{{ $returnStock->return_no }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-center{{ $returnStock->id }}">View Request</button>
                            </td>
                            <td>
                                @php
                                    $picker = $pickers->where('return_stock_id', $returnStock->id)->first();
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

    @foreach($returnStockList as $returnStock)
	<!-- Modal -->
	<div class="modal center-modal fade" id="modal-center{{ $returnStock->id }}" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Status of Products for Return No: {{ $returnStock->return_no }}</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
		  <table id="statusTable{{ $returnStock->id }}" class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  </div>
		</div>
	  </div>
	</div>
	@endforeach
  <!-- /.modal -->
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