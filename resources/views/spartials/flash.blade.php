<!-- Flash messages
    ======================================================================== -->

<!-- display input success if any exists -->
@if ($success = Session::get('success'))

<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $success !!}</div>

@endif

<!-- display input message if any exists -->
@if ($message = Session::get('message'))

<div class="alert alert-primary alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $message !!}</div>

@endif

<!-- display input errors if any exists -->
@if ($errors = Session::get('errors'))

<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $errors !!}</div>

@endif


    <!--Flash messages / End -->
