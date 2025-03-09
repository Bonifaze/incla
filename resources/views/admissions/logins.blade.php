"@extends('layouts.plain')

@section('pagetitle')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Institute of Consecrated Life in Africa (InCLA) | Applicant Login</title>
@endsection

@section('css')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("{{ asset('/css/defaultadd.jpg') }}") center center no-repeat;
            background-size: cover;
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            background: rgba(0, 0, 0, 0.6);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
            padding: 40px;
            border-radius: 20px;
            color: white;
        }

        .login-heading {
            text-align: center;
            margin: 20px;
            color: #e5e5e5;
            font-size: 2.5em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .form-group label {
            font-weight: 500;
            color: #f1f1f1;
        }

        .form-control {
            border-radius: 10px;
            background-color: #f1f1f1;
            border: 1px solid #5bc0de;
            color: #333;
        }

        .btn-success {
            background-color: #f0ad4e;
            border: none;
            border-radius: 5px;
            color: #e5e5e5;
        }

        .btn-success:hover {
            background-color: #ec971f;
        }

        .card {
            background-color: #e5e5e5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .advert-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #0275d8;
            border-radius: 5px;
            color: #e5e5e5;
        }

        .advert-button:hover {
            background-color: #025aa5;
        }

        @media (max-width: 1008px) {
            .login-form, .card {
                margin-top: 20px;
                width: 100%;
            }

            {{--  .advert-button {
                width: 100%;
            }  --}}
        }
    </style>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="row">
            <!-- Login Form Column -->
            <div class="col-md-6">
                <div class="login-form">
                    <div class="login-heading">
                        <p>APPLICANT Login</p>
                    </div>
                    <form method="POST" action="/login">
                        @if (session('signUpMsg'))
                            {!! session('signUpMsg') !!}
                        @endif

                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong> </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label" for="exampleCheck1">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (session('loginMsg'))
                            {!! session('loginMsg') !!}
                        @endif
                        <button type="submit" class="btn btn-success"> {{ __('Login') }}</button>
                        <br><br>

                        <p class="link-text"><a href="/register" class="text-success h1 active-link">Click Here</a> if you do not have an account</p>
                        <p class="link-text"> Forgot password? <a href="/forgotpassword" class="text-danger active-link">Click here</a> to reset </p>
                    </form>
                </div>
            </div>

            <!-- Advertisement Card Column -->
            <div class="col-md-4 offset-md-1">
                <div class="card">
                    <h4>Special Announcement</h4>
                    <p>
                        <strong>Accommodation in Pa-Etos Hostel, Male HOTEL L, and Male HOSTEL K are currently unavailable.</strong><br><br>
                        For inquiries, kindly contact the following officers:
                    </p>
                    <ul>
                        <li>Rev. Fr. Dr. Richard Gokum (Ag. Chairman, Admissions) - 08069536843</li>
                        <li>Iliya Cephas Barde (Admissions Officer) - 07086858143</li>
                        <li>Adidi, Timothy Dokpesi (Marketing Officer) - 08138605055</li>
                        <li>Ezimmuo, Martha (Bursary Officer) - 09021727363</li>
                    </ul>

                    <button class="advert-button">More Information</button>
                    <button class="advert-button">Contact Us</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <!-- iCheck -->
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        myModal.show()
    </script>
@endsection