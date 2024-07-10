@extends('backend.Layouts.app')

@section('content')
    <div class="container">
        <h1>Weekly Report</h1>

        <form method="GET" action="{{ URL::to('/generate-weekly-report') }}" style="padding-bottom: 2vh">
            @csrf
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Generate</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Week Number</th>
                    <th>Total Inflow Quantity</th>
                    <th>Total Outflow Quantity</th>
                    <th>Net Change Quantity</th>
                    <th>Remaining Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weeklyReports as $report)
                    <tr>
                        <td>{{ $report->company_name}}</td>
                        <td>{{ $report->week_number }}</td>
                        <td>{{ $report->total_inflow_quantity }}</td>
                        <td>{{ $report->total_outflow_quantity }}</td>
                        <td>{{ $report->net_change_quantity }}</td>
                        <td>{{ $report->remaining_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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