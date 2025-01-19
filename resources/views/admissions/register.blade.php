<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="../img/uaes.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>INCLA | New Account Registration </title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">


    <style>
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

        .form-title {

            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Dancing Script', cursive;
        }

        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
                margin-bottom: 4rem;
            }
        }


        @media (min-width:961px) {
            body {
                margin-bottom: 29rem;
            }
        }

    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->

    <link rel="stylesheet" href="{{ asset('css/regform.css')}}">
</head>

<body>



    <div class="wrapper" style="background-image: url('../img/bg-registration-form-2.jpg');">
        <div class="inner">
            <form method="POST" action="/register">
                <h3>New Applicant Registration Form</h3>
                @csrf
                @if (session('signUpMsg'))
                {!! session('signUpMsg') !!}
                @endif
                <div class="form-group">
                    <div class="form-wrapper  @error('surname') is-invalid @enderror" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Surname" autofocus>
                        <label for="">Surname</label>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for="">First Name</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name" autocomplete="first_name" autofocus>

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-wrapper ">
                        <label for="">Other Names</label>
                        <input id="other_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="middle_name" placeholder="Other Name" autocomplete="other_name" autofocus>

                        @error('other_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for="">Phone</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number" autocomplete="phone" autofocus>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">

                </div>
                {{--  <div class="form-wrapper">
                    <label for="admission_type">Admission Type</label>
                    <select id="admission_type" name="admission_type" class="form-control @error('admission_type') is-invalid @enderror" required>
                        <option value="" disabled selected>Select Admission Type</option>
                        <option value="licentiate">LICENTIATE</option>
                        <option value="diploma">DIPLOMA</option>
                        <option value="certificate">CERTIFICATE</option>
                    </select>
                    @error('admission_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  --}}
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> I caccept the Terms of Use & Privacy Policy.
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit">{{ __('Register') }}</button>
                <br>
                <p> Already have an account? <a href="/" class="text-warning"> Login</a></p>
            </form>
        </div>
    </div>

</body>

</html>
