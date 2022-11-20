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
  
<body class="hold-transition login-page" style="background-image: url({{ asset( 'dist/img/bg-home.jpg' ) }}); background-repeat: no-repeat; background-size: cover;">
<div  style="float:right; padding-right: 200px; padding-top: 100px;">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset( url('/home') ) }}"><b>Veritas University</b> ECampus</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body loginbg">
    <p class="login-box-msg">Staff Login</p>

    <form method="POST" action="{{ route('staff.login.submit') }}">
     @csrf
      <div class="form-group has-feedback">
        
        <input id="email" type="email" placeholder="Veritas Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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


  </div>
  <!-- /.login-box-body -->
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



