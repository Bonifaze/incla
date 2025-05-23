@extends('layouts.mini')

@section('pagetitle') Search Remita  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('remita-search') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

            @include("partialsv3.flash")
            <div class="card card-olive">
                <div class="card-header">
                    <h3 class="card-title"> Remita Payments by Date </h3>
                </div>
                <div class="table-responsive">
                    <!-- form start -->
                    {!! Form::open(array('route' => 'remita.find-date', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                    <div class="card-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="bootstrap-timepicker col-md-6 " >
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <div class="input-group date" id="start_date" data-target-input="nearest">
                                            <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date"  required = 'required'/>
                                            <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <span class="text-danger"> {{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>
                                <div class="bootstrap-timepicker col-md-6 " >
                                    <div class="form-group">
                                        <label>End Date:</label>

                                        <div class="input-group date" id="end_date" data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date" required = 'required'/>
                                            <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <span class="text-danger"> {{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row">
                        <div class="form-group">
                            <br /><br /><br /><br />
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
                <!-- /.box-body -->




                {!! Form::close() !!}
            </div>
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> Search RRR </h3>
				</div>
             <div class="table-responsive">
  			<!-- form start -->
						{!! Form::open(array('route' => 'remita.find-rrr', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  @if($errors->has('data')) class ='has-error form-group' @endif>
								<label for="data">Enter Remita RRR:</label>
								{!! Form::search('data', null, array( 'placeholder' => 'RRR','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}
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

            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Search Student </h3>
                </div>
                <div class="table-responsive">
                    <!-- form start -->
                    {!! Form::open(array('route' => 'remita.find-student', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
                    <div class="card-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div  @if($errors->has('data')) class ='has-error form-group' @endif>
                                        <label for="data">Student Matric or Id:</label>
                                        {!! Form::search('data', null, array( 'placeholder' => 'Student Matric or Id','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}
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

    </section>
    <!-- /.content -->
  </div>

@endsection

@section('pagescript')
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
           });
        });
    </script>
@endsection
