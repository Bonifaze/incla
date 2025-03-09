@extends('layouts.plain')

@section('pagetitle')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INCLA | Admission Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
@endsection

@section('css')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("{{ asset('/css/incla-class.jpg') }}") center center no-repeat;
            background-size: cover;
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-form {
            background: rgba(0, 0, 0, 0.7);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
            padding: 30px 40px;
            border-radius: 15px;
            color: white;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            display: none; /* Initially hide both forms */
        }

        .login-heading {
            text-align: center;
            margin: 20px;
            color: #e5e5e5;
            font-size: 2em;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Dancing Script', cursive;
        }

        .btn-success {
            background-color: #f0ad4e;
            border: none;
            border-radius: 30px;
            color: #e5e5e5;
            width: 100%;
            padding: 12px;
            font-size: 1.2em;
        }

        .btn-success:hover {
            background-color: #ec971f;
        }

        .form-control {
            border-radius: 30px;
            background-color: #f1f1f1;
            border: 1px solid #5bc0de;
            color: #333;
        }

        .input-group-text {
            background-color: #5bc0de;
            border-radius: 30px;
            color: white;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .button-aligned {
            width: 150px;
            padding: 12px;
            background-color: #0275d8;
            color: white;
            border-radius: 30px;
            text-align: center;
            font-size: 1.1em;
            border: none;
        }

        .button-aligned:hover {
            background-color: #025aa5;
        }

        /* Positioning the forms */
        .student-form {
            position: absolute;
            right: 10%;
            display: none; /* Initially hidden */
        }

        .staff-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none; /* Initially hidden */
        }

        @media only screen and (max-width: 480px) {
            body {
                font-size: 20px;
                padding-top: 90px;
            }

            .login-form {
                width: 100%;
                max-width: 100%;
            }

            .buttons-container {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .button-aligned {
                width: 80%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2 d-flex align-items-center justify-content-center">
                <div class="login-heading">
                    <p>APPLICANT Login</p>
                </div>
                <!-- Buttons for Student and Staff login -->
                <div class="buttons-container">
                    <button class="button-aligned" onclick="showStudentLogin()">Student Login</button>
                    <button class="button-aligned" onclick="showStaffLogin()">Staff Login</button>
                </div>

                <!-- Student Login Form -->
                <div class="login-form student-form">
                    <form method="POST" action="/student/login">
                        @csrf
                        <div class="form-group">
                            <label for="studentEmail">Email</label>
                            <input id="studentEmail" type="email" placeholder="Email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="studentPassword">Password</label>
                            <input id="studentPassword" type="password" placeholder="Password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>

                <!-- Staff Login Form -->
                <div class="login-form staff-form">
                    <form method="POST" action="/staff/login">
                        @csrf
                        <div class="form-group">
                            <label for="staffEmail">Email</label>
                            <input id="staffEmail" type="email" placeholder="Email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="staffPassword">Password</label>
                            <input id="staffPassword" type="password" placeholder="Password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStudentLogin() {
            // Hide the staff form and show the student form
            document.querySelector('.staff-form').style.display = 'none';
            document.querySelector('.student-form').style.display = 'block';
        }

        function showStaffLogin() {
            // Hide the student form and show the staff form
            document.querySelector('.student-form').style.display = 'none';
            document.querySelector('.staff-form').style.display = 'block';
        }
    </script>
@endsection
