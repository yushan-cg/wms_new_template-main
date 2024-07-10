@extends('backend.Layouts.app')
@section('content')
    <title>QR Product Scanner</title>
    <div class ="content-header">
        <h4>Enter the QR Code For The Product</h4>
        <div id="qr-reader-container" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
            <div id="qr-reader" style="width: 500px"></div>
        </div>
        <div id="qr-reader-results"></div>
        <div id="product-details">
            <!-- Product details will be displayed here -->
        </div>

    </div>
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
    {{-- QR scanner --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    lastResult = decodedText;

                    // Update the content-header with the decoded text
                    document.querySelector('.content-header h4').innerText = `Product Code: ${decodedText}`;

                    // Perform an AJAX request to your backend
                    fetch(`/getProductQRInfo/${decodedText}`)
                        .then(response => response.json())
                        .then(data => {
                            // Assuming 'data' contains the information from the database

                            // Create and update a table structure in the product-details section
                            var productDetails = document.getElementById('product-details');
                            productDetails.innerHTML = `
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${data.id || 'N/A'}</td>
                                        <td>${data.product_name || 'N/A'}</td>
                                        <td>${data.product_price || 'N/A'}</td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
                        })
                        .catch(error => console.error('Error fetching product information:', error));
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
@endsection
