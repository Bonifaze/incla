@extends('layouts.mini')



@section('pagetitle')
    Edit Course
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
@section('edit-course')
    active
@endsection

<!-- End Sidebar links -->





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
                        Edit Course
                    </h1>

                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($course, ['method' => 'PATCH', 'route' => ['course.update', $course->id]]) !!}
                        @csrf
                        <div class="card-body">

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="code">Course Code :</label>
                                        {!! Form::text('course_code', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'course_code',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                                    </div>

                                    <div class="col-md-8 form-group">
                                        <label for="title">Course Title :</label>
                                        {!! Form::text('course_title', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'course_title',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="hours">Credit Load :</label>
                                        {!! Form::text('credit_unit', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'credit_unit',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('credit_unit') }}</span>
                                    </div>

                                    {{--  <div class="col-md-3 form-group">
								<label for="status">Status :</label>
								{{ Form::select('status', [
	                        		'1' => 'Active',
	                       			 '0' => 'Disabled'],
	                        		$course->status,
	                       			 ['class' => 'form-control select2']
	                    			) }}
	                    			<span class="text-danger"> {{ $errors->first('status') }}</span>
							</div>  --}}

                                    <div class="col-md-8 form-group">
                                        <label for="program_id">Program :</label>
                                        {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                        <span class="text-danger"> {{ $errors->first('program_id') }}</span>
                                    </div>
{{--
                                    <div class="col-md-3 form-group">
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
                                            $course->level,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('level') }}</span>
                                    </div>  --}}
                                </div>

                                <div class="row">





                                </div>


                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">


                            {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
