@extends('layouts.student')



@section('pagetitle') Evaluate @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open') menu-open @endsection

@section('course') active @endsection

<!-- Page -->
 @section('evaluation') active @endsection
 
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
                <h3 class="card-title"> {{$result->programCourse->course->code}}Course Evaluation</h3>
				</div>
            
             <div class="table-responsive">
  
				 @include('partialsv3.flash')


                 <div class="table-responsive">

                     <table class="table table-striped">
                         <thead>
                         <th>#</th>
                         <th>Question</th>
                         <th>Options</th>
                         </thead>
                         <tbody>
                         {!! Form::open(['method' => 'Post', 'route' => 'staff.home', 'id'=>'{{$result->id}}']) !!}
                         {{ Form::hidden('student_result_id', $result->id) }}

                         @foreach ($questions as $key => $question)

                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $question->question }}</td>
                                 <td>{!! $question->options() !!}</td>
                             </tr>

                         @endforeach
                         <button type="submit" class="btn btn-success" ><span class="icon-line2-trash"></span> Submit Evaluation</button>
                         {!! Form::close() !!}

                         </tbody>
                     </table>

                 </div>
            
             
            
              
            
            
            
            
            
            
            
            
             
            
            
             
            
            
             
            
            
            
            
            
            
            
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection

