@extends('backend.Layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<title>User List</title>
<style>
.text-danger {
	border: none;
  padding: 0;
  background: none;
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
								<li class="breadcrumb-item active" aria-current="page">User List</li>
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
				  <h3 class="box-title">User List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>email</th>
								<th>Permission</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($list as $row)
								<tr>
								<td>{{ $row->id }}</td>
								<td>{{ $row->name }}</td>
								<td> {{ $row->email }} </td>
								<td>
									@php
								if($row->role==1)
								{
									echo 'Admin';
								}
								if($row->role==2)
								{
									echo 'Picker';
								}
								if($row->role==3)
								{
									echo 'User';
								}
								@endphp
								</td>
								<td style="text-align: center;">
								<a href="{{ URL::to('/edit_user/'.$row->id) }}" class="text-info me-10" data-bs-toggle="tooltip" data-bs-original-title="Edit">
											<i class="ti-marker-alt"></i>
										</a>
								<button data-href="{{ URL::to('delete_user/'.$row->id) }}" class="text-danger sa-params" data-bs-original-title="Delete" data-bs-toggle="tooltip">
											<i class="ti-trash"></i>
							    </button>
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
	<script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>

	<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>


@endsection
