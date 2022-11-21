@php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp
@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body">
                                <h4 class="card-title">
                                    Staff Course
                                </h4>
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered table-striped table-hover tbl">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Approval Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff_courses as $staff_course)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $staff_course->course_title }}</td>
                                                    <td>{{ $staff_course->course_code }}</td>
                                                    <td>{{ $staff_course->approval_status }}</td>
                                                    <td><a href="{{ route('admin.view_scores', $staff_course->course_id) }}" class="btn btn-primary">View Scores</a></td>
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


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    @endsection