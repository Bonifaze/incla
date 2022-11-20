@extends('layouts.mini')



@section('pagetitle')
    Search Course
@endsection




@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Search Courses
                    </h1>

                    <div class="card">

                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            {!! Form::open(['route' => 'course.find', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div @if ($errors->has('data')) class ='has-error form-group' @endif>
                                                <label for="data">Course Code / Course Title:</label>
                                                {!! Form::search('data', null, [
                                                    'placeholder' => ' CSC 101 or Introduction to Computer',
                                                    'class' => 'form-control',
                                                    'id' => 'data',
                                                    'required' => 'required',
                                                ]) !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>


                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        List Program Courses
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')
                        <div class="table-responsive">

                            <!-- form start -->

                            {!! Form::open(['route' => 'course.program_list', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
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

                                {{ Form::submit('List', ['class' => 'btn btn-primary']) }}

                            </div>

                        </div>
                        <!-- /.box-body -->


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
