@extends('layouts.plain')



@section('content')

	<body class="hold-transition login-page" style="background-image: url({{ asset( 'dist/img/bg-home.jpg' ) }}); background-repeat: no-repeat; background-size: cover;">
	<div  style="float:right; padding-right: 200px; padding-top: 100px;">
		<div class="login-box">
			<div class="login-logo">
				<a href="{{ asset( url('/') ) }}"><b>Veritas University </b>ECampus</a>
			</div>

			<!-- /.login-logo -->


			<div class="login-box-body loginbg">
				<div class="login-logo">
					<b>Oops! Something went wrong. </b>
				</div>
				<p class="h4">
					We will work on fixing that right away.
					Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a>.<br />
					If this continues, contact Veritas University ICT on {{ env('ICT_NUM') }}

				</p> </div>


			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

	</div>

@endsection