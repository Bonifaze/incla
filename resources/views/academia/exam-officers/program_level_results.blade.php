@extends('layouts.plain')


@section('content')


            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $level }} Level1 Students </h3>

				</div>

             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
                          <th>S/N</th>
                          <th>Mat No</th>
                          @foreach ($program_courses as $key => $program_course)

							  <th>{{$program_course->course->code}}</th>


                          @endforeach
                          <th>Remark</th>
						  </thead>

						  
						  <tbody>
                          @foreach($students as $key => $student)
                              @php $gpa = $student->unApprovedGPA() @endphp
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$student->academic->mat_no}}</td>
                                  @foreach ($program_courses as $key => $program_course)

                                      <td>{!! $student->programCourseResult($program_course->id)!!}</td>

                                  @endforeach
                                  <td> {{$gpa->value}} </td>

                              </tr>
                          @endforeach
						  </tbody>
						  
						  
						  
						</table>

						
            </div>
            
          </div>
          <!-- /.box -->


@endsection

