@extends('layouts.adminsials')



@section('pagetitle')
    Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
    menu-open
@endsection

@section('student')
    active
@endsection

<!-- Page -->
@section('home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <div class="card">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Show Student Information
                        </h1>


                        <div class="col-auto">
                            <div class="card border-left-success shadow h-100 py-3">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 text-success";>
                                                <ul>
                                                    <li>Matric Number: <span class="text-black">
                                                            {{ $academic->mat_no }}</span> </li>
                                                    <li>Username: <span class="text-black"> {{ $student->username }}
                                                        </span></li>
                                                    <li>Password: <span class="text-black">welcome </span></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="">
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('student.login.submit') }}">
                                                @csrf


                                                <input id="email" type="hidden" placeholder="Username"
                                                    class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ $student->username }}" required autofocus>




                                                <input id="password" type="hidden" placeholder="Password"
                                                    class=" form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" value="welcome">



                                                <input type="checkbox" value="None" id="checkbox1" class=""
                                                    style="appearance:none; -webkit-appearance:none; -moz-appearance: none; width: 18px; height: 18px; border-radius: 50p% boder:2px solid green; outline:none;"
                                                    name="check" checked>

                                                <button type="submit" class="btn btn-success">
                                                    {{ __('Login Student Portal') }}</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-4">
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
                                                            <strong>Passport</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/jpg;base64,{{ $student->passport }}"
                                                                alt="Student Passport"
                                                                style="height: 220px; width:220px;" />
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Signature</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/jpg;base64,{{ $student->signature }}"
                                                                alt="Student signature"
                                                                style="height: 220px; width:220px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Surname</strong></div>
                                                        <div class="item-data">{{ $student->surname }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>First Name</strong></div>
                                                        <div class="item-data">
                                                            {{ $student->first_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Other Name</strong></div>
                                                        <div class="item-data">
                                                            {{ $student->middle_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Username</strong></div>
                                                        <div class="item-data">
                                                            {{ $student->username }}
                                                        </div>
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
                                                        <div class="item-label"><strong>Email</strong></div>
                                                        <div class="item-data">{{ $student->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Gender</strong></div>
                                                        <div class="item-data">{{ $student->gender }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Date of Birth</strong></div>
                                                        <div class="item-data">{{ $student->dob }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Religion</strong></div>
                                                        <div class="item-data">{{ $student->religion }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Nationality</strong></div>
                                                        <div class="item-data">
                                                            {{ $student->nationality }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Address</strong></div>
                                                        <div class="item-data">{{ $student->address }}
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
                                                            {{ $student->state_origin }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>LGA</strong></div>
                                                        <div class="item-data">{{ $student->lga }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Hobbies</strong></div>
                                                        <div class="item-data">{{ $student->hobbies }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row gy-4 mb-4 mt-1">

                                    <div class="col mt-3">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center px-3">
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
                                                                <strong>Title</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $contact->title }}
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
                                                                <strong>Surname</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $contact->surname }}
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
                                                                <strong>Surname</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $contact->other_names }}
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

                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center px-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Academic Information</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Mode of Entry</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->mode_of_entry }}
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
                                                                <strong>Mode of Study</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->mode_of_study }}
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
                                                                <strong>Matric Number</strong>
                                                            </div>
                                                            <div class="item-data">

                                                                {{ $academic->mat_no }}
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
                                                                <strong>Program </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->program->name }}
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
                                                                <strong>Level </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->level }}
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
                                                                <strong>Entry Session </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->session->name }}
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
                                                                <strong>Jamb No </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->jamb_no }}
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
                                                                <strong>Jamb Score </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $academic->jamb_score }}
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
                                                        <h4 class="app-card-title">Medical Information</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Physical Status</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $medical->physical }}
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
                                                                <strong>Blood Group</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $medical->blood_group }}
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
                                                                <strong>Genotype</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $medical->genotype }}
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
                                                                <strong>Known Medical Condition</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $medical->condition }}
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
                                                                <strong>Allergies</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                {{ $medical->allergies }}
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
                </div>
            </div>
            <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <script src="{{ asset('js/bootbox.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>

    <script>
        function resetPassword(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to Reset this students password?</h4>",
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
@endsection
