@extends('layouts.mini')



@section('pagetitle')
    Change Password
@endsection


<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-password')
    active
@endsection

<!-- End Sidebar links -->

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Change Password
                    </h1>
                    <div class="card ">

                        {!! Form::open(['route' => 'staff.change', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                        <div class="card-body">

                            <div class="box-body">
                                @include('partialsv3.flash')
                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label for="current">Current Password:</label>
                                        <input name="current" type="password" autocomplete="new-password"
                                            class="form-control" value="">
                                        <span class="text-danger"> {{ $errors->first('current') }} </span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="password">New Password:</label>
                                        <input name="password" type="password" class="form-control" value="">
                                        <span class="text-danger"> {{ $errors->first('password') }} </span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="password-confirm">Confirm Password:</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                            value="">
                                        <span class="text-danger"> {{ $errors->first('password_confirmation') }} </span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            {{ Form::submit('Change Password', ['class' => 'btn btn-success']) }}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
