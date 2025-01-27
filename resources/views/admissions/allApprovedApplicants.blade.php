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
  {{--  src="{{ asset('img/logs.png') }}  --}}
</style>
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
                    Welcome to InCLA All Approved {{$user_type}} Applicants List
                </h1>




                <div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                    <div class="d-flex">
                        <!-- Avatar items with responsive grid classes -->
                        @foreach ($allApplicants as $allApp)

                        <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center mb-3">
                            <a href="/adminView/{{$allApp -> applicant_type}}/{{urlencode(base64_encode($allApp -> id))}}" class="avatar avatar-sm rounded-circle border border-primary">
                                <img alt=" {{ ucwords(strtolower($allApp->first_name)) }} " title="{{ ucwords(strtolower($allApp->surname)) }} {{ ucwords(strtolower($allApp->first_name)) }} {{ ucwords(strtolower($allApp->middle_name)) }}" class="avatar-img" src="src="{{ asset('img/logs.png') }}">
                            </a>
                            <p class="mb-0 text-sm" >{{ ucwords(strtolower($allApp->surname)) }} {{ ucwords(strtolower($allApp->first_name)) }}</p>
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
                    <div class="card mt-3">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                {{--  <h6 class="m-0 font-weight-bold text-success">All Approved {{$user_type}} Applicants List</h6>  --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Gender</th>
                                                <th>Course Applied</th>
                                                <th>Applicant Type</th>
                                                <th>Approval Date</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allApplicants as $allApp)

                                            <tr>

                                        <td>{{ ucwords(strtolower($allApp->surname)) }} {{ ucwords(strtolower($allApp->first_name)) }} {{ ucwords(strtolower($allApp->middle_name)) }}</td>

                                                <td>{{$allApp->phone}}</td>
                                                <td>{{$allApp->gender}}</td>
                                                <td>{{$allApp->course_program}}</td>
                                                <td>{{$allApp->applicant_type}}</td>
                                                <td>{{$allApp->approval_date}}</td>
                                                <td><a href="/adminView/{{$allApp -> applicant_type}}/{{urlencode(base64_encode($allApp -> id))}}" class="btn btn-primary border mt-2">View </a></td>
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
