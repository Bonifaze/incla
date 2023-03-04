@extends('layouts.mini')



@section('pagetitle') Student Result Management  @endsection




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
                      Student Academics
                    </h1>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

						{!! Form::open(array('route' => 'result.find_student', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">

              		<div class="row">

              			<div class="col-md-6 form-group">
								<label for="mat_no"> Matric Number :</label>
								{!! Form::text('mat_no', null, array( 'placeholder' => 'VUG/CSC/17/2033 or VUG/22/ACC0001','class' => 'form-control', 'id' => 'mat_no', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('mat_no') }}</span>
							</div>

              			{{--  <div class="col-md-6 form-group">
								<label for="program">Program :</label>
								{{ Form::select('program', $programs, null,['class' => 'form-control', 'id' => 'program', 'name' => 'program']) }}
							<span class="text-danger"> {{ $errors->first('program') }}</span>
						</div>  --}}


					</div>




              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Search', array('class' => 'btn btn-success')) }}

                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}

            </div>



	<!-- form start -->

						{!! Form::open(array('route' => 'result.find_student', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">

              		<div class="row">

              			<div class="col-md-6 form-group">
								<label for="mat_no"> Student ID :</label>
								{!! Form::text('mat_no', null, array( 'placeholder' => '2055 or ACC0001','class' => 'form-control', 'id' => 'mat_no', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('mat_no') }}</span>
							</div>

              			<div class="col-md-6 form-group">
								<label for="program">Program :</label>
								{{ Form::select('program', $programs, null,['class' => 'form-control', 'id' => 'program', 'name' => 'program']) }}
							<span class="text-danger"> {{ $errors->first('program') }}</span>
						</div>


					</div>




              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Search', array('class' => 'btn btn-success')) }}

                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}

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
