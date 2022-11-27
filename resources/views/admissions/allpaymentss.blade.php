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
        <div class="container-fluid ">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 text-success fw-bold text-capitalize"> {{ $fullName }}: Admininstrator Dashboard</h1> <br>
            </div>


            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">

                    <!-- Card Header - Dropdown -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">All Payments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

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
