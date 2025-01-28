@extends('layouts.adminsials')



@section('pagetitle')
    Home
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
@section('home')
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
                            Generate Matriculation Number
                        </h1>


                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="/admissions/students/store" enctype="multipart/form-data" class="p-3">
                            @csrf

                            <div class="card-body">

                                {{--  @include('partialsv3.flash')  --}}
                                @if (session('approvalMsg'))
                                    {!! session('approvalMsg') !!}
                                @endif
                                 <span class="text-danger"> {{ $errors->first('passport') }}</span>
                                      <span class="text-danger"> {{ $errors->first('signature') }}</span>

                                      {!! Form::text('program_id', $applicantsDetails->program_id, [


                                            'id' => 'program_id',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}
                                            {!! Form::text('title', $applicantsDetails->title, [


                                                    'id' => 'title',
                                                    'name' => 'title',
                                                    'required' => 'required',
                                                ]) !!}

                                                 {!! Form::text('mode_of_entry', $applicantsDetails->admission_type, [



                                                    'name' => 'mode_of_entry',
                                                    'required' => 'required',
                                                ]) !!}













                                        {!! Form::text('surname', $applicantsDetails->surname, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'surname',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}




                                        {!! Form::text('first_name', $applicantsDetails->first_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'first_name',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}

                                        {!! Form::text('middle_name', $applicantsDetails->middle_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'middle_name',
                                            'readonly',
                                        ]) !!}



                                    {!! Form::text('gender', $applicantsDetails->gender, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'middle_name',
                                        'readonly',
                                    ]) !!}



                                    {!! Form::text('phone', $applicantsDetails->phone, [
                                        'placeholder' => '080xxxxx',
                                        'class' => 'form-control',
                                        'id' => 'phone',
                                        'name' => 'phone',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::text('dob', $applicantsDetails->dob, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'dob',
                                        'name' => 'dob',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::text('email', $applicantsDetails->email, [
                                        'placeholder' => 'john@doe.com',
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'name' => 'email',
                                        'readonly',
                                    ]) !!}





                                    {!! Form::text('state', $applicantsDetails->state_origin, [
                                        'placeholder' => 'Imo',
                                        'class' => 'form-control',
                                        'id' => 'state',
                                        'name' => 'state',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}


                                    {!! Form::text('lga_name', $applicantsDetails->lga, [
                                        'placeholder' => 'Ahiazu-Mbaise',
                                        'class' => 'form-control',
                                        'id' => 'lga_name',
                                        'name' => 'lga_name',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                    {!! Form::text('address', $applicantsDetails->address, [
                                        'placeholder' => '',
                                        'rows' => '3',
                                        'class' => 'form-control',
                                        'id' => 'address',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                {!! Form::text('esurname', $applicantsDetails->sponsor_surname, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'esurname',
                                    'required' => 'required',
                                ]) !!}
                                 {!! Form::text('eother_names', $applicantsDetails->sponsor_othername, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'eothername',
                                    'required' => 'required',
                                ]) !!}




                                {!! Form::text('eemail', $applicantsDetails->sponsors_email, [
                                    'placeholder' => 'john@doe.com',
                                    'class' => 'form-control',
                                    'id' => 'eemail',
                                    'name' => 'eemail',
                                    'readonly',
                                ]) !!}

                                {!! Form::text('ephone', $applicantsDetails->sponsors_phone, [
                                    'placeholder' => '080xxxxx',
                                    'class' => 'form-control',
                                    'id' => 'ephone',
                                    'name' => 'ephone',
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}

                                {!! Form::text('eaddress', $applicantsDetails->sponsors_address, [
                                    'placeholder' => '',
                                    'rows' => '4',
                                    'class' => 'form-control',
                                    'id' => 'eaddress',
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}




                                    {!! Form::text('serial_no', 0, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]) !!}

                                    {!! Form::text('mode_of_study', 'Full Time', [
                                        'placeholder' => '',
                                        'rows' => '4',
                                        'class' => 'form-control',
                                        'id' => 'eaddress',
                                        'required' => 'required',
                                        'readonly',
                                    ]) !!}



                                        {!! Form::text('entry_session_id', $sessions, [
                                            'placeholder' => '',
                                            'rows' => '4',
                                            'class' => 'form-control',
                                            'id' => 'entry_session_id',
                                            'required' => 'required',
                                            'readonly',
                                        ]) !!}

                                    {!! Form::text('blood_group', $applicantsDetails->blood_group, [
                                    'required' => 'required',
                                    'readonly',
                                ]) !!}

                                   {!! Form::text('genotype', $applicantsDetails->genotype, [
                                    'placeholder' => '',

                                    'required' => 'required',
                                    'readonly',
                                ]) !!}



                                </div>
                                <div class="position-relative mt-5">
                                    <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                        data-bs-target="#myModal"><i class="fas fa-cogs"></i>
                                        {{ __('Generate Matric Number') }}</button>
                                    {{--  <button type="submit" onclick="deleteCourse()" class="btn btn-success position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#myModal">{{ __('Generate Matric Number') }}</button>  --}}
                                </div>

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
                                    <button type="button" class="btn fw-bolder text-danger" data-bs-dismiss="modal">Go
                                        Back</button>
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal"><i
                                            class="fas fa-arrow-right"></i>
                                        Proceed</button>
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
@endsection
@section('pagescript')
    <!-- External JavaScripts
                             ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            // Define the level options based on mode of study
            var levelOptions = {
                "UTME": "100",
                "DE": "200",
                "TRANSFER": "200",
                "PGD": "700",
                "PhD": "900",
                "MBA": "800",
                "MPA": "800",
                "MSc": "800"
            };

            // Handle mode of study change event
            $('#mode-of-entry-select').change(function() {
                var selectedMode = $(this).val();
                var level = levelOptions[selectedMode] || '100';

                $('#level-select').val(level);
            });
        });
    </script>




    <script type="text/javascript">
        var ngst = [{
                "ID": "0",
                "Name": "----Mode of Entry----"
            },
            {
                "ID": "UTME",
                "Name": "UTME"
            },
            {
                "ID": "DE",
                "Name": "DE"
            },
            {
                "ID": "TRANSFER",
                "Name": "TRANSFER"
            },
            {
                "ID": "PGD",
                "Name": "PGD"
            },
            {
                "ID": "MSc",
                "Name": "MSc"
            },
            {
                "ID": "PhD",
                "Name": "PhD"
            },


        ];

        var ele = document.getElementById('state');
        for (var i = 0; i < ngst.length; i++) {

            ele.innerHTML = ele.innerHTML +
                '<option value="' + ngst[i]['ID'] + '">' + ngst[i]['Name'] + '</option>';
        }


        function show(ele) {

            $("#slga").empty();
            $('#writew').val('');

            var parts = {
                "UTME": [
                    "100"
                ],
                "DE": [
                    "200"
                ],
                "TRANSFER": [
                    "200"
                ],
                "PGD": [
                    "700"
                ],
                "PhD": [
                    "900"
                ],
                "MPA": [
                    "900"
                ],
                "MBA": [
                    "800"
                ],
                "MSc": [
                    "800"
                ]
            };

            var msg = ele.value;

            var ele1 = document.getElementById('slga');

            for (i = 0; i < parts[msg].length; i++) {

                $('#slga1').show();
                $('#writew1').show();

                ele1.innerHTML = ele1.innerHTML +
                    '<option value="' + parts[msg][i] + '">' + parts[msg][i] + '</option>';
            }


        }
    </script>
    <script>
        //    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        //  myModal.show()
        //
    </script>

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
@endsection
