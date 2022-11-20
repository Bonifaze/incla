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
              			<div class="col-md-5 form-group">
								<label for="host_program_id">Host Program :</label>
								{{ Form::select('host_program_id', $programs, $pcourse->course->program_id,['class' => 'form-control', 'id' => 'host_program_id', 'name' => 'host_program_id', 'onchange' =>'getCourses()']) }}
							<span class="text-danger"> {{ $errors->first('host_program_id') }}</span>
							</div>
							
							<div class="col-md-5 form-group">
								<label for="program_id">Borrowing Program :</label>
								{{ Form::select('program_id', $programs, null,['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
							<span class="text-danger"> {{ $errors->first('program_id') }}</span>
							</div>
							
							<div class="col-md-2 form-group">
								<label for="level">Level :</label>
								{{ Form::select('level', [
	                        		'100' => '100 Level',
	                        		'200' => '200 Level',
	                        		'300' => '300 Level',
	                        		'400' => '400 Level',
	                        		'500' => '500 Level',
	                        		'600' => '600 Level',
	                        		'700' => 'PGD',
	                        		'800' => 'MSc',
	                        		'900' => 'PhD'],
	                        		$pcourse->level,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('level') }}</span>
							</div>
							</div>
							
							
							<div class="row">
              			<div class="col-md-5 form-group">
								<label for="session_id">Session :</label>
								{{ Form::select('session_id', $sessions, null,['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
							<span class="text-danger"> {{ $errors->first('session_id') }}</span>
							</div>
							
							<div class="col-md-4 form-group">
								<label for="semester">Semester :</label>
								{{ Form::select('semester', [
	                        		'1' => 'First Semester',
	                        		'2' => 'Second Semester',
	                        		'3' => 'Remedial Semester'],
	                        		$pcourse->semester,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('semester') }}</span>
							</div>
							
							<div class="col-md-3 form-group">
								<label for="mode">Mode :</label>
								{{ Form::select('mode', [
	                        		'1' => 'Core',
	                        		'2' => 'Elective'],
	                        		$pcourse->mode,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('mode') }}</span>
							</div>
							</div>
							
							
							
							<div class="row">
              			<div class="col-md-5 form-group">
								<label for="course_id">Course Describe :</label>
								{{ Form::select('course_id', $courses, null,['class' => 'form-control', 'id' => 'course_id', 'name' => 'course_id', 'onchange' =>'getHours()']) }}
                         
							<span class="text-danger"> {{ $errors->first('course_id') }}</span>
							</div>
							
							<div class="col-md-4 form-group">
								<label for="hours">Credit Load :</label>
								{!! Form::text('hours', $pcourse->hours, array( 'placeholder' => '','class' => 'form-control', 'id' => 'hours', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('hours') }}</span>
							</div>
							
							<div class="col-md-3 form-group">
								<label for="lecturer_id">Lecturer :</label>
								{!! Form::select('lecturer_id', $lecturers, null,['class' => 'form-control', 'id' => 'lecturer_id', 'name' => 'lecturer_id', 'required' => 'required']) !!}
	                    			<span class="text-danger"> {{ $errors->first('lecturer_id') }}</span>
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