<?php $__env->startSection('pagetitle'); ?>
    Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
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
                            <?php echo csrf_field(); ?>

                            <div class="card-body">

                                
                                <?php if(session('approvalMsg')): ?>
                                    <?php echo session('approvalMsg'); ?>

                                <?php endif; ?>
                                <div class="box-body">
                                    <div class="">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <b> <label for="program_id" class=""> Course of Study : <span
                                                        class=text-warning> </span>
                                                </label> </b>
                                            <?php echo e(Form::select('program_id', $programs, null, ['placeholder' => 'SELECT YOUR COURSE OF STUDY', 'class' => 'form-control ', 'id' => 'program_id', 'name' => 'program_id'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <div <?php if($errors->has('title')): ?> class ='has-error form-group' <?php endif; ?>>
                                                <label for="title">Title :</label>

                                                <?php echo Form::text('title', null, [
                                                    'placeholder' => 'Mr',
                                                    'class' => 'form-control',
                                                    'id' => 'title',
                                                    'name' => 'title',
                                                    'required' => 'required',
                                                ]); ?>

                                                <span class="text-danger"> <?php echo e($errors->first('title')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="marital_status">Marital Status :</label>
                                            <?php echo e(Form::select(
                                                'marital_status',
                                                [
                                                    'Single' => 'Single',
                                                    'Religious' => 'Religious',
                                                    'Married' => 'Married',
                                                ],
                                                'Single',
                                                ['class' => 'form-control select2'],
                                            )); ?>


                                        </div>

                                        <div class="col-md-4 form-group">
                                            <div <?php if($errors->has('hobbies')): ?> class ='has-error form-group' <?php endif; ?>>
                                                <label for="hobbies">Hobbies :</label>

                                                <?php echo Form::text('hobbies', null, [
                                                    'placeholder' => 'Reading, Dancing.....',
                                                    'class' => 'form-control',
                                                    'id' => 'hobbies',
                                                    'name' => 'hobbies',
                                                ]); ?>

                                                <span class="text-danger"> <?php echo e($errors->first('hobbies')); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label for="mode_of_entry">Mode of Entry <Span class="text-danger">*</Span>
                                                :
                                            </label>
                                            <?php echo e(Form::select(
                                                'mode_of_entry',
                                                [
                                                    ' ' => 'Select Mode of Entry',
                                                    'UTME' => 'UTME',
                                                    'DE' => 'Direct Entry',
                                                    'TRANSFER' => 'Transfer',
                                                    'PGD' => 'PGD',
                                                    'MSc' => 'MSc',
                                                    'MPA' => 'MPA',
                                                    'MBA' => 'MBA',
                                                    'PhD' => 'PhD',
                                                ],
                                                ' ',
                                                ['class' => 'form-control select2', 'id' => 'mode-of-entry-select'],
                                            )); ?>


                                        </div>
                                        
                                         <div class="col-md-1 form-group ">
                                        <label for="level">Level :</label>
                                        <?php echo e(Form::select(
                                            'level',
                                            [
                                                ' '=> 'Select Level',
                                                '100' => '100',
                                                '200' => '200',
                                                '700' => 'PGD',
                                                '800' => 'MSc/MBA/MPA',
                                                '900' => 'PhD',
                                            ],
                                            ' ',
                                            ['class' => 'form-control select2', 'id' => 'level-select'],
                                        )); ?>


                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            
                                            <label for="passport">Passport : </label>
                                            <?php echo Form::file('passport', [
                                                'class' => 'form-control file-loading',
                                                'id' => 'passport',
                                                'placeholder' => 'Choose profile pic',
                                                'name' => 'passport',
                                                'accept' => 'image/*',
                                                'required' => 'required',
                                            ]); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
                                            <span class="text-warning "> Please ensure your Passport is white Background
                                            </span>
                                        </div>


                                        <div class="col-6 form-group">
                                            <label for="signature">Signature :</label>
                                            <?php echo Form::file('signature', [
                                                'class' => 'form-control file-loading',
                                                'id' => 'signature',
                                                'placeholder' => 'Choose Signature pic',
                                                'name' => 'signature',
                                                'accept' => 'image/*',
                                                'required' => 'required',
                                            ]); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('signature')); ?></span>
                                        </div>


                                        
                                        
                                        

                                        <?php echo Form::hidden('surname', $applicantsDetails->surname, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'surname',
                                            'required' => 'required',
                                            'readonly',
                                        ]); ?>

                                        


                                        
                                        
                                        <?php echo Form::hidden('first_name', $applicantsDetails->first_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'first_name',
                                            'required' => 'required',
                                            'readonly',
                                        ]); ?>

                                        


                                        
                                        
                                        <?php echo Form::hidden('middle_name', $applicantsDetails->middle_name, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'middle_name',
                                            'readonly',
                                        ]); ?>

                                        


                                    </div>

                                    
                                    
                                    <?php echo Form::hidden('gender', $applicantsDetails->gender, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'middle_name',
                                        'readonly',
                                    ]); ?>


                                    
                                    

                                    <?php echo Form::hidden('phone', $applicantsDetails->phone, [
                                        'placeholder' => '080xxxxx',
                                        'class' => 'form-control',
                                        'id' => 'phone',
                                        'name' => 'phone',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>

                                    
                                    
                                    
                                    <?php echo Form::hidden('dob', $applicantsDetails->dob, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'dob',
                                        'name' => 'dob',
                                        'readonly',
                                    ]); ?>

                                    

                                    
                                    

                                    <?php echo Form::hidden('email', $applicantsDetails->email, [
                                        'placeholder' => 'john@doe.com',
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'name' => 'email',
                                        'readonly',
                                    ]); ?>

                                    
                                    

                                    <?php echo Form::hidden('nationality', $applicantsDetails->nationality, [
                                        'placeholder' => 'Nigeria',
                                        'class' => 'form-control',
                                        'id' => 'nationality',
                                        'name' => 'nationality',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>

                                    
                                    
                                    

                                    <?php echo Form::hidden('state', $applicantsDetails->state_origin, [
                                        'placeholder' => 'Imo',
                                        'class' => 'form-control',
                                        'id' => 'state',
                                        'name' => 'state',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>

                                    


                                    
                                    

                                    <?php echo Form::hidden('lga_name', $applicantsDetails->lga, [
                                        'placeholder' => 'Ahiazu-Mbaise',
                                        'class' => 'form-control',
                                        'id' => 'lga_name',
                                        'name' => 'lga_name',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>

                                    
                                    
                                    
                                    <?php echo Form::hidden('religion', $applicantsDetails->religion, [
                                        'placeholder' => 'Cooking',
                                        'class' => 'form-control',
                                        'id' => 'religion',
                                        'name' => 'religion',
                                        'readonly',
                                    ]); ?>

                                    

                                    

                                    
                                    <?php echo Form::hidden('address', $applicantsDetails->address, [
                                        'placeholder' => '',
                                        'rows' => '3',
                                        'class' => 'form-control',
                                        'id' => 'address',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>

                                    


                                </div>

                                
                                
                                

                                

                                


                                

                                
                                
                                <?php echo Form::hidden('etitle', $applicantsDetails->sponsor_title, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'etitle',
                                    'required' => 'required',
                                ]); ?>

                                
                                
                                
                                <?php echo Form::hidden('relationship', $applicantsDetails->sponsor_relationship, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'relationship',
                                    'required' => 'required',
                                ]); ?>

                                <span class="text-danger"> <?php echo e($errors->first('relationship')); ?></span>
                                
                                
                                <?php echo Form::hidden('esurname', $applicantsDetails->name, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'esurname',
                                    'required' => 'required',
                                ]); ?>

                                


                                


                                


                                


                                


                                

                                
                                

                                <?php echo Form::hidden('eemail', $applicantsDetails->sponsors_email, [
                                    'placeholder' => 'john@doe.com',
                                    'class' => 'form-control',
                                    'id' => 'eemail',
                                    'name' => 'eemail',
                                    'readonly',
                                ]); ?>

                                


                                
                                

                                <?php echo Form::hidden('ephone', $applicantsDetails->sponsors_phone, [
                                    'placeholder' => '080xxxxx',
                                    'class' => 'form-control',
                                    'id' => 'ephone',
                                    'name' => 'ephone',
                                    'required' => 'required',
                                    'readonly',
                                ]); ?>

                                

                                

                                
                                <?php echo Form::hidden('eaddress', $applicantsDetails->sponsors_address, [
                                    'placeholder' => '',
                                    'rows' => '4',
                                    'class' => 'form-control',
                                    'id' => 'eaddress',
                                    'required' => 'required',
                                    'readonly',
                                ]); ?>

                                

                                


                                



                                <div class="row">

                                    
                                    <?php echo Form::hidden('serial_no', 0, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]); ?>

                                    
                                    
                                    
                                    
                                    <?php echo Form::hidden('mode_of_study', 'Full Time', [
                                        'placeholder' => '',
                                        'rows' => '4',
                                        'class' => 'form-control',
                                        'id' => 'eaddress',
                                        'required' => 'required',
                                        'readonly',
                                    ]); ?>


                                    
                                    






                                    <div class="col-md-4 form-group">

                                        <?php echo Form::hidden('entry_session_id', $sessions, [
                                            'placeholder' => '',
                                            'rows' => '4',
                                            'class' => 'form-control',
                                            'id' => 'entry_session_id',
                                            'required' => 'required',
                                            'readonly',
                                        ]); ?>

                                        
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <div <?php if($errors->has('jamb_no')): ?> class ='has-error form-group' <?php endif; ?>>
                                            
                                            <?php echo Form::hidden(
                                                'jamb_no',
                                                $applicantsDetails->jamb_reg_no ?? ($applicantsDetails->jamb_de_no ?? ($applicantDetails->matric_no ?? null)),
                                                ['placeholder' => '', 'class' => 'form-control', 'id' => 'jamb_no', 'readonly'],
                                            ); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('jamb_no')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div <?php if($errors->has('jamb_score')): ?> class ='has-error form-group' <?php endif; ?>>
                                            
                                            <?php echo Form::hidden(
                                                'jamb_score',
                                                $applicantsDetails->score ?? ($applicantsDetails->qualification_number ?? ($applicantsDetails->cgpa ?? null)),
                                                ['placeholder' => '', 'class' => 'form-control', 'id' => 'jamb_score', 'readonly'],
                                            ); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('jamb_score')); ?></span>
                                        </div>
                                    </div>

                                    

                                </div>

                                

                                

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="physical">Physical Condition :</label>
                                        <?php echo e(Form::select(
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
                                        )); ?>


                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="blood_group">Blood Group :</label>
                                        <?php echo e(Form::select(
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
                                        )); ?>


                                    </div>


                                    <div class="col-md-4 form-group">
                                        <label for="genotype">Genotype :</label>
                                        <?php echo e(Form::select(
                                            'genotype',
                                            [
                                                'AA' => 'AA',
                                                'AS' => 'AS',
                                                'SS' => 'SS',
                                            ],
                                            'AA',
                                            ['class' => 'form-control select2'],
                                        )); ?>


                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div <?php if($errors->has('condition')): ?> class ='has-error form-group' <?php endif; ?>>
                                            <label for="condition">Known Medical Condition :</label>
                                            <?php echo Form::textarea('condition', null, [
                                                'placeholder' => '',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'condition',
                                                'required',
                                            ]); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('condition')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div <?php if($errors->has('allergies')): ?> class ='has-error form-group' <?php endif; ?>>
                                            <label for="allergies">Known Allergies :</label>
                                            <?php echo Form::textarea('allergies', null, [
                                                'placeholder' => '',
                                                'rows' => '3',
                                                'class' => 'form-control',
                                                'id' => 'allergies',
                                            ]); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('allergies')); ?></span>
                                            
                                            <input type="hidden" name="user_id" value=" <?php echo e(session('userid')); ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="position-relative mt-5">
                                    <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                        data-bs-target="#myModal"><i class="fas fa-cogs"></i>
                                        <?php echo e(__('Generate Matric Number')); ?></button>
                                    
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
            <?php echo Form::close(); ?>

    </div>
    </div>
    </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
    <!-- External JavaScripts
                             ============================================= -->
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>


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
                var level = levelOptions[selectedMode] || '';

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
    <script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/students/admin/create.blade.php ENDPATH**/ ?>