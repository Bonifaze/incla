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
                     Direct Entry Applicants List
                    </h1>






            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->

                    <div class="card m-3 shadow">
                        <div class="card-header py-3">

                            {{--  <h6 class="font-weight-bold text-success mb-4 gap-2">Direct Entry Applicants List</h6>  --}}

                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif

                            <hr class="sidebar-divider">
                            <a href="/allApprovedApplicants/DE" class="btn btn-success m-2 shadow-sm text-white"> Approved</a>
                            <a href="/recommended/DE" class="btn btn-primary shadow-sm m-1 text-white"> Recommended</a>
                            {{--  <a href="/qualified/DE" class="btn btn-success shadow-sm m-2 text-white"> Qualified</a>
                            <a href="/unqualified/DE" class="btn btn-warning shadow-sm m-2 text-white"> Unqualified</a>  --}}
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-lg-12 mb-4">
                                    <hr class="sidebar-divider">
                                    <form action="/adminDeFilter" method="POST">
                                        @csrf
                                        <label for="start"><b>Apllied From:</b></label>
                                        <input type="date" id="start" name="start_date" value="" class="mr-5 rounded">
                                        <input type="hidden" name="applicant_type" value="DE">
                                        <label for="start"><b>To:</b></label>
                                        <input type="date" id="start" name="end_date" value="" class="mr-5 rounded">
                                        <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                    </form>
                                    <hr class="sidebar-divider">
                                </div>

                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Qualification</th>
                                            <th>Course Applied</th>
                                            <th>Application Date</th>
                                            <th>Action</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($deApplicants as $deApplicant)

                                        <tr>

                                            <td>{{$deApplicant -> first_name}}</td>
                                            <td>{{$deApplicant -> surname}}</td>
                                            <td>{{$deApplicant -> phone}}</td>
                                            <td>{{$deApplicant -> gender}}</td>
                                            <td>{{$deApplicant -> qualification}}</td>
                                            <td>{{$deApplicant -> course_applied}}</td>
                                            <td>{{$deApplicant -> created_at}}</td>
                                            <td><a href="/recommend/{{$deApplicant -> applicant_type}}/{{urlencode(base64_encode($deApplicant -> id))}}" class="btn btn-primary border mt-2"> Recommend </a></td>
                                            <td><a href="/adminView/{{$deApplicant -> applicant_type}}/{{urlencode(base64_encode($deApplicant -> id))}}" class="btn btn-primary border mt-2">View </a></td>
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
