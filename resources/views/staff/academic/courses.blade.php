@extends('layouts.mini')



@section('pagetitle') Program Courses  @endsection



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
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List of Courses</h3>
				</div>
            
            @include('partialsv3.flash')
            
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>Id</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Program</th>
							  <th>Level</th>
							  <th>Credit</th>
							  <th>Students</th>
							  <th>Result</th>
                              <th>Status</th>
							  
							   
							
						  </thead>
						  
						  
						  <tbody>
						  
						  @foreach ($pcourses as $key => $pcourse)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $pcourse->course->code }}</td>
								<td>{{ $pcourse->course->title }}</td>
							   <td>{{ $pcourse->program->name }}</td>
							   <td>{{ $pcourse->level }}</td>
							 <td>{{ $pcourse->hours }}</td>
							 <td> {{ $pcourse->results_count}} <a href="{{ route('program_course.students',base64_encode($pcourse->id)) }}"> (View) </a></td>

								@if ($pcourse->approval == 0)
									<td><a href="{{ route('program_course.student_results',base64_encode($pcourse->id)) }}"> Upload Results </a></td>

									<td>
									{!! Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'submitPCourseForm'.$pcourse->id]) !!}
									{{ Form::hidden('program_course_id', $pcourse->id) }}
									{{ Form::hidden('approval', "1") }}
									{{ Form::hidden('current', $pcourse->approval) }}
									<button onclick="submitPCourse({{$pcourse->id}})" type="button" class="{{$pcourse->id}} btn btn-outline-success" > Submit </button>
									{!! Form::close() !!}
								</td>
									@elseif ($pcourse->approval == 1)
									<td> <a href="{{ route('program_course.result',base64_encode($pcourse->id)) }}"> View Result </a> </td>

									<td>
											{!! Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'revokePCourseForm'.$pcourse->id]) !!}
											{{ Form::hidden('program_course_id', $pcourse->id) }}
											{{ Form::hidden('approval', "0") }}
										    {{ Form::hidden('current', $pcourse->approval) }}
											<button onclick="revokePCourse({{$pcourse->id}})" type="button" class="{{$pcourse->id}} btn btn-outline-warning" > Revoke </button>
											{!! Form::close() !!}
										</td>
									@else
									<td> <a href="{{ route('program_course.result',base64_encode($pcourse->id)) }}"> View Result </a> </td>
                                    <td> {{ $pcourse->status }}</td>
								@endif

							</tr>
							
							@endforeach	
							
						  </tbody>
						  
						  
						  
						</table>
						 {!! $pcourses->render() !!}
						 
						
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
@section('pagescript')
	<script src="{{ asset('dist/js/bootbox.min.js')}}"></script>

	<script>

		function submitPCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to submit this course?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("submitPCourseForm"+id).submit();
						}
					},
					cancel: {
						label: 'No',
						className: 'btn-danger',
					}
				},
				callback: function (result) {}

			});
			// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
		}


		function revokePCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to revoke your submission?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("revokePCourseForm"+id).submit();
						}
					},
					cancel: {
						label: 'No',
						className: 'btn-danger',
					}
				},
				callback: function (result) {}

			});
			// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
		}



	</script>
@endsection
