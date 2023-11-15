@extends('layouts.mini')



@section('pagetitle')
    Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-home')
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
                        Dashboard
                    </h1>
  @include("partialsv3.flash")
   {{--  <div class="h2 text-center">Course Registration ends in:  <span class="h2 text-danger font-weight-bold" id="demo"></span> </div>  --}}
                    
                    <div class="card shadow border border-success">

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="/admin/upload"
                                                        class="text-success @yield('staff-courses')">My Courses</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book-open fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-3">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="/admin/staffscoresresult" class="text-success @yield('staff-results')">My Results</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-book fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('student.search') }}"
                                                        class="text-success @yield('registration')">Search Student</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-search fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ route('staff.search') }}"
                                                        class="text-success @yield('registration')">Search Staff</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-search fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


    <script>
        // Set the date we're counting down to
var countDownDate = new Date("october 31, 2023 23:59:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection
