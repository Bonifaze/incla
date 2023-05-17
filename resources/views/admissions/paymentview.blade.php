@php

    if (!session('userid')) {
        header('location: /');
        exit();
    }
@endphp
@extends('layouts.userapp')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.usersidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <title>Document</title>
                    <!-- CSS only -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
                        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
                        crossorigin="anonymous">

                </head>

                <body>
                    <div class="container p-4">
                        {{--
        <div class="text-danger h1"><strong> Accomodation into Pa-Etos Female hostel, Male HOTEL L and Male HOSTEL K are currently unavaliable </strong></div> <br>  --}}
                        <div class="table-responsive">
                            <table class="table table-hover shadow m-1 mb-5">

                                <thead></thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">RRR</th>
                                    <th colspan="2">Action</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                    {{--  <th scope="col">Payment</th>  --}}
                                    {{--  <th scope="col">Action</th>  --}}
                                    {{--  <th scope="col">Verify</th>  --}}

                                </tr>
                                </thead>
                                <tbody class="">
                                    @php
                                        $totalPaid = 0;
                                        $paidRRNs = [];
                                    @endphp
                                    @foreach ($viewpayment as $key => $utm)
                                        <tr></tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $utm->rrr }}</td>
                                        <td>{!! $utm->status_code == '01'
                                            ? '<a href="/receipt/' .
                                                $utm->rrr .
                                                '" button class="btn btn-success "><i class="fas fa-print text-white-50"></i> Print Receipt</a>'
                                            : '
                                                                                                 <form onsubmit="makePayment()" id="payment-form">
                                                                                               <div class="btn btn-success px-3"> <i class="fas fa-credit-card text-white-50"></i>
                                                                                              <input type="hidden" class="form-control" id="js-rrr" value="' .
                                                $utm->rrr .
                                                '" name="rrr" />
                                                                                                 <input type="button" onclick="makePayment(' .
                                                $utm->rrr .
                                                ')" value="Pay" button class="btn btn-success"/>
                                                                                         </div>
                                                                                         </form>' !!}
                                        </td>
                                        @if ($utm->status_code == '01')
                                            <td class="text-bold"> PAID </td>
                                            @php
                                                $totalPaid += $utm->amount;
                                                array_push($paidRRNs, $utm->rrr);
                                            @endphp
                                        @else
                                            <td> NOT PAID
                                                {!! Form::open(['method' => 'Post', 'route' => 'student.remita-verify', 'id' => 'verifyRemita' . $utm->id]) !!}
                                                {{ Form::hidden('remita_id', $utm->id) }}
                                                <button type="submit"
                                                    class=" {{ $utm->id }} btn btn-primary invisible">

                                                    Verify</button>
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                        <td>&#8358;{{ number_format($utm->amount, 2) }}</td>
                                        <td>{{ $utm->status }}</td>
                                        <td>{{ $utm->fee_type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($utm->created_at)->format('d/m/Y') }}</td>
                                        {{--  <td>{{ $utm->status_code == '01' ? 'PAID' : 'NOT PAID' }}  --}}
                                        </td>
                                         <td>  @if ($utm->status_code == '01')
                                                <td></td>
                                                 @else
                                                    <form
                                                        action="{{ route('remita.find-studentunpaidrrr.destroy', $utm->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#myModal"> <i
                                                                class="fas fa-solid fa-trash"  ></i> Delete</button>
                                                                 <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title bold">Are you sure you want to delete this RRR?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                       Please confirm that you are deleting the RRR and ensure that the payment status is not pending.
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn fw-bolder text-danger"
                                            data-bs-dismiss="modal">Go Back</button>
                                        <button type="submit" class="btn btn-success"
                                            data-bs-dismiss="modal">Proceed</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                                                    </form>
                                                </td>
                                                  @endif
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right text-bold">Total Paid Amount:</td>
                                        <td class="text-bold">&#8358;{{ number_format($totalPaid, 2) }}</td>
                                        {{--  <td>RRNs: {{ implode(', ', $paidRRNs) }}</td>  --}}
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <script type="text/javascript" src="https://login.remita.net/payment/v1/remita-pay-inline.bundle.js"></script>
                    </script>

                    <script>
                        //script to generate RRR
                        function getRRR() {
                            // var http = require("https");
                            /*
                            document.getElementById("selectElementID");
                            var value=e.options[e.selectedIndex].value;// get selected option value
                            var text=e.options[e.selectedIndex].text;



                            */
                            //e.preventDefault();
                            var merchantId = "2547916";
                            var apiKey = "1946";
                            var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex]
                                .value;
                            var d = new Date();
                            var orderId = d.getTime();
                            var totalAmount = "10000";

                            var apiHash = CryptoJS.SHA512(merchantId + serviceTypeId + orderId + totalAmount + apiKey);

                            var data = new TextEncoder().encode(JSON.stringify({
                                "serviceTypeId": serviceTypeId, // Where the error was
                                "amount": totalAmount,
                                "orderId": orderId,
                                "payerName": "Infiniti System Enterprises",
                                "payerEmail": "dapo.apara@infinitisys.comg",
                                "payerPhone": "08023391777",
                                "description": "ACCPTANCE"
                                //"expiryDate": "05/09/2021"
                            }))


                            var xhr = new XMLHttpRequest();
                            xhr.withCredentials = true;

                            xhr.addEventListener("readystatechange", function() {
                                if (this.readyState === 4 && this.status == 200) {
                                    // alert(this.responseText);
                                    console.log(this.responseText);
                                    //this.responseText;
                                    jsonp(this.responseText);
                                }
                            });
                            // xhr.open("POST", "https://login.remita.net/");
                            //xhr.open("POST", "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
                            xhr.open("POST", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
                            xhr.setRequestHeader("Content-Type", "application/json");
                            xhr.setRequestHeader("Authorization", 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash)

                            xhr.send(data);

                        }

                        //handling json from remita
                        function jsonp(remiJsonp) {
                            // var http = require("https");
                            remiJsonp = remiJsonp.replace("jsonp (", "").replace(")", "");
                            //alert(remiJsonp);
                            var remiObj = JSON.parse(remiJsonp);
                            // alert(remiObj.RRR);
                            //e.preventDefault();
                            var merchantId = "2547916";
                            var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex]
                                .value;
                            var feeType = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].text;
                            var d = new Date();
                            var orderId = d.getTime();
                            var totalAmount = "10000";
                            var statuscode = remiObj.statuscode;
                            var rrr = remiObj.RRR;
                            var status = remiObj.status;

                            var data = new TextEncoder().encode(JSON.stringify({
                                "serviceTypeId": serviceTypeId, // Where the error was
                                "amount": totalAmount,
                                "orderId": orderId,
                                "payerName": "Infiniti System Enterprises",
                                "payerEmail": "dapo.apara@infinitisys.comg",
                                "payerPhone": "08023391777",
                                "statuscode": statuscode,
                                "rrr": rrr,
                                "feeType": feeType,
                                "status": status,
                                "description": "UTME"
                                //"expiryDate": "05/09/2021"
                            }));

                            var xhr = new XMLHttpRequest();
                            xhr.withCredentials = true;

                            xhr.addEventListener("readystatechange", function() {
                                if (this.readyState === 4 && this.status == 200) {
                                    // alert(this.responseText);
                                    console.log(this.responseText);
                                    var jsonObj = JSON.parse(this.responseText);
                                    if (jsonObj.success) {
                                        window.location.replace(jsonObj.route + jsonObj.id);
                                    } else {
                                        alert(jsonObj.msg);
                                        window.location.replace(jsonObj.route);
                                    }

                                }
                            });
                            xhr.open("POST", "/payremi", true);
                            xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
                            //xhr.setRequestHeader("Authorization", 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash)

                            xhr.send(data);

                        }

                        //script to make payment
                        function makePayment(rrr) {
                            // var form = document.querySelector("#payment-form");
                            var paymentEngine = RmPaymentEngine.init({
                                key: "QzAwMDAzOTk0NDd8ODQzNDM3NzU2MHxjZTQ3ZDdiMGEzYTI3MGQ1MTBhZDRjZjc3Y2ZkNTMxZTU0YzEwMWViNDUyNDY3MDA1ODhjOTNiZGFmMzI3OWJkMzU4MThjYjRhNzQxOGY1YjFkMDMyYWZhMDA0NjJlMzliOGQxZjI5ZDRjYjA3YWMwNjMxZGMxOWE1Mjk5NDY2ZA==",
                                processRrr: true,

                                extendedData: {
                                    customFields: [{
                                        name: "rrr",
                                        value: rrr //form.querySelector('input[name="rrr"]').value
                                    }]
                                },
                                onSuccess: function(response) {
                                    console.log('callback Successful Response', response);
                                    logPayment(response, rrr);
                                },
                                onError: function(response) {
                                    console.log('callback Error Response', response);
                                },
                                onClose: function() {
                                    console.log("closed");
                                }
                            });
                            paymentEngine.showPaymentWidget();
                        }

                        //handle payment from remita
                        function logPayment(pmtJson, rrr) {
                            //  alert(pmtJson.paymentReference);
                            var pmtObj = pmtJson; //JSON.parse(pmtJson);

                            var orderRef = pmtObj.paymentReference;
                            var transaction_id = pmtObj.transactionId;
                            var statuscode = "01";
                            var rrr = rrr;
                            var status = "Payment Successful";

                            var data = new TextEncoder().encode(JSON.stringify({
                                "orderRef": orderRef, // Where the error was
                                "statuscode": statuscode,
                                "rrr": rrr,
                                "status": status,
                                "transaction_id": transaction_id,
                            }));

                            var xhr = new XMLHttpRequest();
                            xhr.withCredentials = true;

                            xhr.addEventListener("readystatechange", function() {
                                if (this.readyState === 4 && this.status == 200) {
                                    // alert(this.responseText);
                                    console.log(this.responseText);
                                    var jsonObj = JSON.parse(this.responseText);
                                    if (jsonObj.success) {
                                        window.location.replace(jsonObj.route + jsonObj.id);
                                    } else {
                                        // alert(jsonObj.msg);
                                        // window.location.replace(jsonObj.route);
                                        alert("An error occured while logging your payment, please contact Veritas Bursary");
                                    }

                                }
                            });
                            xhr.open("POST", "/logpay", true);
                            xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
                            //xhr.setRequestHeader("Authorization", 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash)

                            xhr.send(data);

                        }
                    </script>

                    <!-- JavaScript Bundle with Popper -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
                    </script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"></script>
                    <script></script>

                </body>

                </html>
            @endsection
