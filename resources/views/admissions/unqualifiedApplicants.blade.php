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
        <div class="container-fluid ">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 text-success fw-bold text-capitalize"> {{ $fullName }}: Admininstrator Dashboard</h1>
                <br>

            </div>

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card mt-3 shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger mb-3">Unqualified {{$user_type}} Applicants List</h6>
                            <div class="d-flex justify-content-end">
                                <a href="/rejectAll/{{$user_type}}" class="btn btn-sm btn-danger shadow-sm d-flex mx-1 text-white"> Reject All</a>
                            </div>

                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif

                            @if (session('rejectionMsg'))
                            {!! session('rejectionMsg') !!}
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Passport</th>
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Course Applied</th>
                                            <th>Application Date</th>
                                            <th>Course Applied</th>
                                            <th>Full Details</th>
                                            <th>Approve Anyway</th>
                                            <th>Decline</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allAppli as $utmeApplicant)

                                        <tr>
                                            <td><img src="data:image/{{$utmeApplicant['passport_type']}};base64,{{base64_encode($utmeApplicant['passport'])}}" class="rounded-circle p-3 mx-auto d-block" style="height: 100px; width:100px;" alt="Applicant Passport"></td>
                                            <td>{{$utmeApplicant['first_name']}}</td>
                                            <td>{{$utmeApplicant['surname']}}</td>
                                            <td>{{$utmeApplicant['phone']}}</td>
                                            <td>{{$utmeApplicant['gender']}}</td>
                                            <td>{{$utmeApplicant['course_applied']}}</td>
                                            <td>{{$utmeApplicant['created_at']}}</td>
                                            <td>{{$utmeApplicant['course_applied']}}</td>
                                            <td><a href="/adminView/{{$utmeApplicant ['applicant_type']}}/{{urlencode(base64_encode($utmeApplicant ['id']))}}" class="btn btn-primary border mt-2">View </a></td>
                                            <td><a href="/forceApproval/{{$utmeApplicant ['applicant_type']}}/{{urlencode(base64_encode($utmeApplicant ['id']))}}" class="btn btn-success border mt-2">Approve Anyway </a></td>
                                            <td><a href="/rejection/{{$utmeApplicant ['applicant_type']}}/{{urlencode(base64_encode($utmeApplicant ['id']))}}" class="btn btn-danger border mt-2">Reject</a></td>
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
        <!-- /.container-fluid -->

        @include('layouts.footer')

    </div>

</div>
<!-- End of Content Wrapper -->

@endsection