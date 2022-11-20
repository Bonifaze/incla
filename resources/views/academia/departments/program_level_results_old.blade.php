@extends('layouts.mini')



@section('pagetitle') {{ $level }} Level Students @endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
             @include('partialsv3.flash')
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $level }} Level Students </h3>

				</div>

             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
                          <th>Name</th>
                          @foreach ($program_courses as $key => $program_course)

							  <th>{{$program_course->course->code}}</th>


                          @endforeach
						  </thead>
						  
						  
						  <tbody>
                          @foreach($students as $key => $student)
                              <tr>
                                  <td>{{$student->academic->mat_no}}</td>
                                  @foreach ($program_courses as $key => $program_course)

                                      <td>{!! $student->programCourseResult($program_course->id)!!}</td>

                                  @endforeach

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

