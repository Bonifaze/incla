@extends('layouts.mini')



@section('pagetitle')
    Student Result Management
@endsection

<!-- Sidebar Links -->

<!-- Treeview -->
@section('results-open')
    menu-open
@endsection

@section('results')
    active
@endsection

<!-- Page -->
@section('exam-remark')
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






                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Student Result Management
                        </h1>
                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            <!-- form start -->

                            {!! Form::open(['route' => 'result.program_find_student', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                            <label for="mat_no">Student Id or Matric Number :</label>
                                            {!! Form::text('mat_no', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'mat_no',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('mat_no') }}</span>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="program">Program :</label>
                                            {{ Form::select('program', $programs, null, ['class' => 'form-control', 'id' => 'program', 'name' => 'program']) }}
                                            <span class="text-danger"> {{ $errors->first('program') }}</span>
                                        </div>


                                    </div>



                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}

                            </div>

                        </div>
                        <!-- /.box-body -->


                        {!! Form::close() !!}

                    </div>
























                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

  {{--  OLD RESULT BEGINS  --}}
            <div class="card card-primary">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Download Old Result <span class="text-primary">
                    </span>
                </h1>

                @include('partialsv3.flash')
                <div class="table-responsive">

                    <!-- form start -->

                    {!! Form::open([
                        'route' => 'academia.department.export_view_oldresult',
                        'method' => 'GET',
                        'class' => 'nobottommargin',
                    ]) !!}
                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6  form-group">
                                    <label for="session_id">Session :</label>
                                    {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                                    <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="session_id">Session :</label>
                                    {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                    <span class="text-danger"> {{ $errors->first('program_id') }}</span>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label for="semester">Semester :</label>
                                    {{ Form::select(
                                        'semester',
                                        [
                                            '1' => 'First Semester',
                                            '2' => 'Second Semester',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('semester') }}</span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="level">Level :</label>
                                    {{ Form::select(
                                        'level',
                                        [
                                            '100' => '100 Level',
                                            '200' => '200 Level',
                                            '300' => '300 Level',
                                            '400' => '400 Level',
                                            '500' => '500 Level',
                                            '600' => '600 Level',
                                            '700' => 'PGD',
                                            '800' => 'MSc',
                                            '900' => 'PhD',
                                        ],
                                        100,
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('level') }}</span>
                                </div>

                            </div>


                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        {{ Form::submit('Download', ['class' => 'btn btn-primary float-right']) }}

                    </div>

                </div>
                <!-- /.box-body -->


                {!! Form::close() !!}

            </div>
            {{--  THE END  --}}
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
