<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Softpalms" />
<style>
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    </style>

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    	
 <title> @yield('pagetitle') | Janus </title>
 
 
	<!-- header start
	============================================= -->
	
	@include("includes.users.header")
	
	
	<!-- end header information-->
	

@yield('css')
 		

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		
		
		<!-- Content
		============================================= -->
		
    @yield('content')
    
    <!-- #content end -->
        
        

					
		

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