{{-- @php

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


<style>
  /* Styling for the small avatar container */
  .avatar-sm {
    width: 40px;  /* Set the container size to 40px */
    height: 40px; /* Same height as width to keep it circular */
    display: inline-flex; /* Ensure it stays inline */
    justify-content: center;
    align-items: center;
  }

  /* Styling for the image inside the avatar */
  .avatar-img {
    width: 100%;  /* Ensure the image fills the container */
    height: 100%; /* Maintain aspect ratio within the container */
    object-fit: cover; /* Ensure the image is properly cropped to fit */
    border-radius: 50%; /* Ensure the image stays round */
  }
</style>

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



<h1 class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                    Welcome to InCLA {{$user_type}} Applicants List
                </h1>



<div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                    <div class="d-flex">
                        <!-- Avatar items with responsive grid classes -->
                       @foreach ($qualifiedApplicants as $applicant)


                        <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center mb-3">
                            <a href="/adminView/{{$applicant -> applicant_type}}/{{urlencode(base64_encode($applicant -> id))}}" class="avatar avatar-sm rounded-circle border border-primary">
                                <img alt=" {{$applicant -> first_name}} {{$applicant -> first_name}} " title="{{ ucwords(strtolower($applicant->surname)) }} {{ ucwords(strtolower($allApp->first_name)) }} {{ ucwords(strtolower($allApp->middle_name)) }}" class="avatar-img" src="src="{{ asset('img/logs.png') }}">
                            </a>
                            <p class="mb-0 text-sm" >{{ ucwords(strtolower($applicant->surname)) }} {{ ucwords(strtolower($applicant->first_name)) }}</p>
                            {{--  <small class="mb-0 text-sm"> </small>  --}}
                        </div>
                        @endforeach

                        <!-- More avatars can be added here -->
                    </div>
                </div>
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card shadow mt-3">
                            <div class="card-header py-3">
                                {{-- <h6 class="m-0 font-weight-bold text-success mb-3">Recommended {{$user_type}} Applicants List</h6> --}}
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
                                            @foreach ($qualifiedApplicants as $pplicant)

                                            <tr>

                                                <td>{{$pplicant->first_name}}</td>
                                                <td>{{$pplicant->surname}}</td>
                                                <td>{{$pplicant->phone}}</td>
                                                <td>{{$pplicant->gender}}</td>
                                                <td>{{$pplicant->created_at}}</td>
                                                <td>{{$pplicant->course_program}}</td>
                                                <td>
                                                    <a href="/adminView/{{$pplicant->applicant_type}}/{{urlencode(base64_encode($pplicant->id))}}" class="btn btn-primary border mt-2">View</a>
                                                </td>
                                                <td>
                                                    <a href="/approval/{{$pplicant->applicant_type}}/{{urlencode(base64_encode($pplicant->id))}}" class="btn btn-success border mt-2">Approve</a>
                                                </td>

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
