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
        @include('layouts.usersidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content m-4">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h5 fw-bold mb-3"> <a href="/newPayment" class="text-success fw-bold"> </a> </h3>
                    </div>

                     <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Attention!!</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="col-12">
                                    <div class="card-body">
                                        <div class="row">

                                            <h1 class="text-danger p-5">Applications for UTME, Direct Entry and Transfer has been closed till further notice.</h1>

                                        </div>
                                    </div>
                                </div>

                                <!-- Content Row -->
                                <!-- /.container-fluid -->
                            </div>
                            <!-- End of Main Content -->
                        </div>
                        <!-- End of Content Wrapper -->
                    </div>

                    <!-- Content Row -->
                    <div class="row mt-5">
{{--
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="border-left-success shadow rounded-lg px-4 p-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s fw-bold text-success text-uppercase mb-4">
                                            UTME </div>
                                            <div class="h6 mb-0 text-gray-800"><a href="utme" class="text-success text-uppercase">click here</a> to continue your admission process</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="border-left-success shadow rounded-lg px-4 p-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s fw-bold text-success text-uppercase mb-4">
                                            DIRECT ENTRY </div>
                                        <div class="h6 mb-0 text-gray-800"><a href="de" class="text-success text-uppercase">click here</a> to continue your admission process</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="border-left-primary shadow rounded-lg px-4 p-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s fw-bold text-primary text-uppercase mb-4">
                                            TRANSFER </div>
                                        <div class="h6 mb-0 text-gray-800"><a href="transfers" class="text-primary text-uppercase">click here</a> to continue your admission process</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        --}}

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="border-left-warning shadow rounded-lg px-4 p-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-s fw-bold text-warning text-uppercase mb-4">
                                            POST GRADUATE </div>
                                        <div class="h6 mb-0 text-gray-800"><a href="pg" class="text-warning text-uppercase">click here</a> to continue your admission process</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>


@endsection
