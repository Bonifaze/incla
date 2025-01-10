@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>INCLA | Admission Login</title>
@endsection

@section('css')
<style>
    body {
        background: linear-gradient(120deg, rgba(137, 247, 254, 0.8), rgba(102, 166, 255, 0.8)), 
                    url("{{ asset('/css/incla-class.jpg') }}") center center no-repeat;
        background-size: cover;
        padding-top: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        width: 100%;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
        margin-right: 20px;
    }

    .advert-card {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        display: none !important; /* Force hidden by default */
    }

    .advert-card.show {
        display: block !important; /* Force visible on larger screens */
    }

    .login-heading {
        font-size: 2.5em;
        font-weight: 700;
        color: #333;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    label {
        font-size: 1.1em;
        font-weight: 600;
        color: #333;
    }

    .input-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #999;
    }

    input {
        width: 100%;
        padding: 12px 20px 12px 40px; /* Add padding to accommodate icons */
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1em;
        color: #333;
    }

    input:focus {
        border-color: #66a6ff;
        outline: none;
        box-shadow: 0 0 5px rgba(102, 166, 255, 0.5);
    }

    .btn {
        width: 100%;
        padding: 15px;
        background-color: #66a6ff;
        border: none;
        border-radius: 8px;
        font-size: 1.2em;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #5588cc;
    }

    .link-text {
        margin-top: 20px;
        font-size: 1.1em;
    }

    .active-link {
        color: #66a6ff;
        text-decoration: underline;
        font-weight: 600;
    }

    .active-link:hover {
        color: #5588cc;
    }

    .password-eye-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .advert-card {
            display: none !important; /* Enforce hiding on mobile screens */
        }

        .login-container {
            margin-right: 0;
        }
    }

    @media (min-width: 769px) {
        .advert-card {
            display: block !important; /* Force display on large screens */
        }
    }
</style>

@endsection

@section('content')

<body>
    <div class="container">
        <!-- Login Form -->
        <div class="login-container">
            <div class="login-heading">
                <p>APPLICANT Login</p>
            </div>
            <form method="POST" action="/login">
                @if (session('signUpMsg'))
                    {!! session('signUpMsg') !!}
                @endif

                @csrf
                <!-- Email Input -->
                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <i class="fas fa-eye password-eye-icon" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <!-- Remember Me Checkbox -->
                <div class="form-group form-check">
                    <label class="form-check-label" for="remember">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (session('loginMsg'))
                    {!! session('loginMsg') !!}
                @endif

                <button type="submit" class="btn"> {{ __('Login') }}</button>

                <p class="link-text mt-3">
                    <a href="/register" class="active-link">Click Here</a> if you do not have an account
                </p>
                <p class="link-text">
                    Forgot password? <a href="/forgotpassword" class="active-link">Click here</a> to reset
                </p>
            </form>
        </div>

        <!-- Advert Card (Visible only on larger screens) -->
        <div class="advert-card">
            <h4>Special Offer for Students and Staff</h4>
            <p>Don't miss our exclusive admissions packages!</p>
            <button class="btn">Learn More</button>
        </div>
    </div>
</body>

@endsection

@section('pagescript')
<script>
    // Toggle password visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePassword');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.show()
</script>
@endsection
