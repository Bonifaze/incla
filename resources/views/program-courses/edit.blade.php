@extends('layouts.mini')



@section('pagetitle') Edit Program Course @endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('courses-open') menu-open @endsection

@section('courses') active @endsection

<!-- Page -->
 @section('create-course') active @endsection

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
                       Edit Program course
                    </h1>
            <div class="card">

              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

						{!! Form::model($pcourse, ['method' => 'PATCH','route' => ['program_course.update', $pcourse->id]]) !!}

 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
              			{{--  <div class="col-md-5 form-group">
								<label for="host_program_id">Host Program :</label>
								{{ Form::select('host_program_id', $programs, $pcourse->course->program_id,['class' => 'form-control', 'id' => 'host_program_id', 'name' => 'host_program_id', 'onchange' =>'getCourses()']) }}
							<span class="text-danger"> {{ $errors->first('host_program_id') }}</span>
							</div>  --}}

							<div class="col-md-4 form-group">
								<label for="program_id">Program :</label>
								<select name="program_id" id="program_id" class="form-control">
									<option value="">Select Program</option>
									@foreach ($programs as $id => $name)
										<option value="{{ $id }}" {{ $pcourse->program_id == $id ? 'selected' : '' }}>{{ $name }}</option>
									@endforeach
								</select>
							<span class="text-danger"> {{ $errors->first('program_id') }}</span>
							</div>

							     {!! Form::hidden('level', 100, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}


                                {!! Form::hidden('semester', 1, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}

                            <div class="col-md-4 form-group">
								<label for="session_id">Session :</label>
								{{ Form::select('session_id', $sessions, null,['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
							<span class="text-danger"> {{ $errors->first('session_id') }}</span>
							</div>
							</div>


							<div class="row">










							</div>



							<div class="row">
              			<div class="col-md-5 form-group">
								<label for="course_id">Course Describe :</label>
								<select name="course_id" id="course_id" class="form-control">
									@foreach ($courses as $id => $name)
									<option value="{{ $id }}" {{ $pcourse->course_id == $id ? 'selected' : '' }}>{{ $name }}</option>
									@endforeach
								</select>


							<span class="text-danger"> {{ $errors->first('course_id') }}</span>
							</div>

							<div class="col-md-4 form-group">
								<label for="hours">Credit Load :</label>
								{!! Form::text('credit_unit', $pcourse->credit_unit, array( 'placeholder' => '','class' => 'form-control', 'id' => 'credit_unit', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('hours') }}</span>
							</div>

							</div>




              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">


							{{ Form::submit('Edit Program Course', array('class' => 'btn btn-primary')) }}


                </div>
              <!-- /.box-body -->


            {!! Form::close() !!}



          </div>
          <!-- /.box -->

        </div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						Staff Allocation
					</h4>
					<div class="mt-4">
						@if (session()->has('msg'))
							<div class="alert alert-danger">{{ session()->get('msg') }}</div>
						@endif
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Course Code</th>
										<th>Course Title</th>
										<th>Staff Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($staff_courses as $staff_course)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $staff_course->course_code }}</td>
											<td>{{ $staff_course->course_title }}</td>
											<td>{{ $staff_course->staff_name }}</td>
											<td><a href="{{ route('drop_staff_course', $staff_course->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to drop this course?')">Drop</a></td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script type="text/javascript">

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


</script>

	<script>
function getHours()
{

	 course_id = document.getElementById("course_id").value;
	 $.ajax({
            type: 'post',
            url: "{{route('course.program_course_get_course_hours')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'course_id': course_id


            },
            success: function(dataC,status) {
            	//console.log(dataC);

            	$('#hours').attr('value', dataC);

            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#hours').html(errorThrown);
            }

        });



}


function getLecturers(program_id)
{

	 $.ajax({
            type: 'post',
            url: "{{route('staff.program_course_get_lecturers')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'program_id': program_id


            },
            success: function(dataL,status) {
            	//console.log(dataL);

            	var listitems = '';
            	$.each(dataL,function(key, value)
            			{
           		 listitems += '<option value=' + key + '>' + value + '</option>';
            			});
            	$('#lecturer_id').html(listitems);

            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#lecturers_id').html(errorThrown);
            }

        });



}



	</script>


@endsection
