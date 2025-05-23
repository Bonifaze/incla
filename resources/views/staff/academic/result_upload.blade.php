@extends('layouts.mini')



@section('pagetitle') {{$program_course->course->code}}  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection

<!-- Page -->
 @section('staff-courses') active @endsection

 <!-- End Sidebar links -->




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
                <h3 class="card-title">{{$program_course->program->name}} {{$program_course->course->code}} Students Result</h3>
				</div>

				<div class="col-md-6">
				<a class="btn btn-info" href="{{route("program_course.results.excel_download",base64_encode($program_course->id))}}"> Download Template</a>
				<a class="btn btn-success" href="{{route("program_course.results.upload_excel",base64_encode($program_course->id))}}"> Upload Excel</a>
				</div>
            @include('partialsv3.flash')

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Id</th>
							  <th>Mat No</th>
							  <th>CA 1</th>
							  <th>CA 2</th>
							  <th>CA 3</th>
							  <th>Exam</th>



						  </thead>

							{!! Form::open(array('route' => ['program_course.students_results_store',base64_encode($program_course->id)], 'method'=>'POST', 'class' => 'nobottommargin')) !!}
						  <tbody>

						  @foreach ($results as $key => $result)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $result->student->academic->mat_no }}</td>
								<td>{!! Form::text("parameters[$result->id][ca1]", $result->CA1, array( 'placeholder' => '','class' => 'form-control', 'min' => '0', 'max' => '10', 'required' => 'required')) !!}</td>
								<td>{!! Form::text("parameters[$result->id][ca2]", $result->CA2, array( 'placeholder' => '','class' => 'form-control', 'required' => 'required')) !!}</td>
								<td>{!! Form::text("parameters[$result->id][ca3]", $result->CA3, array( 'placeholder' => '','class' => 'form-control', 'required' => 'required')) !!}</td>
								<td>{!! Form::text("parameters[$result->id][exam]", $result->exam, array( 'placeholder' => '','class' => 'form-control', 'required' => 'required')) !!}</td>



							</tr>
							{{ Form::hidden("parameters[$result->id][id]", $result->id) }}
							@endforeach

						  </tbody>



						</table>



            </div>

				<!-- /.card-body -->

				<div class="card-footer">

					{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

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
