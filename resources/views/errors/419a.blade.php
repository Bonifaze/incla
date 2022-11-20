@extends('layouts.plain)



@section('pagetitle')

419 Session Expired

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 419</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Sorry, your session has expired</h3>

          <p>
           Sorry, your session has expired. Please refresh and try again
            Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a> 
          </p>

          
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>

@endsection



@section('pagescript')


@endsection

