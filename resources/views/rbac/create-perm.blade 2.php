@extends('layouts.mini')



@section('pagetitle')Create User Permission @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('rbac-open') menu-open @endsection

@section('rbac') active @endsection

<!-- Page -->
 @section('create-perm') active @endsection

 <!-- End Sidebar links -->





@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

                 <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                     CREATE STAFF PERMISSION
                    </h1>

            <!-- form start -->

            <div class="card card-primary">
              {{--  <div class="card-header">
                <h3 class="card-title">Create User Permission</h3>
              </div>  --}}
              <!-- /.card-header -->
              <!-- form start -->


						{!! Form::open(array('route' => 'rbac.store-perm', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-12 form-group">
								<label for="name">Name :</label>
								{!! Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name')) !!}
							 <span class="text-danger"> {{ $errors->first('name') }}</span>
							</div>

							<div class="col-md-12 form-group">
								<label for="description">Description :</label>
								{!! Form::text('description', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'description')) !!}
							 <span class="text-danger"> {{ $errors->first('description') }}</span>
							</div>




							</div>





              </div>
              <!-- /.box-body -->
</div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Create User Permission', array('class' => 'btn btn-success')) }}



                </div>
              <!-- /.box-body -->

            {!! Form::close() !!}



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
