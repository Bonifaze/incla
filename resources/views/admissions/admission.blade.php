@php

if(!session('userid'))
{

header('location: /');
exit;
}
@endphp
@extends('layouts.userapp')

@section('content')
<div class="row justify-content-center">


    <!-- Page Wrapper -->
    <form>
        <div id="wrapper">
            @include('layouts.usersidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <body>
                        <!-- Main Content -->
                        <div id="content">

                            <!-- Begin Page Content -->
                            <div class="container-fluid">


                                <div class="row">

                                    <!-- Area Chart -->
                                    <div class="col-12">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-success">Admission Status : {{ $status }}</h6>
                                                 <div class="dropdown no-arrow">

                                                    {!! $status=="Successful"?' 
                                                    
                                                    ':'' !!}


                                                </div>

                                            </div>

                                            <div class="mt-3 m-0 p-3 font-weight-bold text-primary">
                                                <div class="dropdown no-arrow">

                                                    @php
                                                    $fees = array("UTME"=>80000, "DE"=>80000, "Transfer"=>80000, "PG"=>100000);
                                                    @endphp
                                                    @foreach ($admission as $utm )
                                                    <input type="hidden" class="form-control" id="js-firstName" placeholder="{{$utm->first_name." ".$utm->middle_name." ".$utm->surname }}" value="{{ $utm->first_name." ".$utm->middle_name." ".$utm->surname }}" name="firstName" readonly>
                                                    <input type="hidden" class="form-control" id="js-email" placeholder="{{$utm->email}}" value="{{$utm->email}}" name="email" readonly hidden>
                                                    <input type="hidden" class="form-control" id="js-phone" placeholder="{{$utm->phone}}" value="{{$utm->phone}}" name="email" readonly>
                                                    @endforeach
                                                    @foreach ($admission as $utm )
                                                    {!! $status=="Successful"?'
                                                    <form action="" method="POST" onsubmit="event.preventDefault();" class="p-5">
                                                        <div class="form-group container-fluid mt-5 p-5 border border-success shadow shadow-lg rounded text-success rounded-lg">
                                                            @csrf
                                                            Congratulation you have been offerred provisional admission into veritas univeristy kindly click the button to pay your acceptance fee<br>
                                                            <a href="acceptancepayment" class="btn btn-success mt-3"> <i class=" fa fa-credit-card fa-sm text-white-50 p-2"></i>Pay (₦'.$fees[$utm->applicant_type].')</a>


                                                        </div>
                                                    </form>':' ' !!}
                                                    @endforeach

                                                    {{-- <a href="paymentview/session("userid") class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-credit-card fa-sm text-white-50">  </i> Pay </a>  --}}
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
    </form>


    <!-- Pie Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Applicant Profile</h6>
                <div class="dropdown no-arrow">
                    <a href="/viewprofile" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-id-badge text-white-50"></i> Full Profile</a>

                </div>
            </div>
            <!-- Card Body -->


            @foreach ($admission as $utm )
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label mb-2">
                                            <strong>Photo</strong>
                                        </div>
                                        <div class="rounded-circle">
                                            <img class="rounded-circle p-3 mx-auto d-block" src="data:image/{{ $utm->passport_type }};base64,{{ base64_encode($utm->passport) }}" alt="Applicant Passport" style="height: 180px; width:200px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Surname</strong></div>
                                        <div class="item-data">{{$utm -> surname}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>First Name</strong></div>
                                        <div class="item-data">{{$utm -> first_name}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Other Name</strong></div>
                                        <div class="item-data">{{$utm -> middle_name}}</div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">{{$utm -> email}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Phone Number</strong></div>
                                        <div class="item-data">{{$utm -> phone}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Gender</strong></div>
                                        <div class="item-data">{{$utm -> gender}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Date of Birth</strong></div>
                                        <div class="item-data">{{$utm -> dob}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>State of Origin</strong></div>
                                        <div class="item-data">{{$utm -> state_origin}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Nationality</strong></div>
                                        <div class="item-data">{{$utm -> nationality}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"></script>
<script>
    function makePayment() {


        //e.preventDefault();
        var merchantId = "2547916";
        var apiKey = "1946";
        var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value;
        var d = new Date();
        var orderId = d.getTime();
        var totalAmount = document.getElementById("js-amount").value;

        var apiHash = CryptoJS.SHA512(merchantId + serviceTypeId + orderId + totalAmount + apiKey);


        var data = new TextEncoder().encode(JSON.stringify({
            "serviceTypeId": serviceTypeId, // Where the error was
            "amount": totalAmount,
            "orderId": orderId,
            "payerName": document.getElementById("js-firstName").value,
            "payerEmail": document.getElementById("js-email").value,
            "payerPhone": document.getElementById("js-phone").value,
            "description": document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value
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
        xhr.open("POST", "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("Authorization", 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash)

        xhr.send(data);

    }

    //handling json from remita
    function jsonp(remiJsonp) {
        // var http = require("https");
        remiJsonp = remiJsonp.replace("jsonp (", "").replace(")", "");
        alert(remiJsonp);
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
</script>
<script>
    $("#pmtype").change(function(e) {
        let narate = $("#pmtype").val();
        if (narate == "4430731") {
            $('#js-amount').val(4500);
        } else if (narate == "PG") {

            $('#js-amount').val(80000);
        }
    });
</script>
</body>
@endsection
