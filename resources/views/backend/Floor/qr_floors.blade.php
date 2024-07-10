@extends('backend.Layouts.app')
@section('content')
    <title>QR Floor Scanner</title>
    <div class="content-header">
        <h4>Enter the QR Code For The Floor</h4>
        <div id="qr-reader-container" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
            <div id="qr-reader" style="width: 500px"></div>
        </div>
        <div id="qr-reader-results"></div>
        <div id="floor-table-container"></div>
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

            function createFloorTable(data) {
                var floorTableContainer = document.getElementById('floor-table-container');
                var floorTable = document.createElement('table');
                floorTable.id = 'floorTable';
                floorTable.className = 'table table-bordered table-striped';

                var tableHead = floorTable.createTHead();
                var row = tableHead.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = 'Floor ID';
                cell2.innerHTML = 'Floor Name';
                cell3.innerHTML = 'Capacity';

                var tableBody = floorTable.createTBody();
                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = '1';
                cell2.innerHTML = data.floor.location_codes || 'N/A';
                cell3.innerHTML = data.floor.capacity || 'N/A';

                floorTableContainer.innerHTML = '';
                floorTableContainer.appendChild(floorTable);
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
                    var cell3 = row.insertCell(2);

                    cell1.innerHTML = 'Product ID';
                    cell2.innerHTML = 'Name';
                    cell3.innerHTML = 'Price (RM)';

                    var tableBody = productTable.createTBody();
                    data.products.forEach((product, index) => {
                        var row = tableBody.insertRow();
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);

                        cell1.innerHTML = product.id;
                        cell2.innerHTML = product.product_name || 'N/A';
                        cell3.innerHTML = product.product_price || 'N/A';
                    });

                    productTableContainer.innerHTML = '';
                    productTableContainer.appendChild(productTable);
                } else {
                    productTableContainer.innerHTML = '<p>No products found on this floor.</p>';
                }
            }

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    lastResult = decodedText;

                    // Update the content-header with the decoded text
                    document.querySelector('.content-header h4').innerText = `Floor Code: ${decodedText}`;

                    // Perform an AJAX request to your backend
                    fetch(`/getFloorQRInfo/${decodedText}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('Floor Information:', data);

                            // Create floor and product tables using getElementById
                            createFloorTable(data);
                            createProductTable(data);
                        })
                        .catch(error => console.error('Error fetching floor information:', error));

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
