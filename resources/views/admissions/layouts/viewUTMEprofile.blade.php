@extends('layouts.userapp')

@section('content')
<div class="row justify-content-center">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.usersidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-1 p-2 text-black-800 fw-bold text-capitalize">UTME Profile</h1> <br>
                        {{--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Edit</a>  --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row card">
                        <div class="card-body">
                            <h5 class="card-title">Bio Data</h5>
                        </div>

                             <div>
                                        <img class="rounded-circle p-1" style="height:120px; width:120px;" src="data:image/{{ $applicantsDetails->passport_type }};base64,{{ base64_encode($applicantsDetails->passport) }}" data-holder-rendered="true">
                                    </div>
                           <ul class="list-group list-group-flush">
                            <li class="list-group-item">Surname: <b>{{$applicantsDetails -> surname}}</b></li>
                            <li class="list-group-item">First Name: <b>{{$applicantsDetails -> first_name}}</b></li>
                            <li class="list-group-item">Other Name: <b>{{$applicantsDetails -> middle_name}}</b></li>
                            <li class="list-group-item">Gender: <b>{{$applicantsDetails -> gender}}</b></li>
                            <li class="list-group-item">Phone Number: <b>{{$applicantsDetails -> phone}}</b></li>
                            <li class="list-group-item">Email: <b>{{$applicantsDetails -> email}}</b></li>
                            <li class="list-group-item">Date of Birth: <b>{{$applicantsDetails -> dob}}</b></li>
                            <li class="list-group-item">Religion: <b>{{$applicantsDetails -> religion}}</b></li>
                            <li class="list-group-item">Nationality: <b>{{$applicantsDetails -> nationality}}</b></li>
                            <li class="list-group-item">House Address: <b>{{$applicantsDetails -> address}}</b></li>
                            <li class="list-group-item">State of Origin: <b>{{$applicantsDetails -> state_origin}}</b></li>
                            <li class="list-group-item">LGA: <b>{{$applicantsDetails -> lga}}</b></li>
                        </ul>
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                        <div class="card-body">
                            <h5 class="card-title">Academic Data</h5>
                        </div>
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Exam</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $results = json_decode($applicantsDetails -> olevel_result, true)
                                @endphp
                                
                                @foreach ($results as $result)

                                <tr>
                                    <td>{{$result['subject']}}</td>
                                    <td>{{$result['exam']}}</td>
                                    <td>{{$result['grade']}}</td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="3"><b>Number of Sittings: </b> {{$applicantsDetails -> sitting}}</td>
                                </tr>

                            </tbody>
                        </table>
                        <ul class="list-group list-group-flush">


                            <li class="list-group-item">Jamb Score: <b>{{$applicantsDetails -> score}}</b></li>
                            <li class="list-group-item">First Choice: <b>{{$applicantsDetails -> first_choice}}</b></li>
                            <li class="list-group-item">Second Choice: <b>{{$applicantsDetails -> second_choice}}</b></li>
                            <li class="list-group-item">Course Applied: <b>{{$applicantsDetails -> course_applied}}</b></li>
                            <li class="list-group-item">Subject 1: <b>{{$applicantsDetails -> subject_1}}</b></li>
                            <li class="list-group-item">Subject 2: <b>{{$applicantsDetails -> subject_2}}</b></li>
                            <li class="list-group-item">Subject 3: <b>{{$applicantsDetails -> subject_3}}</b></li>
                            <li class="list-group-item">Subject 4: <b>{{$applicantsDetails -> subject_4}}</b></li>
                        </ul>
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                        <div class="card-body">
                            <h5 class="card-title">Sponsors Data</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: <b>{{$applicantsDetails -> name}}</b></li>
                            <li class="list-group-item">Email: <b>{{$applicantsDetails -> sponsors_email}}</b></li>
                            <li class="list-group-item">Phone Number: <b>{{$applicantsDetails -> sponsors_phone}}</b></li>
                            <li class="list-group-item">Address: <b>{{$applicantsDetails -> sponsors_address}}</b></li>
                            <li class="list-group-item">Occupation: <b>{{$applicantsDetails -> occupation}}</b></li>
                        </ul>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->
        </div>
    </div>
    <!-- End of Content Wrapper -->

</div>

@endsection
