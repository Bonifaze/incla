@extends('layouts.mini')



@section('pagetitle')
    Edit Program
@endsection



@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Edit Program
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($program, ['method' => 'PATCH', 'route' => ['academia.program.update', $program->id]]) !!}

                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="name">Program Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="code">Code :</label>
                                        {!! Form::text('code', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'code',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="academic_department_id">Department :</label>
                                        {{ Form::select('academic_department_id', $departments, null, ['class' => 'form-control', 'id' => 'academic_department_id', 'name' => 'academic_department_id']) }}
                                        <span class="text-danger"> {{ $errors->first('academic_department_id') }}</span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="degree">Degree Type:</label>
                                        {{ Form::select(
                                            'degree',
                                            [
                                                'B.Sc' => 'B.Sc',
                                                'B.Ed' => 'B.Ed',
                                                'Pharm.D' => 'Pharm.D',
                                                'B.N.Sc' => 'B.N.Sc',
                                                'BMLS' => 'BMLS',
                                                'LL.B' => 'LL.B',
                                                'B.A' => 'B.A',
                                            ],
                                            $program->degree,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('degree') }}</span>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="masters">Masters Type:</label>
                                        {{ Form::select(
                                            'masters',
                                            [
                                                'M.Sc' => 'M.Sc',
                                                'M.Ed' => 'M.Ed',
                                                'MBA' => 'MBA',
                                                'LL.M' => 'LL.M',
                                                'M.A' => 'M.A',
                                            ],
                                            $program->masters,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('masters') }}</span>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="duration">Duration :</label>
                                        {{ Form::select(
                                            'duration',
                                            [
                                                '3' => '3 years',
                                                '4' => '4 years',
                                                '5' => '5 years',
                                                '6' => '6 years',
                                            ],
                                            $program->duration,
                                            ['class' => 'form-control select2'],
                                        ) }}<span
                                            class="text-danger"> {{ $errors->first('duration') }}</span>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="status">Status :</label>
                                        {{ Form::select(
                                            'status',
                                            [
                                                '1' => 'Active',
                                                '0' => 'Disabled',
                                            ],
                                            $program->status,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('status') }}</span>
                                    </div>

                                </div>

                            </div>
                        </div>

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
