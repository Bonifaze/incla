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

            <div class="card card-primary">

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
                              <th>Contact</th>
                              <th>Students Registered</th>
                              <th>Status</th>
                              <th>Action</th>





						  </thead>


						  <tbody>
                          @foreach ($program_courses as $key => $program_course)
						 <tr>
                             <td> {{$loop->iteration}}</td>
                             <td> {{$program_course->course->course_code}}</td>
                             <td> {{$program_course->course->course_title}}</td>
                             <td> {{$program_course->credit_unit}}</td>
                             {{--  <td> {{$program_course->course->program->name}}</td>  --}}
                             {{--  <td> {{$program_course->lecturer->full_name}}  --}}
                                  <td> {{$program_course->staff_name  ?? ' '}}

                                 @if ($program_course->approval < 1 )
                                 <a target="_blank" class="btn btn-outline-warning" href="{{ route('program_course.change-lecturer',base64_encode($program_course->id)) }}"> Change </a>
                                 @endif
                             </td>
                             <td> {{$program_course->lecturer->phone}}</td>
                             <td>
                                 <a class="btn btn-primary" target="_blank" href="{{ route('program_course.students',base64_encode($program_course->id)) }}">  List </a>
                                 <a class="btn btn-info" target="_blank" href="{{ route('program_course.students_download',base64_encode($program_course->id)) }}">  Download </a>
                             </td>

                             @if ($program_course->approval == 1)
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
                             @endif
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


