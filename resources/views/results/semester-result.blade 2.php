@extends('layouts.mini')



@section('pagetitle') {{$student->full_name}}  Semester Result  @endsection

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
         
            
            
             
            
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> {{ $student->full_name }} <br /> {{$session->name}} - {{ $session->semesterName($semester)}} Result</h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">
  
				
						<div class="card-body">
              <div class="box-body">
              			
              			 @foreach ($results as $key => $result)
              		<div class="row">
              			
              			<div class="col-md-1 form-group">
						{{$loop->iteration}}
						</div>
						
						<div class="col-md-2 form-group">
						{{$result->programCourse->course->code}}
						</div>
						
						<div class="col-md-3 form-group">
						{{$result->programCourse->course->title}}
						</div>
						
						<div class="col-md-1 form-group">
						{{$result->programCourse->hours}}
						</div>
						
						<div class="col-md-2 form-group">
						{{$result->total}}
						</div>
						
						<div class="col-md-1 form-group">
						{{$result->grade}}
						</div>
						
						<div class="col-md-2 form-group">
						{{$result->passStatus}}
						</div>
						
						
						
					</div>	
					
					@endforeach	
					
								
              </div>
             </div>
                
              <div class="card-footer">
               
						<div class="row">
              			
              			<div class="col-md-3 form-group">
						Semester Credit Hours: {{ $gpa->hours }}
						</div>
						
						<div class="col-md-4 form-group">
						Semester Credit Unit Value: {{ $gpa->units }}
						</div>
						
						<div class="col-md-3 form-group">
						GPA: {{ $gpa->value }}
						</div>
						
						<div class="col-md-2 form-group">
						
						</div>
						</div>
                
						<div class="row">
              			
              			<div class="col-md-3 form-group">
						Total Credit Hours: {{ $cgpa->hours }}
						</div>
						
						<div class="col-md-4 form-group">
						Total Credit Unit Value: {{ $cgpa->units }}
						</div>
						
						<div class="col-md-3 form-group">
						CGPA: {{$cgpa->value }}
						</div>
						
						<div class="col-md-2 form-group">
						
						</div>
						</div>
                </div>
                
               
                 </div>
               
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
