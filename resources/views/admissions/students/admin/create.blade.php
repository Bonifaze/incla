{{--  @php

if(!session('userid'))
{

header('location: /');
exit;
}
@endphp  --}}
@extends('layouts.userapp')

@section('content')
    <div class="row justify-content-center">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.usersidebar')

            <!-- left column -->
            <div class="col_full col-10">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold text-success">Generate Matriculation Number</h3>
                        @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                        @endif

                    </div>

                    <form method="POST" action="/students/store" enctype="multipart/form-data" class="p-3">
                        @csrf

                        <div class="card-body">

                            {{--  @include('partialsv3.flash')  --}}

                            <div class="box-body">
                                <div class="">
                                    <h3 class="box-title">Bio-Data</h3>
                                </div>
                                <div class="row">
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

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('hobbies')) class ='has-error form-group' @endif>
                                            <label for="hobbies">Hobbies :</label>

                                            {!! Form::text('hobbies', null, [
                                                'placeholder' => 'Cooking',
                                                'class' => 'form-control',
                                                'id' => 'hobbies',
                                                'name' => 'hobbies',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('hobbies') }}</span>
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
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('surname')) class ='has-error form-group' @endif>
                                            <label for="surname">Surname :</label>

                                            {!! Form::text('surname', $applicantsDetails->surname, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'surname',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('surname') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('first_name')) class ='has-error form-group' @endif>
                                            <label for="first_name">First Name :</label>
                                            {!! Form::text('first_name', $applicantsDetails->first_name, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'first_name',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('middle_name')) class ='has-error form-group' @endif>
                                            <label for="middle_name">Middle Name :</label>
                                            {!! Form::text('middle_name', $applicantsDetails->middle_name, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'middle_name',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="type">Gender :</label>
                                        {!! Form::text('gender', $applicantsDetails->gender, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'middle_name',
                                            'readonly',
                                        ]) !!}

                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('phone')) class ='has-error form-group' @endif>
                                            <label for="phone">Phone :</label>

                                            {!! Form::text('phone', $applicantsDetails->phone, [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'phone',
                                                'name' => 'phone',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="dob">Date of Birth :</label>
                                        {!! Form::text('dob', $applicantsDetails->dob, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'dob',
                                            'name' => 'dob',
                                            'readonly',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('dob') }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('email')) class ='has-error form-group' @endif>
                                            <label for="email">Email :</label>

                                            {!! Form::email('email', $applicantsDetails->email, [
                                                'placeholder' => 'john@doe.com',
                                                'class' => 'form-control',
                                                'id' => 'email',
                                                'name' => 'email',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('nationality')) class ='has-error form-group' @endif>
                                            <label for="nationality">Nationality :</label>

                                            {!! Form::text('nationality', $applicantsDetails->nationality, [
                                                'placeholder' => 'Nigeria',
                                                'class' => 'form-control',
                                                'id' => 'nationality',
                                                'name' => 'nationality',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('state')) class ='has-error form-group' @endif>
                                            <label for="state">State of Origin :</label>

                                            {!! Form::text('state', $applicantsDetails->state_origin, [
                                                'placeholder' => 'Imo',
                                                'class' => 'form-control',
                                                'id' => 'state',
                                                'name' => 'state',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('state') }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('lga_name')) class ='has-error form-group' @endif>
                                            <label for="lga_name">LGA :</label>

                                            {!! Form::text('lga_name', $applicantsDetails->lga, [
                                                'placeholder' => 'Ahiazu-Mbaise',
                                                'class' => 'form-control',
                                                'id' => 'lga_name',
                                                'name' => 'lga_name',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('lga_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="religion">Religion :</label>
                                        {!! Form::text('religion', $applicantsDetails->religion, [
                                            'placeholder' => 'Cooking',
                                            'class' => 'form-control',
                                            'id' => 'religion',
                                            'name' => 'religion',
                                            'readonly',
                                        ]) !!}
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('address')) class ='has-error form-group' @endif>

                                            <label for="address">Address :</label>
                                            {!! Form::text('address', $applicantsDetails->address, [
                                                'placeholder' => '',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'address',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('address') }}</span>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    {{--  <div class="col-md-4 form-group">
								<label for="city">City of Residence :</label>
								{!! Form::text('city', null, array('placeholder' => 'Abuja', 'class' => 'form-control', 'id' => 'city', 'name' => 'city')) !!}
								<span class="text-danger"> {{ $errors->first('city') }}</span>
							</div>  --}}
                                </div>

                                <div class="row">
                                </div>

                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div>


                                <div class="box-header">
                                    <h3 class="box-title">Emergency Contact / Sponsor Information</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('etitle')) class ='has-error form-group' @endif>
                                            <label for="etitle">Title :</label>
                                            {!! Form::text('etitle', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'etitle',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('etitle') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('relationship')) class ='has-error form-group' @endif>
                                            <label for="relationship">Relationship with Contact / Sponsor :</label>
                                            {!! Form::text('relationship', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'relationship',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('relationship') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('esurname')) class ='has-error form-group' @endif>
                                            <label for="esurname">Name :</label>
                                            {!! Form::text('esurname', $applicantsDetails->name, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'esurname',
                                                'required' => 'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('esurname') }}</span>
                                        </div>
                                    </div>


                                    {{-- <div class="col-md-4 form-group">
                                    <div  @if ($errors->has('eother_names')) class ='has-error form-group' @endif>
                                        <label for="eother_names">Other Names :</label>
                                        {!! Form::text('eother_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'eother_names', 'required' => 'required')) !!}
                                    <span class="text-danger"> {{ $errors->first('eother_names') }}</span>
                                    </div>
                                    </div>  --}}


                                </div>


                                <div class="row">


                                    {{--  <div class="col-md-4 form-group">
              			<div  @if ($errors->has('estate')) class ='has-error form-group' @endif>
								<label for="estate">State of Residence :</label>
								{!! Form::text('estate', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'estate', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('estate') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if ($errors->has('ecity')) class ='has-error form-group' @endif>
								<label for="ecity">City of Residence :</label>
								{!! Form::text('ecity', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'ecity', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('ecity') }}</span>
							</div>
							</div>  --}}


                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div @if ($errors->has('eemail')) class ='has-error form-group' @endif>
                                            <label for="eemail">Email :</label>

                                            {!! Form::email('eemail', $applicantsDetails->sponsors_email, [
                                                'placeholder' => 'john@doe.com',
                                                'class' => 'form-control',
                                                'id' => 'eemail',
                                                'name' => 'eemail',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('eemail') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <div @if ($errors->has('ephone')) class ='has-error form-group' @endif>
                                            <label for="ephone">Phone :</label>

                                            {!! Form::text('ephone', $applicantsDetails->sponsors_phone, [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'ephone',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('ephone') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div @if ($errors->has('eaddress')) class ='has-error form-group' @endif>

                                            <label for="eaddress">Address :</label>
                                            {!! Form::textarea('eaddress', $applicantsDetails->sponsors_address, [
                                                'placeholder' => '',
                                                'rows' => '4',
                                                'class' => 'form-control',
                                                'id' => 'eaddress',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('eaddress') }}</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div>


                                <div class="box-header">
                                    <h3 class="box-title">Academic Information</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <b> <label for="program_id" class="text-danger"> Program : (<span
                                                    class=text-warning> </span> Course of Study
                                                {{ $applicantsDetails->course_applied }})</label> </b>
                                        {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id']) }}
                                        <span class="text-danger"> {{ $errors->first('program_id') }}</span>
                                        <label class="text-warning font-weight-bold">Please ensure you select your correct course of study
                                        </label>
                                    </div>



                                </div>


                                <div class="row">

                                    {{--  <div class="col-md-4 form-group">
                                        <div @if ($errors->has('serial_no')) class ='has-error form-group' @endif>
                                            <label class="invisible" for="serial_no">Serial Number :</label>  --}}
                                    {!! Form::hidden('serial_no', 0, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}
                                    {{--  <span class="text-danger"> {{ $errors->first('serial_no') }}</span>
                                        </div>
                                    </div>  --}}
                                    <div class="col-md-4 form-group">
                                        <label for="mode_of_study">Mode of Study :</label>
                                        {{ Form::select(
                                            'mode_of_study',
                                            [
                                                'Full Time' => 'Full Time',
                                                'Part Time' => 'Part Time',
                                                'Sandwich' => 'Sandwich',
                                                'Distance Learning' => 'Distance Learning',
                                            ],
                                            'Full Time',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="level">Level :</label>
                                        {{ Form::select(
                                            'level',
                                            [
                                                '100' => '100',
                                                '200' => '200',
                                                '700' => 'PGD',
                                                '800' => 'MSc',
                                                '900' => 'PhD',
                                            ],
                                            '100',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="mode_of_entry">Mode of Entry :</label>
                                        {{ Form::select(
                                            'mode_of_entry',
                                            [
                                                'UTME' => 'UTME',
                                                'DE' => 'Direct Entry',
                                                'TRANSFER' => 'Transfer',
                                                'PGD' => 'PGD',
                                                'MSc' => 'Masters',
                                                'PhD' => 'PhD',
                                            ],
                                            'UTME',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>





                                    {{--  <div class="col-md-4 form-group">
                                    <label for="mode_of_entry">Mode of Entry :</label>
                                    {{ Form::select('mode_of_entry', [
                                        'UTME' => 'UTME',
	                        		'DE' => 'Direct Entry',
	                        		'TRANSFER' => 'Transfer',
	                       			'PGD' => 'PGD',
	                       			'MSc' => 'Masters',
	                       			'PhD' => 'PhD'],
	                        		'UTME',
	                       			 ['class' => 'form-control select2']
	                    			) }}

							        </div>  --}}


                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('jamb_no')) class ='has-error form-group' @endif>
                                            <label for="jamb_no">Jamb Number :</label>
                                            {!! Form::text(
                                                'jamb_no',
                                                $applicantsDetails->jamb_reg_no ?? ($applicantsDetails->jamb_de_no ?? ($applicantDetails->matric_no ?? null)),
                                                ['placeholder' => '', 'class' => 'form-control', 'id' => 'jamb_no', 'readonly'],
                                            ) !!}
                                            <span class="text-danger"> {{ $errors->first('jamb_no') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div @if ($errors->has('jamb_score')) class ='has-error form-group' @endif>
                                            <label for="jamb_score">Jamb Score :</label>
                                            {!! Form::text(
                                                'jamb_score',
                                                $applicantsDetails->score ?? ($applicantsDetails->qualification_number ?? ($applicantsDetails->cgpa ?? null)),
                                                ['placeholder' => '', 'class' => 'form-control', 'id' => 'jamb_score', 'readonly'],
                                            ) !!}
                                            <span class="text-danger"> {{ $errors->first('jamb_score') }}</span>
                                        </div>
                                    </div>

                                    {{--  <div class="col-md-4 form-group">
                                        <div @if ($errors->has('eaddress')) class ='has-error form-group' @endif>

                                            <label for="eaddress">Mode of Entry :</label>
                                            {!! Form::text('mode_of_entry', $applicantsDetails->applicant_type, [
                                                'placeholder' => '',
                                                'rows' => '4',
                                                'class' => 'form-control',
                                                'id' => 'mode_of_entry',
                                                'required' => 'required',
                                                'readonly',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('mode_of_entry') }}</span>
                                        </div>
                                    </div>  --}}
                                    <div class="col-md-4 form-group">
                                        <label for="entry_session_id">Entry Session :</label>
                                        {{ Form::select('entry_session_id', $sessions, null, ['class' => 'form-control', 'id' => 'entry_session_id', 'name' => 'entry_session_id', 'readonly']) }}
                                        <span class="text-danger"> {{ $errors->first('entry_session_id') }}</span>

                                    </div>
                                </div>

                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div>

                                <div class="box-header">
                                    <h3 class="box-title">Medical Information</h3>
                                </div>



                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="physical">Physical Condition :</label>
                                        {{ Form::select(
                                            'physical',
                                            [
                                                'normal' => 'Normal',
                                                'blind' => 'Blind',
                                                'dumb' => 'Dumb',
                                                'deafdumb' => 'Deaf and Dumb',
                                                'other' => 'Other',
                                            ],
                                            'normal',
                                            ['class' => 'form-control select2'],
                                        ) }}

                                    </div>

                                    <div class="col-md-4 form-group">
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


                                    <div class="col-md-4 form-group">
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
                                </div>


                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div @if ($errors->has('condition')) class ='has-error form-group' @endif>
                                            <label for="condition">Known Medical Condition :</label>
                                            {!! Form::textarea('condition', null, [
                                                'placeholder' => 'Asthma or None',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'condition',
                                                'required',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('condition') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div @if ($errors->has('allergies')) class ='has-error form-group' @endif>
                                            <label for="allergies">Known Allergies :</label>
                                            {!! Form::textarea('allergies', null, [
                                                'placeholder' => 'Peanuts, sulphur or None',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'allergies',
                                            ]) !!}
                                            <span class="text-danger"> {{ $errors->first('allergies') }}</span>
                                            {{--  <input type="hidden" name="program_type"
                                                value="{{ $applicantsDetails->program_type }}">  --}}
                                            <input type="hidden" name="user_id" value=" {{ session('userid') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="position-relative mt-5">
                                <button type="button" class="btn btn-success mt-5 position-absolute bottom-0 end-0"
                                    data-bs-toggle="modal"
                                    data-bs-target="#myModal">{{ __('Generate Matric Number') }}</button>
                                {{--  <button type="submit" onclick="deleteCourse()" class="btn btn-success position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#myModal">{{ __('Generate Matric Number') }}</button>  --}}
                            </div>

                        </div>


                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title bold">Are you sure?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Please confirm your course of Study and information before proceeding
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn fw-bolder text-danger"
                                            data-bs-dismiss="modal">Go Back</button>
                                        <button type="submit" class="btn btn-success"
                                            data-bs-dismiss="modal">Proceed</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </section>
    </div>


    <!-- External JavaScripts
                 ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    //
    <script>
        //    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        //  myModal.show()
        //
    </script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script> --}}

    <script type="text/javascript">
        //Date picker
        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    </script>
    <script>
        function deletePCourse() {
            bootbox.dialog({
                message: "Please confirm your course of Study and information before proceeding",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deletePCourseForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
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


    @include('layouts.footer')
@endsection
