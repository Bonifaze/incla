@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

@section('home')
active
@endsection

@section('content')
<div class="content-wrapper bg-white">
    <section class="content" style="overflow-x: hidden;">

        @if (session('signUpMsg'))
        {!! session('signUpMsg') !!}
        @endif
        <div class="container-fluid">
            <h3 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                Transfer Profile
            </h3>
            <div class="row card">
                <div class="card-body d-sm-flex align-items-center justify-content-between">
                    <h5 class="card-title text-success"></h5> <br>
                    <a href="/editprofile" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                </div>

                <div class="row gy-4 mb-4 mt-1 ">
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
                                                <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->passport }}" alt="Applicant Passport" style="height: 180px; width:200px;" />
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
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Phone Number</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->phone }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">
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
                                            <div class="item-label"><strong>Religion</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->religion }}</div>
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
                                            <div class="item-data">{{ $applicantsDetails->state_origin }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>State of Origin</strong></div>
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
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>How did you hear about us</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->referral }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="sidebar-divider">
            <div class="row card">
                <div class="card-body d-sm-flex align-items-center justify-content-between">
                    <h5 class="card-title text-success">Uploaded Document</h5> <br>
                </div>

                <div class="row gy-4 mb-4 mt-1">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Transcript</strong>
                                            </div>
                                            <div class="">
                                                <img class="mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->jamb}}" alt="Transcipt" style="height: 510px; width:400px;" />
                                            </div>
                                            <div class="item-data card-title text-success">
                                                {{ $applicantsDetails->olevel_awaiting }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">
                            <div class="app-card-body w-100">
                                <div class="col-auto">
                                    <div class="item-label mb-2 p-4">
                                        <strong>Academic Data</strong>
                                    </div>
                                    <div class="">
                                        <ul class="list-group list-group-flush p-4">
                                            <li class="list-group-item">Institution:
                                                <b>{{ $applicantsDetails->institution }}</b>
                                            </li>
                                            <li class="list-group-item">Course Offered:
                                                <b>{{ $applicantsDetails->course }}</b>
                                            </li>
                                            <li class="list-group-item">Matirculation Number:
                                                <b>{{ $applicantsDetails->matric_no }}</b>
                                            </li>
                                            <li class="list-group-item">Year of Entry:
                                                <b>{{ $applicantsDetails->entry_year }}</b>
                                            </li>
                                            <li class="list-group-item">CGPA:
                                                <b>{{ $applicantsDetails->cgpa }}</b>
                                            </li>
                                            <li class="list-group-item">Level:
                                                <b>{{ $applicantsDetails->level }}</b>
                                            </li>
                                            <li class="list-group-item">Course Applied:
                                                <b>{{ $applicantsDetails->course_applied }}</b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <img class="mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->olevel1}}" alt="Olevel" style="height: 510px; width:400px;" />
                                            </div>
                                            <div class="item-data card-title text-success">{{ $applicantsDetails->olevel_awaiting }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Olevel Result (second sitting)</strong>
                                            </div>
                                            <div class="">
                                                <img class=" mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->olevel2}}" alt="Olevel second sitting" style="height: 500px; width:400px;" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="col-12">
                        <div class="card-body d-sm-flex align-items-center justify-content-between">
                            <h5 class="card-title text-success p-4">Sponsor Data</h5> <br>
                        </div>
                        <ul class="list-group list-group-flush p-4">
                            <li class="list-group-item">Name: <b>{{ $applicantsDetails->name }}</b></li>
                            <li class="list-group-item">Email: <b>{{ $applicantsDetails->sponsors_email }}</b></li>
                            <li class="list-group-item">Phone Number:
                                <b>{{ $applicantsDetails->sponsors_phone }}</b>
                            </li>
                            <li class="list-group-item">Address: <b>{{ $applicantsDetails->sponsors_address }}</b>
                            </li>
                            <li class="list-group-item">Occupation: <b>{{ $applicantsDetails->occupation }}</b></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
</div>
</div>
</section>
</div>
@endsection
