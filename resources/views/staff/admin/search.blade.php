@extends('layouts.mini')



@section('pagetitle') Search Staff  @endsection




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
                    Search Staff 
                </h1>
            
            <div class="card ">
             
             @include("partialsv3.flash")
             <div class="table-responsive">
  
				<!-- form start -->
            
						{!! Form::open(array('route' => 'staff.find', 'method'=>'POST', 'class' => 'nobottommargin')) !!}
			<div class="card-body">
              <div class="box-body">
              			
              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  @if($errors->has('data')) class ='has-error form-group' @endif>
								<label for="data">Surname, First Name, ID, Staff No, Email or Phone Number:</label>
								{!! Form::search('data', null, array( 'placeholder' => ' ','class' => 'form-control', 'id' => 'data', 'required' => 'required')) !!}
								
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
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
