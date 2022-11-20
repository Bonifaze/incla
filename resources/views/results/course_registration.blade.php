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
         
          <div class="card card-success"> 
            <div class="card-header">
                <h4 class="card-title">{{ $session->name }} {{ $session->semesterName($semester) }} Course Registration for {{ $student->full_name }}</h4>
				</div>
           </div>
         
         @include('partialsv3.flash')
         
          @if($student->hasSemesterRegistration($session->id,$semester))
          
         <div class="card card-success"> 
            <div class="card-header">
                <h4 class="card-title">Registered Courses</h4>
				</div>
           </div>
           
           <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Level</th>
							 <th>Credit</th>
							 <th>Action</th>
							  
						  </thead>
						  
						 
						  <tbody>
						  
						   @foreach ($results as $key => $res)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $res->programCourse->course->code }}</td>
							  <td>{{ $res->programCourse->course->title }}</td>
							  <td>{{ $res->programCourse->level }}</td>
							   <td>{{$res->programCourse->hours }}</td>
							   <td> 
                                 {!! Form::open(['method' => 'Delete', 'route' => 'result.remove-course', 'id'=>'removeRCourse'.$res->id]) !!}
				    		{{ Form::hidden('result_id', $res->id) }}
				    		{{ Form::hidden('student_id', $student->id) }}
				    		{{ Form::hidden('session_id', $session->id) }}
				    		{{ Form::hidden('semester', $semester) }}
				    		{{ Form::hidden('level', $level) }}
				    		
				    		<button onclick="removeRCForm({{$res->id}})" type="button" class="{{$res->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Remove</button>
				    		{!! Form::close() !!}
                               </td>
							 </tr>
							
							@endforeach
							
							<tr>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td><strong> Registered Credits </strong></td>
							  <td> <strong> {{ $total_credit }} </strong></td>
							  <td> </td>
							   
							 </tr>
                           <tr>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td><strong> Maximum Credit </strong></td>
                               <td> <strong> {{ $allowed_credits }} </strong></td>
                               <td> </td>

                           </tr>

                          </tbody>
						  
						  
						  
						</table>
						
						
            </div>
            
            @php $registration = $student->getSemesterRegistration($session->id,$semester) @endphp
            
             <div class="card-footer">
               
								<a class="btn btn-info" href="{{ route('semester.registration',base64_encode($registration->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Print Form </a>
                 <a class="btn btn-default" href="{{ route('semester.registration.modify-excess',base64_encode($registration->id)) }}" > <i class="fa fa-eye"></i> Modify Excess Credit </a>
				
                </div>
            
             @endif
         
         <p> <br /></p>
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Current Courses</h3>
				</div>
            
             <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Level</th>
							 <th>Credit</th>
							 <th>Action</th>
							  
						  </thead>
						  
						 
						  <tbody>
						  
						   @foreach ($fresh_courses as $key => $fcourse)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $fcourse->course->code }}</td>
							  <td>{{ $fcourse->course->title }}</td>
							  <td>{{ $fcourse->level }}</td>
							   <td>{{ $fcourse->hours }}</td>
							   <td> 
                                 {!! Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id'=>'addFCForm'.$fcourse->id]) !!}
				    		{{ Form::hidden('program_course_id', $fcourse->id) }}
				    		{{ Form::hidden('student_id', $student->id) }}
				    		{{ Form::hidden('session_id', $session->id) }}
				    		{{ Form::hidden('semester', $semester) }}
				    		{{ Form::hidden('level', $level) }}
				    		
				    		<button onclick="addFCourse({{$fcourse->id}})" type="button" class="{{$fcourse->id}} btn btn-success" ><span class="icon-plus"></span> Add</button>
				    		{!! Form::close() !!}
                               </td>
							 </tr>
							
							@endforeach	
						
						  </tbody>
						  
						  
						  
						</table>
						
						
            </div>
            
             
            
             <div class="card card-success"> 
            <div class="card-header">
                <h4 class="card-title">Lower Level Courses</h4>
				</div>
           </div>
            
            <div class="table-responsive">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Level</th>
							 <th>Credit</th>
							 <th>Action</th>
							  
						  </thead>
						  
						 
						  <tbody>
						  
						   @foreach ($carry_over as $key => $co)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
							  <td>{{ $co->course->code }}</td>
							  <td>{{ $co->course->title }}</td>
							  <td>{{ $co->level }}</td>
							   <td>{{ $co->hours }}</td>
							   <td> 
                                 {!! Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id'=>'addCOForm'.$co->id]) !!}
				    		{{ Form::hidden('program_course_id', $co->id) }}
				    		{{ Form::hidden('student_id', $student->id) }}
				    		{{ Form::hidden('session_id', $session->id) }}
				    		{{ Form::hidden('semester', $semester) }}
				    		{{ Form::hidden('level', $level) }}
				    		
				    		<button onclick="addCOver({{$co->id}})" type="button" class="{{$co->id}} btn btn-success" ><span class="icon-plus"></span> Add</button>
				    		{!! Form::close() !!}
                               </td>
							 </tr>
							
							@endforeach	
						
						  </tbody>
						  
						  
						  
						</table>
						
						
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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>



<script>
 			

 			function removeRCForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("removeRCourse"+id).submit();
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

 		
 			function addOut(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to register this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addOutForm"+id).submit();
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


 			function addFCourse(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to register this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addFCForm"+id).submit();
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


 			function addCOver(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to register this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addCOForm"+id).submit();
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
	
    </script>@endsection

