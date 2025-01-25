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
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                      Edit Applicant
                    </h1>


        <div class="container">
            <div class="signup-content">
                @if (session('signUpMsg'))
                    {!! session('signUpMsg') !!}
                @endif
                <form method="POST" action="/editusersinfo" id="signup-form" class="shadow p-4">
                    @csrf

                    <div class="form-group">

                        <div class="form-group">
                            <label for="">Surname:  <strong>{{ $allApp->surname }}</strong>  </label>
                            <input id="provider_code" type="text" class="form-input form-control m-3" name="surname" required value="{{ $allApp->surname }}">

                            <label for="firstname">First Name:  <strong>{{ $allApp->first_name }}</strong></label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="first_name"
                                required value="{{ $allApp->first_name }}" autofocus>

                                 <label for="firstname">Middle Name:  <strong>{{ $allApp->middle_name }}</strong></label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="middle_name"
                                required value="{{ $allApp->middle_name }}" autofocus>

                            <label for="">Phone:  <strong>{{ $allApp->phone }} </strong></label>
                            <input id="name" type="text" class="form-input form-control m-3" name="phone" required
                                value="{{ $allApp->phone }}" autofocus>
                            <label for="firstname">Email:  <strong>{{ $allApp->email }}</strong> </label>
                            <input id="name" type="text" class="form-input form-control m-3" name="email" required
                                value="{{ $allApp->email }}" autofocus>
                            <label for="">Email verified:  <strong> {{ $allApp->email_verified_at }} </strong> </label>
                            <input type="date" class="form-control" value="{{ $allApp->email_verified_at }}"
                                name="email_verified_at">

                            <label for="firstname">Applicant Type:  <strong> {{ $allApp->applicant_type }}
                                </strong></label>
                            {{--  <input id="name" type="text" class="form-input form-control m-3" name="applicant_type"
                                value="{{ $allApp->applicant_type }}" placeholder="Allicant Type" autofocus>  --}}
                            <select class="form-input form-control m-3" name="applicant_type">
                                <option value="{{ $allApp->applicant_type }}" >{{ $allApp->applicant_type }}</option>
                                <option value="Licentiate"> Licentiate</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Certificate">Certificate</option>



                            </select>
                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <br><BR><BR><BR><BR><BR>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
