@extends('layouts.mini')



@section('pagetitle') Search Student  @endsection




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
                        Search Students
                    </h1>

            <div class="card">

             <div class="table-responsive">

				<!-- form start -->
             @include("partialsv3.flash")

						{!! Form::open(array('route' => 'student.find', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  @if($errors->has('data')) class ='has-error form-group' @endif>
								<label for="data">Surname, First Name, ID, Mat No, Email or Phone Number:</label>
								{!! Form::search('data', null, array( 'placeholder' => 'Surname, First Name, ID, Mat No, Email or Phone Number','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}

								</div>
								</div>
								</div>
              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}

            </div>

{{--
  <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Search Students Mat No.
                    </h1>  --}}
            <div class="card ">

                @include("partialsv3.flash")
                <div class="table-responsive">

                    <!-- form start -->

                    {!! Form::open(array('route' => 'student.find_matric', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div  @if($errors->has('data')) class ='has-error form-group' @endif>
                                        <label for="data"> Mat No:</label>
                                        {!! Form::search('data', null, array( 'placeholder' => ' Mat No','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

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
