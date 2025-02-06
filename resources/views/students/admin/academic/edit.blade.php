@extends('layouts.mini')



@section('pagetitle')
    Edit Student Academic
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
                        {{$academic->student->full_name}} ({{$academic->mat_no}})<br>
                         edit  Student Academics
                    </h1>
                    <div class="card ">

                        <!-- /.card-header -->
                        <!-- form start -->

                        {!! Form::model($academic, [
                            'method' => 'PATCH',
                            'route' => ['student-academic.update', $academic->id],
                            'class' => 'nobottommargin',
                            'files' => true,
                        ]) !!}

                        <div class="card-body">

                            @include('partialsv3.flash')

                            <div class="box-body">



                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="mode_of_entry">Mode of Entry :</label>
                                        {{ Form::select(
                                            'mode_of_entry',
                                            [
                                                'Certificate' => 'Certificate',
                                                'Diploma' => 'Diploma',
                                                'TRANSFER' => 'Transfer',
                                                'Licentiate' => 'Licentiate',

                                            ],
                                            $academic->mode_of_entry,
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="mode_of_study">Mode of Study :</label>
                                        {{ Form::select(
                                            'mode_of_study',
                                            [
                                                'Full Time' => 'Full Time',
                                                'Part Time' => 'Part Time',

                                            ],
                                            $academic->mode_of_study,
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="entry_session_id">Entry Session :</label>
                                        {{ Form::select('entry_session_id', $sessions, null, ['class' => 'form-control', 'id' => 'entry_session_id', 'name' => 'entry_session_id']) }}
                                        <span class="text-danger"> {{ $errors->first('entry_session_id') }}</span>

                                    </div>




{{--
                                    <div class="col-md-6 form-group">
                                        <label for="level">Level : </label>
                                        {{ Form::select(
                                            'level',
                                            [
                                                '1000' => 'Graduated',
                                                '100' => '100',
                                                '200' => '200',
                                                '300' => '300',
                                                '400' => '400',
                                                '500' => '500',
                                                '600' => '600',
                                                '700' => 'PGD',
                                                '800' => 'MSc',
                                                '900' => 'PhD',
                                            ],
                                            $academic->level,
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>  --}}

{!! Form::hidden('level', 100, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}






                                    <div class="col-md-6 col-xl-12 form-group">
                                        <label for="program_id">Program :</label>
                                        {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                        <span class="text-danger"> {{ $errors->first('program_id') }}</span>

                                    </div>



                                </div>


                            </div>

                        </div>

                    </div>





                    <!-- /.card-body -->

                    <div class="card-footer">



                        {{ Form::submit('Edit Student Academic', ['class' => 'btn btn-primary']) }}




                    </div>

                </div>
                <!-- /.box-body -->


                {!! Form::close() !!}


                <!-- /.box -->

            </div>
            <!--/.col (left) -->

    </div>


    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
