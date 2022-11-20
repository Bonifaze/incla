@php

if (!session('adminId')) {
    header('location: /adminLogin');
    exit();
}
@endphp
@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')


        <div class="container">
            <div class="signup-content">
                @if (session('signUpMsg'))
                    {!! session('signUpMsg') !!}
                @endif
                <form method="POST" action="/editusersinfo" id="signup-form" class="shadow p-4">
                    @csrf
                    <h2 class="form-title text-success mx-3 text-uppercase">Edit User</h2>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="">Surname:  <strong>{{ $allApp->surname }}</strong>  </label>
                            <input id="provider_code" type="text" class="form-input form-control m-3" name="surname" required value="{{ $allApp->surname }}">

                            <label for="firstname">First Name:  <strong>{{ $allApp->first_name }}</strong></label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="first_name"
                                required value="{{ $allApp->first_name }}" autofocus>

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
                            <input id="name" type="text" class="form-input form-control m-3" name="applicant_type"
                                value="{{ $allApp->applicant_type }}" placeholder="Allicant Type" autofocus>
                            {{-- <select class="form-input form-control m-3" name="category">
                                <option >{{ $fee_types->category }}</option>
                                <option value="1"> Application Fee</option>
                                <option value="2">Acceptance Fee</option>
                                <option value="3">School Fee</option>
                                <option value="4">Other Fee</option>

                            </select> --}}
                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
