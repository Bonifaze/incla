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
                    Dashboard
                </h1>
                @include('partialsv3.flash')
                {{-- <div class="h2 text-center">Course Registration ends in:  <span class="h2 text-danger font-weight-bold" id="demo"></span> </div>  --}}

                @if ($work == 1)
                {{-- THIS SECTION FOR AUDIT   --}}
                <div class="card shadow border border-success" style="height: 400px; overflow-y: scroll;">
                    <div class="table-responsive card-body">
                        <div class="card-header">
                            <h6 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Department Result Audit System
                            </h6>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <th>S/N</th>

                                <th>Student </th>

                                <th>Course </th>
                                <th>session</th>
                                <th>Semester</th>
                                <th>Level</th>
                                <th>Old Score</th>
                                <th>New Score</th>
                                <th>Staff Name</th>
                                {{-- <th>Program</th>  --}}


                                <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach ($modify as $key => $audit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $audit->full_name }}({{ $audit->student->academic->mat_no ?? null }})
                                    </td>

                                    {{-- <td>{{ $audit->modifiedBy->full_name ?? null}}</td> --}}
                                    <td>{{ $audit->course->course_code }} ({{ $audit->course->course_title }})
                                    </td>
                                    <td>{{ $audit->sessions->name }}</td>
                                    @if ($audit->semester == 1)
                                    <td>First</td>
                                    @else
                                    <td>Second</td>
                                    @endif
                                    <td class="">{{ $audit->level }}</td>
                                    <td class="text-danger h4">{{ $audit->old_total ?? null }}</td>
                                    <td class="text-success h3">{{ $audit->total ?? null }}</td>
                                    <td>{{ $audit->staff->full_name ?? null }}</td>

                                    <td>{{ \Carbon\Carbon::parse($audit->updated_at)->format('l j, F Y H:i:s') }}
                                    </td>
                                </tr>
                                @endforeach
                                <a target="_blank" href="{{ route('rbac.auditviewall') }}" class="btn btn-primary mb-3 mt-3 float-right">View All Result Changes</a>
                            </tbody>
                            {!! $modify->render() !!}
                        </table>
                    </div>
                </div>
                @else
                <div></div>
                @endif
                {{-- END OF DEPARTMENT AUDIT   --}}

                <div class="card shadow border border-success">

                    <div class="row p-5">

                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-3">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 text-success" style="text-decoration: underline;">
                                                <a href="/admin/upload" class="text-success @yield('staff-courses')">My
                                                    Courses</a><br>
                                                {{-- <a href="/attendance" class="text-success @yield('staff-courses')">My
                                                        Attendace csv</a>

                                                        <a href="{{ route('students.exportCsv') }}" class="btn btn-primary">Export as CSV</a> --}}

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
                                                <a href="{{ route('student.search') }}" class="text-success @yield('registration')">Search Student</a>
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
                                                <a href="{{ route('staff.search') }}" class="text-success @yield('registration')">Search Staff</a>
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

                <div class="row gy-4">
                    <div class="col-lg-9">
                        <!-- Widgets Start -->
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                     <a href="/admin/upload" class="text-success @yield('staff-courses')">
                                    <div class="card-body">
                                        <h4 class="mb-2">5+</h4>
                                        <span class="text-gray-600">My Courses</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i class="ph-fill ph-book-open"></i></span>
                                            <div id="complete-course" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                     </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <a href="/admin/staffscoresresult" class="text-success @yield('staff-results')">
                                        <div class="card-body">
                                            <h4 class="mb-2">3+</h4>
                                            <span class="text-gray-600">My Results</span>
                                            <div class="flex-between gap-8 mt-16">
                                                <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i class="ph-fill ph-certificate"></i></span>
                                                <div id="earned-certificate" class="remove-tooltip-title rounded-tooltip-value"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{--  <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">25+</h4>
                                        <span class="text-gray-600">Course in Progress</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl"> <i class="ph-fill ph-graduation-cap"></i></span>
                                            <div id="course-progress" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">18k+</h4>
                                        <span class="text-gray-600">Community Support</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-warning-600 text-white text-2xl"><i class="ph-fill ph-users-three"></i></span>
                                            <div id="community-support" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                        <!-- Widgets End -->


                    </div>

                    <div class="col-lg-3">
                        <!-- Calendar Start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="calendar">
                                    <div class="calendar__header">
                                        <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                                        <p class="display h6 mb-0">""</p>
                                        <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
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
    function updateCalendar() {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const date = new Date();

        const currentMonth = date.getMonth(); // Current month (0-11)
        const currentYear = date.getFullYear(); // Current year (e.g., 2025)
        const currentDay = date.getDate(); // Current day of the month (1-31)

        // Display the current month and year in the calendar header
        document.querySelector('.calendar__header .display').innerHTML = `${monthNames[currentMonth]} ${currentYear}`;

        // Get the first day of the month and the total number of days in the month
        const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // Day of the week for the 1st of the month (0-6)
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate(); // Total days in the month

        // Generate the days of the month in the calendar
        const daysContainer = document.querySelector('.days');
        daysContainer.innerHTML = ''; // Clear any previous days

        // Create empty cells for the days before the first day of the month
        for (let i = 0; i < firstDay; i++) {
            daysContainer.innerHTML += `<div class="calendar__day empty"></div>`;
        }

        // Add the actual days of the month
        for (let i = 1; i <= totalDays; i++) {
            // Check if the day is the current day and add the 'today' class
            const isToday = i === currentDay ? 'today' : '';

            // Add the day to the calendar
            daysContainer.innerHTML += `<div class="calendar__day ${isToday}">${i}</div>`;
        }
    }

    // Call the updateCalendar function when the page loads
    window.onload = updateCalendar;

</script>
@endsection

