<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Veritas University Admissions Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script></head>

    <style>
        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
            }
        }


    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
     <style>
    civ:hover{
  opacity: 1.0;
}"
  </style>
</head>

<body style="background-image: url('../img/signup-bg.jpg'); opacity: 0.9;" >
    <div class="">
        <div class="signup">

            <div class="container">
                <div class="signup-content" >

                @if (session('signUpMsg'))
            {!! session('signUpMsg') !!}
            @endif


            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title" id="exampleModalLabel">Thank you for applying veritas University Abuja.</h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="text-danger"><strong> Accomodation into Pa-Etos hostel, Male HOTEL L and Male HOSTEL K are currently unavaliable </strong></div> <br>
                      <P>
                        For inquiries kindly contact the listed numbers below:<br>

                        Rev. Fr. Dr. Richard Gokum
                        Ag. Chairman, Admission s
                        08069536843<br>

                        Iliya cephas barde
                        Admissions officer
                        07086858143<br>

                        Adidi, Timothy Dokpesi
                        Marketing officer
                        08138605055<br>

                         Ezimmuo, Martha
                        Bursary officer
                        09021727363<br>
                        <br>

                        Thanks
                        </P>
                    </div>
                    <hr>

                  </div>
                </div>
              </div>

                    <form method="POST" action="/login" id="signup-form">
                        @csrf
                        <h2 class="form-title text-success">Login</h2>
                        <div class="form-group">

                            <div class="form-group">
                                <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">
                                <input id="password" type="password" class="form-input form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if (session('loginMsg'))
                        {!! session('loginMsg') !!}
                        @endif
                        <div class="form-group">
                            <div class="form-group">


                                <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                    {{ __('Login') }}
                                </button>

                                <br>
                                <div>
                                    <a href="/register" class="text-success">Click Here </a> if you do not have an account
                                    <br>
                                    <a href="/forgotpassword" class="text-danger float-left">Forgot Password ?</a>
                                </div>

                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>
<script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        myModal.show()
</script>`
</body>

</html>
