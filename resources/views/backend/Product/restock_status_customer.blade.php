@extends('backend.layouts.app')

@section('content')
<title>Restock Status</title>
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
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">List</li>
								<li class="breadcrumb-item active" aria-current="page">Product Restock Status</li>
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
				  <h3 class="box-title">Product Request Status</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped table table-hover table-expandable table-sticky-header">
						<thead>
							<tr>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($restock as $request)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$request->product_name}}</td>
                    <td>
                        @if ($request->status === 'Under Review')
                            <button class="btn btn-info">Under Review</button>
                        @elseif ($request->status === 'Approved')
                            <button class="btn btn-success">Approved</button>
                        {{-- @elseif ($request->status === 'Rejected')
                            <button class="btn btn-danger">Rejected</button> --}}
                        @endif
                    </td>
                    <td>
                        @if ($request->status === 'Under Review')
                            <a href="{{ route('cancelReorderRequest', ['id' => $request->id]) }}" class="btn btn-danger">Cancel Restock</a>
                        @endif
                    </td>                    
                </tr>
                <tr class="expandable-body">
                    <td colspan="3">
                        <p><strong>Description:</strong> {{$request->product_desc}}</p>
                        <p><strong>Weight to be Restock:</strong> {{$request->total_weight}} kg</p>
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

<script>
    $(function () {
        $("#restock-table").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [
                { "className": "expand-control", "orderable": false, "targets": 0 },
                { "className": "expand-content", "orderable": false, "targets": 1 },
                { "orderable": false, "targets": 2 }
            ],
            "order": [[1, 'asc']]
        });

        // Expandable table logic
        $('table').on('click', 'tr.expandable-body', function () {
            $(this).toggleClass('open');
        });
    });

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>

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

@endsection
