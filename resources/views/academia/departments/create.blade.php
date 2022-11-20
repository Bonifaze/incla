@extends('layouts.mini')

@section('pagetitle')
    Create New Department
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Create Department
                    </h1>

                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::open(['route' => 'academia.department.store', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                        <div class="card-body">

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="name">Department Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="college_id">Faculty :</label>
                                        {{ Form::select('college_id', $colleges, null, ['class' => 'form-control', 'id' => 'college_id', 'name' => 'college_id']) }}
                                        <span class="text-danger"> {{ $errors->first('college_id') }}</span>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group pull-left">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            {{ Form::submit('Create Department', ['class' => 'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
