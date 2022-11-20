<!-- Flash messages
    ======================================================================== -->

<!-- display input success if any exists -->
@if ($success = Session::get('success'))

<div style="color:#090; font-weight:bolder;"> {!! $success !!}</div>

@endif

<!-- display input message if any exists -->
@if ($message = Session::get('message'))


<div style="color:red; font-weight:bolder;"> {!! $message !!}</div>

@endif

<!-- display input errors if any exists -->
@if ($errors = Session::get('errors'))
	@foreach ($errors->all() as $key => $error)
    <div style="color:#DF0101; font-weight:bolder;"> {!! $error !!}</div>
    @endforeach

@endif

<!-- display input errors if any exists -->
@if ($error = Session::get('error'))

<center><div style="color:#DF0101; font-weight:bolder; padding:10px"> {!! $error !!}</div></center>

@endif


<!-- display input errors if any exists -->
@if ($warnings = Session::get('warnings'))

@foreach ($warnings->all() as $key => $warning)
    <div style="color:#DF0101; font-weight:bolder;"> {!! $warning !!}</div>
    @endforeach

@endif


    <!--Flash messages / End -->
