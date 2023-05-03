@extends('layouts.mini')



@section('pagetitle')
    Manage Student
@endsection

<!-- Treeview -->
@section('results-opn')
    menu-open
@endsection

@section('resuls')
    active
@endsection

<!-- Page -->
@section('exam-rema')
    active
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

 @can('ictUpload', 'App\StudentResult')


                        <div class="card card-primary">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                               Download Old Result <span class="text-primary">
                                </span>
                            </h1>

                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            <!-- form start -->

 {!! Form::open(['route' => 'academia.department.export_view_oldresult', 'method' => 'GET', 'class' => 'nobottommargin']) !!}
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
                @else
                    <div></div>
                @endcan

    </div>
    <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection

