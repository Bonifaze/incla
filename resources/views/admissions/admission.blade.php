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

            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                         @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success">Admission Status : {{ $status }}</h6>
                            <div class="dropdown no-arrow">

                                {!! $status=="Successful"?'
                                       <a href="/letter" class="btn btn-success mt-3"> <i class=" fas fa-envelope fa-sm text-white-50 p-2"></i>Print Addmission Letter</a>

                                ':'' !!}


                            </div>

                        </div>

                        <div class="font-weight-bold text-primary">
                            <div class="dropdown no-arrow">



                                {{--  {!! $status=="Successful"?'
                                <form action="" method="POST" onsubmit="event.preventDefault();" class="p-5">
                                    <div class="form-group container-fluid mt-5 p-5 border border-success shadow shadow-lg rounded text-success rounded-lg">
                                        @csrf
                                        Congratulation you have been offerred provisional admission into INCLA <br>



                                    </div>
                                </form>':' ' !!}  --}}

                                @if ($status=="Successful")
 <div class="form-group container-fluid mt-5 p-5 border border-success shadow shadow-lg rounded text-success rounded-lg">

                                        Congratulation you have been offerred provisional admission into INCLA <br>

                                  <form method="POST" action="/admissions/students/store" enctype="multipart/form-data" class="p-3">
                            @csrf






                                      {!! Form::hidden('program_id', $applicantsDetails->program_id, [


                                            'id' => 'program_id',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}
                                            {!! Form::hidden('title', $applicantsDetails->title, [


                                                    'id' => 'title',
                                                    'name' => 'title',
                                                    'required' => 'required',
                                                ]) !!}

                                                 {!! Form::hidden('mode_of_entry', $applicantsDetails->admission_type, [



                                                    'name' => 'mode_of_entry',
                                                    'required' => 'required',
                                                ]) !!}


                                        {!! Form::hidden('surname', $applicantsDetails->surname, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'surname',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}




                                        {!! Form::hidden('first_name', $applicantsDetails->first_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'first_name',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}

                                        {!! Form::hidden('middle_name', $applicantsDetails->middle_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'middle_name',
                                            'readonly',
                                        ]) !!}



                                    {!! Form::hidden('gender', $applicantsDetails->gender, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'middle_name',
                                        'readonly',
                                    ]) !!}



                                    {!! Form::hidden('phone', $applicantsDetails->phone, [
                                        'placeholder' => '080xxxxx',
                                        'class' => 'form-control',
                                        'id' => 'phone',
                                        'name' => 'phone',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::hidden('dob', $applicantsDetails->dob, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'dob',
                                        'name' => 'dob',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::hidden('email', $applicantsDetails->email, [
                                        'placeholder' => 'john@doe.com',
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'name' => 'email',
                                        'readonly',
                                    ]) !!}





                                    {!! Form::hidden('state', $applicantsDetails->state_origin, [
                                        'placeholder' => 'Imo',
                                        'class' => 'form-control',
                                        'id' => 'state',
                                        'name' => 'state',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}


                                    {!! Form::hidden('lga_name', $applicantsDetails->lga, [
                                        'placeholder' => 'Ahiazu-Mbaise',
                                        'class' => 'form-control',
                                        'id' => 'lga_name',
                                        'name' => 'lga_name',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                    {!! Form::hidden('address', $applicantsDetails->address, [
                                        'placeholder' => '',
                                        'rows' => '3',
                                        'class' => 'form-control',
                                        'id' => 'address',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                {!! Form::hidden('esurname', $applicantsDetails->sponsor_surname, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'esurname',
                                    'required' => 'required',
                                ]) !!}
                                 {!! Form::hidden('eother_names', $applicantsDetails->sponsor_othername, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'eothername',
                                    'required' => 'required',
                                ]) !!}




                                {!! Form::hidden('eemail', $applicantsDetails->sponsors_email, [
                                    'placeholder' => 'john@doe.com',
                                    'class' => 'form-control',
                                    'id' => 'eemail',
                                    'name' => 'eemail',
                                    'readonly',
                                ]) !!}

                                {!! Form::hidden('ephone', $applicantsDetails->sponsors_phone, [
                                    'placeholder' => '080xxxxx',
                                    'class' => 'form-control',
                                    'id' => 'ephone',
                                    'name' => 'ephone',
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}

                                {!! Form::hidden('eaddress', $applicantsDetails->sponsors_address, [
                                    'placeholder' => '',
                                    'rows' => '4',
                                    'class' => 'form-control',
                                    'id' => 'eaddress',
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}




                                    {!! Form::hidden('serial_no', 0, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::hidden('mode_of_study', 'Full Time', [
                                        'placeholder' => '',
                                        'rows' => '4',
                                        'class' => 'form-control',
                                        'id' => 'eaddress',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                        {!! Form::hidden('entry_session_id', $sessions, [
                                            'placeholder' => '',
                                            'rows' => '4',
                                            'class' => 'form-control',
                                            'id' => 'entry_session_id',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}

                                    {!! Form::hidden('blood_group', $applicantsDetails->blood_group, [
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}

                                   {!! Form::hidden('genotype', $applicantsDetails->genotype, [
                                    'placeholder' => '',

                                    'required' => 'required',
                                    'readonly',
                                ]) !!}

                                  <div class="position-relative mt-5">
                                    <button type="submit" class="btn btn-success " data-bs-toggle="modal"
                                        data-bs-target="#myModal"><i class="fas fa-cogs"></i>
                                        {{ __('Generate Matric Number') }}</button>
                                    {{--  <button type="submit" onclick="deleteCourse()" class="btn btn-success position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#myModal">{{ __('Generate Matric Number') }}</button>  --}}
                                </div>

            {!! Form::close() !!}
            </div>
            @else

                                @endif


                            </div>


                        </div>
                    </div>
                </div>
            </div>

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
                                                    <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,{{ $utm->passport }}" alt="Applicant Passport" style="height: 180px; width: 200px;">
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
                                                <div class="item-data">{{$utm -> lga}}</div>
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


{{-- 
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Handle "Generate Matric Number" button click
    var generateMatricButton = document.querySelector('.btn.btn-success[data-bs-toggle="modal"]');
    
    generateMatricButton.addEventListener('click', function(event) {
        var button = event.target.closest('button'); // Ensure we're getting the button itself
        var icon = button.querySelector('i');
        var text = button.querySelector('span') || button; // If there's a <span> inside, use it; otherwise use the button text directly
        
        // Disable the button to prevent multiple clicks
        button.disabled = true;  // Disable button to prevent further clicks

        // Change the icon to a spinner
        icon.classList.remove('fas', 'fa-cogs');
        icon.classList.add('fas', 'fa-spinner', 'fa-spin'); // Adding spinner icon

        // Change text to "Processing..."
        text.innerHTML = 'Processing...';

        // Simulate a delay or action (replace with actual action)
        setTimeout(function() {
            // Re-enable the button after action is complete
            button.disabled = false; // Re-enable button
            
            // Reset the icon back to original
            icon.classList.remove('fas', 'fa-spinner', 'fa-spin');
            icon.classList.add('fas', 'fa-cogs'); // Reset icon to original

            // Reset the button text back to its original state
            text.innerHTML = '{{ __('Generate Matric Number') }}'; // Reset text (based on your server-side template)
        }, 3000); // Simulate 3 seconds delay (replace with actual action)
    });
    
    // Handle "Print Admission Letter" anchor tag click
    var printLetterLink = document.querySelector('.btn.btn-success.mt-3');

    printLetterLink.addEventListener('click', function(event) {
        var link = event.target.closest('a'); // Ensure we're getting the anchor tag itself
        var icon = link.querySelector('i');
        var text = link.querySelector('span') || link; // If there's a <span> inside, use it; otherwise use the link text directly

        // Disable the link to prevent multiple clicks
        link.style.pointerEvents = 'none';  // Disable link click

        // Change the icon to a spinner
        icon.classList.remove('fas', 'fa-envelope');
        icon.classList.add('fas', 'fa-spinner', 'fa-spin'); // Adding spinner icon

        // Change text to "Processing..."
        text.innerHTML = 'Processing...';

        // Simulate a delay (replace with actual navigation or action)
        setTimeout(function() {
            // Re-enable the link after action is complete
            link.style.pointerEvents = 'auto';  // Re-enable link click

            // Reset the icon back to original
            icon.classList.remove('fas', 'fa-spinner', 'fa-spin');
            icon.classList.add('fas', 'fa-envelope'); // Reset icon to original

            // Reset the link text back to its original state
            text.innerHTML = 'Print Admission Letter'; // Reset text
        }, 3000); // Simulate 3 seconds delay (replace with real action, such as navigating to /letter)
    });
});

</script> --}}
</body>
@endsection
