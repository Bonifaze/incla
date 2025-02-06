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

<style>
/* Hover effect for cards */
.hover-card:hover {
    transform: scale(1.05); /* Slightly enlarge the card */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add a shadow effect on hover */
}
</style>

@section('content')
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col_full">


                <h1 class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                    Welcome to InCLA Student Dashboard
                </h1>
                @include('partialsv3.flash')



                <div class="row">
                    <div class="col-sm-6 col-md-4">
                     <a href="{{ route('students.results') }}" class=" @yield('/')">
                        <div class="card card-stats card-round">
                            <div class="card-body hover-card shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Result</p>
                                            <h4 class="card-title">Result</h4>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                            <i class="fa fa-list fa-3x text-success "></i>
                                        </div>

                                </div>
                            </div>
                        </div>
                     </a>
                    </div>


                     @foreach ($courseReg as $key => $session)
                    <div class="col-sm-6 col-md-4">
                    <a href="{{ $session->route }}" class=" @yield('registration')">
                        <div class="card card-stats card-round hover-card shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Register Course</p>
                                            <h4 class="card-title">Register Course</h4>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                            <i class="fa fa-cog fa-spin fa-2x text-success "></i>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                     @endforeach

                    <div class="col-sm-6 col-md-4">
                         <a href="" class=" @yield('/')">
                        <div class="card card-stats card-round">
                            <div class="card-body hover-card shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="fas fa-luggage-cart"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Complain</p>
                                            <h4 class="card-title">Complain</h4>
                                        </div>
                                    </div>
                                     <div class="col-auto">
                                            <i class="fa fa-comments fa-3x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>


                 <div class="row row-card-no-pd">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Courses Offered</b></h6>
                                    </div>
                                    <h4 class="text-info fw-bold">{{ $totalCourses }}</h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    {{--  <p class="text-muted mb-0">Change</p>  --}}
                                    {{--  <p class="text-muted mb-0">100%</p>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Inprogress</b></h6>
                                    </div>
                                    <h4 class="text-success fw-bold">10</h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    {{--  <p class="text-muted mb-0"></p>  --}}
                                    {{--  <p class="text-muted mb-0">25%</p>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Passed</b></h6>
                                        {{--  <p class="text-muted">Failed</p>  --}}
                                    </div>
                                    <h4 class="text-danger fw-bold">{{ $passedCourses }}</h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    {{--  <p class="text-muted mb-0">Change</p>  --}}
                                    {{--  <p class="text-muted mb-0">50%</p>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Failed</b></h6>
                                        {{--  <p class="text-muted">Joined New User</p>  --}}
                                    </div>
                                    <h4 class="text-secondary fw-bold">{{ $failedCourses }}</h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    {{--  <p class="text-muted mb-0">Change</p>  --}}
                                    {{--  <p class="text-muted mb-0">25%</p>  --}}
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
