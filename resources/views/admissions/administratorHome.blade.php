{{--  @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <!-- Content Row -->
            <div class="row p-5 rounded shadow border border-success">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs h6 font-weight-bold text-success text-uppercase ">
                                        <a href="/adminutme" class="text-success">UTME Applicants</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-3">
                                    <div class="text-xs h6 font-weight-bold text-success text-uppercase ">
                                        <a href="/adminde" class="text-success">DE Applicants</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-3">
                                    <div class="text-xs h6 font-weight-bold text-success text-uppercase ">
                                        <a href="/admintransfer" class="text-success">Transfer Applicants</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-3">
                                    <div class="text-xs h6 font-weight-bold text-warning text-uppercase ">
                                        <a href="/adminpg" class="text-warning">PG Applicants</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    @endsection
