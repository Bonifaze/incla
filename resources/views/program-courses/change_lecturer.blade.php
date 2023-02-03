@extends('layouts.mini')



@section('pagetitle') Edit Program Course Lecturer @endsection


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


            <!-- form start -->

            <div class="card card-primary">

                             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       Change {!! $pcourse->course->courseDescribe !!} Lecturer
                    </h1>



              <!-- /.card-header -->
              <!-- form start -->
            @include('partialsv3.flash')

            {{--  <a class="btn btn-info" href="{{ URL::previous('/academia/departments/program-level-courses/{id}/{level}') }}"> Back </a>  --}}

              <form method="POST" action="/program-courses/change-lecturer" enctype="multipart/form-data" class="p-3">
                        @csrf



 			<div class="card-body">

              <div class="box-body">
              <div class="col-md-6 form-group">

								<label for="lecturer_id">Lecturer :</label>
								{!! Form::select('staff_id', $lecturers, $pcourse->lecturer_id,['class' => 'form-control', 'id' => 'lecturer_id', 'name' => 'staff_id', 'required' => 'required']) !!}
	                    			<span class="text-danger"> {{ $errors->first('lecturer_id') }}</span>
							</div>

							<div class="row">
                      <div class="col-md-6 form-group">




                                            {!! Form::hidden('program_id', $pcourse->program_id , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'program_id',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}


                                            {!! Form::hidden('level', $pcourse->level , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'level',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}

                                            {!! Form::hidden('course_id', $pcourse->course_id , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'course_id',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            </div>

							{{--  <div class="col-md-6 form-group">

								<label for="lecturer_id">Lecturer :</label>
								{!! Form::select('staff_id', $lecturers, $pcourse->lecturer_id,['class' => 'form-control', 'id' => 'lecturer_id', 'name' => 'staff_id', 'required' => 'required']) !!}
	                    			<span class="text-danger"> {{ $errors->first('lecturer_id') }}</span>
							</div>  --}}
							</div>




              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">
 {{--  <a class="btn btn-info" href="{{ URL::previous('/academia/departments/program-level-courses/{id}/{level}') }}"> Back </a>ß  --}}

							{{ Form::submit('Change Lecturer', array('class' => 'btn btn-primary')) }}


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

@section('pagescript')
<script type="text/javascript">

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


</script>

	<script>

function getCourses()
{

	 program_id = document.getElementById("host_program_id").value;
	 $.ajax({
            type: 'post',
            url: "{{route('course.program_course_get_courses')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'program_id': program_id


            },
            success: function(data,status) {
            	//console.log(data);

            	var listitems = '';
            	$.each(data,function(key, value)
            			{
           		 listitems += '<option value=' + key + '>' + value + '</option>';
            			});
            	$('#course_id').html(listitems);
            	getHours();
            	getLecturers(program_id)
            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#course_id').html(errorThrown);
            }

        });



}

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
