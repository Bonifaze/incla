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
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

 <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Change Password
                </h1>
<div class="">

                                            {{-- 2nd table div  --}}
                                            <form method="POST" action="/editpassword" class="p-3">
                                                @csrf
                                                <input id="email" type="hidden" class="form-input form-control"
                                                    name="email" value="{{ $applicantsDetails->email }}">
<div class="row">
<div class="col">
                           <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                           required placeholder="Current Password"
                                                            autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
</div>
<div class="col">

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required placeholder="New Password"
                                                            autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
</div>
<div class="col">
  <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            placeholder="Confirm Password" autocomplete="new-password">
                                                    </div>
                                                </div>
</div>

</div>



                                                <div class="form-group">
                                                    <div class="form-group">

                                                        {{-- @if (session('signUpMsg'))
                                                                {!! session('signUpMsg') !!}
                                                            @endif  --}}
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


  </div>

@endsection


@section('pagescript')
    <!-- External JavaScripts
             ============================================= -->


    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>

@endsection
