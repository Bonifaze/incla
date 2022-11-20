@extends('layouts.mini')



@section('pagetitle')  Upload Debt @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('cbt-open') menu-open @endsection

@section('cbt') active @endsection

<!-- Page -->
 @section('upload-questions') active @endsection
 
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
              <div class="card-header">
                <h3 class="card-title">Upload Debt</h3>
                
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(array('route' => 'rbac.updatestudentdebt', 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)) !!}
                
                
                <div class="card-body">
                
                <div class="box-body">
              			
              	
							<div class="row">
							
							<div class="col-md-6 form-group">
								<label for="gender">Excel File :</label>
							 
                               {{Form::file('excel')}}
                              <span class="text-danger"> <br /> {{ $errors->first('excel') }}</span>
							 @if ($fileError = Session::get('fileError')) <span class="text-danger"> <br /> {!! $fileError !!}</span>@endif
							</div>
							
							</div>
							
							
							
							
              </div>
                
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
							
							
				
								{{ Form::submit('Upload Debt File', array('class' => 'btn btn-primary')) }}
							
						
			
						
                </div>
             
            </div>
            
            
              
              <!-- /.box-body -->

             
            {!! Form::close() !!}
            
           
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

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
        placeholder: 'Hello Bootstrap 4',
        height: 200
      })
  })
</script>


@endsection
