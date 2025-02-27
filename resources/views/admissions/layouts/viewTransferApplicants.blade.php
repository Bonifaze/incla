@extends('layouts.app')

@section('content')
<div class="row justify-content-center">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="app-wrapper">
                        <div class="app-content pt-3 p-md-3 p-lg-4">
                            <div class="container-xl">
                                <h1 class="app-page-title h5 fw-bold p-2 shadow-sm text-center text-success mb-4 border">Transfer Applicant Profile</h1>
                                <div class="row gy-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Bio Data</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label mb-2">
                                                                <strong>Photo</strong>
                                                            </div>
                                                            <div class="rounded-circle">
                                                                <img class="rounded-circle p-3 mx-auto d-block" src="data:image/{{$applicantsDetails -> passport_type}};base64,{{base64_encode($applicantsDetails -> passport)}}" alt="Applicant Passport" style="height: 200px; width:200px;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Surname</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> surname}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>First Name</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> first_name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Other Name</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> middle_name}}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Phone Number</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> phone}}</div>
                                                        </div>
                                                        <!--//col-->
                                                        <!-- <div class="col text-end">
                                                            <a class="btn btn-success" href="#">Change</a>
                                                        </div> -->
                                                        <!--//col-->
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
                                                            <div class="item-label"><strong>Email</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> email}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Gender</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> gender}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Date of Birth</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> dob}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Religion</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> religion}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Nationality</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> nationality}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Addresss</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> address}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>State of Origin</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> state_origin}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>LGA</strong></div>
                                                            <div class="item-data">{{$applicantsDetails -> lga}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row card">
                                        <div class="card-body d-sm-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-success">Uploaded Document</h5> <br>
                                            {{-- edit profile button --}}
                                            {{-- <a href="/editprofile" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i --}}
                                            {{-- class="fas fa-edit fa-sm text-white-50"></i> Edit</a> --}}
                                        </div>


                                        <div class="row gy-4 mb-4 mt-1">
                                            <div class="col-12 col-lg-12">
                                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                    <div class="app-card-body px-4 w-100">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label mb-2">
                                                                        <strong>Transcript</strong>
                                                                    </div>
                                                                    <div class="">
                                                                        <img class="mx-auto d-block"
                                                                                src="data:image/jpeg;base64,{{$applicantsDetails->jamb}}"
                                                                            alt="Transcipt" style="height: 550px; width:800px;" />
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
                                            <div class="col-6 col-lg-12">
                                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                    <div class="app-card-body px-4 w-100">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="">
                                                                    <div class="item-label mb-2">
                                                                        <strong>Academic Data</strong>
                                                                    </div>
                                                                    <div class="">
                                                                        <ul class="list-group list-group-flush p-4">
                                                                            <li class="list-group-item">Institution:
                                                                                <b>{{ $applicantsDetails->institution }}</b></li>
                                                                            <li class="list-group-item">Course Offered:
                                                                                <b>{{ $applicantsDetails->course }}</b></li>
                                                                            <li class="list-group-item">Matirculation Number:
                                                                                <b>{{ $applicantsDetails->matric_no }}</b></li>
                                                                            <li class="list-group-item">Year of Entry:
                                                                                <b>{{ $applicantsDetails->entry_year }}</b></li>
                                                                            <li class="list-group-item">CGPA:
                                                                                <b>{{ $applicantsDetails->cgpa }}</b></li>
                                                                            <li class="list-group-item">Level:
                                                                                <b>{{ $applicantsDetails->level }}</b></li>
                                                                            <li class="list-group-item">Course Applied:
                                                                                <b>{{ $applicantsDetails->course_applied }}</b></li>
                                                                        </ul>
                                                                        <br>
                                                                        <form method="POST" action="/changecourseTransfer">
                                                                            @csrf
                                                                            @if (session('approvalMsg'))
                                                                            {!! session('approvalMsg') !!}
                                                                            @endif
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <input type="hidden" value="{{ $applicantsDetails->matric_no }}" name="matric_no">
                                                                                <label for="refferal">{{ __('Change Course of Study') }} </label>
                                                                                <select class="form-select" name="course_applied">
                                                                                    @foreach ($programs as $program)
                                                                                        <option value="{{ $program->name }}">{{ $program->name }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <button type="submit"
                                                                                class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                                                                {{ __('Change Course') }}
                                                                            </button>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//app-card-->
                                            </div>
                                            <div class="row gy-4 mb-4 mt-1">
                                                <div class="col-12 col-lg-12">
                                                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div class="row justify-content-between align-items-center">
                                                                    <div class="">
                                                                        <div class="item-label mb-2">
                                                                            <strong>Olevel Result</strong>
                                                                        </div>
                                                                        <div class="">
                                                                            <img class="mx-auto d-block"
                src="data:image/jpeg;base64,{{$applicantsDetails->olevel1}}"
                                                                                alt="Olevel"
                                                                                style="height: 550px; width:800px;" />
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

                                    <div class="col-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Sponsor Details</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Name</strong>
                                                            </div>
                                                            <div class="item-data">{{$applicantsDetails -> name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Email </strong>
                                                            </div>
                                                            <div class="item-data">{{$applicantsDetails -> sponsors_email}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Phone Number </strong>
                                                            </div>
                                                            <div class="item-data">{{$applicantsDetails -> sponsors_phone}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Address</strong>
                                                            </div>
                                                            <div class="item-data">{{$applicantsDetails -> sponsors_address}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Occupation</strong>
                                                            </div>
                                                            <div class="item-data">{{$applicantsDetails -> occupation}}</div>
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
