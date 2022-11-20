@extends('layouts.mini')



@section('pagetitle')
    Create New Faculty
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
                        Create Faculty
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::open(['route' => 'academia.college.store', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                        <div class="card-body">

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="code">Faculty Code :</label>
                                        {!! Form::text('code', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'code',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="college">Faculty Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="dean_id">Dean :</label>
                                        {{ Form::select('dean_id', $staff, null, ['class' => 'form-control', 'id' => 'dean_id', 'name' => 'dean_id']) }}
                                        <span class="text-danger"> {{ $errors->first('dean_id') }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group pull-left">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            {{ Form::submit('Create Faculty', ['class' => 'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
