@extends('layouts.plain')

@section('pagetitle')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="../img/uaes.png">

    <title>InCLA | Staff Portal Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
@endsection

@section('css')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("{{ asset('/css/incla-class.jpg') }}") center center no-repeat;
            background-size: cover;
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .login-form {
            background: rgba(0, 0, 0, 0.7);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
            padding: 30px 40px;
            border-radius: 15px;
            color: white;
            max-width: 400px;
            width: 100%;
            margin: 0;
        }

        .btn-success {
          background-color: #f0ad4e;
          border: none;
          border-radius: 30px;
          color: #fff;
          width: 100%;
          padding: 12px;
          font-size: 1.2em;
      }

      .btn-success:hover {
          background-color: #ec971f;
      }

        .form-control {
            border-radius: 30px;
            background-color: #f1f1f1;
            border: 1px solid #5bc0de;
            color: #333;
        }

        .input-group-text {
            background-color: #5bc0de;
            border-radius: 30px;
            color: white;
        }

        .login-heading {
            text-align: center;
            margin: 20px;
            color: #fff;
            font-size: 2em;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Dancing Script', cursive;
        }

        .link-text {
            margin-bottom: 10px;
            color: #fff;
            font-size: 1.2em;
            font-weight: 400;
        }

        .active-link {
            font-weight: 500;
            text-decoration: underline;
        }

        label {
            font-weight: 500;
        }

        .buttons-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            gap: 10px;
        }

        .button-aligned {
            width: 150px;
            padding: 12px;
            background-color: #5bc0de;
            color: white;
            border-radius: 30px;
            text-align: center;
            font-size: 1.1em;
            border: none;
        }

        .button-aligned:hover {
            background-color: #31b0d5;
        }

        @media only screen and (max-width: 480px) {
    body {
        font-size: 18px; /* Adjust font size for mobile */
        padding-top: 70px; /* Provide top padding to avoid overlap with navbar */
    }

    .login-form {
        width: 90%;
        max-width: 90%; /* Ensure form takes full width on mobile */
    }

    .buttons-container {
        flex: 1;
        align-items: center;
        gap: 15px;
    }

    .button-aligned {
        width: 100%;

    }
    .login-heading {

    margin: 5px;

    font-size: 1em;

    font-weight: 300;

}
.link-text {
    margin-bottom: 5px;

    font-size: 1em;
    font-weight: 300;
}


}
    </style>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login-form">
                    <div class="login-heading">
                        <p>Staff Portal </p>
                    </div>
                    <form method="POST" action="{{ route('staff.login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"> Email</label>
                            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong> </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group form-check">
                            <label class="form-check-label" for="remember">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (session('loginMsg'))
                            {!! session('loginMsg') !!}
                        @endif
                        <br>
                        <button type="submit" class="btn btn-success">{{ __('Login') }}</button>
                        <br>
                        <p class="link-text"><a href="/forgotpassword" class="text-danger active-link">Forgot Password</a></p>
                        <br>

                    </form>

                    <!-- Buttons for Applicant and Staff login -->
                    <div class="buttons-container">
                        <a href="/admissions/login"><button class="button-aligned">Applicant Login</button></a>
                        <a href="{{ route('student.login') }}"><button class="button-aligned">Student Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@section('pagescript')
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection
