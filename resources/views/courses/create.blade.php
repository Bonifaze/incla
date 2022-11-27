@extends('layouts.mini')



@section('pagetitle')
    Create New Course
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
                        Create Course
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::open(['route' => 'course.store', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                    <div class="card-body">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-3 form-group">
                                    <label for="program_id">Program :</label>
                                    {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                    <span class="text-danger"> {{ $errors->first('program_id') }}</span>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="code">Course Code :</label>
                                    {!! Form::text('course_code', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'course_code',
                                        'name' => 'course_code',
                                        'required' => 'required',
                                    ]) !!}
                                    <span class="text-danger"> {{ $errors->first('course_code') }}</span>
                                    {{--  <input type="text" placeholder="code" name="course_code" >  --}}
                                </div>


                                <div class="col-md-5 form-group">
                                    <label for="course_title">Course Title :</label>
                                    {!! Form::text('course_title', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'course_title',
                                        'required' => 'required',
                                    ]) !!}
                                    <span class="text-danger"> {{ $errors->first('course_title') }}</span>
                                </div>

                                <div class="col-md-2 form-group">
                                    <label for="credit_load">Credit Load :</label>
                                    {!! Form::text('credit_unit', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'credit_unit',
                                        'required' => 'required',
                                    ]) !!}
                                    <span class="text-danger"> {{ $errors->first('credit_unit') }}</span>
                                </div>
                            </div>


                            <div class="row">

                                {{--  <div class="col-md-3 form-group">
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

                                {{--  <div class="col-md-3 form-group">
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
                                </div>  --}}

                                {{--  <div class="col-md-3 form-group">
                                    <label for="mode">Mode :</label>
                                    {{ Form::select(
                                        'course_category',
                                        [
                                            '1' => 'Core',
                                            '2' => 'Compulsory',
                                            '3' => 'Elective',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('mode') }}</span>
                                </div>  --}}

                            </div>

                            <div class="row">
                                {{--  <div class="col-md-12 form-group">
							<div  @if ($errors->has('description')) class ='has-error form-group' @endif>

								<label for="description">Description :</label>
								 {!! Form::textarea('description', null, array('placeholder' => '','rows'=>'3', 'class' => 'form-control', 'id' => 'description', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('description') }}</span>
								</div>
							</div>  --}}


                                {{--  <div class="col-md-4 form-group">
                                    <label for="mode">Perequisite :</label>
                                    {{ Form::select(
                                        'mode',
                                        [
                                            'no' => 'No',
                                            'yes' => 'Yes',
                                        ],
                                        'no',
                                        ['class' => 'form-control select2'],
                                    ) }}
                                    <span class="text-danger"> {{ $errors->first('mode') }}</span>
                                </div>  --}}

                                {{--  <div class="col-md-8 form-group">
                                    <label for="course_id">Course Title :</label>
                                    {{ Form::select('course_id', $courses, null, ['onchange' => 'getHours()', 'class' => 'form-control select2', 'id' => 'course_id', 'name' => 'course_id']) }}
                                    {{--  <select $courses class="form-control"  name="course_id" id="course_id" onchange="getHours()">  --}}


                                {{--  </select>  --}}

                            </div>


                            <div class="row">


                                <div class="col-md-6 form-group pull-left">



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">


                        {{ Form::submit('Create Course', ['class' => 'btn btn-primary']) }}

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
