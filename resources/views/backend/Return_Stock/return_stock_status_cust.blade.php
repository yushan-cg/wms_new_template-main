@extends('backend.Layouts.app')

@section('content')
<title>Return Stock List</title>
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
                            <th>View The Status of Your Returned Product</th>
							</tr>
						</thead>
						<tbody>
                        @php
                        $previousReturnNo = null;
                    @endphp
                    @foreach($pickers as $picker)
                        @php
                            $currentReturnNo = $picker->returnStock->return_no;
                        @endphp
                        @if ($currentReturnNo != $previousReturnNo)
                            <tr>
                                <td>{{ $currentReturnNo }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#statusModal{{ $picker->returnStock->return_no }}">View Status</button>
                                </td>
                            </tr>
                            @php
                                $previousReturnNo = $currentReturnNo;
                            @endphp
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

  <!-- Modal -->
  <div class="modal center-modal fade" id="statusModal{{ $picker->returnStock->return_no }}" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="statusModalLabel{{ $picker->returnStock->return_no }}">Status of Products for Return No: {{ $picker->returnStock->return_no }}</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
          <table id="statusTable{{ $picker->returnStock->return_no }}" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($picker->returnStock->products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                 <td class="@if ($picker->status === 'Disposed' || $picker->status === 'Refurbished') bg-success @else bg-warning @endif color-palette">
                                    @if ($picker->status === 'Disposed' || $picker->status === 'Refurbished')
                                        {{ $picker->status }}
                                    @else
                                        In Process
                                    @endif
                                </td>                                  
                            </tr>
                        @endforeach                        
                        </tbody>
                    </table>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
  <!-- /.modal -->
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
