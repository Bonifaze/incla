@php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp
@extends('layouts.app')

@section('content')


<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid ">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 text-success fw-bold text-capitalize"> {{ $fullName }} Admininstrator Dashboard</h1>
                <br>

            </div>

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card m-3 shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success mb-3">DE Applicants Payments</h6>
                            <hr class="sidebar-divider">
                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <hr class="sidebar-divider">
                                <form action="/adminDeFilter" method="POST">
                                    @csrf
                                    <label for="start"><b class="text-success">Apllied From:</b></label>
                                    <input type="date" id="start" name="start_date" value="" class="mr-5 rounded">
                                    <input type="hidden" name="applicant_type" value="DE">
                                    <label for="start"><b class="text-success">To:</b></label>
                                    <input type="date" id="start" name="end_date" value="" class="mr-5 rounded">
                                    <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                </form>
                                <hr class="sidebar-divider">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <!--  <th>Passort</th> -->
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>RRR</th>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                            <th>Transaction Date</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($dePayments as $deApplicant)

                                        <tr>
                                          <td>{{$deApplicant -> first_name}}</td>
                                            <td>{{$deApplicant -> surname}}</td>
                                            <td>{{$deApplicant -> phone}}</td>
                                            <td>{{$deApplicant -> rrr}}</td>
                                            <td>{{$deApplicant -> fee_type}}</td>
                                            <td>{{$deApplicant -> amount}}</td>
                                            <td>{{$deApplicant -> transaction_date}}</td>
                                            <td><a href="/adminView/{{$deApplicant -> applicant_type}}/{{urlencode(base64_encode($deApplicant -> id))}}" class="btn btn-primary border mt-2">View </a></td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        @include('layouts.footer')

    </div>

</div>
<!-- End of Content Wrapper -->

@endsection