@extends('backend.Layouts.app')

@section('title', 'Floor Overview')

@section('content')
<a href="{{ route('generate.waybill') }}" target="_blank">Generate Waybill</a>
<a href="{{ route('generate.invoice') }}" target="_blank">Generate Invoice</a>

<div class="container p-3 text-center">
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
<div class="content">
    @include('backend.rack.floor')
</div>
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
