{{--  @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
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
               Recommended {{$user_type}} Applicants List
                    </h1>



  <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            {{--  <h6 class="m-0 font-weight-bold text-success mb-3">Recommended {{$user_type}} Applicants List</h6>  --}}
                            <div class="d-flex justify-content-end">
                                <a href="/allApprovedApplicants/{{$user_type}}" class="btn btn-sm btn-success shadow-sm d-flex mx-1 text-white"> View Approved</a>
                                <a href="/approveAll/{{$user_type}}" class="btn btn-sm btn-success shadow-sm d-flex mx-1 text-white"> Approve All</a>
                            </div>

                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Application Date</th>
                                            <th>Course Applied</th>
                                            <th>Full Details</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allApplicants as $utmeApplicant)

                                        <tr>
                                              <td>{{$utmeApplicant->first_name}}</td>
                                            <td>{{$utmeApplicant->surname}}</td>
                                            <td>{{$utmeApplicant->phone}}</td>
                                            <td>{{$utmeApplicant->gender}}</td>
                                            <td>{{$utmeApplicant->created_at}}</td>
                                            <td>{{$utmeApplicant->course_applied}}</td>
                                            <td><a href="/adminView/{{$utmeApplicant->applicant_type}}/{{urlencode(base64_encode($utmeApplicant->id))}}" class="btn btn-primary border mt-2">View </a></td>
                                            <td><a href="/approval/{{$utmeApplicant->applicant_type}}/{{urlencode(base64_encode($utmeApplicant->id))}}" class="btn btn-success border mt-2">Approve </a></td>
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
