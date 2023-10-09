@extends('layouts.student')



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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        View Remita Payment
                    </h1>




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
                                rel="stylesheet"
                                integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
                                crossorigin="anonymous">


                        </head>

                        <body>
                            <div class="container p-4">
                                @include('partialsv3.flash')
                                {{--  @if (session('signUpMsg'))
                                    {!! session('signUpMsg') !!}
                                @endif  --}}
                                {{--  @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        @foreach (json_decode(session('success'), true) as $key => $value)
            <p>{{ $key }}: {{ $value }}</p>
        @endforeach
    </div>
@endif  --}}

                                <div class="table-responsive">
                                 {!! $viewpayment->render() !!}
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
                                            <th>Action</th>
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
                                                    ? '<a href="/students/receipt/' .
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
                                                <td>
                                                    @if ($utm->status_code == '01')
                                                <td></td>
                                            @else
                                                <td>
                                                    <form
                                                        action="{{ route('studentremita.find-studentunpaidrrr.destroy', $utm->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#myModal"> <i class="fas fa-solid fa-trash"></i>
                                                            Delete</button>

                                                    </form>
                                                </td>
                                            @endif
                                            @endforeach
                                           </tr>
                                <thead></thead>
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="2">School Fee paid</th>
                                    <th colspan="2">School Fees Debt</th>
                                    <th colspan="2">Toal Paid Amount</th>
                                </tr>
                                </thead>
                            <tbody class="">
                                <tr>
                                <td colspan="3">
                                </td>
                                    {{--  <td colspan="3">
                                        @if ($balance === '<i class="fas fa-spinner fa-spin"></i>')
                                            <i class="fa fa-spinner fa-spin"></i>
                                        @else
                                            &#8358;{{ number_format($totalAmountPaid + (int) $balance, 2) }}
                                        @endif
                                    </td>  --}}
                                    <td colspan="2">₦{!! $totalAmountPaid != 0 ? $totalAmountPaid : html_entity_decode('<i class="fa fa-spinner fa-spin"></i>') !!}</td>
                                    <td colspan="2" class="text-bold">₦{!! html_entity_decode($balance) !!}</td>
                                    <td colspan="2" class="text-bold">&#8358;{{ number_format($totalPaid, 2) }}</td>
                                </tr>



                            </tbody>

                                    </table>

                                                     <div class="dropdown no-arrow  btn btn-sm btn-success shadow-sm">

                                        <a href="{{ route('student.feespayment') }}"
                                            class="nav-link @yield('results')">
                                            <i class="fa fa-plus nav-icon"></i> Generate RRR
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="modal" id="myModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title bold">Are you sure you want
                                                                            to delete this RRR?</h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        Please confirm that you are deleting the RRR and
                                                                        ensure that the payment status is not pending.
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn fw-bolder text-danger"
                                                                            data-bs-dismiss="modal">Go Back</button>
                                                                        <button type="submit" class="btn btn-success"
                                                                            data-bs-dismiss="modal">Proceed</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>  --}}
                            <script type="text/javascript" src="https://login.remita.net/payment/v1/remita-pay-inline.bundle.js"></script>
                            </script>

                            <script>
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
                                    xhr.open("POST", "/students/logpay", true);
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
                    </div>





                </div>
            </div>

    </div>
    </section>
    </div>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
