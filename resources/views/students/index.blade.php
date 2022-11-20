@extends('layouts.user')


@section('pagetitle')
Admission Portal
@endsection


@section('css')

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="{{asset('css/components/bs-filestyle.css')}}" media='screen' />

@endsection

	


@section('content')

<!-- Content
    ======================================================================== -->

<section id="content">

			<div class="content-wrap">
<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{asset('user/images/home/login.jpg')}}') center center no-repeat; background-size: cover;"></div>


<div class="container clearfix">

				
					<div class="divcenter nobottommargin clearfix">

						<ul class="tab-nav tab-nav2 center clearfix">
							<li class="inline-block"><a href="{{ route('student.login') }}">Login</a></li>
							<li class="inline-block"><a href="{{ url('/students/register') }}">Register</a></li>
						</ul>
						</div>
					
							<div class="tab-content clearfix" id="tab-login" style="max-width: 500px;">
								<div class="card nobottommargin">
									<div class="card-body" style="padding: 40px;">
										<form id="login-form" name="login-form" class="nobottommargin" action="{{ route('student.login.submit') }}" method="post">
										 @csrf
											<h3>Login to your Account</h3>

											<div class="col_full">
												<label for="email">Email:</label>
												<input type="text" id="email" name="email" value="" class="form-control"  required = 'required' />
											 @if ($errors->has('email'))
                                            <span class="danger"> <strong>{{ $errors->first('email') }}</strong> </span>
                                             @endif                    
        
											</div>

											<div class="col_full">
												<label for="login-form-password">Password:</label>
												<input type="password" id="password" name="password" value="" class="form-control"  required = 'required' />
											 @if ($errors->has('password'))
                                    		 <span class="danger"><strong>{{ $errors->first('password') }}</strong></span>
                                              @endif
											</div>

											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
												
											</div>

										</form>
									</div>
								</div>
							</div>

							

				</div>
				
				</div>

		</section>

@endsection