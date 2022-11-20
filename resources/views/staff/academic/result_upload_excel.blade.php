@extends('layouts.mini')



@section('pagetitle') {{$program_course->course->code}}  @endsection



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
                <h3 class="card-title">Upload for {{$program_course->program->name}} {{$program_course->course->code}}</h3>
				</div>

            @include('partialsv3.flash')
            
             <div class="table-responsive card-body">

							{!! Form::open(array('route' => ['program_course.results.excel_upload',base64_encode($program_course->id)], 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)) !!}
				 {!! Form::file('excel', array('class' => 'form-control file-loading', 'id' => 'excel', 'placeholder'=>'Choose excel template file', 'name' => 'excel',  'required' => 'required')) !!}
							{{ Form::hidden("program_course_id", base64_encode($program_course->id)) }}

            </div>
				<!-- /.card-body -->
				<div class="card-footer">

					{{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
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
