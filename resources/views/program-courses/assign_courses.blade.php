@extends('layouts.mini')



@section('pagetitle')
    Create New Program Course
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('courses-open')
    menu-open
@endsection

@section('courses')
    active
@endsection

<!-- Page -->
@section('create-course')
    active
@endsection

<!-- End Sidebar links -->





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
                        Course Allocation
                    </h1>
                    <div class="card ">

                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('partialsv3.flash')

                        {!! Form::open(['route' => 'program_course.store2', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                        {{--  <form method="POST" action="/program_course/store" enctype="multipart/form-data" class="p-3">
                        @csrf  --}}

                        <div class="card-body">

                            <div class="box-body">








                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="program_course_id">Course Title :</label>
                                        {{ Form::select('program_course_id', $pcourses, null, [ 'class' => 'form-control select2', 'id' => 'program_course_id', 'name' => 'program_course_id']) }}
                                        {{--  <select $courses class="form-control"  name="course_id" id="course_id" onchange="getHours()">  --}}


                                        {{--  </select>  --}}
                                        <span class="text-danger"> {{ $errors->first('course_id') }}</span>
                                    </div>



                                    <div class="col-md-3 form-group">
                                    <label for="lecturer_id">Lecturer :</label>
                                    {!! Form::select('lecturer_id', $lecturers, null, [
                                        'class' => 'form-control',
                                        'id' => 'lecturer_id',
                                        'name' => 'lecturer_id',
                                        'required' => 'required',
                                    ]) !!}
                                    <span class="text-danger"> {{ $errors->first('lecturer_id') }}</span>
                                </div>
                                </div>




                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">


                            {{ Form::submit('Create Program Course', ['class' => 'btn btn-primary']) }}
                        </div>
                        <!-- /.box-body -->


                        {!! Form::close() !!}



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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        });
    </script>
    <script>
        $('#host_program_id').select2();
    </script>
    <script>
        function getCourses() {

            program_id = document.getElementById("host_program_id").value;
            $.ajax({
                type: 'post',
                url: "{{ route('course.program_course_get_courses') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'program_id': program_id


                },
                success: function(data, status) {
                    //console.log(data);

                    var listitems = '';
                    $.each(data, function(key, value) {
                        listitems += '<option value=' + key + '>' + value + '</option>';
                    });
                    $('#course_id').html(listitems);
                    getHours();
                    getLecturers(program_id)
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#course_id').html(errorThrown);
                }

            });



        }

        function getHours() {

            course_id = document.getElementById("course_id").value;
            $.ajax({
                type: 'post',
                url: "{{ route('course.program_course_get_course_hours') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'course_id': course_id


                },
                success: function(dataC, status) {
                    //console.log(dataC);

                    $('#hours').attr('value', dataC);

                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#hours').html(errorThrown);
                }

            });



        }


        function getLecturers(program_id) {

            $.ajax({
                type: 'post',
                url: "{{ route('staff.program_course_get_lecturers') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'program_id': program_id


                },
                success: function(dataL, status) {
                    //console.log(dataL);

                    var listitems = '';
                    $.each(dataL, function(key, value) {
                        listitems += '<option value=' + key + '>' + value + '</option>';
                    });
                    $('#lecturer_id').html(listitems);

                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#lecturers_id').html(errorThrown);
                }

            });



        }
    </script>
@endsection
