@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

<!-- Sidebar Links -->
<!-- Treeview -->
@section('student-open')
menu-open
@endsection
@section('home')
active
@endsection
<!-- End Sidebar links -->

@section('content')
<div class="content-wrapper bg-white" style="overflow-x: hidden;">
    <!-- Content Header (Page header) -->
    <section class="content">
        @if (session('signUpMsg'))
        {!! session('signUpMsg') !!}
        @endif
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h3 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                UTME Profile
            </h3>
            <!-- Content Row -->
            <div class="row card">
                <div class="card-body d-sm-flex align-items-center justify-content-evenly">
                    <a href="/editprofile" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                </div>
                <div class="row gy-4 mb-4 mt-1">
                    <div class="col-12 col-lg-6 mt-5">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Photo</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->passport }}" alt="Applicant Passport" style="height: 195px; width:195px;" />
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
                    </div>
                    <div class="col-12 col-lg-6 mt-5">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
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
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Date of Birth</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->dob }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <div class="row gy-4 mb-4 mt-1">
                    <div class="col-12 col-lg-6 mt-5">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">
                            <h5 class="card-title text-bold p-4">Sponsor Information</h5>
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Name</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Email</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->sponsors_email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Phone Number</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->sponsors_phone }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Address</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->sponsors_address }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Occupation</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->occupation }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-5">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                            <h5 class="card-title text-bold p-4">JAMB Information</h5>
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Jamb Registration No.</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->jamb_reg_no }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Jamb Score</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->score }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>First Choice University</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->first_choice }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Second Choice University</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->second_choice }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Course Applied</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->course_applied }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Subject 1</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->subject_1 }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Subject 2</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->subject_2 }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Subject 3</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->subject_3 }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Subject 4</strong></div>
                                            <div class="item-data">{{ $applicantsDetails->subject_4 }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 mb-4 mt-1">
                        <div class="col-12 col-lg-4 mt-5">
                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                <div class="app-card-body px-4 w-100">
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label mb-2">
                                                    <strong>Jamb Result</strong>
                                                </div>
                                                <div class="">
                                                    <img class="mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->jamb }}" alt="Jamb Result" style="height: 510px; width:400px;" />
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
                        <div class="col-12 col-lg-4 mt-5">
                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">
                                <div class="app-card-body px-4 w-100">
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label mb-2">
                                                    <strong>Olevel Result</strong>
                                                </div>
                                                <div class="">
                                                    <img class="mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->olevel1 }}" alt="Olevel" style="height: 510px; width:400px;" />
                                                </div>
                                                <div class="item-data card-title text-success">{{ $applicantsDetails->olevel_awaiting }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mt-5">
                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">
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
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection