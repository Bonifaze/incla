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

            <div class="card ">
                <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                      Download ID Card Information by Program and Level
                    </h1>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

                {!! Form::open(array('route' => 'result.card_info', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                <div class="card-body">
                  <div class="box-body">

                          <div class="row">
                            <div class="col-md-6 form-group">
                                    <label for="program">Program :</label>
                                    {{ Form::select('program', $programs, null, ['class' => 'form-control', 'id' => 'program', 'name' => 'program', 'required' => 'required']) }}
                                <span class="text-danger"> {{ $errors->first('program') }}</span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="program">Level :</label>
                                {{ Form::select('program', $levels, null, ['class' => 'form-control', 'id' => 'level', 'name' => 'level', 'required' => 'required']) }}
                            <span class="text-danger"> {{ $errors->first('level') }}</span>
                        </div>

                        </div>

                  </div>
                 </div>

                    <!-- /.card-body -->

                    <div class="card-footer">

                        {{ Form::submit('Downlaod', array('class' => 'btn btn-success')) }}

                    </div>

                     </div>
                   <!-- /.box-body -->

                {!! Form::close() !!}

            </div>

	<!-- form start -->

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
