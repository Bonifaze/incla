<?php $__env->startSection('pagetitle'); ?>
    Assign Program Course to Staff
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
                       Staff Course Allocation
                    </h1>
                    <div class="card ">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo Form::open(['route' => 'program_course.store2', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                        

                        <div class="card-body">

                            <div class="box-body">








                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="program">Program :</label>
                                        <select name="program_id" id="program" class="form-control">
                                            <option value="">Select Program</option>
                                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($program->id); ?>"><?php echo e($program->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        


                                        
                                        <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="course">Course Code & Course Title :</label>
                                        <select name="course_id" id="course" class="form-control">
                                            <option value="">Select Course</option>
                                        </select>
                                        


                                        
                                        <span class="text-danger"> <?php echo e($errors->first('course_id')); ?></span>
                                    </div>



                                    <div class="col-md-3 form-group">
                                    <label for="staff">Lecturer :</label>
                                     
								<?php echo Form::select('staff_id', $lecturers, null,['class' => 'form-control', 'id' => 'lecturer_id', 'name' => 'staff_id', 'required' => 'required']); ?>


                                    <span class="text-danger"> <?php echo e($errors->first('staff_id')); ?></span>
                                </div>
                                </div>




                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">


                            <?php echo e(Form::submit('Assign Course', ['class' => 'btn btn-primary'])); ?>

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
                'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
            }
        });
    </script>
    <script>
        $('#host_program_id').select2();
    </script>
    <script>

        $('#program').change(function () {
            let program_id = $(this).val()
            $('#course').html('')
            $('#staff').html('')
            $.ajax({
                url: "<?php echo e(route('get_program_courses_and_staff')); ?>",
                type: 'POST',
                data: {program_id: program_id},
                success: res => {
                    let staffs = res.staffs
                    let courses = res.courses
                    courses.forEach(course => {
                        $('#course').append(`<option value="${course.course_id}">${course.course_code} - ${course.course_title}</option>`)
                    })
                    staffs.forEach(staff => {
                        $('#staff').append(`<option value="${staff.staff.id}">${staff.staff.full_name}</option>`)
                    })

                }
            })
        })
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/unnice/Desktop/workspace/laravel/laraproject/resources/views//program-courses/assign_courses.blade.php ENDPATH**/ ?>