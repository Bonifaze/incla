@extends('layouts.plain')


@section('pagetitle')
<title>Veritas University Abuja</title>
@endsection


@section('content')

<!-- Content
    ======================================================================== -->

<section id="content">

			<div class="content-wrap">
<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{asset('user/images/home/login.jpg')}}') center center no-repeat; background-size: cover;"></div>


<div class="container clearfix">




							<div class="tab-content clearfix" id="tab-login" style="max-width: 500px;">
								<div class="card nobottommargin">
									<div class="card-body" style="padding: 40px;">
										Oops! Something went wrong. <br />
										 We will work on fixing that right away.
            Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a>.<br />
            If this continues, contact Veritas University ICT on {{ env('ICT_NUM') }}
									</div>
								</div>
							</div>

				</div>

				</div>

		</section>

@endsection