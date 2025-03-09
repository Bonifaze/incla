@extends('layouts.mini')



@section('pagetitle')
    Show Staff Profile
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
@section('staff-profile')
    active
@endsection

<!-- End Sidebar links -->

@section('content')
    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            @include('partialsv3.flash')
            <div class="container-fluid">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Staff Profile
                </h1>
                <div class="row mt-3">
                    <div class="col-md-6">
                        {!! Form::open(['method' => 'Patch', 'route' => 'staff.reset', 'id' => 'resetPasswordForm' . $staff->id]) !!}
                        {{ Form::hidden('id', $staff->id) }}


                        <button onclick="resetPassword({{ $staff->id }})" type="button"
                            class="{{ $staff->id }} btn btn-danger"><span class="icon-line2-trash"></span> Reset
                            Password</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        @can('rbac', 'App\Staff')
                            <a class="btn btn-warning" href="{{ route('staff.security', $staff->id) }}"> Roles
                            </a>
                        @else
                        @endcan
                    </div>



                </div>

                <div class="row py-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Bio Data <a class="btn btn-info"
                                                href="{{ route('staff.edit', $staff->id) }}"> <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Passport</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block"
                                                    src="data:image/png;base64,{{ $staff->passport }}"
                                                    alt="Student Passport" style="height: 200px; width:200px;" />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Signature</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block"
                                                    src="data:image/png;base64,{{ $staff->signature }}"
                                                    alt="Student signature" style="height: 200px; width:200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Title</strong></div>
                                            <div class="item-data">{{ $staff->title }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Surname</strong></div>
                                            <div class="item-data">{{ $staff->surname }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>First Name</strong></div>
                                            <div class="item-data">
                                                {{ $staff->first_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Other Name</strong></div>
                                            <div class="item-data">
                                                {{ $staff->middle_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Maiden Name</strong></div>
                                            {{ $staff->maiden_name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Username / Official Email</strong></div>
                                            <div class="item-data text-primary font-weight-bold">
                                                {{ $staff->username }}
                                            </div>
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
                                            <div class="item-label"><strong>Email</strong></div>
                                            <div class="item-data">{{ $staff->email }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Phone Number</strong></div>
                                            <div class="item-data">{{ $staff->phone }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Gender</strong></div>
                                            <div class="item-data">{{ $staff->gender }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Date of Birth</strong>:</div>
                                            {{--  <div class="item-data">{{ $staff->dob }}</div>  --}}
                                            <div class="item-data">
                                                {{ \Carbon\Carbon::parse($staff->dob)->format('l j, F Y') }}
                                                ({{ \Carbon\Carbon::parse($staff->dob)->age }} years old)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Religion</strong></div>
                                            <div class="item-data">{{ $staff->religion }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nationality</strong></div>
                                            <div class="item-data">
                                                {{ $staff->nationality }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Address</strong></div>
                                            <div class="item-data">{{ $staff->address }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>State of Origin</strong>
                                            </div>
                                            <div class="item-data">
                                                {{ $staff->state }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>LGA</strong></div>
                                            {{ $staff->lga_name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Marital Status</strong></div>
                                            {{ $staff->marital_status }}
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 mt-3">
                <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center px-3">
                            <div class="col-auto">
                                <h4 class="app-card-title">Emergency Contact <a class="btn btn-info"
                                        href="{{ route('staff-contact.edit', $contact->id) }}"> <i class="fa fa-edit"></i>
                                        Edit </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="app-card-body px-4 w-100">
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label">
                                <strong>Title</strong>
                            </div>
                            <div class="item-data">
                                 {{ $contact->title }}
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

            <div class="col-12 mt-3">
                <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center px-3">
                            <div class="col-auto">
                                <h4 class="app-card-title">Work Infomatation <a class="btn btn-info"
                                        href="{{ route('staff-work.edit', $work->id) }}"> <i class="fa fa-edit"></i> Edit
                                    </a>
                                </h4>
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
                                        <strong>Staff Position</strong>
                                    </div>
                                    <div class="item-data">
                                        {{ $work->position->name }}
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
                    <div class="app-card-body px-4 w-100">
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
                    </div>
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
                    </div>

                </div>
            </div>

    </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

    <script>
        function resetPassword(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to Reset this staff password?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("resetPasswordForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>

    <script>
        function submitAForm(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to assign this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addRForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }




        function submitRForm(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("removeRForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
@endsection
