@extends('layouts.mini')

@section('pagetitle') Search Student  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('bursary-open') menu-open @endsection

@section('bursary') active @endsection

<!-- Page -->
 @section('bursary-search') active @endsection
 
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
                <h3 class="card-title"> Search Student </h3>
				</div>
             @include("partialsv3.flash")
             <div class="table-responsive">
  			<!-- form start -->
            
						{!! Form::open(array('route' => 'bursary.find', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			
              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  @if($errors->has('data')) class ='has-error form-group' @endif>
								<label for="data">Student Matric or Id:</label>
								{!! Form::search('data', null, array( 'placeholder' => 'Student Matric or Id','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}
								
								</div>
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
        
    </section>
    <!-- /.content -->
  </div>

@endsection