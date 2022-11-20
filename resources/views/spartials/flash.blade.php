<!-- Flash messages
    ======================================================================== -->
   
<!-- display input success if any exists -->
@if ($success = Session::get('success'))

<div style="color:#090; font-weight:bolder;"> {!! $success !!}</div>

@endif

<!-- display input message if any exists -->
@if ($message = Session::get('message'))

<div style="color:blue; font-weight:bolder;"> {!! $message !!}</div>

@endif

<!-- display input errors if any exists -->
@if ($errors = Session::get('errors'))

<div style="color:#DF0101; font-weight:bolder;"> {!! $errors !!}</div>

@endif


    <!--Flash messages / End -->