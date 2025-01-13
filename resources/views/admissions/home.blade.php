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
    
                <!-- Right column (Calendar) -->
                <div class="col-xl-4 col-md-12">
                    <div class="card shadow border border-success">
                        <div class="card-body">
                            <h4 class="text-center text-success">Event Calendar</h4>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FullCalendar JS and CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    
    <!-- FullCalendar Initialization Script -->
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [
                    {
                        title  : 'Sample Event 1',
                        start  : '2025-01-14',
                        description: 'This is a sample event.'
                    },
                    {
                        title  : 'Sample Event 2',
                        start  : '2025-01-16',
                        end    : '2025-01-18',
                        description: 'This is another event.'
                    },
                    // Add more events here as needed
                ],
                editable: true,  // Allow event dragging and resizing
                droppable: true, // Allow events to be dropped
                eventClick: function(event) {
                    alert('Event: ' + event.title);
                }
            });
        });
    </script>
    
</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection