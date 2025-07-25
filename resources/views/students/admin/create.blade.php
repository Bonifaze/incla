@extends('layouts.mini')



@section('pagetitle')
    Create New Student
@endsection


@section('css')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css') }}" />

    <!-- Bootstrap File Upload CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/components/bs-filestyle.css') }}" />
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('student-open')
    menu-open
@endsection

@section('student')
    active
@endsection


<!-- Page -->
@section('student-create')
    active
@endsection

<!-- End Sidebar links -->




@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <div class="card">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Create Students
                        </h1>


                        <!-- /.card-header -->
                        <!-- form start -->

                        {!! Form::open(['route' => 'student.store', 'method' => 'POST', 'class' => 'nobottommargin', 'files' => true]) !!}
                        <div class="card-body">

                            @include('partialsv3.flash')

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('surname')) class ='has-error form-group' @endif>
                                            <label for="surname">Surname :</label>
                                            {!! Form::text('surname', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'surname',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('surname') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('first_name')) class ='has-error form-group' @endif>
                                            <label for="first_name">First Name :</label>
                                            {!! Form::text('first_name', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'first_name',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('middle_name')) class ='has-error form-group' @endif>
                                            <label for="middle_name">Middle Name :</label>
                                            {!! Form::text('middle_name', null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'middle_name']) !!}
                                            <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="type">Gender :</label>
                                        {{ Form::select(
                                            'gender',
                                            [
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                            ],
                                            'Female',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('phone')) class ='has-error form-group' @endif>
                                            <label for="phone">Phone :</label>

                                            {!! Form::text('phone', null, [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'phone',
                                                'name' => 'phone',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('title')) class ='has-error form-group' @endif>
                                            <label for="title">Title :</label>

                                            {!! Form::text('title', null, [
                                                'placeholder' => 'Mr',
                                                'class' => 'form-control',
                                                'id' => 'title',
                                                'name' => 'title',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="dob">Date of Birth :</label>
                                        {!! Form::text('dob', '2002-07-01', [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'dob',
                                            'name' => 'dob',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('dob') }}</span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('email')) class ='has-error form-group' @endif>
                                            <label for="email">Email :</label>

                                            {!! Form::email('email', null, [
                                                'placeholder' => 'john@doe.com',
                                                'class' => 'form-control',
                                                'id' => 'email',
                                                'name' => 'email',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="marital_status">Marital Status :</label>
                                        {{ Form::select(
                                            'marital_status',
                                            [
                                                'Single' => 'Single',
                                                'Religious' => 'Religious',
                                                'Married' => 'Married',
                                            ],
                                            'Single',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('nationality')) class ='has-error form-group' @endif>
                                            <label for="nationality">Nationality :</label>

                                            {!! Form::text('nationality', 'Nigeria', [
                                                'placeholder' => 'Nigeria',
                                                'class' => 'form-control',
                                                'id' => 'nationality',
                                                'name' => 'nationality',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('state')) class ='has-error form-group' @endif>
                                            <label for="state">State of Origin :</label>

                                            {!! Form::text('state', null, [
                                                'placeholder' => 'Imo',
                                                'class' => 'form-control',
                                                'id' => 'state',
                                                'name' => 'state',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('state') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('lga_name')) class ='has-error form-group' @endif>
                                            <label for="lga_name">LGA :</label>

                                            {!! Form::text('lga_name', null, [
                                                'placeholder' => 'Ahiazu-Mbaise',
                                                'class' => 'form-control',
                                                'id' => 'lga_name',
                                                'name' => 'lga_name',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('lga_name') }}</span>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div @if ($errors->has('address')) class ='has-error form-group' @endif>

                                            <label for="address">Address :</label>
                                            {!! Form::text('address', null, [
                                                'placeholder' => '',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'address',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('address') }}</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="passport">Passport :</label>
                                        {!! Form::file('passport', [
                                            'class' => 'form-control file-loading',
                                            'id' => 'passport',
                                            'placeholder' => 'Choose profile pic',
                                            'name' => 'passport',
                                            'accept' => 'image/*',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('passport') }}</span>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="signature">Signature :</label>
                                        {!! Form::file('signature', [
                                            'class' => 'form-control file-loading',
                                            'id' => 'signature',
                                            'placeholder' => 'Choose Signature pic',
                                            'name' => 'signature',
                                            'accept' => 'image/*',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('signature') }}</span>
                                    </div>

                                </div>

                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div>


                                <div class="box-header">
                                    <h3 class="box-title">Emergency Contact / Sponsor Information</h3>
                                </div>



                                <div class="row">


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('esurname')) class ='has-error form-group' @endif>
                                            <label for="esurname">Surname :</label>
                                            {!! Form::text('esurname', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'esurname',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('esurname') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('eother_names')) class ='has-error form-group' @endif>
                                            <label for="eother_names">Other Names :</label>
                                            {!! Form::text('eother_names', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'eother_names',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('eother_names') }}</span>
                                        </div>
                                    </div>
                                       <div class="col-md-4 form-group">
                                        <div @if ($errors->has('ephone')) class ='has-error form-group' @endif>
                                            <label for="ephone">Phone :</label>

                                            {!! Form::text('ephone', null, [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'ephone',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('ephone') }}</span>
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('eemail')) class ='has-error form-group' @endif>
                                            <label for="eemail">Email :</label>

                                            {!! Form::email('eemail', null, [
                                                'placeholder' => 'john@doe.com',
                                                'class' => 'form-control',
                                                'id' => 'eemail',
                                                'name' => 'eemail',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('eemail') }}</span>
                                        </div>
                                    </div>

                                      <div class="col-md-8 form-group">
                                        <div @if ($errors->has('eaddress')) class ='has-error form-group' @endif>

                                            <label for="eaddress">Address :</label>
                                            {!! Form::text('eaddress', null, [
                                                'placeholder' => '',
                                                'rows' => '4',
                                                'class' => 'form-control',
                                                'id' => 'eaddress',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('eaddress') }}</span>
                                        </div>
                                    </div>



                                </div>





                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div>


                                <div class="box-header">
                                    <h3 class="box-title">Other  Information</h3>
                                </div>



                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="mode_of_entry">Mode of Entry :</label>
                                        {{ Form::select(
                                            'mode_of_entry',
                                            [
                                                'Cerificate' => 'Cerificate',
                                                'Diploma' => 'Diploma',
                                                'Licentiate' => 'Licentiate',

                                            ],
                                            'UTME',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>



                                    <div class="col-md-4 form-group">
                                        <label for="mode_of_study">Mode of Study :</label>
                                        {{ Form::select(
                                            'mode_of_study',
                                            [
                                                'Full Time' => 'Full Time',

                                            ],
                                            'Full Time',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>


                                    <div class="col-md-4 form-group">
                                        <label for="entry_session_id">Entry Session :</label>
                                        {{ Form::select('entry_session_id', $sessions, null, ['class' => 'form-control', 'id' => 'entry_session_id', 'name' => 'entry_session_id']) }}
                                        <span class="text-danger"> {{ $errors->first('entry_session_id') }}</span>

                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="blood_group">Blood Group :</label>
                                        {{ Form::select(
                                            'blood_group',
                                            [
                                                'A+' => 'A+',
                                                'A-' => 'A-',
                                                'B+' => 'B+',
                                                'B-' => 'B-',
                                                'AB+' => 'AB+',
                                                'AB-' => 'AB-',
                                                'O+' => 'O+',
                                                'O-' => 'O-',
                                            ],
                                            'O+',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                     <div class="col-md-3 form-group">
                                        <label for="genotype">Genotype :</label>
                                        {{ Form::select(
                                            'genotype',
                                            [
                                                'AA' => 'AA',
                                                'AS' => 'AS',
                                                'SS' => 'SS',
                                            ],
                                            'AA',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                      <div class="col-md-6 form-group">
                                        <label for="program_id">Program :</label>
                                        {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                        <span class="text-danger"> {{ $errors->first('program_id') }}</span>

                                    </div>



                                </div>



















                            </div>

                        </div>





                        <!-- /.card-body -->

                        <div class="card-footer">



                            {{ Form::submit('Create Student', ['class' => 'btn btn-primary']) }}




                        </div>

                    </div>
                    <!-- /.box-body -->


                    {!! Form::close() !!}


                    <!-- /.box -->

                </div>
                <!--/.col (left) -->

            </div>


            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <!-- External JavaScripts
     ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>

    <script type="text/javascript">
        //Date picker
        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    </script>

    <script type="text/javascript">
        $(document).on('ready', function() {

            $("#passport").fileinput({
                mainClass: "input-group-md",
                showUpload: false,
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pick Image",
                browseIcon: "<i class=\"fas fa-user\"></i>",
                removeClass: "btn btn-danger",
                removeLabel: "Delete",
                removeIcon: "<i class=\"icon-trash\"></i> ",
                allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
                elErrorContainer: "#errorBlock"



            });



        });
    </script>

    <script type="text/javascript">
        $(document).on('ready', function() {

            $("#signature").fileinput({
                mainClass: "input-group-md",
                showUpload: false,
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pick Image",
                browseIcon: "<i class=\"fas fa-signature\"></i>",
                removeClass: "btn btn-danger",
                removeLabel: "Delete",
                removeIcon: "<i class=\"icon-trash\"></i> ",
                allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
                elErrorContainer: "#errorBlock"



            });



        });
    </script>
@endsection
