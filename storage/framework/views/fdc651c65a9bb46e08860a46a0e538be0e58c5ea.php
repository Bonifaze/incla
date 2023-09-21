<?php $__env->startSection('pagetitle'); ?>
Home
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->
<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>
<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content">

        <?php if(session('signUpMsg')): ?>
        <?php echo session('signUpMsg'); ?>

        <?php endif; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                <title></title>
                <!-- CSS only -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

            </head>


            <form action="" method="POST" onsubmit="event.preventDefault();" class="p-5">
                <?php echo csrf_field(); ?>
                <div class="text-danger font-weight-bold text-justify">ANNOUNCEMENT: This is to inform all parents, guardians, sponsors and students that the PA Eto Hostel block is now filled up. You are therefore advised to make your choice of accommodation from other available options.</div>
                <div class="form-group container-fluid mt-5 p-5 border border-success shadow shadow-lg rounded rounded-lg">
                    <label for="exampleFormControlSelect1" class="text-success fw-bold mb-2">School Fee Type</label>

                    <select class="form-select" id="pmtype" onChange="update()">
                        <?php $__currentLoopData = $fee_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fee_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fee_types->provider_code); ?>, <?php echo e($fee_types->id); ?>" id="<?php echo e($fee_types->amount); ?>">

                            <?php echo e($fee_types->name); ?>

                        </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                    <input type="hidden" class="form-control mt-2" id="value" readonly>
                    <input type="hidden" class="form-control mt-2" id="provider_code" readonly>
                    <input type="hidden" class="form-control mt-2" id="fee_type_id" readonly>
                    <input type="text" class="form-control mt-2" id="id" readonly>
                    
                    <div class="form-floating mb-3 mt-3">
                        <input type="hidden" class="form-control" id="js-firstName" placeholder="<?php echo e($payment->first_name . ' ' . $payment->middle_name . ' ' . $payment->surname); ?>" value="<?php echo e($payment->first_name . ' ' . $payment->middle_name . ' ' . $payment->surname); ?>" name="firstName" readonly>
                        <label for="email"></label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="hidden" class="form-control" id="js-email" placeholder="<?php echo e($payment->email); ?>" value="<?php echo e($payment->email); ?>" name="email" readonly hidden>
                        <label for="email"></label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="hidden" class="form-control" id="js-phone" placeholder="<?php echo e($payment->phone); ?>" value="<?php echo e($payment->phone); ?>" name="email" readonly>
                        <label for="email"></label>
                    </div>
                    

                    
                    <!-- <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="js-amount" placeholder="Enter Amount" name="amount" readonly>
                            <label for="pwd">Amount</label>
                        </div> -->

                    <button type="submit" onClick="makePayment()" class="btn btn-success mt-3" id="rrrbtn">Generate RRR</button>
                </div>
            </form>

            <!-- JavaScript Bundle with Popper -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/http-client/4.3.1/http-client.min.js"></script>
            <script>
                function makePayment() {
                    // var http = require("https");
                    /*
                    document.getElementById("selectElementID");
                    var value=e.options[e.selectedIndex].value;// get selected option value
                    var text=e.options[e.selectedIndex].text;



                    */
                    //e.preventDefault();
                    var merchantId = "8434377560";
                    var apiKey = "154279";
                    //  var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].value;
                    var serviceTypeId = document.getElementById("provider_code").value;
                    var d = new Date();
                    var orderId = d.getTime();
                    //  var totalAmount = "10000";
                    var totalAmount = document.getElementById("id").value;
                    var name = document.getElementById("js-firstName").value;
                    var email = document.getElementById("js-email").value;
                    var phone = document.getElementById("js-phone").value;
                    var fee_type_id = document.getElementById("fee_type_id").value;
                    var apiHash = CryptoJS.SHA512(merchantId + serviceTypeId + orderId + totalAmount + apiKey);
                    //  console.log(apiHash);
                    //alert(apiHash);

                    // WARNING: For POST requests, body is set to null by browsers.
                    // var data = {
                    //     "serviceTypeId": merchantId,
                    //     "amount": totalAmount,
                    //     "orderId": orderId,
                    //     "payerName": "Infiniti System Enterprises",
                    //     "payerEmail": "dapo.apara@infinitisys.comg",
                    //     "payerPhone": "08023391777",
                    //     "description": "ACCPTANCE"
                    //     //"expiryDate": "05/09/2021"
                    // }

                    var data = new TextEncoder().encode(JSON.stringify({
                        "serviceTypeId": serviceTypeId, // Where the error was
                        "amount": totalAmount,
                        "orderId": orderId,
                        "payerName": name,
                        "payerEmail": email,
                        "payerPhone": phone,
                        "description": "VERITAS UNIVERSITY ABUJA FEE"
                        //"expiryDate": "05/09/2021"
                    }))

                    //  var url = "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit";

                    //  var demoUrl = "remitademo.net";
                    //  var liveUrl = "https://login.remita.net";

                    //Path
                    //var genRRRUrlPath = "/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit";

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
                    xhr.open("POST", "https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
                    // xhr.open("POST", "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit");
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.setRequestHeader("Authorization", 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash)

                    xhr.send(data);

                    //Request
                    // var options = {
                    //     host: demoUrl,
                    //     path: genRRRUrlPath,
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'Authorization': 'remitaConsumerKey=' + merchantId + ',remitaConsumerToken=' + apiHash
                    //     },
                    //     data: data
                    // };


                    //Response
                    // callback = function(response) {
                    //     var str = ''
                    //     response.on('error', function(error) {
                    //         console.log(error);
                    //     });

                    //     response.on('data', function(chunk) {
                    //         str += chunk;
                    //     });

                    //     response.on('end', function() {
                    //         alert(str);
                    //         var response = str.substr(7, 80);
                    //         console.log('response: ' + response);
                    //     });

                    // }

                    // var req = https.request(options, callback);
                    // req.write(data)
                    // req.end();
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
                    //    var serviceTypeId = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex]
                    //      .value;
                    var serviceTypeId = document.getElementById("provider_code").value;
                    var fee_type_id = document.getElementById("fee_type_id").value;
                    var feeType = document.getElementById("pmtype").options[document.getElementById("pmtype").selectedIndex].text;
                    var d = new Date();
                    var orderId = d.getTime();
                    //  var totalAmount = "10000";
                    var totalAmount = document.getElementById("id").value;
                    var statuscode = remiObj.statuscode;
                    var rrr = remiObj.RRR;
                    var status = remiObj.status;
                    //addedd
                    var name = document.getElementById("js-firstName").value;
                    var email = document.getElementById("js-email").value;
                    var phone = document.getElementById("js-phone").value;
                    //var fee_type_id = document.getElementById("fee_type_id").value;
                    var data = new TextEncoder().encode(JSON.stringify({
                        "serviceTypeId": serviceTypeId, // Where the error was
                        "amount": totalAmount,
                        "orderId": orderId,
                        "payerName": name,
                        "payerEmail": email,
                        "payerPhone": phone,
                        "statuscode": statuscode,
                        "rrr": rrr,
                        "feeType": feeType,
                        "fee_type_id": fee_type_id,
                        "status": status,
                        "description": "VERITAS UNIVERSITY ABUJA FEE"
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
            
            <script type="text/javascript">
                function update() {
                    var select = document.getElementById('pmtype');
                    var option = select.options[select.selectedIndex];
                    var valueOne = $('#pmtype').val().split(',')[0];
                    var valueTwo = $('#pmtype').val().split(',')[1];

                    document.getElementById('provider_code').value = valueOne
                    document.getElementById('fee_type_id').value = valueTwo
                    document.getElementById('value').value = option.value;
                    document.getElementById('id').value = option.id;

                }

                update();
            </script>

        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/schoolfeespayment.blade.php ENDPATH**/ ?>