@extends('backend.Layouts.app')
@section('content')
		<!-- Main content -->
<title>Home</title>
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between">
								<h2 class="my-0 fw-600 text-primary">100+</h2>
								<div class="w-40 h-40 bg-primary rounded-circle text-center fs-24 l-h-40"><i class="fa fa-inbox"></i></div>
							</div>
							<p class="fs-18 mt-10">Total Racks & Floor</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between">
								<h2 class="my-0 fw-600 text-warning">15+</h2>
								<div class="w-40 h-40 bg-warning rounded-circle text-center fs-24 l-h-40"><i class="fa fa-shopping-bag"></i></div>
							</div>
							<p class="fs-18 mt-10">New Order</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between">
								<h2 class="my-0 fw-600 text-info">500 m&sup3;</h2>
								<div class="w-40 h-40 bg-info rounded-circle text-center fs-24 l-h-40"><i class="fa fa-dollar"></i></div>
							</div>
							<p class="fs-18 mt-10">Total Delivered Monthly</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between">
								<h2 class="my-0 fw-600 text-danger">100 m&sup3;</h2>
								<div class="w-40 h-40 bg-danger rounded-circle text-center fs-24 l-h-40"><i class="fa fa-dropbox"></i></div>
							</div>
							<p class="fs-18 mt-10">Units Delivered</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">Top Cities</h4>
						</div>
						<div class="box-body py-0">
							<div id="topcities"></div>
						</div>
						<div class="box-footer">
							<div class="d-flex justify-content-between">
								<div class="d-flex">
									<p class="mb-0 me-10">Show</p>
									<div class="btn-group">
									  <button class="btn btn-xs btn-primary-light dropdown-toggle" type="button" data-bs-toggle="dropdown">5 Result</button>
									  <div class="dropdown-menu">
										<a class="dropdown-item" href="#">10 Result</a>
										<a class="dropdown-item" href="#">15 Result</a>
										<a class="dropdown-item" href="#">20 Result</a>
									  </div>
									</div>
								</div>
								<div class="d-flex">
									<p class="mb-0 me-10">Short By</p>
									<div class="btn-group">
									  <button class="btn btn-xs btn-primary-light dropdown-toggle" type="button" data-bs-toggle="dropdown">Order</button>
									  <div class="dropdown-menu">
										<a class="dropdown-item" href="#">Delivery Date</a>
										<a class="dropdown-item" href="#">Payment</a>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">Inventory Stock</h4>
						</div>
						<div class="box-body">
							<div id="recent_trend"></div>
						</div>
					</div>
				</div>





				<div class="col-xl-8 col-12">
					<div class="box position-static">
						<div class="box-header">
                            <a href="{{ route('floor.overview') }}" class="box-title">Floor Overview</a>
						</div>
						<div class="box-body">
                            <div class="container" style="height: 500px; overflow-y: auto;">
                                @include('backend.rack.floor')
                            </div>


							<div class="d-flex mt-20">
                                <div class="d-flex">
                                    <div class="w-60 h-30 rounded" style="background-color: #808080;"></div>
                                    <h5 class="mx-15 my-0">Empty</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="w-60 h-30 rounded" style="background-color: #05a322;"></div>
                                    <h5 class="mx-15 my-0">Occupied</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="w-60 h-30 rounded" style="background-color: #FF5733;"></div>
                                    <h5 class="mx-15 my-0">Full</h5>
                                </div>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-12 col-xl-4">
					<div class="box overflow-h">
						<div class="box-header no-border">
							<h4 class="box-title">Inventory Overview</h4>
							<ul class="box-controls pull-right">
							  <li class="dropdown">
								<a data-bs-toggle="dropdown" href="#" class="btn btn-success-light px-10 base-font">Export</a>
								<div class="dropdown-menu dropdown-menu-end">
								  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
								  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
								  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
								  <div class="dropdown-divider"></div>
								  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
								</div>
							  </li>
							</ul>
						</div>
						<div class="box-body py-0">
							<div class="row">
								<div class="col-6">
									<div class="py-10">
										<div class="text-fade fw-600">Opening Balance (m&sup3;)</div>
										<div class="fs-18 fw-600">4.76</div>
									</div>
								</div>
								<div class="col-6">
									<div class="py-10">
										<div class="text-fade fw-600">Incoming (m&sup3;)</div>
										<div class="fs-18 fw-600">-</div>
									</div>
								</div>
								<div class="col-6">
									<div class="py-10">
										<div class="text-fade fw-600">Outgoing (m&sup3;)</div>
										<div class="fs-18 fw-600">1.30</div>
									</div>
								</div>
								<div class="col-6">
									<div class="py-10">
										<div class="text-fade fw-600">Balance (m&sup3;)</div>
										<div class="fs-18 fw-600">3.46</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-body p-0">
							<div id="revenue4" class="text-dark min-h-auto"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box" id="bt-sellers">
						<div class="box-header">
							<h4 class="box-title">
								New Product Register
							</h4>
						</div>
						<div class="box-body">
							<div class="inner-user-div3">
								<div class="box-shadowed p-10 mb-10 rounded10">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="my-5">BENTO SQUID HOT & SPICY</h5>
											<p class="mb-0"></p>
										</div>
										<div>
											<h3 class="my-5">167 Units</h3>
											<p class="mb-0"><span>RM5 per unit</span></p>
										</div>
									</div>
								</div>
								<div class="box-shadowed p-10 mb-10 rounded10">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="my-5">JELE DOUBLE JELLY DRINK STRAWBERRY</h5>
											<p class="mb-0"></p>
										</div>
										<div>
											<h3 class="my-5">1200 Units</h3>
											<p class="mb-0"><span>RM3.2 per unit</span></p>
										</div>
									</div>
								</div>
								<div class="box-shadowed p-10 mb-10 rounded10">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="my-5">JELE BEAUTIES LEMON</h5>
											<p class="mb-0"></p>
										</div>
										<div>
											<h3 class="my-5">1200 Units</h3>
											<p class="mb-0"><span>RM3 per unit</span></p>
										</div>
									</div>
								</div>
								<div class="box-shadowed p-10 mb-10 rounded10">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5 class="my-5">REAL MADRID HOME JERSEY</h5>
											<p class="mb-0"></p>
										</div>
										<div>
											<h3 class="my-5">100 Units</h3>
											<p class="mb-0"><span>RM50 per unit</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">list of racks</h4>
						</div>
						<div class="box-body pt-0">
							<div class="table-responsive">
							  <table class="table mb-0">
								<tr>
								  <td><a href="javascript:void(0)">A-1-L1</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 15-08-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Used</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">20%</td>
								</tr>
								<tr>
								  <td><a href="javascript:void(0)">A-2-L1</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 05-08-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Used</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 28%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">28%</td>
								</tr>
								<tr>
								  <td><a href="javascript:void(0)">A-2-L2</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 10-09-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Used</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">80%</td>
								</tr>
								<tr>
								  <td><a href="javascript:void(0)">B-1-L3</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 15-09-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Used</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">50%</td>
								</tr>
								<tr>
								  <td><a href="javascript:void(0)">B-2-L1</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 21-09-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Used</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 58%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">58%</td>
								</tr>
								<tr>
								  <td><a href="javascript:void(0)">C-1-L1</a></td>
								  <td><span class="text-muted text-nowrap"><i class="fa fa-calendar-o text-success-light mx-5"></i> 30-08-2023</span> </td>
								  <td>
									  <div class="d-flex align-items-center">
									  	<span class="mx-5">Free</span>
										  <div class="progress progress-xs w-p100 mt-0">
											<div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										  </div>
									  </div>
								  </td>
								  <td class="text-end">36%</td>
								</tr>
							  </table>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Average Inventory Turnaround</h4>
						</div>
						<div class="box-body py-0">
							<div id="overview_trend"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
@endsection
@section('page content overlay')
	<!-- page content overlay -->

	<!-- Vendor JS -->
	<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/progressbar.js-master/dist/progressbar.js') }}"></script>
	<script>
		document.getElementById('e').value = new Date().toISOString().substring(0, 10);
	</script>

	<!-- Deposito Admin App -->
	<script src="{{ asset('assets/js/template.js') }}"></script>
	<script src="{{ asset('assets/js/pages/dashboard2.js') }}"></script>
@endsection
