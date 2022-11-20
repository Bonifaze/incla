@extends('layouts.mini')



@section('pagetitle') Student Result Management  @endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('results-open') menu-open @endsection

@section('results') active @endsection

<!-- Page -->
@section('exam-remark') active @endsection

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
                <h3 class="card-title"> Student Result Management </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">
  
				<!-- form start -->
            
						{!! Form::open(array('route' => 'result.program_find_student', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			
              		<div class="row">
              			
              			<div class="col-md-6 form-group">
								<label for="mat_no">Student Id or Matric Number :</label>
								{!! Form::text('mat_no', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'mat_no', 'required' => 'required')) !!}
	                    			<span class="text-danger"> {{ $errors->first('mat_no') }}</span>
							</div>
              			
              			<div class="col-md-6 form-group">
								<label for="program">Program :</label>
								{{ Form::select('program', $programs, null,['class' => 'form-control', 'id' => 'program', 'name' => 'program']) }}
							<span class="text-danger"> {{ $errors->first('program') }}</span>
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
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
