@extends('layouts.mini')



@section('pagetitle') {{ $program->name }} Management @endsection


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
                <h3 class="card-title">{{ $program->name }} </h3>

				</div>
            
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>Level</th>
                              <th>100L</th>
							 <th>200L</th>
							 <th>300L</th>
							 <th>400L</th>
                              <th>500L</th>
                              <th>PGD</th>
                              <th>MSc</th>
                              <th>PhD</th>


							  
							   
							
						  </thead>
						  
						  
						  <tbody>
						  
						 <tr>
                             <td> Students</td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,100]) }}">  List ({{ $program->registeredStudentsCount(100) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,200]) }}">  List ({{ $program->registeredStudentsCount(200) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,300]) }}">  List ({{ $program->registeredStudentsCount(300) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,400]) }}">  List ({{ $program->registeredStudentsCount(400) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,500]) }}">  List ({{ $program->registeredStudentsCount(500) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,700]) }}">  List ({{ $program->registeredStudentsCount(700) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,800]) }}">  List ({{ $program->registeredStudentsCount(800) }})</a></td>
                             <td><a class="btn btn-outline-info" href="{{ route('academia.department.program_level_students',[$program->id,900]) }}">  List ({{ $program->registeredStudentsCount(900) }})</a></td>
                          </tr>
                         <tr>
                             <td> Courses</td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,100]) }}">  Show ({{ $program->levelCoursesCount(100) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,200]) }}">  Show ({{ $program->levelCoursesCount(200) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,300]) }}">  Show ({{ $program->levelCoursesCount(300) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,400]) }}">  Show ({{ $program->levelCoursesCount(400) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,500]) }}">  Show ({{ $program->levelCoursesCount(500) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,700]) }}">  Show ({{ $program->levelCoursesCount(700) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,800]) }}">  Show ({{ $program->levelCoursesCount(800) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.program_level_courses',[$program->id,900]) }}">  Show ({{ $program->levelCoursesCount(900) }})</a></td>
                         </tr>



							
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
