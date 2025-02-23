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
                            Staff Home
                        </h1>
                        @include('partialsv3.flash')




                        <div class="card shadow border border-success">


                        </div>


                        <div class="row gy-4">

                            <div class="col-lg-9">
                                <!-- Widgets Start -->


                                <div class="container">
                                    <div class="page-inner">
                                        <!-- Card -->

                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
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
                                            <div class="col-sm-6 col-md-3">
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
                                            <div class="col-sm-6 col-md-3">
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
                                            <div class="col-sm-6 col-md-3">
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
                                </div>


                                <!-- Widgets End -->


                            </div>


                            <div class="col-lg-3">
                                <!-- Calendar Start -->
                                <!-- Calendar Start -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="calendar">
                                            <div class="calendar__header">
                                                <button type="button" class="calendar__arrow left"><i
                                                        class="ph ph-caret-left"></i></button>
                                                <p class="display h6 mb-0"></p>
                                                <button type="button" class="calendar__arrow right"><i
                                                        class="ph ph-caret-right"></i></button>
                                            </div>

                                            <div class="calendar__week week">
                                                <div class="calendar__week-text">Su</div>
                                                <div class="calendar__week-text">Mo</div>
                                                <div class="calendar__week-text">Tu</div>
                                                <div class="calendar__week-text">We</div>
                                                <div class="calendar__week-text">Th</div>
                                                <div class="calendar__week-text">Fr</div>
                                                <div class="calendar__week-text">Sa</div>
                                            </div>

                                            <div class="days"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Calendar End -->

                                <!-- Calendar End -->



                            </div>

                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card shadow border border-success p-3">
                                        <canvas id="applicantChart" class="w-100 h-auto" width="180" height="180"></canvas>
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

 <script>
let currentMonth = new Date().getMonth(); // Current month (0-11)
let currentYear = new Date().getFullYear(); // Current year (e.g., 2025)
let currentDay = new Date().getDate(); // Current day of the month (1-31)

function updateCalendar() {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const daysInWeek = 7;

    // Display the current month and year
    document.querySelector('.calendar__header .display').innerHTML = `${monthNames[currentMonth]} ${currentYear}`;

    // Get the first day of the month and total days in the month
    const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // Get the first day of the month
    const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate(); // Total days in the month

    // Clear previous days
    const daysContainer = document.querySelector('.days');
    daysContainer.innerHTML = '';

    // Add empty cells before the first day of the month
    for (let i = 0; i < firstDay; i++) {
        daysContainer.innerHTML += `<div class="calendar__day empty"></div>`;
    }

    // Add the actual days of the month
    for (let i = 1; i <= totalDays; i++) {
        const isToday = (i === currentDay) ? 'today' : '';
        const dayOfWeek = new Date(currentYear, currentMonth, i).getDay();
        const isSaturday = (dayOfWeek === 6) ? 'saturday' : ''; // Saturday
        const isSunday = (dayOfWeek === 0) ? 'sunday' : ''; // Sunday

        // Add the day to the calendar
        daysContainer.innerHTML += `<div class="calendar__day ${isToday} ${isSaturday} ${isSunday}">${i}</div>`;
    }

    // Add empty cells after the last day of the month
    const remainingDays = (daysInWeek - (firstDay + totalDays) % daysInWeek) % daysInWeek;
    for (let i = 0; i < remainingDays; i++) {
        daysContainer.innerHTML += `<div class="calendar__day empty"></div>`;
    }
}

// Navigate to the previous month
document.querySelector('.calendar__arrow.left').addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    updateCalendar();
});

// Navigate to the next month
document.querySelector('.calendar__arrow.right').addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    updateCalendar();
});

// Initialize the calendar
window.onload = updateCalendar;

</script>
@endsection
