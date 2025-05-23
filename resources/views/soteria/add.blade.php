@extends('layouts.mini')



@section('pagetitle')Network Manager @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('soteria-open') menu-open @endsection

@section('soteria') active @endsection

<!-- Page -->
 @section('soteria-add') active @endsection

 <!-- End Sidebar links -->





@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <!-- form start -->

            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Add Network Device </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

						{!! Form::open(array('route' => 'course.store', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
              			<div class="col-md-4 form-group">
								<label for="code">User Type :</label>
								{!! Form::text('code', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'code', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('code') }}</span>
							</div>

							<div class="col-md-8 form-group">
								<label for="title">Course Title :</label>
								{!! Form::text('title', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'title', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('title') }}</span>
							</div>
							</div>


							<div class="row">
              			<div class="col-md-4 form-group">
								<label for="hours">Credit Load :</label>
								{!! Form::text('hours', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'hours', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('hours') }}</span>
							</div>

							<div class="col-md-8 form-group">
								<label for="program_id">Host Program :</label>
								{{ Form::select('program_id', $programs, null,['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
							<span class="text-danger"> {{ $errors->first('program_id') }}</span>
							</div>
							</div>

							<div class="row">
							<div class="col-md-12 form-group">
							<div  @if($errors->has('description')) class ='has-error form-group' @endif>

								<label for="description">Description :</label>
								 {!! Form::textarea('description', null, array('placeholder' => '','rows'=>'3', 'class' => 'form-control', 'id' => 'description', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('description') }}</span>
								</div>
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


							{{ Form::submit('Create Course', array('class' => 'btn btn-primary')) }}


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
