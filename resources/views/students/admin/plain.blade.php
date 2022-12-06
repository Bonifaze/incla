@extends('layouts.mini')



@section('pagetitle') List Students  @endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Students Data </h3>
				</div>

             <div class="table-responsive card-body">

                 {!! $data !!}

            </div>

          </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
@endsection
