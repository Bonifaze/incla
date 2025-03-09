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
                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Staff Home
                    </h1>
                    @include('partialsv3.flash')

                    <div class="card shadow border border-success"></div>

                    <div class="row gy-4">
                        <!-- Widgets Start -->
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- Applicants Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Applicants</p>
                                                        <h4 class="card-title">{{ $totalApplicants }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-warning card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pending</p>
                                                        <h4 class="card-title">{{ $totalRecommended }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Approved Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Approved</p>
                                                        <h4 class="card-title">{{ $totalApproved }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Students Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-secondary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="far fa-check-circle"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Students</p>
                                                        <h4 class="card-title">{{ $totalStudents }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Widgets End -->
                    </div>
 <canvas id="applicantChart" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('applicantChart').getContext('2d');
        var applicantChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Certificate', 'Licentiate', 'Diploma'],
                datasets: [{
                    data: [{{ $certificateCount }}, {{ $licentiateCount }}, {{ $diplomaCount }}],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56'],
                    hoverBackgroundColor: ['#ff4569', '#1e90ff', '#ffb200']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
                    {{-- <div class="container">
                        <div class="row justify-content-center">
                            <!-- Pie Chart for Students Analytics -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card shadow border border-success p-3">
                                    <h5 class="card-title text-center mb-4">Students Analytics (Pie Chart)</h5>
                                    <canvas id="studentPieChart" class="w-100 h-auto" width="180" height="180"></canvas>
                                </div>
                            </div>

                            <!-- Bar Chart for Applicant Analytics -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card shadow border border-success p-3">
                                    <h5 class="card-title text-center mb-4">Applicant Analytics (Bar Chart)</h5>
                                    <canvas id="applicantBarChart" class="w-100 h-auto" width="180" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

    </div>
@endsection

@section('pagescript')
    {{-- <script>
       var ctxPie = document.getElementById('studentPieChart').getContext('2d');
var studentPieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Approved', 'Pending', 'Rejected'],  // Example labels
        datasets: [{
            label: 'Student Analytics',
            data: [12, 5, 3],  // Example data
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
        }]
    }
});

var ctxBar = document.getElementById('applicantBarChart').getContext('2d');
var applicantBarChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March'],  // Example labels
        datasets: [{
            label: 'Applicants Over Time',
            data: [10, 20, 30],  // Example data
            backgroundColor: '#36A2EB',
        }]
    }
});

    </script> --}}

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
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>


@endsection
