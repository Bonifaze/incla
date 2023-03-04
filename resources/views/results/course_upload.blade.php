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
                        Staff Courses
                    </h1>

                    <div class="card shadow border border-success">


                      <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    {{--  <h4 class="card-title">
                                        Staff Course
                                    </h4>  --}}
                                    <div class="table-responsive mt-5">
                                        <table class="table table-bordered table-striped table-hover tbl">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                     <th>Course Code</th>
                                                    <th>Course Title</th>
                                                   
                                                    <th>Total Students</th>
                                                    <th>Upload Status</th>
                                                    <th>HOD's Approval</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staff_courses as $staff_course)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $staff_course->course_code }}</td>
                                                        <td>{{ $staff_course->course_title }}</td>
                                                        <th>{{ $staff_course->total_students }}</th>
                                                        <td>{{ $staff_course->upload_status }}</td>
                                                        <td>{{ $staff_course->hod_approval }}</td>
                                                        <td>@if ($staff_course->hod_approval != 'approved') <a href="{{ route('admin.scores_upload', $staff_course->id) }}"
                                                                class="btn btn-primary">Upload Scores</a> @else No Action @endif</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
@endsection
