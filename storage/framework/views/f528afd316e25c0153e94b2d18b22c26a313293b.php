<?php $__env->startSection('pagetitle'); ?>
    Staff Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                     <?php echo e($course->course_code); ?> ( <?php echo e($course->course_title); ?> )
                    </h1>

                       <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">

                                    <?php if($errors->any()): ?>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="alert alert-danger">
                                                <?php echo e($error); ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if(session()->has('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form method="post" action="/admin/scores/approve">
                                        <?php echo csrf_field(); ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Matric Number</th>
                                                        <th>Course Code</th>
                                                        <th>CA1 Score</th>
                                                        <th>CA2 Score</th>
                                                        <th>CA3 Score</th>
                                                        <th>Exam Score</th>
                                                        <th>Total Score</th>
                                                        <th>Grade</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="session"
                                                        value="<?php echo e($student_registered_courses[0]->session); ?>">
                                                    <input type="hidden" name="level"
                                                        value="<?php echo e($student_registered_courses[0]->level); ?>">
                                                    <input type="hidden" name="semester"
                                                        value="<?php echo e($student_registered_courses[0]->semester); ?>">
                                                    <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                                                    <?php $__currentLoopData = $student_registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>
                                                            <td><?php echo e($student_course->student_name ?? null); ?> <input type="hidden"
                                                                    name="reg_ids[]" value="<?php echo e($student_course->id); ?>"></td>
                                                            <td><?php echo e($student_course->student_matric ?? null); ?></td>
                                                            <td><?php echo e($student_course->course_code); ?></td>
                                                            <td><?php echo e($student_course->ca1_score); ?></td>
                                                            <td><?php echo e($student_course->ca2_score); ?></td>
                                                            <td><?php echo e($student_course->ca3_score); ?></td>
                                                            <td><?php echo e($student_course->exam_score); ?></td>
                                                            <td><?php echo e($student_course->total); ?>

                                                            </td>
                                                            <td><?php echo e($student_course->grade); ?></td>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/view_scores.blade.php ENDPATH**/ ?>