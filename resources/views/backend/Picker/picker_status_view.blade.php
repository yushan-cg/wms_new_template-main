@extends('backend.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Picker Statuses</h1>
                </div>
            </div>
        </div>
    </section>
    <title>Picker Status</title>
    <div class="container">
        <div class="row">
            <div class="vtabs customvtab">
                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#picker-status" role="tab"
                            aria-expanded="true"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span
                                class="hidden-xs-down">Picker Status</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#completed" role="tab"
                            aria-expanded="false"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span
                                class="hidden-xs-down">Completed</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#insufficient" role="tab"
                            aria-expanded="false"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span
                                class="hidden-xs-down">Insufficient</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#damaged" role="tab" aria-expanded="false"><span
                                class="hidden-sm-up"><i class="ion-email"></i></span> <span
                                class="hidden-xs-down">Damaged</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="picker-status" role="tabpanel" aria-expanded="true">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Picker</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers->groupBy('picker_name') as $pickerName => $groupedPickers)
                                    <tr>
                                        <td>
                                            {{ $pickerName }}
                                            <a href="#picker-status-content-{{ $loop->index }}" class="btn btn-slide"
                                                data-toggle="collapse">

                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div id="picker-status-content-{{ $loop->index }}" class="collapse">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Date of Pick Up</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($groupedPickers->sortBy('status') as $picker)
                                                            <tr>
                                                                <td>{{ $picker->product_name }}</td>
                                                                <td>{{ $picker->quantity }}</td>
                                                                <td>{{ $picker->updated_at }}</td>
                                                                <td>
                                                                    @if ($picker->status == 'Collected')
                                                                        <span
                                                                            class="badge bg-success">{{ $picker->status }}</span>
                                                                    @elseif ($picker->status == 'Pending' || $picker->status == 'Reracking')
                                                                        <span
                                                                            class="badge bg-warning">{{ $picker->status }}</span>
                                                                    @elseif ($picker->status == 'Packing')
                                                                        <span
                                                                            class="badge bg-info">{{ $picker->status }}</span>
                                                                    @elseif ($picker->status == 'Reracked')
                                                                        <span
                                                                            class="badge bg-dark">{{ $picker->status }}</span>
                                                                    @elseif ($picker->status == 'Disposed')
                                                                        <span
                                                                            class="badge bg-danger">{{ $picker->status }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-primary">{{ $picker->status }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!-- Add content for other tabs similarly -->
                    <div class="tab-pane" id="completed" role="tabpanel" aria-expanded="true">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Picker Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers->groupBy('picker_name') as $pickerName => $groupedPickers)
                                    @php
                                        $completedPickers = $groupedPickers->where('report', 'Completed');
                                    @endphp
                                    @if ($completedPickers->count() > 0)
                                        <tr>
                                            <td>
                                                {{ $pickerName }}
                                                <a href="#completed-content-{{ $loop->index }}" class="btn btn-slide"
                                                    data-toggle="collapse">

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div id="completed-content-{{ $loop->index }}" class="collapse">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Date of Pick Up</th>
                                                                <th>Report</th>
                                                                <th>Remark</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($completedPickers as $picker)
                                                                <tr>
                                                                    <td>{{ $picker->product_name }}</td>
                                                                    <td>{{ $picker->quantity }}</td>
                                                                    <td>{{ $picker->updated_at }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-success">{{ $picker->report }}</span>
                                                                    </td>
                                                                    <td>
                                                                        {{ $picker->remark }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="insufficient" role="tabpanel" aria-expanded="true">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Picker Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers->groupBy('picker_name') as $pickerName => $groupedPickers)
                                    @php
                                        $completedPickers = $groupedPickers->where('report', 'Insufficient');
                                    @endphp
                                    @if ($completedPickers->count() > 0)
                                        <tr>
                                            <td>
                                                {{ $pickerName }}
                                                <a href="#insufficient-content-{{ $loop->index }}" class="btn btn-slide"
                                                    data-toggle="collapse">

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div id="insufficient-content-{{ $loop->index }}" class="collapse">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Date of Pick Up</th>
                                                                <th>Report</th>
                                                                <th>Remark</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($completedPickers as $picker)
                                                                <tr>
                                                                    <td>{{ $picker->product_name }}</td>
                                                                    <td>{{ $picker->quantity }}</td>
                                                                    <td>{{ $picker->updated_at }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-warning">{{ $picker->report }}</span>
                                                                    </td>
                                                                    <td>
                                                                        {{ $picker->remark }}
                                                                    </td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('rerackProductAdmin', ['pickerId' => $picker->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm">Rerack</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="damaged" role="tabpanel" aria-expanded="true">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Picker Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers->groupBy('picker_name') as $pickerName => $groupedPickers)
                                    @php
                                        $completedPickers = $groupedPickers->where('report', 'Damaged');
                                    @endphp
                                    @if ($completedPickers->count() > 0)
                                        <tr>
                                            <td>
                                                {{ $pickerName }}
                                                <a href="#damaged-content-{{ $loop->index }}" class="btn btn-slide"
                                                    data-toggle="collapse">

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div id="damaged-content-{{ $loop->index }}" class="collapse">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Date of Pick Up</th>
                                                                <th>Report</th>
                                                                <th>Remark</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($completedPickers as $picker)
                                                                <tr>
                                                                    <td>{{ $picker->product_name }}</td>
                                                                    <td>{{ $picker->quantity }}</td>
                                                                    <td>{{ $picker->updated_at }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge bg-danger">{{ $picker->report }}</span>
                                                                    </td>
                                                                    <td>
                                                                        {{ $picker->remark }}
                                                                    </td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('disposeProductAdmin', ['pickerId' => $picker->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm">Dispose</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- Include Bootstrap CSS and JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
