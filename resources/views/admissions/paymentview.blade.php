@php

if(!session('userid'))
{

  header('location: /');
  exit;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container p-4">
{{--
    <form action="" method="POST" onsubmit="event.preventDefault();" class=" m-3 mb-5">
            @csrf
            <div class="form-group mt-1 p-3 shadow rounded">
                <label for="exampleFormControlSelect1" class="text-success fw-bold mb-2">All Fees Type</label>
                <select class="form-control" id="pmtype">
                    <option >Select Payment </option>
                <option  value="4430731">Application for UTME </option>
                <option value="4430731">Application for DE</option>
                <option value="4430731">Application for Transfer</option>
                <option value="4430731">Application for Post Graduate</option>
                <option value="4430731"> Acceptance for (UnderGraduate) </option>
                <option value="4430731"> Acceptance for (PostGraduate)</option>
                <option> Full Payment (100%)  </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel A-J - Full Payment (₦740000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel K - Full Payment (₦770000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel L - Full Payment (₦790000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel M - Full Payment (₦840000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Female Stanzal Hostel - Full Payment (₦770000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Female CICL Hostel - Full Payment (₦790000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students without hostel accommodation (PA Etos Female  Hostel & Religious) - Full Payment (₦610000) </option>

<option> Part Payment (50%)  </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel A-J – Part Payment (₦370000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel K - Part Payment (₦385000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel L - Part Payment (₦395000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel M - Part Payment (₦420000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Female Stanzal Hostel - Part Payment (₦385000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students in Female CICL Hostel - Part Payment (₦395000) </option>
<option value="4430731"> Faculty of Education - Management Sci - Humanities & Social Science students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦305000) </option>

<option> Full Payment (100%)  </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel A-J - Full Payment (₦1535000) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel K - Full Payment (₦1565000) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel L - Full Payment (₦1585000) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel M - Full Payment (₦1635000) </option>
<option value="4430731"> Nursing and Pharmacy Students in Female Stanzal Hostel - Full Payment (₦1565000) </option>
<option value="4430731"> Nursing and Pharmacy Students in Female CICL Hostel - Full Payment (₦1585000) </option>
<option value="4430731"> Nursing and Pharmacy Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1405000) </option>

<option> Part Payment (50%)  </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel A-J - Part Payment (₦767500) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel K - Part Payment (₦782500) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel L - Part Payment (₦792500) </option>
<option value="4430731"> Nursing and Pharmacy Students in Male Hostel M - Part Payment (₦817500) </option>
<option value="4430731"> Nursing and Pharmacy Students in Female Stanzal Hostel - Part Payment (₦782500) </option>
<option value="4430731"> Nursing and Pharmacy Students in Female CICL Hostel - Part Payment (₦792500) </option>
<option value="4430731"> Nursing and Pharmacy Students without hostel accommodation (PA Etos Female Hostel & Religious)  - Part Payment (₦702500) </option>

<option> Full Payment (100%)  </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel A-J - Full Payment (₦810000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel K - Full Payment (₦840000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel L - Full Payment (₦860000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel M - Full Payment (₦910000) </option>
<option value="4430731"> Natural and Applied Science Students in Female Stanzal Hostel - Full Payment (₦840000) </option>
<option value="4430731"> Natural and Applied Science Students in Female CICL Hostel - Full Payment (₦860000) </option>
<option value="4430731"> Natural and Applied Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦608000) </option>

<option> Part Payment (50%)  </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel A-J - Part Payment (₦405000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel K - Part Payment (₦420000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel L - Part Payment (₦430000) </option>
<option value="4430731"> Natural and Applied Science Students in Male Hostel M - Part Payment (₦455000) </option>
<option value="4430731"> Natural and Applied Science Students in Female Stanzal Hostel - Part Payment (₦420000) </option>
<option value="4430731"> Natural and Applied Science Students in Female CICL Hostel - Part Payment (₦430000) </option>
<option value="4430731"> Natural and Applied Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦340000) </option>

<option> Full Payment (100%)  </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel A-J - Full Payment (₦830000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel K - Full Payment (₦860000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel L - Full Payment (₦880000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel M - Full Payment (₦930000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Female Stanzal Hostel - Full Payment (₦860000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Female CICL Hostel - Full Payment (₦880000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦700000) </option>

<option> Part Payment (50%) (₦) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel A-J - Part Payment (₦415000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel K - Part Payment (₦430000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel L - Part Payment (₦440000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Male Hostel M - Part Payment (₦465000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Female Stanzal Hostel - Part Payment (₦430000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students in Female CICL Hostel - Part Payment (₦440000) </option>
<option value="4430731"> Faculty of Engineering and Software Engineering Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦350000) </option>

<option> Full Payment (100%) (₦) </option>
<option value="4430731"> Law Students in Male Hostel A-J - Full Payment (₦1490000) </option>
<option value="4430731"> Law Students in Male Hostel K - Full Payment (₦1520000) </option>
<option value="4430731"> Law Students in Male Hostel L - Full Payment (₦1540000) </option>
<option value="4430731"> Law Students in Male Hostel M - Full Payment (₦1590000) </option>
<option value="4430731"> Law Students in Female Stanzal Hostel - Full Payment (₦1520000) </option>
<option value="4430731"> Law Students Female CICL Hostel - Full Payment (₦1540000) </option>
<option value="4430731"> Law Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1360000) </option>

<option value="4430731"> Part Payment (100%) (₦) </option>
<option value="4430731"> Law Students in Male Hostel A-J - Part Payment (₦745000) </option>
<option value="4430731"> Law Students in Male Hostel K - Part Payment (₦760000) </option>
<option value="4430731"> Law Students in Male Hostel L - Part Payment (₦770000) </option>
<option value="4430731"> Law Students in Male Hostel M - Part Payment (₦795000) </option>
<option value="4430731"> Law Students in Female Stanzal Hostel - Part Payment (₦760000) </option>
<option value="4430731"> Law Students Female CICL Hostel - Part Payment (₦770000) </option>
<option value="4430731"> Law Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦680000) </option>

<option> Full Payment (100%) (₦) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel A-J - Full Payment (₦1165000) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel K - Full Payment (₦1195000) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel L - Full Payment (₦1215000) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel M - Full Payment (₦1265000) </option>
<option value="4430731"> Medical Lab Science Students in Female Stanzal Hostel - Full Payment (₦1195000) </option>
<option value="4430731"> Medical Lab Science Students Female CICL Hostel - Full Payment (₦1215000) </option>
<option value="4430731"> Medical Lab Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1035000) </option>

<option> Part Payment (50%)  </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel A-J - Part Payment (₦582500) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel K - Part Payment (₦597500) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel L - Part Payment (₦607500) </option>
<option value="4430731"> Medical Lab Science Students in Male Hostel M - Part Payment (₦632500) </option>
<option value="4430731"> Medical Lab Science Students in Female Stanzal Hostel - Part Payment (₦597500) </option>
<option value="4430731"> Medical Lab Science Students Female CICL Hostel - Part Payment (₦607500) </option>
<option value="4430731"> Medical Lab Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦517500) </option>

                </select>

                <button type="submit" onClick="getRRR()" class="btn btn-success mt-3" id="rrrbtn">Generate RRR</button>
            </div>

        </form>  --}}
        <div class="text-danger h1"><strong> Accomodation into Pa-Etos Female hostel, Male HOTEL L and Male HOSTEL K are currently unavaliable </strong></div> <br>
<div class="table-responsive">
        <table class="table table-hover shadow m-1 mb-5">

            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Remita RRR</th>
                    <th scope="col">Action</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Payment</th>
                    {{--  <th scope="col">Action</th>  --}}
                    {{--  <th scope="col">Verify</th>  --}}

                </tr>
            </thead>
            <tbody class="">
                @foreach ($viewpayment as $key => $utm )

                <tr >
                    <td>{{ $key+1 }}</td>
                    <td>{{ $utm->rrr }}</td>
                    <td>{!! $utm->status_code == '01'?'<a href="/receipt/'.$utm->rrr.'" button class="btn btn-success "><i class="fas fa-print text-white-50"></i> Print Receipt</a>':'
                        <form onsubmit="makePayment()" id="payment-form">
                                <div class="btn btn-success px-3"> <i class="fas fa-credit-card text-white-50"></i>
                                    <input type="hidden" class="form-control" id="js-rrr" value="'.$utm->rrr.'" name="rrr" />
                                    <input type="button" onclick="makePayment('.$utm->rrr.')" value="Pay" button class="btn btn-success"/>
                                </div>
                            </form>'!!}</td>
                    <td>{{ $utm->amount }}</td>
                    <td>{{ $utm->status }}</td>
                    <td>{{ $utm->fee_type }}</td>
                    <td>{{ \Carbon\Carbon::parse( $utm->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $utm->status_code == '01'?'PAID':'NOT PAID' }}
                    </td>
                    {{--  <td>{!! $utm->status_code == '01'?'<a href="/receipt/'.$utm->rrr.'" button class="btn btn-success "><i class="fas fa-print text-white-50"></i> Print Receipt</a>':'
                    <form onsubmit="makePayment()" id="payment-form">
                            <div class="btn btn-success px-3"> <i class="fas fa-credit-card text-white-50"></i>
                                <input type="hidden" class="form-control" id="js-rrr" value="'.$utm->rrr.'" name="rrr" />
                                <input type="button" onclick="makePayment('.$utm->rrr.')" value="Pay" button class="btn btn-success"/>
                            </div>
                        </form>'!!}</td>  --}}


                       {{--  <td> <div class="col-md-2 form-group">
                            {!! Form::open(['method' => 'Post', 'route' => 'student.remita-verify', 'id'=>'verifyRemita'.$utm->rrr]) !!}
                            {{ Form::hidden('remita_id', $utm->rrr) }}
                            <button type="submit" class="{{$$utm->rrr}} btn btn-outline-warning" > Verify Payment</button>
                            {!! Form::close() !!}
                        </div>
                    </td>  --}}
                    @endforeach
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
            var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value;
            var d = new Date();
            var orderId = d.getTime();
            var totalAmount = "10000";

            var apiHash = CryptoJS.SHA512(merchantId + serviceTypeId + orderId + totalAmount + apiKey);

            var data = new TextEncoder().encode(JSON.stringify({
                "serviceTypeId": serviceTypeId, // Where the error was
                "amount": totalAmount
                , "orderId": orderId
                , "payerName": "Infiniti System Enterprises"
                , "payerEmail": "dapo.apara@infinitisys.comg"
                , "payerPhone": "08023391777"
                , "description": "ACCPTANCE"
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
            var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value;
            var feeType = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].text;
            var d = new Date();
            var orderId = d.getTime();
            var totalAmount = "10000";
            var statuscode = remiObj.statuscode;
            var rrr = remiObj.RRR;
            var status = remiObj.status;

            var data = new TextEncoder().encode(JSON.stringify({
                "serviceTypeId": serviceTypeId, // Where the error was
                "amount": totalAmount
                , "orderId": orderId
                , "payerName": "Infiniti System Enterprises"
                , "payerEmail": "dapo.apara@infinitisys.comg"
                , "payerPhone": "08023391777"
                , "statuscode": statuscode
                , "rrr": rrr
                , "feeType": feeType
                , "status": status
                , "description": "UTME"
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
               key: "QzAwMDAzOTk0NDd8ODQzNDM3NzU2MHxjZTQ3ZDdiMGEzYTI3MGQ1MTBhZDRjZjc3Y2ZkNTMxZTU0YzEwMWViNDUyNDY3MDA1ODhjOTNiZGFmMzI3OWJkMzU4MThjYjRhNzQxOGY1YjFkMDMyYWZhMDA0NjJlMzliOGQxZjI5ZDRjYjA3YWMwNjMxZGMxOWE1Mjk5NDY2ZA=="
                , processRrr: true,

                extendedData: {
                    customFields: [{
                        name: "rrr"
                        , value: rrr //form.querySelector('input[name="rrr"]').value
                    }]
                }
                , onSuccess: function(response) {
                    console.log('callback Successful Response', response);
                    logPayment(response, rrr);
                }
                , onError: function(response) {
                    console.log('callback Error Response', response);
                }
                , onClose: function() {
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
                "statuscode": statuscode
                , "rrr": rrr
                , "status": status
                , "transaction_id": transaction_id
            , }));

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"></script>
    <script>

    </script>

</body>
</html>
@endsection
