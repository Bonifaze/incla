@extends('layouts.mini')



@section('pagetitle') {{ $level }} Level Courses @endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

             @include('partialsv3.flash')

            <div class="card ">

                             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       {{ $level }} Level Courses
                    </h1>

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
                              <th>Code</th>
							 <th>Title</th>
							 <th>Unit</th>
							 {{--  <th>Host</th>  --}}
                              <th>Lecturer</th>
                              <th>Semester</th>
                              <th>Student</th>
                              <th>Result Score</th>
                              <th>Action</th>
                              <th>Status</th>
                              {{--  <th>Status</th>
                              <th>Action</th>  --}}





						  </thead>


						  <tbody>
                          @foreach ($program_courses as $key => $program_course)
						 <tr>
                             <td> {{$loop->iteration}}</td>
                             <td> {{$program_course->course->course_code ?? null}} </td>
                             <td> {{$program_course->course->course_title ?? null}}</td>
                             <td> {{$program_course->credit_unit ?? null}}</td>
                             {{--  <td> {{$program_course->course->program->name}}</td>  --}}
                             {{--  <td> {{$program_course->staff_name  ?? ' '}}{{$program_course->lecturer->full_name}}  --}}
                                  <td>
                                  {{--  {{ $staff_courses->staff_name ?? null }}  --}}
                                   {{--  {{$program_course->staff_name  ?? ' '}}  --}}
                                  {{--  {{$program_course->lecturer->full_name}}  --}}

                                 @if ($program_course->approval < 1 )
                                 <a class="btn btn-outline-warning" href="{{ route('program_course.change-lecturer',base64_encode($program_course->id)) }}"> Show </a>
                                 @endif
                             </td>
                             @if ( $program_course->semester == 1)
                             <td> First </td>
                             @else ( $program_course->semester == 2)
                             <td>Second </td>
                             @endif

                             {{--  <td> {{$program_course->lecturer->phone}}</td>  --}}
                             <td>
                                 <a class="btn btn-primary" target="_blank" href="/program-courses/students/{{$program_course->course_id}}/{{$program_course->program_id}}">  List </a>
                                 </td>
                                 {{--  <a class="btn btn-info" target="_blank" href="{{ route('program_course.students_download',base64_encode($program_course->id)) }}">  Download </a>  --}}
                                <td>  <a class="btn btn-info" href="/admin/download/{{ $program_course->staff_course_id }}">  Download </a>    </td>
                <td>
                                 @if(!$program_course->is_approved)
                                 <a href="/staff-course/approve?course_id={{ $program_course->course_id }}&program_id={{ $program_course->program_id }}&by=hod" class="btn btn-outline-success" onclick="return confirm('Are you sure you want to approve this course?')">Approve</a>
                                 @else
                                 <a href="/staff-course/revoke?course_id={{ $program_course->course_id }}&program_id={{ $program_course->program_id }}&by=hod" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to revoke approval for this course?')">Revoke Approval</a>
                                 @endif
                                 </td>
                             </td>

                             {{--  @if ($program_course->approval == 1)
                                 <td> <a target="_blank" href="{{ route('program_course.result',base64_encode($program_course->id)) }}"> View Result </a> </td>
                                 <td>
                                     {!! Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'approvePCourseForm'.$program_course->id]) !!}
                                     {{ Form::hidden('program_course_id', $program_course->id) }}
                                     {{ Form::hidden('approval', "2") }}
                                     {{ Form::hidden('current', $program_course->approval) }}
                                     <button onclick="approvePCourse({{$program_course->id}})" type="button" class="{{$program_course->id}} btn btn-outline-success" > Approve </button>
                                     {!! Form::close() !!}
                                 </td>

                             @elseif ($program_course->approval == 2)
                                 <td> <a target="_blank" href="{{ route('program_course.result',base64_encode($program_course->id)) }}"> View Result </a> </td>
                                 <td>
                                     {!! Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'revokePCourseForm'.$program_course->id]) !!}
                                     {{ Form::hidden('program_course_id', $program_course->id) }}
                                     {{ Form::hidden('approval', "1") }}
                                     {{ Form::hidden('current', $program_course->approval) }}
                                     <button onclick="revokePCourse({{$program_course->id}})" type="button" class="{{$program_course->id}} btn btn-outline-warning" > Revoke </button>
                                     {!! Form::close() !!}
                                 </td>
                             @else
                                 <td> {{ $program_course->action }} </td>
                                 <td> {{ $program_course->status }}</td>
                             @endif  --}}
                            <td> {{$program_course->staff_course_status}} </td>
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
@section('pagescript')
<script src="{{ asset('dist/js/bootbox.min.js')}}"></script>

 <script>
     function approvePCourse(id)
     {
         bootbox.dialog({
             message: "<h4>Confirm you want to approve this course?</h4>",
             buttons: {
                 confirm: {
                     label: 'Yes',
                     className: 'btn-success',
                     callback: function(){
                         document.getElementById("approvePCourseForm"+id).submit();
                     }
                 },
                 cancel: {
                     label: 'No',
                     className: 'btn-danger',
                 }
             },
             callback: function (result) {}

         });
         // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
     }
    </script>

<script>
    function revokePCourse(id)
    {
        bootbox.dialog({
            message: "<h4>Confirm you want to revoke this course approval?</h4>",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success',
                    callback: function(){
                        document.getElementById("revokePCourseForm"+id).submit();
                    }
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger',
                }
            },
            callback: function (result) {}

        });
        // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
    }
</script>
    @endsection


