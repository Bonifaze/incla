<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="../img/uaes.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>INCLA | New Account </title>
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
      
        .form-title{
               
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
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body style="background-image: url('../img/incla-block.jpg'); opacity: 0.9;">
    <div class="main">
        <div class=" signup">
            <div class="container">

                <div class="signup-content">
                    <form method="POST" action="/register">
                        @csrf
                        <h2 class="form-title ">CREATE ACCOUNT</h2>
                        @if (session('signUpMsg'))
                        {!! session('signUpMsg') !!}
                        @endif
                        <div class="form-group">
                            <div class="form-group">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name" autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="form-group">
                                <input id="other_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="middle_name"  placeholder="Other Name" autocomplete="other_name" autofocus>

                                @error('other_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number" autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">

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

                        <div class="form-group">
                            <!-- <div class="form-group m-1">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to all statements in the <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->

                            <button type="submit" class="btn text-white fw-bold btn-success mb-2">
                                {{ __('Register') }}
                            </button>
                            <br>
                            <p> Already have an account? <a href="/" class="text-warning"> Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
