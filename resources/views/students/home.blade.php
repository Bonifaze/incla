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
                     @include('partialsv3.flash')
                    <div class="card shadow border border-success">

                        <div class="row p-5">
                           @foreach ($courseReg as $key => $session)
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                               <div class="h4 text-primary " style="text-decoration: underline;">
                                                       {{--  open course reg  --}}
                                                    {{--  <a href="{{ route('student.course-registration') }}"
                                                        class="text-success @yield('registration')">Course Registration</a>  --}}
                                                        {{--  close course reg  --}}
                                                      {{--    <a href="/student/studentsClearance"
                                                        class="text-success @yield('registration')">Semester Clearance</a>
                                                        --}}

                                                </div>
                                                <div class="h4 text-success mt-3" style="text-decoration: underline;">
                                                       {{--  open course reg  --}}
                                                    {{--  <a href="{{ route('student.course-registration') }}"
                                                        class="text-success @yield('registration')">Course Registration</a>  --}}
                                                        {{--  close course reg  --}}
                                                        <a href="{{ $session->route }}"
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
                                  @endforeach

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
                     <div class="card shadow border border-success">

                        <div class="row p-5">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                        <a href="{{ route('students.results') }}"
                                                        class="text-success @yield('results')">View Result</a>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-eye nav-icon fa-3x text-success"></i>
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
                                                        <a href="/students/remita/paymentview/{id}" class="text-success">View
                                                            Remita Payment</a>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-eye nav-icon fa-3x text-success"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Modal -->
     <!-- <div class="modal fade" id="reloadModal" tabindex="-1" role="dialog" aria-labelledby="reloadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger text-center font-weight-bold" id="reloadModalLabel">Important Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>
                        Dear Students,<br>
                        We'll be back soon!

We apologise for any inconvenience caused. We are currently upgrading our system to serve you better. During this period, the generation of RRR code for tuition fees payment via Remita will be temporarily unavailable. 

Do bear with us as we work diligently to minimize any disruption. 

For urgent inquiries, please reach out to the Veritas ICT support team at ictsupport@veritas.edu.ng and we will respond to you promptly.
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF THE Modal -->

@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


     <script>
        // Function to show the modal on page load
       // function showModalOnLoad() {
       //     $('#reloadModal').modal('show');
     //   }

        // Call the function when the page is ready
       // $(document).ready(function () {
      //      showModalOnLoad();
      // });
    </script>
@endsection
