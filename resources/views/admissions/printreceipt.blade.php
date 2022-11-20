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
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-success">Payment Receipt</h6>
                                        <div class="dropdown no-arrow">


                                            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Print Receipt</a>

                                        </div>

                                    </div>

                                    <div class="card mt-3">
                                        <ul class="list-group list-group-numbered">

                                        </ul>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                       <div class="p-3 mb-2 bg-primary text-white">Remita Payment</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-success">Applicant Profile</h6>
                                        <div class="dropdown no-arrow">


                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                        <div>
                                          <img class="rounded-circle" style="height:80px; width:80px;" alt="50x50" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" data-holder-rendered="true">
                                        </div>
                                           <div class="text-l font-weight-bold text-success text-uppercase mb-1 mt-3">
                                                     Name: </div>
                                           <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                     Phone: </div>
                                           <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                     Gender: </div>
                                           <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                     Date Of Birth: </div>
                                            <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                     State of Origin: </div>
                                            <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                                     Course of Study: </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        </div>

    </div>
    <!-- End of Content Wrapper -->

</div>

@endsection
