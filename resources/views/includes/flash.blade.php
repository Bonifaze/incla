<!-- Flash messages
    ======================================================================== -->
    <!-- display form errors if any exists -->
@if (count($errors) > 0)

 <strong>Please Complete the following.<br><br>
 
<ul style="color:#933; font-weight:bolder;">
    @foreach($errors->all() as $error)
    
        <li>{!! $error !!}</li>
    @endforeach
</ul>

@endif

<!-- display input success if any exists -->
@if ($success = Session::get('success'))

<div style="color:#090; font-weight:bolder;"> {!! $success !!}</div>

@endif


    <!--Flash messages / End -->