@extends('layouts.mini2')
@section('content')
<div class="h-screen bg-slate-900 p-10">
    <!-- left column -->
    <div class="col form-group">
        <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-white border">
            Result History for {{ $student->full_name }} <span class="text-primary">
                {{ $academic->mat_no }}
            </span>
        </h1>

        @include('partialsv3.flash')
        <div class="table-responsive">

            <!-- form start -->

            <div class="card-body">
                <div class="text-white">
                    Displays all academic results for this student.
                    Only Senate approve result will be shown without GPA and CGPA just Courses and Grade.
                    <br>

                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('result.student.history', base64_encode($student->id)) }}"
                    target="_blank">
                    <i class="fa fa-eye"></i> Result History</a>

                @can('transcript', 'App\Student')
                    <a class="btn btn-primary float-right"
                        href="{{ route('student.transcript', base64_encode($student->id)) }}" target="_blank"> <i
                            class="fa fa-eye"></i> Transcript</a>
                @endcan

            </div>

        </div>
        <!-- /.box-body -->
    </div>

    <di class="">
        <h1
            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-white border">
            Result Modification for {{ $student->full_name }} <span class="text-primary"> {{ $academic->mat_no }}
            </span>
        </h1>

        @include('partialsv3.flash')
        <div class="table-responsive">

            <!-- form start -->

            {!! Form::open(['route' => 'result.modifySpotlight', 'method' => 'GET', 'class' => 'nobottommargin']) !!}
            <div class="card-body">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="session_id" class="text-white">Session :</label>
                            {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                            <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="semester" class="text-white">Semester :</label>
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

                        <div class="col-md-4 form-group">
                            <label for="level" class="text-white">Level :</label>
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

                    {{ Form::hidden('student_id', $student->id) }}

                </div>
            </div>


            <!-- /.card-body -->

            <div class="card-footer">

                {{ Form::submit('Select', ['class' => 'btn btn-primary']) }}

            </div>

        </div>
        <!-- /.box-body -->


        {!! Form::close() !!}

</div>
@endsection
