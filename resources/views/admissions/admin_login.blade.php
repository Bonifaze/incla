@extends('layouts.plain')


@section('pagetitle')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Institute of Consecrated Life in Africa (InCLA) | Staff Login</title>
@endsection

@section('css')
    <!-- <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}"> -->

    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("{{ asset('/css/default.jpg') }}") center center no-repeat;
            background-size: cover;
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
             background: rgba(219, 219, 219,0.6);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
            padding: 70px;
            border-radius: 20px;
            color: white;
        }

        .login-heading {
            text-align: center;
            margin: 20px;
            color: #fff;
            font-size: 2.5em;
            text-transform: uppercase;
            font-weight: 600;
        }

        label {
            font-weight: 500;
        }

        @media only screen and (max-width: 480px) {
            body {
                font-size: 20px;
                padding-top: 90px;
            }

        }
    </style>
@endsection

@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-2 d-flex aligns-items-center justify-content-center">
                    <div class="login-form">
                        <div class="login-heading">
                            <p>Staff Login</p>
                        </div>
                        <form method="POST" action="/admin">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Veritas Email</label>
                                <input id="email" type="email" placeholder="Veritas Email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong> </span>
                                @endif
                                <!-- <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label" for="exampleCheck1">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                             @if (session('loginMsg'))
                                    {!! session('loginMsg') !!}
                                @endif
                            <button type="submit" class="btn btn-primary"> {{ __('Login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('pagescript')
        <!-- iCheck -->
        <!-- <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
                  <script>
                      $(function() {
                          $('input').iCheck({
                              checkboxClass: 'icheckbox_square-blue',
                              radioClass: 'iradio_square-blue',
                              increaseArea: '20%' // optional
                          });
                      });
                  </script> -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    @endsection
