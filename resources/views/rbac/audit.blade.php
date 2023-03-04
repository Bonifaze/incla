@extends('layouts.mini')



@section('pagetitle')
    Staff Home
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
@section('staff-home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       Audit Record
                    </h1>


                    @include('partialsv3.flash')
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title"> Audits by Date </h3>
                        </div>
                        <div class="">
                            @if (session('approvalMsg'))
                                {!! session('approvalMsg') !!}
                            @endif
                            <!-- form start -->
                            {!! Form::open(['route' => 'remita.find-date', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="bootstrap-timepicker col-md-6 ">
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <div class="input-group date" id="start_date" data-target-input="nearest">
                                                    <input type="text" name="start_date" placeholder="2022-01-01"
                                                        class="form-control datetimepicker-input" data-target="#start_date"
                                                        required='required' />
                                                    <div class="input-group-append" data-target="#start_date"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <span class="text-danger"> {{ $errors->first('start_date') }}</span>
                                            </div>
                                        </div>
                                        <div class="bootstrap-timepicker col-md-6 ">
                                            <div class="form-group">
                                                <label>End Date:</label>

                                                <div class="input-group date" id="end_date" data-target-input="nearest">
                                                    <input type="text" name="end_date" placeholder="2023-01-01"
                                                        class="form-control datetimepicker-input" data-target="#end_date"
                                                        required='required' />
                                                    <div class="input-group-append" data-target="#end_date"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <span class="text-danger"> {{ $errors->first('end_date') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="card-footer">
                                {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                        <!-- /.box-body -->




                        {!! Form::close() !!}
                    </div>
{{--  // Search by al  --}}
<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title"> Search Audits </h3>
                        </div>
                        <div class="table-responsive">
                            <!-- form start -->
                            {!! Form::open(['route' => 'remita.find-rrr', 'method' => 'POST', 'class' => 'nobottommargin']) !!}
                            <div class="card-body">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div @if ($errors->has('data')) class ='has-error form-group' @endif>
                                                <label for="data">staff Id/ Event/ Old Value/ New Value/ URL/ PC Model/ Audit ID :</label>
                                                {!! Form::search('data', null, [
                                                    'placeholder' => '',
                                                    'class' => 'form-control',
                                                    'id' => 'data',
                                                    'required' => 'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                        {!! Form::close() !!}
                    </div>


    <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
						    <th>Audit Id</th>
                              <th>Staff Name</th>
							 <th>event</th>
							 <th>Audited Model</th>
                             <th>Old Values</th>
							<th>New Values</th>
                            <th>URL</th>
                            <th>IP Address</th>
                            <th>User PC/ Browser</th>
                            <th>Tags</th>
                            <th>Created at</th>
                            <th>Updated at</th>





						  </thead>


						  <tbody>

						  {{--  @foreach ($perms as $key => $perm)  --}}

							<tr>
							  <td>1</td>
							  {{--  <td>{{ $perm->id }}</td>  --}}
                                <td>test</td>
							 <td>test</td>

							 {{--  <td><a class="btn btn-warning" href="{{ route('rbac.edit-perm',$perm->id) }}"> <i class="fa fa-edit"></i> Edit </td>  --}}


							</tr>

							{{--  @endforeach  --}}

						  </tbody>



						</table>



            </div>

                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
@endsection
