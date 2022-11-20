@extends('layouts.mini')



@section('pagetitle') {{ $program->name }} Programs @endsection
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
                              <td> Courses</td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),100]) }}">  Show ({{ $program->levelCoursesCount(100) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),200]) }}">  Show ({{ $program->levelCoursesCount(200) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),300]) }}">  Show ({{ $program->levelCoursesCount(300) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),400]) }}">  Show ({{ $program->levelCoursesCount(400) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),500]) }}">  Show ({{ $program->levelCoursesCount(500) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),700]) }}">  Show ({{ $program->levelCoursesCount(700) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),800]) }}">  Show ({{ $program->levelCoursesCount(800) }})</a></td>
                              <td><a class="btn btn-outline-dark" href="{{ route('exam_officer.program_level_courses',[base64_encode($program->id),900]) }}">  Show ({{ $program->levelCoursesCount(900) }})</a></td>
                          </tr>

                         <tr>
                             <td> Results</td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,100]) }}">  Download ({{ $program->levelCoursesCount(100) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,200]) }}">  Download ({{ $program->levelCoursesCount(200) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,300]) }}">  Download ({{ $program->levelCoursesCount(300) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,400]) }}">  Download ({{ $program->levelCoursesCount(400) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,500]) }}">  Download ({{ $program->levelCoursesCount(500) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,700]) }}">  Download ({{ $program->levelCoursesCount(700) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,800]) }}">  Download ({{ $program->levelCoursesCount(800) }})</a></td>
                             <td><a class="btn btn-outline-dark" href="{{ route('academia.department.export_view',[$program->id,900]) }}">  Download ({{ $program->levelCoursesCount(900) }})</a></td>
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