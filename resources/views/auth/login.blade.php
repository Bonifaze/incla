{{--  @extends('layouts.plain')


 @section('pagetitle')

<title> Laravel Starter Login</title>

@endsection

  @section('css')

   <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css')}}">




@endsection

  @section('content')

<body class="hold-transition login-page" style="background-image: url({{ asset( 'dist/img/login1.jpg' ) }}); background-repeat: no-repeat; background-size: cover;">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset( url('/home') ) }}"><b>Laravel </b>Starter</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
     @csrf
      <div class="form-group has-feedback">

        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
            <span class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong> </span>
             @endif

      </div>



      <div class="form-group has-feedback">
        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
		 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		 @if ($errors->has('password'))
		 <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
          @endif
      </div>



      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <button type="submit" class="btn btn-primary"> {{ __('Login') }}</button>



        </div>
        <!-- /.col -->
      </div>
    </form>


		 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Admin Password?') }}
         </a>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection

@section('pagescript')
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection


  --}}



  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veritas University|Home</title>
  <style>
    .hero-full-screen {
      height: 100vh;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-justify-content: center;
      -ms-flex-pack: justify;
      justify-content: center;
      background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url("{{ asset('/css/view-2.jpg') }}") center center no-repeat;
      background-size: cover;
    }

    .hero-full-screen .middle-content-section {
      text-align: center;
      color: #fefefe;
    }

    .hero-full-screen .top-bar {
      background: transparent;
    }

    .hero-full-screen .top-bar .menu {
      background: transparent;
    }

    .hero-full-screen .top-bar .menu-text {
      color: #fefefe;
    }

    .hero-full-screen .top-bar .menu li {
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .hero-full-screen .top-bar .menu a {
      color: #fefefe;
      font-weight: bold;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
      text-transform: uppercase;
    }

    h1 {
      font-size: 3.5em;
    }

  </style>

</head>

<body>

  <div class="hero-full-screen">

    <div class="middle-content-section">
      <h4 class="m-4 ">Welcome to</h4>
      <h1 class="m-4 fw-bold">Veritas University Portal</h1>
      <a href="{{ route('student.login') }}" class="btn btn-success px-4 m-2 fs-5">STUDENT</a>
      <a href="{{ route('staff.login') }}" class="btn btn-success px-4 m-2 fs-5">STAFF</a>
      <a href="/admissions/login" class="btn btn-success px-4 m-2 fs-5">APPLICANT</a>
      <!-- <button class="button large">Button</button> -->
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>

