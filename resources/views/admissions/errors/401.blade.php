@extends('layouts.mini')



@section('pagetitle')Unauthorized Access @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-warning text-yellow"></i>You are not authorized to access this page
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> Access Restricted</h2>

        
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>

@endsection



@section('pagescript')


@endsection

