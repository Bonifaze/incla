@extends('layouts.plain')


 @section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>Veritas University Abuja</title>

@endsection

  @section('css')

   <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css')}}">

  <style>

  .loginbg {
  	background-color: rgba(0,0,0,0.1);
    border: 1px solid;
    border-top-color: rgba(255,255,255,.4);
    border-left-color: rgba(255,255,255,.4);
    border-bottom-color: rgba(60,60,60,.4);
    border-right-color: rgba(60,60,60,.4);
}
  </style>



@endsection

  @section('content')

<body class="hold-transition login-page" style="background-image: url({{ asset( 'dist/img/vuna3.jpg' ) }}); background-repeat: no-repeat; background-size: cover;">
<div  style="float:right; padding-right: 200px; padding-top: 100px;">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset( url('/') ) }}"><b>Veritas University </b>ECampus</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body loginbg">
  <a class="btn btn-block bg-gradient btn-primary" style='font-size:20px'; href="{{ route('staff.login') }}"> <i class="fa fa-user" style='font-size:36px';></i> Staff Login </a>

  </div>

  <div> <p> </p> </div>

  <div class="login-box-body loginbg">
  <a class="btn btn-block bg-gradient btn-success" href="{{ route('student.login') }}" style='font-size:20px;'> <i class="fa fa-graduation-cap" style='font-size:36px;'></i> Student Login </a>

  </div>
  <!-- /.login-box-body -->
  <div> <p> </p> </div>

  <div class="login-box-body loginbg">
  <a class="btn btn-block btn-success" href="/admissions/login" style='font-size:20px;'> <i class="fa fa-graduation-cap" style='font-size:36px;'></i> Applicant Login </a>

  </div>
</div>
<!-- /.login-box -->

</div>

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



