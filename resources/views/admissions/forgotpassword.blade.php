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
    <title>Institute of Consecrated Life in Africa (InCLA) Admissions Portal</title>

    <style>
        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
            }
        }

        @media (min-width:961px) {
            body {
                margin-bottom: 14rem;
            }
        }
    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body style="background-image: url('img/incla-block.jpg');opacity: 0.9;">
    <div class="main">
        <div class="signup">


            <div class="container">
                <div class="signup-content">
  @if (session('signUpMsg'))
            {!! session('signUpMsg') !!}
            @endif
                    <form method="POST" action="/forgotpassword" id="signup-form">
                        @csrf
                        <h2 class="form-title text-warning">Password Reset</h2>
                        <div class="form-group">

                            <div class="form-group">
                                <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Email Address" autofocus>


                            </div>
                        </div>




                        <div class="form-group">
                            <div class="form-group">


                                <button type="submit" class=" btn text-white fw-bold bg-warning bg-gradient mb-3 px-5">
                                    {{ __('Send Password Reset Link') }}
                                </button>





                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
