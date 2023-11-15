@extends('layouts.student')



@section('pagetitle')
    Evaluation
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open')
    menu-open
@endsection

@section('course')
    active
@endsection

<!-- Page -->
@section('evaluation')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Students Evaluation of Staff
                    </h1>

                    <div class="card">
                        <div class="table-responsive">

                            @include('partialsv3.flash')
                            <h5 class="p-3">
                                Students must complete previous semester course evaluation before the current semester
                                course registration can be enabled.
                            </h5>
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>

                                        <th>#</th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Level</th>
                                        <th>Credit</th>
                                        <th>Action</th>

                                    </thead>
                                    <tbody>

                                        @foreach ($results as $key => $result)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $result->programCourse->course->code }}</td>
                                                <td>{{ $result->programCourse->course->title }}</td>
                                                <td>{{ $result->programCourse->level }}</td>
                                                <td>{{ $result->programCourse->hours }}</td>
                                                <td>
                                                    {!! $result->evaluated() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
