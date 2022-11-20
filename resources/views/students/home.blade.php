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
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Dashboard
                    </h1>
                    <div class="card shadow border border-success">

                        <div class="row p-5">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('student.course-registration') }}"
                                                        class="text-success @yield('registration')">Course Registration</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-tasks fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <a class="" href="/students/remita/feestype">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-3">
                                                    <div class="h4 text-success" style="text-decoration: underline;">
                                                        <a href="/students/remita/feestype" class="text-success">Generate
                                                            Remita</a>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-credit-card fa-3x text-success"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        {{--  <div class="card-header">
                            <h3 class="card-title"> Home</h3>
                        </div>  --}}

                        {{--  <div class="table-responsive">

                            @include('partialsv3.flash')

                            @if ($student->debt)
                                <h1> Remita payment is now available. <a class="btn btn-info"
                                        href="{{ route('student.remita') }}"> Start here </a></h1>
                                <h3> Outstanding fees as at 29th May 2022 : &#8358;{{ $student->debt->debt }}</h3>
                                <h4>If the debt above is not correct, kindly call Bursary immediately.<br />
                                    Call Bursary on {{ config('app.BURSARY_PHONE') }}</h4>
                                <br />
                            @else
                                <h3>
                                    No Financial information found.
                                </h3>
                            @endif

                        </div>  --}}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
