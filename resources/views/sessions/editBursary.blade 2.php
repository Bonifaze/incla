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
                        Edit Bursary Session
                    </h1>
                    <div class="card">

                        @include('partialsv3.flash')

                        {!! Form::model($sessions, ['method' => 'PATCH', 'route' => ['session.updateBursary', $sessions->id]]) !!}

                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="name">Session Name :</label>
                                        {!! Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
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
