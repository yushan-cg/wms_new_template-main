@extends('backend.Layouts.app')
@section('content')
<title>Product Stock Level</title>
<style>
table.table-expandable > tbody > tr:nth-child(odd) {
    cursor: pointer;
}
  </style>
<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Data Tables</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ URL::to('/home') }}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">My Stock Level</li>
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
						<table id="productorder" class="table table-hover no-wrap product-order table table-hover table-expandable table-sticky-header" data-page-size="10">
							<thead>
                            <tr>
                            <th style="width: 10px">Company</th>
                            <th>Product</th>
                            <th>Remaining Quantity</th>
                            <th>Stock Level</th>
                            <th style="width: 40px">%</th>
                            <th>Action</th>
                            </tr>
							</thead>
							<tbody>
                            @foreach($quantities as $quantity)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $quantity->company_name }}</td>
                    <td>{{ $quantity->product_name }}</td>
                    <td>{{ $quantity->remaining_quantity }}/{{ $quantity->total_quantity }}</td>
                    <td>
                        @php
                            $progress = ($quantity->remaining_quantity / $quantity->total_quantity) * 100;
                            $labelClass = $progress < 25 ? 'danger' : ($progress < 50 ? 'warning' : ($progress < 75 ? 'primary' : 'success'));
                        @endphp
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-{{ $labelClass }}" style="width: {{ $progress }}%"></div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-{{ $labelClass }}">{{ round($progress) }}%</span>
                    </td>
                    <td>
                        <a href="{{ URL::to('/restock_form/'.$quantity->id) }}" class="btn btn-sm btn-info">Restock</a>
                        <a href="{{ URL::to('/product-report/'.$quantity->id) }}" class="btn btn-sm btn-danger">Report</a>
                    </td>
                </tr>
                <tr class="expandable-body">
                    <td colspan="6">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Description:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->product_desc }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Weight per Item:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->weight_per_item }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Weight per Carton:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->weight_per_carton }}
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
							</tbody>						
						</table>
					</div>
				  </div>
				</div>
			  </div>		  
		  </div>

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
    <script src="{{ asset('assets/js/bootstrap-table-expandable.js') }}"></script>
@endsection