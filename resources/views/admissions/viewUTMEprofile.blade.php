@php

if (!session('userid')) {
    header('location: /');
    exit();
}
@endphp

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
                            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Edit</a> --}}
                        </div>

                        <!-- Content Row -->
                        <div class="row card">
                            <div class="card-body d-sm-flex align-items-center justify-content-between">
                                <h5 class="card-title text-success">Bio Data</h5> <br>
                                {{-- edit profile button --}}
                                <a href="/editprofile" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                        class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                            </div>

                            <div class="row gy-4 mb-4 mt-1">
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                        <div class="app-card-body px-4 w-100">
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Photo</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/jpeg;base64,{{$applicantsDetails->passport }}"
                                                                alt="Applicant Passport"
                                                                style="height: 180px; width:200px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Surname</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->surname }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>First Name</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->first_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Other Name</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->middle_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Email</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->email }}</div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!--//app-card-->
                                </div>
                                <!--//col-->
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                                        <!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">


                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Phone Number</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->phone }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Gender</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->gender }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Date of Birth</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->dob }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>State of Origin</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->state_origin }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Local Government Area</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->lga }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Nationality</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->nationality }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Parmanent Address</strong></div>
                                                        <div class="item-data">{{ $applicantsDetails->address }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="row gy-4 mb-4 mt-1">
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                        <div class="app-card-body px-4 w-100">
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Jamb Result</strong>
                                                        </div>
                                                        <div class="">
                                                            <img class="mx-auto d-block"
                                                                src="data:image/jpeg;base64,{{$applicantsDetails->jamb }}"
                                                                alt="Jamb Result" style="height: 510px; width:400px;" />
                                                        </div>
                                                        <div class="item-data card-title text-success">
                                                            {{ $applicantsDetails->olevel_awaiting }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//app-card-->
                                </div>
                                <!--//col-->
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                        <div class="app-card-body px-4 w-100">
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Jamb Data</strong>
                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">


                                                                <li class="list-group-item">Jamb Registration No.:
                                                                    <b>{{ $applicantsDetails->jamb_reg_no }}</b></li>
                                                                <li class="list-group-item">Jamb Score: <b>{{ $applicantsDetails->score }}</b></li>
                                                                <li class="list-group-item">University First Choice: <b>{{ $applicantsDetails->first_choice }}</b>
                                                                </li>
                                                                <li class="list-group-item">University Second Choice: <b>{{ $applicantsDetails->second_choice }}</b>
                                                                </li>
                                                                <li class="list-group-item">Course Applied:
                                                                    <b>{{ $applicantsDetails->course_applied }}</b></li>
                                                                <li class="list-group-item">Subject 1: <b>{{ $applicantsDetails->subject_1 }}</b></li>
                                                                <li class="list-group-item">Subject 2: <b>{{ $applicantsDetails->subject_2 }}</b></li>
                                                                <li class="list-group-item">Subject 3: <b>{{ $applicantsDetails->subject_3 }}</b></li>
                                                                <li class="list-group-item">Subject 4: <b>{{ $applicantsDetails->subject_4 }}</b></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//app-card-->
                                </div>
                                <div class="row gy-4 mb-4 mt-1">
                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label mb-2">
                                                                <strong>Olevel Result</strong>
                                                            </div>
                                                            <div class="">
                                                                <img class="mx-auto d-block"
                                                                    src="data:image/jpeg;base64,{{$applicantsDetails->olevel1 }}"
                                                                    alt="Olevel"
                                                                    style="height: 510px; width:400px;" />
                                                            </div>
                                                            <div class="item-data card-title text-success">{{ $applicantsDetails->olevel_awaiting }}</div>
                                                        </div>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>
                                        <!--//app-card-->
                                    </div>
                                <!--//col-->
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                                        <!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">


                                            <div class="item border-bottom py-3">
                                                <di class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Olevel Result (second sitting)</strong>

                                                        </div>
                                                        <div class="">

                                                            <img class=" mx-auto d-block"
                                                                        src="data:image/jpeg;base64,{{$applicantsDetails->olevel2}}"
                                                                alt="Olevel second sitting"
                                                                style="height: 500px; width:400px;" />
                                                        </div>
                                                        {{--  <div class="item-data card-title text-success">{{ $applicantsDetails->olevel_awaiting }}</div>  --}}
                                                     </div>
                                                </di
                                            </div>







                                        </div>
                                    </div>
                                </div>
                                                </div>
                            <!-- Divider -->
                            {{--  <hr class="sidebar-divider">  --}}
                            {{--  <div class="card-body d-sm-flex align-items-center justify-content-between">  --}}
                                {{-- <h5 class="card-title text-success">Olevel Data</h5> <br> --}}
                                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Edit</a> --}}
                            {{--  </div>  --}}
                            {{-- <table class="table table-bordered table-striped" width="100%" cellspacing="0">
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
                        </table> --}}

                            {{--  <div class="card-body d-sm-flex align-items-center justify-content-between">  --}}
                                {{--  <h5 class="card-title text-success">Jamb Data</h5> <br>  --}}
                                {{-- {{--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a> --}}
                            {{--  </div>  --}}
                            {{--  <ul class="list-group list-group-flush">


                                <li class="list-group-item">Jamb Registration No.:
                                    <b>{{ $applicantsDetails->jamb_reg_no }}</b></li>
                                <li class="list-group-item">Jamb Score: <b>{{ $applicantsDetails->score }}</b></li>
                                <li class="list-group-item">First Choice: <b>{{ $applicantsDetails->first_choice }}</b>
                                </li>
                                <li class="list-group-item">Second Choice: <b>{{ $applicantsDetails->second_choice }}</b>
                                </li>
                                <li class="list-group-item">Course Applied:
                                    <b>{{ $applicantsDetails->course_applied }}</b></li>
                                <li class="list-group-item">Subject 1: <b>{{ $applicantsDetails->subject_1 }}</b></li>
                                <li class="list-group-item">Subject 2: <b>{{ $applicantsDetails->subject_2 }}</b></li>
                                <li class="list-group-item">Subject 3: <b>{{ $applicantsDetails->subject_3 }}</b></li>
                                <li class="list-group-item">Subject 4: <b>{{ $applicantsDetails->subject_4 }}</b></li>
                            </ul>  --}}
                            <!-- Divider -->
                            <hr class="sidebar-divider">
                            <div class="card-body d-sm-flex align-items-center justify-content-between">
                                <h5 class="card-title text-success text-bold">Sponsor Data</h5> <br>
                                {{-- {{--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a> --}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name: <b>{{ $applicantsDetails->name }}</b></li>
                                <li class="list-group-item">Email: <b>{{ $applicantsDetails->sponsors_email }}</b></li>
                                <li class="list-group-item">Phone Number:
                                    <b>{{ $applicantsDetails->sponsors_phone }}</b></li>
                                <li class="list-group-item">Address: <b>{{ $applicantsDetails->sponsors_address }}</b>
                                </li>
                                <li class="list-group-item">Occupation: <b>{{ $applicantsDetails->occupation }}</b></li>
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
