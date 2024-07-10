@extends('backend.Layouts.app')
@section('content')
<title>Product List</title>
<style>
.fixed-row {
    width: 50%; /* Adjust width as needed */
}
.fixed-col {
    width: 50%; /* Adjust width as needed */
}

.fixed-col img {
    width: 100%; /* Make image fill the column */
    height: auto; /* Maintain aspect ratio */
    max-height: 150px; /* Maximum height of images */
}

.text-danger {
	border: none;
	padding: 0;
	background: none;
}
</style>

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Data Tables</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">List</li>
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                    <h3 class="box-title">Product List</h3>
                    {{-- add button for product --}}
                    <button class="btn btn-success" style="width: 150px; float: right; padding-right: 5px;" data-bs-toggle="modal" data-bs-target="#addProductModal" title="Add Product">Add Product</button>
                    <x-modal-form
                        modalId="addProductModal"
                        modalTitle="Add Product"
                        formId="addProductForm"
                        formAction="{{ route('insert_product') }}"
                        submitButton="Add this product">
                        @include('backend.product.create_product')
                    </x-modal-form>
                </div>

				<div class="box-body">
				<div class="table-responsive">
					<table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
						<thead>
							<tr>
							<th>ID</th>
							<th>Customer/Company</th>
							<th>SKU</th>
							<th>Product Name</th>
							<th>Description</th>
							<th>Expired Date</th>
							<th>Product Image</th>
							@if (Auth::user()->role == 1)
							<th>Action</th>
							@endif
							</tr>
						</thead>
						<tbody>
						@foreach ($list as $index => $row)
							<tr class="fixed-row fixed-col">
								{{-- <td>{{ $loop->iteration }}</td> --}}
								<td>{{ $row->id }}</td>
								<td>{{ $row->partner_name }}</td>
								<td>{{ $row->SKU }}</td>
								<td>{{ $row->product_name }}</td>
								<td>{{ $row->product_desc }}</td>
								<td>{{ $row->expired_date }}</td>
								<td>
									<img src="{{ $row->Img }}" alt="{{ $row->product_name }}" width="50" height="50">
								</td>
								@if (Auth::user()->role == 1)
									<td>
										<!-- Add any action buttons or links here -->
										<button type="button" class="btn btn-primary" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $row->id }}">
											Edit
										</button>
										<!-- Modal for editing product -->
										<x-modal-form
											modalId="editProductModal{{ $row->id }}"
											modalTitle="Edit Product"
											formId="editProductForm{{ $row->id }}"
											formAction="{{ route('update_product', $row->id) }}"
											submitButton="Save edit">
											<form id="editProductForm{{ $row->id }}" action="{{ route('update_product', $row->id) }}" method="POST" enctype="multipart/form-data">
												@csrf
												@method('PATCH')
												<!-- Form fields -->
												<div class="modal-body">
													@include('backend.product.edit_product', ['product' => $row])
												</div>
										</x-modal-form>
										<!-- end modal -->
										<button type="button" class="btn btn-danger" style="width: 75px;" onclick="confirmDelete({{ $row->id }});">
											Delete
										</button>
										<form id="delete-product-form-{{ $row->id }}" action="{{ route('delete_product', $row->id) }}" method="POST" style="display: none;">
											@csrf
											@method('DELETE')
										</form>
									</td>
								@endif
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
	<script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>

	<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>

	<script>
		function confirmDelete(id) {
			if (confirm('Are you sure you want to delete this product?')) {
				document.getElementById('delete-product-form-' + id).submit();
			}
		}
	</script>
@endsection
