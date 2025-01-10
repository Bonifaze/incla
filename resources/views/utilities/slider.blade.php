@extends('layouts.mini')



@section('pagetitle') Slider @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('vc-open') menu-open @endsection

@section('vc') active @endsection

<!-- Page -->
 @section('vc-list') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card card-primary">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
Slider Picture
                    </h1>

            @include('partialsv3.flash')
             <div class="table-responsive card-body">



            </div>

          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')

@endsection

