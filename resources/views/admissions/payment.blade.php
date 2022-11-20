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
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->


                        <!-- Content Row -->
                        <div class="row">



                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="">
                                <div class="card shadow  mb-4">
                                    <!-- Card Header - Dropdown -->

                                    <div class="p-3 h5 mb-2 bg-primary fw-bold text-white">Remita Payment</div>
                                    {{-- <div class="form-floating mt-3 mb-3">
              <input type="button" onclick="makePayment()" value="Generate RRR" button class="btn btn-success p-3"/>
              </div>  --}}
                                    <h1 id=""></h1>
                                    <div class="container mt-3">
                                        {{-- <h2>Remita Checkout Demo</h2>
           <p>Try out our Payment Gateway</p>  --}}

                                        {{-- <form onsubmit="makePayment()" id="payment-form">  --}}
                                        <form method="POST" action="/payment">
                                            @csrf
                                            {{-- @foreach ($payment as $utm )
              <div class="form-floating mb-3 mt-3">
                 <input type="text" class="form-control" id="js-firstName" placeholder="{{$utm->surname}}"
                                            value="{{ $utm->surname}}"
                                            name="firstName" readonly>
                                            <label for="email">Surname</label>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="js-lastName" placeholder="{{$utm->first_name}}" value="{{$utm->first_name}}" name="lastName" readonly>
                                        <label for="email">First Name</label>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="js-email" placeholder="{{$utm->surname}}" value="{{$utm->email}}" name="email" readonly>
                                        <label for="email">Email</label>
                                    </div>
                                    @endforeach
                                    <div class="form-floating mt-3 mb-3">
                                        <select class="form-control" id="js-narration" name="narration">
                                            <option selected>Select Payment</option>
                                            <option value="UTME">UTME</option>
                                            <option value="Transfer">Transfer</option>
                                            <option value="DE">Direct Entry</option>
                                            <option value="PG">Post Graduate</option>
                                        </select> --}}

                                        {{-- <input type="text" class="form-control" id="js-narration" placeholder="Enter Narration" name="narration">  --}}
                                        {{-- <label for="pwd">Narration</label>  --}}
                                         </div>
              <div class="form-floating mt-3 mb-3">
                 <input type="text" class="form-control" id="js-amount" placeholder="Enter Amount" name="amount" readonly>
                 <label for="pwd">Amount</label>
              </div>
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="submit" value="Pay" button class="btn btn-success p-3" />
                                        </div>

                                        </form>
                                    </div>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->

                    </div>





                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        </div>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!--
<script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
@endsection
