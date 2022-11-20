@extends('layouts.plain')

 
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



