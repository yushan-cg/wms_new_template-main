@extends('backend.Layouts.app')
@section('content')
<title>Request Product Form</title>
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
								<li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
					  <h4 class="box-title">About Product</h4>
					</div>
				  <div class="box-body">
					<form action="#">
						<div class="form-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  <label class="fw-700 fs-16 form-label">My Company</label>
                                      <div class="form-group">
                                    <select class="form-select" name="company_id">
                                    <option value="">Select Company Name</option>
                                    @foreach ($companies as $companyOption)
                                    @if ($companyOption->user_id === auth()->user()->id)
                                    <option value="{{ $companyOption->id }}" @if ($company->id == $companyOption->id) selected @endif>{{ $companyOption->company_name }}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                    </div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
									   <label class="fw-700 fs-16 form-label">Product Name</label>
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
										<label class="fw-700 fs-16 form-label">Total Carton Quantity</label>
                                        <input class="form-control" id="carton_quantity" type="number" name="carton_quantity" placeholder="Enter Quantity" value="{{ old('carton_quantity') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Total Item Per Carton</label>
                                        <input class="form-control" id="item_per_carton" type="number" name="item_per_carton" placeholder="Enter Quantity" value="{{ old('item_per_carton') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Product Dimension (cm x cm x cm)</label>
                                        <input class="form-control" id="product_dimensions" type="text" name="product_dimensions" placeholder="Enter Product Dimension" value="{{ old('product_dimension') }}" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Weight Per Item (kg)</label>
                                        <input class="form-control" id="weight_per_item" type="text" name="weight_per_item" placeholder="Weight Per Item" step="0.1" onkeypress="return isNumberKey(this, event);" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Weight Per Carton (kg)</label>
                                        <input class="form-control" id="weight_per_carton" type="text" name="weight_per_carton" placeholder="Weight Per Carton" step="0.1" onkeypress="return isNumberKey(this, event);" required>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Total Weight (kg) [Maximum: 200kg]</label>
                                        <input class="form-control" id="total_weight" type="text" name="total_weight" readonly>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Price</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-money"></i></div>
											<input type="text" class="form-control" placeholder="270">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="fw-700 fs-16 form-label">Product Description</label>
										<textarea class="form-control p-15" rows="4"></textarea>
									</div>
								</div>
							</div>
								<!--/span-->
								<div class="col-md-4">
									<h4 class="box-title mt-20">Upload Image</h4>
									<div class="product-img text-start">
										<img src="../images/product/product-9.png" alt="">
										<div class="input-group my-3">
										  <label class="input-group-text btn-primary" for="inputGroupFile01">Upload Another Image</label>
										  <input type="file" class="form-control" id="inputGroupFile01">
										</div>
										<button class="btn btn-success">Edit</button>
										<button class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4 class="box-title mt-40">General Info</h4>
									<div class="table-responsive">
										<table class="table no-border td-padding">
											<tbody>
												<tr>
													<td>
														<input type="text" class="form-control" placeholder="Brand">
													</td>
													<td>
														<input type="text" class="form-control" placeholder="Sellar">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" class="form-control" placeholder="Delivery Condition">
													</td>
													<td>
														<input type="text" class="form-control" placeholder="Knock Down">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" class="form-control" placeholder="Color">
													</td>
													<td>
														<input type="text" class="form-control" placeholder="Gift Pack">
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
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

    <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
      var companySelect = document.getElementById('company_id');
      var addressField = document.getElementById('address');
      var phoneField = document.getElementById('phone_number');
      var emailField = document.getElementById('email');

      companySelect.addEventListener('change', function() {
          var selectedOption = companySelect.options[companySelect.selectedIndex];
          addressField.value = selectedOption.getAttribute('data-address');
          phoneField.value = selectedOption.getAttribute('data-phone_number');
          emailField.value = selectedOption.getAttribute('data-email');
      });
  });

  function isNumberKey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
</script>
@endsection
