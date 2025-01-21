@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

<!-- Sidebar Links -->
<!-- Treeview -->
@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

<!-- Page -->
@section('home')
active
@endsection
<!-- End Sidebar links -->

@section('content')
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content">

        @if (session('signUpMsg'))
        {!! session('signUpMsg') !!}
        @endif
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="container mt-5">
    <!-- Admission Status Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Admission Status: <span class="font-weight-bold">{{ $status }}</span></h6>
                    <!-- Display the Pay Acceptance Fee button only if the status is Successful -->
                    @if($status == 'Successful')
                        <a href="acceptancepayment" class="btn btn-light btn-sm d-flex align-items-center">
                            <i class="fas fa-credit-card text-success me-2"></i> Pay Acceptance Fee
                        </a>
                    @endif
                </div>
                <div class="card-body text-center text-success">
                    <h5 class="font-weight-bold">Congratulations!</h5>
                    <p>You have been offered provisional admission into Veritas University. Kindly proceed to pay your acceptance fee of 
                        ₦{{ $acceptance_fee }}.</p>
                    @if($status == 'Successful')
                        <a href="acceptancepayment" class="btn btn-success mt-3">
                            <i class="fas fa-credit-card text-white-50 me-2"></i> Pay Acceptance Fee
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Applicant Profile Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Applicant Profile</h6>
                    <a href="/viewprofile" class="btn btn-light btn-sm d-flex align-items-center">
                        <i class="fas fa-id-badge text-primary me-2"></i> Full Profile
                    </a>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <!-- Left Column (Personal Information) -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm rounded-4">
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                        <!-- Applicant Photo -->
                                        <img src="data:image/jpeg;base64,{{ $applicant->passport }}" alt="Applicant Photo" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Full Name:</strong> {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->surname }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Surname:</strong> {{ $applicant->surname }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">First Name:</strong> {{ $applicant->first_name }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Other Name:</strong> {{ $applicant->middle_name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column (Contact & Demographic Info) -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm rounded-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong class="text-primary">Email:</strong> {{ $applicant->email }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Phone Number:</strong> {{ $applicant->phone }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Gender:</strong> {{ $applicant->gender }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Date of Birth:</strong> {{ $applicant->dob }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">State of Origin:</strong> {{ $applicant->state_origin }}
                                    </div>
                                    <div class="mb-3">
                                        <strong class="text-primary">Nationality:</strong> {{ $applicant->nationality }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


        </div>
    </section>

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
            "amount": totalAmount
            , "orderId": orderId
            , "payerName": document.getElementById("js-firstName").value
            , "payerEmail": document.getElementById("js-email").value
            , "payerPhone": document.getElementById("js-phone").value
            , "description": document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value
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
