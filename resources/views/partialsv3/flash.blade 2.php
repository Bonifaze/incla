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
	@foreach ($errors->all() as $key => $error)
    <div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $error !!}</div>
    @endforeach

@endif

<!-- display input errors if any exists -->
@if ($error = Session::get('error'))

<center><div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $error !!}</div></center>

@endif


<!-- display input errors if any exists -->
@if ($warnings = Session::get('warnings'))

@foreach ($warnings->all() as $key => $warning)
    <div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> {!! $warning !!}</div>
    @endforeach

@endif


    <!--Flash messages / End -->
