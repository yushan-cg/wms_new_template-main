@extends('backend.Layouts.app')
@section('content')
    <title>QR Rack Scanner</title>
    <div class="content-header">
        <h4>Enter the QR Code For The Racks</h4>
        <div id="qr-reader" style="width: 500px"></div>
        <div id="qr-reader-results"></div>
        <div id="rack-table-container"></div>
        <div id="product-table-container"></div>
    </div>
@endsection
@section('page content overlay')
    <!-- Page Content overlay -->

    {{-- QR scanner --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on the next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });

            function createRackTable(data) {
                var rackTableContainer = document.getElementById('rack-table-container');
                var rackTable = document.createElement('table');
                rackTable.id = 'rackTable';
                rackTable.className = 'table table-bordered table-striped';

                var tableHead = rackTable.createTHead();
                var row = tableHead.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);

                cell1.innerHTML = 'Property';
                cell2.innerHTML = 'Value';

                var tableBody = rackTable.createTBody();
                var row1 = tableBody.insertRow();
                var cell1 = row1.insertCell(0);
                var cell2 = row1.insertCell(1);

                cell1.innerHTML = 'Capacity';
                cell2.innerHTML = data.rack.capacity || 'N/A';

                var row2 = tableBody.insertRow();
                var cell1 = row2.insertCell(0);
                var cell2 = row2.insertCell(1);

                cell1.innerHTML = 'Occupied';
                cell2.innerHTML = data.rack.occupied || 'N/A';

                rackTableContainer.innerHTML = '';
                rackTableContainer.appendChild(rackTable);
            }

            function createProductTable(data) {
                var productTableContainer = document.getElementById('product-table-container');

                if (data.products.length > 0) {
                    var productTable = document.createElement('table');
                    productTable.id = 'productTable';
                    productTable.className = 'table table-bordered table-striped';

                    var tableHead = productTable.createTHead();
                    var row = tableHead.insertRow();
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);

                    cell1.innerHTML = 'Product Name';
                    cell2.innerHTML = 'Price';

                    var tableBody = productTable.createTBody();
                    data.products.forEach(product => {
                        var row = tableBody.insertRow();
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);

                        cell1.innerHTML = product.product_name || 'N/A';
                        cell2.innerHTML = product.product_price || 'N/A';
                    });

                    productTableContainer.innerHTML = '';
                    productTableContainer.appendChild(productTable);
                } else {
                    productTableContainer.innerHTML = '<p>No products found in this rack.</p>';
                }
            }

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    lastResult = decodedText;

                    // Update the content-header with the decoded text
                    document.querySelector('.content-header h4').innerText = `Rack Code: ${decodedText}`;

                    // Perform an AJAX request to your backend
                    fetch(`/getRackQRInfo/${decodedText}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('Rack Information:', data);

                            // Create rack and product tables using getElementById
                            createRackTable(data);
                            createProductTable(data);
                        })
                        .catch(error => console.error('Error fetching rack information:', error));

                    // Keep the scanner active after a successful scan
                    // html5QrcodeScanner.start();
                }
            }

            // Optional callback for error, can be ignored.
            function onScanError(qrCodeError) {
                // This callback would be called in case of qr code scan error or setup error.
                // You can avoid this callback completely, as it can be very verbose in nature.
            }

            html5QrcodeScanner.render(onScanSuccess, onScanError);
        });
    </script>
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
