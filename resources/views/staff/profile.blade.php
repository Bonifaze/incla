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
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Staff Profile
                </h1>
                @include('partialsv3.flash')

                <div class="main-content" id="panel">
                    <div>
                        @can('rbac', 'App\Staff')
                        <a class="btn btn-warning" href="{{ route('staff.show',$staff->id) }}">Edit Profile</a>
                        @else
                        @endcan
                    </div>

                    <div class="container-fluid pt-3 drop-zone">
                        <div class="row removable d-flex" style="min-height: 200px;">
                            {{--  <!-- Added flex for equal-height columns -->  --}}
                            {{--  <!-- Profile Card -->  --}}
                            <div class="col-lg-4 drop-zone d-flex">
                                <div class="card card-profile draggable w-100" draggable="true" style="display: flex; flex-direction: column; justify-content: space-between; position: relative;">

                                    {{-- Profile background image - now as background --}}
                                    <div class="card-img-top" style="height: 250px; background-image: url('{{ asset('img/background.jpg') }}'); background-size: cover; background-position: center; border-radius: 10px;"></div>

                                    {{-- Profile Image on top of background --}}
                                    <div class="row justify-content-center" style="position: absolute; top: 20px; left: 10%; transform: translateX(-5%); z-index: 10;">
                                        <div class="col-lg-3 order-lg-2">
                                            <div class="card-profile-image">
                                                <a href="#">
                                                    <img src="data:image/png;base64,{{ $staff->passport }}" class="rounded-circle p-3 mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #333;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0" style="padding-top: 60px;">
                                        <div class="text-center">
                                            {{-- Title and Name Styling --}}
                                            <h5 class="h3 font-weight-bold" style="color: #2d3e50; font-size: 1.5rem; line-height: 1.2;">
                                                {{ $staff->title }} {{ $staff->surname }}
                                            </h5>
                                            <h5 class="font-weight-light" style="color: #6c757d; font-size: 1.25rem;">
                                                {{ $staff->first_name }} {{ $staff->middle_name }}
                                            </h5>
                                             <div class="item-data">
                                                        {{ $work->position->name }}
                                                    </div>
                                            <h5 class="h5 mt-4" style="color: #28a745; font-weight: 600;">
                                                {{ $staff->username }}
                                            </h5>
                                            <h5 class="h5 mt-4" style="color: #28a745; font-weight: 600;">
                                                {{ $staff->maiden_name }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  <!-- Contact Information -->  --}}
                            <div class="col-lg-4 drop-zone d-flex">
                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start w-100" style="border-radius: 10px; display: flex; justify-content: space-between;">
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Email</strong></div>
                                                    <div class="item-data">{{ $staff->email }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Phone Number</strong></div>
                                                    <div class="item-data">{{ $staff->phone }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Gender</strong></div>
                                                    <div class="item-data">{{ $staff->gender }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Date of Birth</strong></div>
                                                    <div class="item-data">{{ \Carbon\Carbon::parse($staff->dob)->format('l j, F Y') }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Religion</strong></div>
                                                    <div class="item-data">{{ $staff->religion }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{--  <!-- Additional Information -->  --}}
                            <div class="col-lg-4 drop-zone d-flex">
                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start w-100" style="border-radius: 10px; display: flex; justify-content: space-between;">
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Nationality</strong></div>
                                                    <div class="item-data">{{ $staff->nationality }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Address</strong></div>
                                                    <div class="item-data">{{ $staff->address }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>State of Origin</strong></div>
                                                    <div class="item-data">{{ $staff->state }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>LGA</strong></div>
                                                    <div class="item-data">{{ $staff->lga_name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label"><strong>Marital Status</strong></div>
                                                    <div class="item-data">{{ $staff->marital_status }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>


                </div>
                <div class="container-fluid pt-3 drop-zone">
                    <div class="row removable">
                        <div class="col-lg-6 drop-zone">


                            {{-- <!-- Emergency Contact-->  --}}
                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center px-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Emergency Contact</h4>
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
                                                <div class="item-data">
                                                    {{ $contact->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-card-body px-4 w-100">
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label">
                                                    <strong>Relationship</strong>
                                                </div>
                                                <div class="item-data">
                                                    {{ $contact->relationship }}
                                                </div>
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
                                                <div class="item-data">
                                                    {{ $contact->email }}
                                                </div>
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
                                                <div class="item-data">
                                                    {{ $contact->phone }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-card-body px-4 w-100">
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label">
                                                    <strong>Addresss </strong>
                                                </div>
                                                <div class="item-data">
                                                    {{ $contact->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="app-card-body px-4 w-100">
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label">
                                                    <strong>State of Residence </strong>
                                                </div>
                                                <div class="item-data">
                                                    {{ $contact->state }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                         {{-- <!-- Work Information -->  --}}
                            <div class="col-lg-6 drop-zone">
                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                    <div class="app-card-header p-3 border-bottom-0">
                                        <div class="row align-items-center px-3">
                                            <div class="col-auto">
                                                <h4 class="app-card-title">Work Infomatation</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Staff No.</strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->staff_no }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Staff Type </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->type->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Employment Type </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->employmentType->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Department </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->admin->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Grade level </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->grade_id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Appointment Date </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->appointment_date }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item border-bottom py-3">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="item-label">
                                                        <strong>Assumption Date </strong>
                                                    </div>
                                                    <div class="item-data">
                                                        {{ $work->assumption_date }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if (auth()->user()->id == 506)

                                <a href="/rbac/otp" class="nav-link @yield('')">

                                    <p></p>
                                </a>

                        @else
                        @endif  --}}
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
