@php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp
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
                       Post Graduate Applicants List
                    </h1>
  <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card m-3 shadow-lg">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Post Graduate Applicants List</h6>
                            <hr class="sidebar-divider">
                            <a href="/allApprovedApplicants/PG" class="btn btn-success shadow-sm m-1 text-white"> Approved Applicants</a>

                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <hr class="sidebar-divider">
                                <form action="/adminPgFilter" method="POST">
                                    @csrf
                                    <label for="start"><b class="text-success">Apllied From:</b></label>
                                    <input type="date" id="start" name="start_date" value="" class="mr-5 rounded">
                                    <input type="hidden" name="applicant_type" value="PG">
                                    <label for="start"><b class="text-success">To:</b></label>
                                    <input type="date" id="start" name="end_date" value="" class="mr-5 rounded">
                                    <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                </form>
                                <hr class="sidebar-divider">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Course Applied</th>
                                            <th>Full Details</th>
                                            <th>Approve</th>
                                            <th>Decline</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pgApplicants as $pgApplicant)

                                        <tr>
                                            <td>{{$pgApplicant -> first_name}}</td>
                                            <td>{{$pgApplicant -> surname}}</td>
                                            <td>{{$pgApplicant -> phone}}</td>
                                            <td>{{$pgApplicant -> gender}}</td>
                                            <td>{{$pgApplicant -> course_applied}}</td>
                                            <td><a href="/adminView/{{$pgApplicant -> applicant_type}}/{{urlencode(base64_encode($pgApplicant -> id))}}" class="btn btn-primary border mt-2">View </a></td>
                                            <td><a href="/approval/{{$pgApplicant -> applicant_type}}/{{urlencode(base64_encode($pgApplicant -> id))}}" class="btn btn-success border mt-2">Approve </a></td>
                                            <td><a href="/adminView/{{$pgApplicant -> applicant_type}}/{{urlencode(base64_encode($pgApplicant -> id))}}" class="btn btn-danger border mt-2">Decline </a></td>
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
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
