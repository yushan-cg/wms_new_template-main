@extends('backend.Layouts.app')
@section('content')
<title>Add Product</title>
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
								<li class="breadcrumb-item active" aria-current="page">Restock</li>
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
						  <h4 class="box-title">Restock Form</h4>
						</div>
						<!-- /.box-header -->
                        <form role="form" action="{{URL::to('/send_request_restock')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company_id">Company Name</label>
                            <input type="text" name="company_name" value="{{$restock->company_name}}" class="form-control @error('product_name') is-invalid @enderror" disabled>
                            @error('company_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_name">Choose Product</label>
                            <input type="text" name="product_name" value="{{$restock->product_name}}" class="form-control @error('product_name') is-invalid @enderror" disabled>
                            @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('storage/Image/'.$restock->product_image) }}" width="100">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Carton Quantity</label>
                            <input type="number" name="carton_quantity"  class="form-control @error('title') is-invalid @enderror"
                             id="carton_quantity" placeholder="Enter Quantity">
                            
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                          
                            <div class="form-group">
                              <label for="exampleInputEmail1">Item Per Carton</label>
                              <input type="number" name="item_per_carton" value="{{$restock->item_per_carton}}" class="form-control @error('title') is-invalid @enderror"
                               id="exampleInputEmail1" placeholder="Enter Quantity">
                              
                              @error('slug')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              </div>
                          
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Weight Per Item (kg)</label>
                            <<input type="text" name="weight_per_item" value="{{$restock->weight_per_item}}" class="form-control  @error('title') is-invalid @enderror"
                            id="weight_per_item" placeholder="Weight Per Item" step="0.1">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Weight Per Carton (kg)</label>
                            <input type="text" name="weight_per_carton" value="{{$restock->weight_per_carton}}" class="form-control @error('title') is-invalid @enderror"
                             id="weight_per_carton" placeholder="Weight Per Carton" step="0.1">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Total Weight (kg)</label>
                            <input type="text" name="total_weight" id="total_weight" class="form-control @error('title') is-invalid @enderror" readonly>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>


                          <input type="hidden" name="product_id" value="{{ $restock->id }}">
                          <input type="hidden" name="rack_id" value="{{ $restock->rack_id }}">
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Request Restock of Product</button>
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
	
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        const cartonQuantity = document.getElementById('carton_quantity');
        const weightPerCarton = document.getElementById('weight_per_carton');
        const totalWeightOutput = document.getElementById('total_weight');

        cartonQuantity.addEventListener('input', updateTotalWeight);
        weightPerCarton.addEventListener('input', updateTotalWeight);

        function updateTotalWeight() {
            const cartonQuantityValue = parseFloat(cartonQuantity.value) || 0;
            const weightPerCartonValue = parseFloat(weightPerCarton.value) || 0;
            const totalWeight = cartonQuantityValue * weightPerCartonValue;
            totalWeightOutput.value = totalWeight.toFixed(2);
        }
    </script>		
@endsection


