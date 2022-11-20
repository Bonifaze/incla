@extends('layouts.mini')



@section('pagetitle')
    Edit {{ $college->code }} Faculty
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
                        Edit {{ $college->name}}
                    </h1>

                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($college, ['method' => 'PATCH', 'route' => ['academia.college.update', $college->id]]) !!}

                        <div class="card-body">

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="code">Faculty Code :</label>
                                        {!! Form::text('code', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'code',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                                    </div>

                                    <div class="col-md-5 form-group">
                                        <label for="college">Faculty Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="status">Status :</label>
                                        {{ Form::select(
                                            'status',
                                            [
                                                '1' => 'Active',
                                                '0' => 'Disabled',
                                            ],
                                            $college->status,
                                            ['class' => 'form-control select2'],
                                        ) }}
                                        <span class="text-danger"> {{ $errors->first('status') }}</span>
                                    </div>


                                    <div class="col-md-5 form-group">
                                        <label for="dean_id">Dean :</label>
                                        {{ Form::select('dean_id', $staff, null, ['class' => 'form-control', 'id' => 'dean_id', 'name' => 'dean_id']) }}
                                        <span class="text-danger"> {{ $errors->first('dean_id') }}</span>
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

     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
        $('#dean_id').select2();
        //$('#program_id').select2();
       // $('#course_id').select2();
    </script>
@endsection
