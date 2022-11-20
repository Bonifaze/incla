@extends('layouts.mini')



@section('pagetitle')Create New Admin Department @endsection



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content bg-white">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                 Create Admin Department
                    </h1>
            <!-- form start -->

            <div class="">

              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

						{!! Form::open(array('route' => 'admin.department.store', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
								<label for="name">Department Name :</label>
								{!! Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('name') }}</span>
							</div>

							<div class="col-md-6 form-group">
								<label for="parent_id">Parent Department :</label>
								{{ Form::select('parent_id', $admins, null,['class' => 'form-control', 'id' => 'parent_id', 'name' => 'parent_id']) }}
							<span class="text-danger"> {{ $errors->first('parent_id') }}</span>
							</div>

							</div>


							<div class="row">
              			<div class="col-md-6 form-group">
								<label for="academic_department_id">Academic Department :</label>
								{{ Form::select('academic_department_id', $academics, null,['class' => 'form-control', 'id' => 'academic_department_id', 'name' => 'academic_department_id']) }}
							<span class="text-danger"> {{ $errors->first('academic_department_id') }}</span>
							</div>

							<div class="col-md-6 form-group">
								<label for="hod_id">Head of Department :</label>
								{{ Form::select('hod_id', $staff, null,['class' => 'form-control', 'id' => 'hod_id', 'name' => 'hod_id']) }}
							<span class="text-danger"> {{ $errors->first('hod_id') }}</span>
							</div>

							</div>




							<div class="row">


							<div class="col-md-6 form-group pull-left">



							</div>
							</div>
              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Create Department', array('class' => 'btn btn-success')) }}


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
