@extends('layouts.mini')



@section('pagetitle') Manage Student  @endsection

<!-- Treeview -->
@section('results-open') menu-open @endsection

@section('results') active @endsection

<!-- Page -->
@section('exam-remark') active @endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


         <div class="row">
             <div class="col-md-4 form-group">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> Remark Upload for  {{ $student->full_name}} </h3>
                </div>
                @include("partialsv3.flash")
                <div class="table-responsive">

                    <!-- form start -->

                    {!! Form::open(array('method'=>'POST', 'class' => 'nobottommargin')) !!}
                    <div class="card-body">
                        <div class="box-body">

                            @if($student->hasResultSemesterRegistration())
                            This will allow for upload of outstanding and
                            carry over courses for this student, for this semester.
                            @else
                                No course registration is available for this student.<br />
                                This must be completed before remark upload will be available.
                            @endif

                        </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        @if($student->hasResultSemesterRegistration())
                        <a class="btn btn-outline-success" href="{{ route('result.semester.remark',base64_encode($student->id)) }}">  Start </a>
                        @endif
                    </div>

                </div>
            {!! Form::close() !!}
                <!-- /.box-body -->
           </div>

         </div>


             <!-- /.start second column -->
             <div class="col-md-4 form-group">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title"> Result History  {{ $student->full_name}} </h3>
                     </div>
                     @include("partialsv3.flash")
                     <div class="table-responsive">

                         <!-- form start -->

                         <div class="card-body">
                             <div class="box-body">

                                Displays all academic results for this student.<br />
                                 Only Senate approve result will be shown.s

                             </div>
                         </div>

                         <!-- /.card-body -->

                         <div class="card-footer">
                             <a class="btn btn-info" href="{{ route('result.student.history',base64_encode($student->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Result History</a>
                         </div>

                     </div>
                     <!-- /.box-body -->
                 </div>

             </div>


             <!-- /.start third column -->
             <div class="col-md-4 form-group">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title"> Brought Forward CGPA  </h3>
                     </div>
                     @include("partialsv3.flash")
                     <div class="table-responsive">

                         <!-- form start -->

                         {!! Form::model($academic, ['method' => 'PATCH','route' => ['result.brought_forward_cgpa'], 'class' => 'nobottommargin']) !!}
                         <div class="card-body">
                             <div class="box-body">

                                 <div class="row">

                                     <div class="col-md-6 form-group">
                                         <label for="TC">Total Credit :</label>
                                         {!! Form::text('TC', $academic->TC, array( 'placeholder' => '','class' => 'form-control', 'id' => 'TC', 'name' => 'TC', 'required' => 'required')) !!}
                                         <span class="text-danger"> {{ $errors->first('TC') }}</span>
                                     </div>
                                     {{ Form::hidden("academic_id", $academic->id) }}
                                       <div class="col-md-6 form-group">
                                         <label for="TGP">Total Grade Point :</label>
                                         {!! Form::text('TGP', $academic->TGP, array( 'placeholder' => '','class' => 'form-control', 'id' => 'TGP', 'name' => 'TGP', 'required' => 'required')) !!}
                                         <span class="text-danger"> {{ $errors->first('TGP') }}</span>
                                     </div>


                                 </div>

                             </div>
                     </div>

                         <!-- form start
                         <div class="card-footer">
                             {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                         </div>
                         -->
                         {!! Form::close() !!}
                     </div>
                 </div>

             </div>

         </div>

             
            
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Result Upload for  {{ $student->full_name}} </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">
  
				<!-- form start -->
            
						{!! Form::open(array('route' => 'result.upload', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			
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
	                        		'2' => 'Second Semester'],
	                        		1,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('semester') }}</span>
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
	                        		100,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('level') }}</span>
							</div>
						
					</div>	
					
					{{ Form::hidden('student_id', $student->id) }}
								
              </div>
             </div>
                
              
                <!-- /.card-body -->
                
                <div class="card-footer">
               
								{{ Form::submit('Select', array('class' => 'btn btn-primary')) }}
				
                </div>
                
                 </div>
               <!-- /.box-body -->

             
            {!! Form::close() !!}
            		
            </div>


            @can('register', 'App\StudentResult')

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Course Registration for  {{ $student->full_name}} </h3>
				</div>
             
             <div class="table-responsive">
  
				<!-- form start -->
            
						{!! Form::open(array('route' => 'result.registration', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			
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
	                        		'2' => 'Second Semester'],
	                        		1,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('semester') }}</span>
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
	                        		100,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('level') }}</span>
							</div>
						
					</div>	
					
					{{ Form::hidden('student_id', $student->id) }}
								
              </div>
             </div>
                
              
                <!-- /.card-body -->
                
                <div class="card-footer">
               
								{{ Form::submit('Select', array('class' => 'btn btn-primary')) }}
                </div>
                
                 </div>
               <!-- /.box-body -->

             
            {!! Form::close() !!}
            		
            </div>

             @else

            @endcan
            
            
            
            
            
            
             
            
            
             
            
            
             
            
            
            
            
            
            
            
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