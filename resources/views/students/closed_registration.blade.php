@extends('layouts.student')



@section('pagetitle') Closed Course Registration  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open') menu-open @endsection

@section('course') active @endsection

<!-- Page -->
 @section('registration') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Course Registration is Closed
                </h1>
<br>
                      <div class="dropdown no-arrow my-3">

                                    <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-print text-white-50"></i> Print Course Form </a>

                                </div>
                </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

