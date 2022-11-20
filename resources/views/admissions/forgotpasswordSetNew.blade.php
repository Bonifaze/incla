<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  Favicon   --}}
<link rel="shortcut icon" href="{{ asset('img/letter_logo.png') }}" >

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Veritas University Admissions Portal</title>

    <style>
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
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body style="background-image: url('../img/gate.jpeg');opacity: 0.9;">
    <div class="main">
        <div class=" signup">
            <div class="container">

                <div class="signup-content">
                    <form method="POST" action="/resetpassword">
                        @csrf
                        <h2 class="form-title text-success">Reset Password</h2>
                        @if (session('signUpMsg'))
                        {!! session('signUpMsg') !!}
                        @endif


              <input id="email" type="hidden" class="form-input form-control"  name="email" value="{{$uid}}">
                        <div class="form-group">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="New Password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                        </div>
                 <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                    {{ __('Login') }}
                                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
