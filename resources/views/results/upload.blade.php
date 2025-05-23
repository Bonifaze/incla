@extends('layouts.mini')



@section('pagetitle') Student Result Management  @endsection

<!-- Treeview -->
@section('results-open') menu-open @endsection

@section('results') active @endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">






            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> {{ $student->full_name }} <br /> {{$session->name}} - {{ $session->semesterName($semester)}} Result Upload </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">

				<!-- form start -->

						{!! Form::open(array('route' => 'result.store', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">

              			 @foreach ($results as $key => $result)
              		<div class="row">

              			<div class="col-md-1 form-group">

						</div>

						<div class="col-md-6 form-group">
								<label for="hours"> {{$result->programCourse->course->code}} : {{$result->programCourse->course->title}}</label>
								{!! Form::text("parameters[$result->id][result]", $result->total, array( 'placeholder' => '','class' => 'form-control', 'id' => 'hours', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('parameters[$result->id][result]') }}</span>
							</div>

						<div class="col-md-3 form-group">

						</div>


					</div>

					{{ Form::hidden("parameters[$result->id][id]", $result->id) }}

					@endforeach

					{{ Form::hidden("data[student]", $student->id) }}
					{{ Form::hidden("data[session]", $session->id) }}
					{{ Form::hidden("data[semester]", $semester) }}

              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

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
