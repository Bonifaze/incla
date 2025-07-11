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
                <div class="row">



                    <div class="col form-group">

                             <div class="card card">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Remark Uploadfor {{ $student->full_name }} <span class="text-primary">
                                    {{ $academic->mat_no }}
                                </span>
                            </h1>
                            @include('partialsv3.flash')
                            <div class="table-responsive">

                                <!-- form start -->

                                {!! Form::open(['method' => 'POST', 'class' => 'nobottommargin']) !!}
                                <div class="card-body">
                                    <div class="box-body">
                                        This will allow for upload of outstanding and
                                        carry over courses for this student, for this semester.
                                        {{--  @if ($student->hasResultSemesterRegistration())
                                                This will allow for upload of outstanding and
                                                carry over courses for this student, for this semester.
                                            @else
                                                No course registration is available for this student.<br />
                                                This must be completed before remark upload will be available.
                                            @endif  --}}

                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    {{-- @if ($student->hasResultSemesterRegistration()) --}}
                                    <a class="btn btn-outline-success"
                                        href="{{ route('result.semester.remark', base64_encode($student->id)) }}">
                                        Start </a>
                                    {{--  @endif    --}}
                                </div>

                            </div>
                            {!! Form::close() !!}
                            <!-- /.box-body -->
                        </div>

                    </div>




                    <div class="col form-group">
                        <div class="card ">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Result History for {{ $student->full_name }} <span class="text-primary">
                                    {{ $academic->mat_no }}
                                </span>
                            </h1>

                            @include('partialsv3.flash')
                            <div class="table-responsive">

                                <!-- form start -->

                                <div class="card-body">
                                    <div class="">
                                        Displays all academic results for this student.
                                         approve result will be shown without GPA and CGPA just Courses and Grade.
            <br>

                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    {{--  <a class="btn btn-info"
                                        href="{{ route('result.student.history', base64_encode($student->id)) }}"
                                        target="_blank"> <i class="fa fa-eye"></i> Result History</a>  --}}

                                          @can('transcript', 'App\Student')
                             <a class="btn btn-primary float-right" href="{{ route('student.transcript',base64_encode($student->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Transcript</a>

                                @endcan

                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>

                    <!-- /.start third column -->
                    {{--  <div class="col-md-4 form-group">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title"> Brought Forward CGPA </h3>
                            </div>
                            @include('partialsv3.flash')
                            <div class="table-responsive">

                                <!-- form start -->

                                {!! Form::model($academic, [
                                    'method' => 'PATCH',
                                    'route' => ['result.brought_forward_cgpa'],
                                    'class' => 'nobottommargin',
                                ]) !!}
                                <div class="card-body">
                                    <div class="box-body">

                                        <div class="row">

                                            <div class="col-md-6 form-group">
                                                <label for="TC">Total Credit :</label>
                                                {!! Form::text('TC', $academic->TC, [
                                                    'placeholder' => '',
                                                    'class' => 'form-control',
                                                    'id' => 'TC',
                                                    'name' => 'TC',
                                                    'required' => 'required',
                                                ]) !!}
                                                <span class="text-danger"> {{ $errors->first('TC') }}</span>
                                            </div>
                                            {{ Form::hidden('academic_id', $academic->id) }}
                                            <div class="col-md-6 form-group">
                                                <label for="TGP">Total Grade Point :</label>
                                                {!! Form::text('TGP', $academic->TGP, [
                                                    'placeholder' => '',
                                                    'class' => 'form-control',
                                                    'id' => 'TGP',
                                                    'name' => 'TGP',
                                                    'required' => 'required',
                                                ]) !!}
                                                <span class="text-danger"> {{ $errors->first('TGP') }}</span>
                                            </div>

                                            <div class="card-footer">
                                                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- form start
                                 -->
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                </div>  --}}

                @can('ICTOfficers', 'App\StudentResult')


                        <di class="card">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Result Upload for {{ $student->full_name }} <span class="text-primary"> {{ $academic->mat_no }}
                                </span>
                            </h1>

                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            <!-- form start -->

                            {!! Form::open(['route' => 'result.modify', 'method' => 'GET', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="session_id">Session :</label>
                                            {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                                            <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                                        </div>

                                        <div class="col-md-4 form-group">
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



                                    </div>

                                    {{ Form::hidden('student_id', $student->id) }}

                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                {{ Form::submit('Select', ['class' => 'btn btn-primary']) }}
                               @can('transcript', 'App\Student')
                             <a class="btn btn-primary float-right" href="{{ route('results.transcript',base64_encode($student->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Transcript Admin</a>

                                @endcan
                            </div>

                        </div>
                        <!-- /.box-body -->


                        {!! Form::close() !!}

                    </div>
                @else
                    <div></div>
                @endcan


                @can('register', 'App\StudentResult')
                    <div class="card card">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Course Registration for {{ $student->full_name }} <span class="text-primary">
                                {{ $academic->mat_no }} </span>
                        </h1>

                        <div class="table-responsive">

                            <!-- form start -->

                            {!! Form::open(['route' => 'result.registration', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="session_id">Session :</label>
                                            {{ Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id']) }}
                                            <span class="text-danger"> {{ $errors->first('session_id') }}</span>
                                        </div>

                                        <div class="col-md-4 form-group">
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

                                        {{--  <div class="col-md-4 form-group">
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
                                        </div>  --}}

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
                @else
                @endcan






















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
