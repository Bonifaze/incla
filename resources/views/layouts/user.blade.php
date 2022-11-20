<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Softpalms" />


<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    	
 <title> @yield('pagetitle') | Janus </title>
 
 
	<!-- header start
	============================================= -->
	
	@include("includes.users.header")
	
	
	<!-- end header information-->
	
<style>
  .required label::after
  	{
    content:" *"; 
    color: #e32;
    font-size: large;
  		opacity: 1; /* Firefox */
  	}
        
</style>


@yield('css')
 		

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					
					@include("includes.users.logo")
					
					<!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					
                   <nav id="primary-menu">
                    
                    	<ul>
                        	<li><a href="https://www.veritas.edu.ng/"><div>Veritas Home</div></a></li>
                            
                            <li><a href="https://www.veritas.edu.ng/admission/process.php"><div>Admissions Infromation</div></a></li>
                             
                             <li><a href="{{ route('staff.login')}}" target="_blank"><div>Staff Login</div></a></li>
                            
                            
                            	
						</ul>

					</nav>
                    
                    <!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
		
		
		
		<!-- Content
		============================================= -->
		
    @yield('content')
    
    <!-- #content end -->
        
        

					
		<!-- Footer
		============================================= -->
		
		@include("includes.users.footer")
		
		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('user/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ asset('user/js/plugins.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('user/js/functions.js')}}"></script>


@yield('pagescript')

</body>
</html>