@extends('layouts.mini')



@section('pagetitle')
    Manage Student
@endsection

<!-- Treeview -->
@section('resulsts-open')
    menu-open
@endsection

@section('resulsts')
    active
@endsection

<!-- Page -->
@section('exam-remasrk')
    active
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->





                    @can('viewcourseform', 'App\StudentResult')
                        <div class="card ">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Courses Registered by {{ $student->full_name }} <span class="text-primary">
                                </span>
                            </h1>

                            <div class="table-responsive">

                                <!-- form start -->

                                {!! Form::open(['route' => 'result.courseRegStudentForm', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                                <div class="card-body">
                                    <div class="box-body">

                                        <div class="row">

                                            <div class="col-md-6 form-group">
                                                <label for="session_id">Select Session you would like to see :</label>
                                                {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                                                <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                                            </div>




                                        </div>

                                        {{ Form::hidden('student_id', $student->id) }}

                                    </div>
                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer">

                                    {{ Form::submit('View Course Form', ['class' => 'btn btn-primary']) }}
                                </div>

                            </div>
                            <!-- /.box-body -->


                            {!! Form::close() !!}

                        </div>
                    @else
                    @endcan





















            </div>
            <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
