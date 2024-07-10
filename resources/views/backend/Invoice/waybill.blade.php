   <title>Waybill</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 3px solid #000000;
        }

        p, td {
            margin: 0;
            padding-left: 20px;
        }

        .linebreak{
            border-top: 2px solid black;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .headerstyle , th{
            color:darkblue;
            font-weight: bold;
            font-size: 20px;

        }

        .waybill-banner {
            text-align: center
        }
        .waybill-banner .logo {
            width: 597.5px;
            height:70px;
        }

        .waybill-details {
            align-content:right;
            text-align: right;
            font-size: 14px;
        }

        .waybill-details .table-container {
            display: inline-block
        }

        .waybill-remark .logo {
            padding-top:5px;
            width: 580px;
            height:60px;
        }

        .remark{
            align-content:center;
            text-align:center;
            padding-bottom:20px;
        }

        .order-details {
            width: 107%;
        }

        .border-right {
            border-right: 2px solid black;
        }
        .border-topbottom {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
        }

        .qr-code img {
            max-width: 100px; /* Set maximum width */
            max-height: 100px; /* Set maximum height */
            width: auto; /* Allow the image to adjust its width while maintaining aspect ratio */
            height: auto; /* Allow the image to adjust its height while maintaining aspect ratio */
            display: block; /* Ensure the image is centered within its container */
            margin: auto; /* Center the image horizontally */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="waybill-banner">
            <img src="{{ asset('assets/images/waybill-banner.png') }}" alt="ARKOD" class="img-fluid logo">
        </div>

        <div class="waybill-details">
            <div class="table-container">
                <table>
                    <tbody>
                        <tr>
                            <td>Waybill No:</td>
                            <td>ARKDWB-020524-001VAL</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>02-05-24</td>
                        </tr>
                        <tr>
                            <td>Customer ID:</td>
                            <td>VAL</td>
                        </tr>
                        <tr>
                            <td>Service Type:</td>
                            <td>Door to Door</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="shipper-details">
            <div class="table-container">
                <div class="linebreak"></div>
                <p class="headerstyle">Shipper Details</p>
                <div class="linebreak"></div>

                <table>
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>LE ONGAL SECRET SDN BHD</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>LOT 517, SECTION 62, JALAN CHENG HO,KUCHING, SARAWAK,</td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td>93100</td>
                        </tr>
                        <tr>
                            <td>Attention:</td>
                            <td>VALENE ONG</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>016-888 5699</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="receiver-details">
            <div class="table-container">

                <div class="linebreak"></div>
                <p class="headerstyle">Receiver Details</p>
                <div class="linebreak"></div>

                <table>
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>VOLER YONG</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>Samy Estate Lorong 1 / Lorong 2, Sandakan Sabah,</td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td>90000</td>
                        </tr>
                        <tr>
                            <td>Attention:</td>
                            <td>VOLER YONG</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>016-8885699</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="order-details" style="border-collapse: collapse;">



            <tr class="border-topbottom">
             <!-- <td class="headerstyle" style="width: 130px;">Order Details</td>
              <td class="border-right" style="width: 190px;text-align: left;"></td>
              <td class="headerstyle" style="text-align: center;">QR Code</td>
              <th></th>-->
              <td class="headerstyle" style="width: 130px;">Order Details</td>
              <td class="border-right" style="width: 190px;text-align: left;"></td>
              <td class="headerstyle" style="text-align: center;">QR Code</td>

            </tr>

            <tr>
                <td>Content:</td>
                <td class="border-right"></td>
                <td class="qr-code" rowspan="4" style="text-align: center;">
                    <img src="{{ asset('assets/images/qr-sample.png') }}" alt="QR Code">
                </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td class="border-right">furniture (chair)</td>
                <td></td>
            </tr>
            <tr>
                <td>Size:</td>
                <td class="border-right">101cm x 19cm x 23cm (LxHxW)</td>
                <td></td>
            </tr>
            <tr>
                <td>Total Weight:</td>
                <td class="border-right">10.6kg</td>
                <td></td>
            </tr>
        </table>

        <div class="pod">
            <div class="linebreak"></div>
            <p class="headerstyle">Proof of Delivery (POD)</p>
            <div class="linebreak"></div>

            <p>Name:</p>
            <p>I.C.:</p>
            <p>Signature:</p>
            <br>
            <br>
        </div>

        <div class="linebreak"></div>
            <p class="headerstyle">Remark:</p>

        <div class="remark">
            <div class="waybill-remark">
                <img src="{{ asset('assets/images/waybill-remark.png') }}" alt="Remark" class="img-fluid logo">
            </div>
                <p>Thank You for Your Support!</p>
                <p>Reach out to us at <a href="mailto:sales@arkod.com.my">sales@arkod.com.my</a> or call +6080-9116168 if you need additional assistance.</p>
        </div>
    </div>
</body>

