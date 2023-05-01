@php
    if(auth()->user()->id!=506){
        header('location: /');
exit();
    }


@endphp

@extends('layouts.mini')



@section('pagetitle')
    Staff Assigned Roles
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>OTP Authentication</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style>
		body {
			background-color: #000;
			color: #fff;
			font-family: 'Arial', sans-serif;
		}

		.container {
			padding-top: 50px;
			max-width: 600px;
			margin: auto;
		}

		h1 {
			font-size: 48px;
			margin-bottom: 30px;
		}

		form {
			border: 2px solid #fff;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
		}

		label {
			font-size: 24px;
			margin-bottom: 20px;
		}

		input[type="text"] {
			padding: 10px;
			font-size: 24px;
			background-color: transparent;
			border: none;
			border-bottom: 2px solid #fff;
			color: #fff;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			padding: 10px 20px;
			background-color: #fff;
			border: none;
			font-size: 24px;
			border-radius: 10px;
			color: #000;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #ddd;
		}
	</style>

</head>
<body style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">
	<div class="container" style="margin-bottom: 100px;">
		<h1> Authentication</h1>
                     @include("partialsv3.flash")
         {!! Form::open(['route' => 'rbac.otp.verify', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
		{{--  <form action="/rbac/otp/verify" method="post">  --}}
			@csrf
            <input type="hidden" name="staff_id" value="{{auth()->user()->id}}"></input><br>
			<label for="otp">Enter your pin:</label>
			<input type="password" id="otp" name="pin" maxlength="50" autocomplete="off">
			<input type="submit" value="Submit">
		{{--  </form>  --}}
  {!! Form::close() !!}
	</div>
</body>
</html>

@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


@endsection
