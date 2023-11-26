<?php $__env->startSection('pagetitle'); ?>
    Create New Program Course
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('courses-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('courses'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('create-course'); ?>
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

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Course Allocation
                    </h1>
                    <div class="card ">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <?php echo Form::open(['route' => 'program_course.store', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                    

                    <div class="card-body">

                        <div class="box-body">

                            <div class="row">
                                

                                <div class="col-md-5 form-group">
                                    <label for="program_id"> Program :</label>
                                    <?php echo e(Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'placeholder' => 'Select Program', 'name' => 'program_id', 'required' => 'required'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="level">Level :</label>
                                    <?php echo e(Form::select(
                                        'level',
                                        [
                                            '100' => '100 Level',
                                            '200' => '200 Level',
                                            '300' => '300 Level',
                                            '400' => '400 Level',
                                            '500' => '500 Level',
                                            '600' => '600 Level',
                                            '700' => 'PGD',
                                            '800' => 'MSc',
                                            '900' => 'PhD',
                                        ],
                                        100,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="session_id">Session :</label>
                                    <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                </div>
                            </div>


                            <div class="row">



                                <div class="col-md-3 form-group">
                                    <label for="semester">Semester :</label>
                                    <?php echo e(Form::select(
                                        'semester',
                                        [
                                            '1' => 'First Semester',
                                            '2' => 'Second Semester',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="mode">Category :</label>
                                    <?php echo e(Form::select(
                                        'course_category',
                                        [
                                            '1' => 'Core',
                                            '2' => 'Elective',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('mode')); ?></span>
                                </div>

                        <div class="col-md-3 form-group">
                                    <label for="semester">prerequisite  :</label>
                                    <?php echo e(Form::select(
                                        'has_perequisite',
                                        [
                                            'no' => 'No',
                                            'yes' => 'Yes',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="semester">prerequisite Course :</label>
                                     <?php echo e(Form::select('perequisite_id', $courses, null, ['placeholder'=> '', 'class' => 'form-control select2', 'id' => 'perequisite_id', 'name' => 'perequisite_id'])); ?>


                                    <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="course_id">Course Title :</label>
                                    <?php echo e(Form::select('course_id', $courses, null, ['onchange' => 'getHours()', 'class' => 'form-control select2', 'id' => 'course_id', 'name' => 'course_id'])); ?>

                                    


                                    
                                    <span class="text-danger"> <?php echo e($errors->first('course_id')); ?></span>
                                </div>


                                <div class="col-md-4 form-group">
                                    <label for="hours">Credit Load :</label>
                                    <?php echo Form::text('credit_unit', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'credit_load',
                                        'required' => 'required',
                                    ]); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('credit_load')); ?></span>
                                </div>
                            </div>




                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">


                        <?php echo e(Form::submit('Create Program Course', ['class' => 'btn btn-primary'])); ?>

                        </div>
                        <!-- /.box-body -->


                        <?php echo Form::close(); ?>




                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        });
    </script>
    <script>
        $('#host_program_id').select2();
    </script>
    <script>
        function getCourses() {

            program_id = document.getElementById("host_program_id").value;
            $.ajax({
                type: 'post',
                url: "<?php echo e(route('course.program_course_get_courses')); ?>",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'program_id': program_id


                },
                success: function(data, status) {
                    //console.log(data);

                    var listitems = '';
                    $.each(data, function(key, value) {
                        listitems += '<option value=' + key + '>' + value + '</option>';
                    });
                    $('#course_id').html(listitems);
                    getHours();
                    getLecturers(program_id)
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#course_id').html(errorThrown);
                }

            });



        }

        function getHours() {

            course_id = document.getElementById("course_id").value;
            $.ajax({
                type: 'post',
                url: "<?php echo e(route('course.program_course_get_course_hours')); ?>",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'course_id': course_id


                },
                success: function(dataC, status) {
                    //console.log(dataC);

                    $('#hours').attr('value', dataC);

                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#hours').html(errorThrown);
                }

            });



        }


        function getLecturers(program_id) {

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('staff.program_course_get_lecturers')); ?>",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'program_id': program_id


                },
                success: function(dataL, status) {
                    //console.log(dataL);

                    var listitems = '';
                    $.each(dataL, function(key, value) {
                        listitems += '<option value=' + key + '>' + value + '</option>';
                    });
                    $('#lecturer_id').html(listitems);

                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#lecturers_id').html(errorThrown);
                }

            });



        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/unnice/Desktop/workspace/laravel/laraproject/resources/views//program-courses/create.blade.php ENDPATH**/ ?>