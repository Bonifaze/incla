@extends('layouts.adminsials')

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
            <div class="row">
                <div class="col-xl-8 col-md-12">
                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Dashboard
                    </h1>

                    <div class="card shadow border border-success">
                        <div class="row p-5">
                            @foreach ($admissiontype as $key => $session)
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="{{ $session->route }}" class="text-success @yield('registration')">{{ $session->name }}</a>
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
                        </div>
                    </div>
                </div>

                <!-- Right column (Custom Calendar) -->
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar">
                                <div class="calendar__header">
                                    <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                                    <p class="display h6 mb-0" id="calendar-month">January 2025</p>
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
                                <div class="days" id="calendar-days"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Calendar JavaScript -->
    <script>
        // Liturgical events for the calendar (example for January)
        const liturgicalEvents = {
            '2025-01-01': ['Feast of the Solemnity of Mary, Mother of God'],
            '2025-01-06': ['Epiphany of the Lord'],
            '2025-01-25': ['Conversion of Saint Paul'],
            // Add more events here...
        };

        let display = document.querySelector(".display");
        let days = document.querySelector(".days");
        let previous = document.querySelector(".left");
        let next = document.querySelector(".right");

        let date = new Date();

        let year = date.getFullYear();
        let month = date.getMonth();

        // Function to display the calendar with liturgical events
        function displayCalendar() {
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const firstDayIndex = firstDay.getDay();
            const numberOfDays = lastDay.getDate();

            let formattedDate = date.toLocaleString("en-US", {
                month: "long",
                year: "numeric"
            });
            display.innerHTML = `${formattedDate}`;

            // Clear previous days
            days.innerHTML = '';

            // Add empty days for the first row
            for (let x = 1; x <= firstDayIndex; x++) {
                const div = document.createElement("div");
                div.innerHTML += "";
                days.appendChild(div);
            }

            // Add the actual days of the month
            for (let i = 1; i <= numberOfDays; i++) {
                let div = document.createElement("div");
                let currentDate = new Date(year, month, i);
                div.dataset.date = currentDate.toDateString();
                div.innerHTML += i;

                // Add liturgical event class if there's an event for that day
                const eventKey = currentDate.toISOString().split('T')[0]; // Format to YYYY-MM-DD
                if (liturgicalEvents[eventKey]) {
                    div.classList.add('event-day');
                    div.title = liturgicalEvents[eventKey].join(', '); // Show events on hover
                }

                // Highlight current date
                if (
                    currentDate.getFullYear() === new Date().getFullYear() &&
                    currentDate.getMonth() === new Date().getMonth() &&
                    currentDate.getDate() === new Date().getDate()
                ) {
                    div.classList.add("current-date");
                }

                days.appendChild(div);
            }
        }

        // Navigate to previous month
        previous.addEventListener("click", () => {
            if (month === 0) {
                month = 11;
                year -= 1;
            } else {
                month -= 1;
            }
            date.setMonth(month);
            displayCalendar();
        });

        // Navigate to next month
        next.addEventListener("click", () => {
            if (month === 11) {
                month = 0;
                year += 1;
            } else {
                month += 1;
            }
            date.setMonth(month);
            displayCalendar();
        });

        // Initial render
        displayCalendar();
    </script>

    <!-- Additional Styles for Calendar -->
    <style>
        .calendar {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .calendar__header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .calendar__arrow {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .calendar__week {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            width: 100%;
        }

        .calendar__week-text {
            text-align: center;
            font-weight: bold;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            width: 100%;
            margin-top: 10px;
        }

        .calendar__day {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
            cursor: pointer;
        }

        .calendar__day:hover {
            background-color: #ccc;
        }

        /* Highlight current date */
        .current-date {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }

        /* Highlight days with events */
        .event-day {
            background-color: #ffeb3b;
        }

        /* Tooltip for liturgical events */
        .event-day:hover {
            background-color: #ffcc00;
            color: black;
            cursor: pointer;
            opacity: 1;
        }


    </style>
</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
