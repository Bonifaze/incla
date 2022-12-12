@extends('layouts.mini')



@section('pagetitle')
    Student Result Management
@endsection

<!-- Treeview -->
@section('results-open')
    menu-open
@endsection

@section('results')
    active
@endsection


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
                        Course Registration for {{ $student->full_name }}
                    </h1>
                    <h5 class="app-page-title text-uppercase h5 font-weight p-2 mb-2 shadow-sm text-center text">
                        {{ $session->semesterName($semester) }} {{ $session->name }} Academic Session
                    </h5>


                    @include('partialsv3.flash')



                    <h1 class=" text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-left text-success border">
                        Registered Courses
                        {{--  @if ($student->hasSemesterRegistration($session->id, $semester))  --}}
                        {{--  @php $registration = $student->getSemesterRegistration($session->id,$semester) @endphp  --}}
                        @php
                            $student_id = 0;
                        @endphp

                        <a class="btn btn-info" href="{{ route('semester.registration', base64_encode($student->id)) }}"
                            target="_blank"> <i class="fa fa-eye"></i> Print Form </a>
                        {{--  <a class="btn btn-default" href="{{ route('semester.registration.modify-excess',base64_encode($registration->id)) }}" > <i class="fa fa-eye"></i> Modify Excess Credit </a>  --}}




                    </h1>
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Unit</th>
                                {{--  <th> Action</th>  --}}
                            </tr>
                        </thead>

                        <tbody>
                             {!! Form::open(['route' => 'result.admindropcourse', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                       {{--  ?    <form name=form1 method=post action="/results/admindropcourse-reg">  --}}
                                {{--  @csrf  --}}

                                            {{--  <input id="" type="hidden" name="student_id"
                                                value="{{  $student->id}}">
                                            <input id="" type="hidden" name="session"
                                                value="{{ $session->id }}">
                                                  <input id="" type="hidden" name="semester"
                                                value="{{  $semester }}">
                                                 <input id="" type="hidden" name="level"
                                                value="{{ $level }}">  --}}

                                {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                @php
                                    $tatolCredits = 0;
                                @endphp

                                @foreach ($courseform as $key => $course)
                                    @php
                                        $tatolCredits += $course->course_unit;

                                    @endphp
                                    <tr>
                                        {{--  <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]" {{$course->course_category==1?"checked ":""}} value="{{ $course->course_code }}" onclick="{{$course->course_category==1?'return false':'totalIt()'}}"> </td>  --}}
                                        <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]"
                                                >{{ $key + 1 }}
                                        </td>
                                        <td>{{ $course->course_code }} </td>
                                        <td>{{ $course->course_title }}</td>
                                        <td>{{ $course->course_unit }}</td>
                                        <input >
                                        <td>
                                            {!! Form::open(['method' => 'Delete', 'route' => 'program_course.delete', 'id'=>'deletePCourseForm'.$course->id]) !!}
				    		{{ Form::text('id', $course->id) }}


				    		<button onclick="deletePCourse({{$course->id}})" type="button" class="{{$course->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}

                                            {!! Form::open(['method' => 'Delete', 'route' => 'result.remove-course', 'id' => 'removeRCourse' . $course->id]) !!}
                                            {{ Form::text('course_id', $course->course_id) }}
                                            {{ Form::hidden('student_id', $student->id) }}
                                            {{ Form::hidden('session_id', $session->id) }}
                                            {{ Form::hidden('semester', $semester) }}
                                            {{ Form::hidden('level', $level) }}

                                            <button onclick="removeRCForm({{ $course->id }})" type="button"
                                                class="{{ $course->id }} btn btn-danger"><span
                                                    class="icon-line2-trash"></span> Drop</button>
                                            {!! Form::close() !!}
                                        </td>
                                @endforeach
                                </tr>
                                <tr>
                                    <td><strong>Total Credit Unit</strong> </td>
                                    <td colspan="2"></td>
                                    <td id="result" name="total">{{ $tatolCredits }}</td>

                                </tr>
                        </tbody>

                    </table>
                    {{--  <button type="submit" class="btn btn-danger">
                        {{ __('Drop course') }}
                    </button>  --}}
                         {{ Form::submit('Drop Course', ['class' => 'btn btn-primary']) }}
                        {{--  </div>  --}}

                        {!! Form::close() !!}
                    {{--  </form>  --}}


                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Course Level</th>
                                <th>Credit Unit</th>
                                <th>Action</th>

                            </thead>


                            <tbody>

                                @foreach ($results as $key => $res)
                                    <tr>

                                        <td>{{ $loop->iteration }} <input type="checkbox"></td>
                                        <td>{{ $res->course_code }}</td>
                                        <td>{{ $res->course_title }}</td>
                                        <td>{{ $res->level }}</td>
                                        <td>{{ $res->course_unit }}</td>
                                        <td>
                                               {!! Form::open(['method' => 'post', 'route' => 'result.remove-course', 'id'=>'removeRCourse'.$res->id]) !!}
				    		{{--  {{ Form::text('id', $res->id) }}  --}}
                             <input id="" type="text" name="i d"
                                                value="{{ $res->id}}">

				    		<button onclick="removeRCForm({{ $res->id }})" type="button" class="{{$res->id}} btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		{!! Form::close() !!}
                                            {{--  {!! Form::open(['method' => 'Delete', 'route' => 'result.remove-course', 'id' => 'removeRCourse' . $res->id]) !!}
                                            {{ Form::text('id', $res->id) }}
                                            {{ Form::hidden('student_id', $student->id) }}
                                            {{ Form::hidden('session_id', $session->id) }}
                                            {{ Form::hidden('semester', $semester) }}
                                            {{ Form::hidden('level', $level) }}

                                            <button onclick="removeRCForm({{ $res->id }})" type="button"
                                                class="{{ $res->id }} btn btn-danger"><span
                                                    class="icon-line2-trash"></span> Drop</button>
                                            {!! Form::close() !!}  --}}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td><strong> Registered Credits </strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <strong> {{ $total_credit }} </strong></td>
                                    <td> </td>

                                </tr>
                                <tr>
                                    <td><strong> Maximum Credit </strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <strong> {{ $allowed_credits }} </strong></td>
                                    <td> </td>

                                </tr>

                            </tbody>



                        </table>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Drop courses') }}
                        </button>


                    </div>

                    @php $registration = $student->getSemesterRegistration($session->id,$semester) @endphp

                    <div class="card-footer">

                        {{--  <a class="btn btn-info" href="{{ route('semester.registration',base64_encode($registration->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Print Form </a>  --}}
                        {{--  <a class="btn btn-default" href="{{ route('semester.registration.modify-excess',base64_encode($registration->id)) }}" > <i class="fa fa-eye"></i> Modify Excess Credit </a>  --}}

                    </div>

                    {{--  @endif  --}}

                    <p> <br /></p>

                    <h1 class=" text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-left text-success border">
                        Cuurent Level Courses
                    </h1>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Level</th>
                                <th>Credit Unit</th>
                                <th>Action</th>

                            </thead>


                            <tbody>

                                @foreach ($fresh_courses as $key => $fcourse)
                                    <tr>
                                        <td>{{ $loop->iteration }} <input type="checkbox"></td>
                                        <td>{{ $fcourse->course->course_code }}</td>
                                        <td>{{ $fcourse->course->course_title }}</td>
                                        <td>{{ $fcourse->level }}</td>
                                        <td>{{ $fcourse->credit_unit }}</td>
                                        <td>
                                            {!! Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id' => 'addFCForm' . $fcourse->id]) !!}
                                            {{ Form::text('course_id', $fcourse->course->id) }}
                                            {{ Form::hidden('student_id', $student->id) }}
                                            {{ Form::hidden('session_id', $session->id) }}
                                            {{ Form::hidden('semester', $semester) }}
                                            {{ Form::hidden('level', $level) }}
                                            {{ Form::text('program_id', $student->academic->program_id) }}


                                            <button onclick="addFCourse({{ $fcourse->id }})" type="button"
                                                class="{{ $fcourse->id }} btn btn-success"><span class="icon-plus"></span>
                                                Add</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>



                        </table>
                        <button type="submit" class="btn btn-info">
                            {{ __('Add courses') }}
                        </button>

                    </div>



                    <h1 class=" text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-left text-success border">
                        Lower Level Courses
                    </h1>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Level</th>
                                <th>Credit</th>
                                <th>Action</th>

                            </thead>


                            <tbody>

                                @foreach ($carry_over as $key => $co)
                                    <tr>
                                        <td> {{ $loop->iteration }} <input type="checkbox"></td>
                                        <td>{{ $co->course->course_code }}</td>
                                        <td>{{ $co->course->course_title }}</td>
                                        <td>{{ $co->level }}</td>
                                        <td>{{ $co->credit_unit }}</td>
                                        <td>
                                            {!! Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id' => 'addCOForm' . $co->id]) !!}
                                            {{ Form::hidden('program_course_id', $co->id) }}
                                            {{ Form::hidden('student_id', $student->id) }}
                                            {{ Form::hidden('session_id', $session->id) }}
                                            {{ Form::hidden('semester', $semester) }}
                                            {{ Form::hidden('level', $level) }}

                                            <button onclick="addCOver({{ $co->id }})" type="button"
                                                class="{{ $co->id }} btn btn-success"><span class="icon-plus"></span>
                                                Add</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>



                        </table>
                        <button type="submit" class="btn btn-info">
                            {{ __('Add courses') }}
                        </button>


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
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>



    <script>
        function removeRCForm(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Drop this course for {{ $student->full_name }}</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("removeRCourse" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addOut(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Add this course for {{ $student->full_name }}</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addOutForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addFCourse(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Add this course for {{ $student->full_name }}</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addFCForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addCOver(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want toAdd  this course for {{ $student->full_name }}</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addCOForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
@endsection
