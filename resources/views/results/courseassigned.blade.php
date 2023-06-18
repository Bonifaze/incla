@extends('layouts.mini')



@section('pagetitle')
    Staff Courses
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
                        Staff Asdigned Courses
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
                                        <table class="table  table-striped table-hover tbl" id="dataTable" width="100%"
                                        cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                     <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Semester</th>
                                                    <th>Students</th>
                                                    <th>Student Program</th>
                                                    <th>Upload Status</th>
                                                    <th>HoD Approval</th>
                                                    <th>Action</th>
                                                     <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staff_courses as $staff_course)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                         <td>{{ $staff_course->staff_name }}</td>
                                                        <td>{{ $staff_course->staff_phone }}</td>
                                                        <td>{{ $staff_course->course_code }}</td>
                                                        <td>{{ $staff_course->course_title }}</td>
                                                          <td >
                                                          @if ($staff_course->semester==1)
                                                                First
                                                          @else
                                                                Second
                                                          @endif
                                                          </td>
                                                        <th>{{ $staff_course->total_students }}</th>
                                                        <th>{{ $staff_course->program->name ?? null }}</th>
                                                        <td>{{ $staff_course->upload_status }}</td>
                                                        <td>{{ $staff_course->hod_approval }}</td>
                                                        <td>@if ($staff_course->hod_approval != 'approved') <a href="{{ route('admin.scores_upload', $staff_course->id) }}"
                                                                class="btn btn-primary">Upload Scores</a> @else <p class="text-warning text-bold ">Kindly Ask HoD TO REVOKE</p> @endif</td>
                                                                 @if ($staff_course->hod_approval == 'approved')
                                                <td></td>
                                            @else
                                                <td>
                                                    <form
                                                        action="{{ route('staff.assign.destroy', $staff_course->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#myModal"> <i class="fas fa-solid fa-trash"></i>
                                                            Delete</button>

                                                    </form>
                                                </td>
                                            @endif
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
{!! $staff_courses->render() !!}
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


@endsection
