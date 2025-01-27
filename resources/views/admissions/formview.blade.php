
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
                    Welcome to InCLA {{ $userType }} APPLICANTS LIST
                </h1>



<div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                    <div class="d-flex">
                        <!-- Avatar items with responsive grid classes -->
                       @foreach ($applicants as $applicant)


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
                    <div class="card m-3 shadow">
                        <div class="card-header py-3">
                            {{--  <h6 class="m-0 font-weight-bold text-success mb-3">UTME Applicants List</h6>  --}}
                            <hr class="sidebar-divider">
                            <a href="/allApprovedApplicants/{{ $userType }}" class="btn btn-success shadow-sm m-1 text-white"> Approved</a>
                            <a href="/qualified/{{ $userType }}" class="btn btn-primary shadow-sm m-1 text-white"> Recommended </a>


                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <hr class="sidebar-divider">
                                <form action="/adminUtmeFilter" method="POST">
                                    @csrf
                                    <label for="start"><b class="text-success">Apllied From:</b></label>
                                    <input type="date" id="start" name="start_date" value="" class="mr-5 rounded">
                                    <input type="hidden" name="applicant_type" value="UTME">
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
                                            <th>Application Date</th>
                                            <th>Action</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($applicants as $applicant)

                                        <tr>
                                            <td>{{$applicant -> first_name}}</td>
                                            <td>{{$applicant -> surname}}</td>
                                            <td>{{$applicant -> phone}}</td>
                                            <td>{{$applicant -> gender}}</td>
                                            <td>{{$applicant -> course_program}}</td>
                                            <td>{{$applicant -> created_at}}</td>
                                            <td><a href="/recommend/{{$applicant -> applicant_type}}/{{urlencode(base64_encode($applicant -> id))}}" class="btn btn-primary border mt-2"> Recommend </a></td>
                                            <td><a href="/adminView/{{$applicant -> applicant_type}}/{{urlencode(base64_encode($applicant -> id))}}" class="btn btn-primary border mt-2">View </a></td>
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
