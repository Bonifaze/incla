





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
                    Score Upload
                    </h1>

                    <div class="card shadow border border-success">

     <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    <h4 class="card-title mb-4">
                                        <?php echo e($course->course_title); ?> (<?php echo e($course->course_code); ?>)
                                    </h4>
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
                                    <form method="post" action="/admin/upload">
                                        <?php echo csrf_field(); ?>
                                        <div class="table-responsive mt-5 mb-4">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Matric Number</th>
                                                        <th>Course Code</th>
                                                        <th>CA Score</th>
                                                        <th>Exam Score</th>
                                                        <th>Total Score</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="session"
                                                        value="<?php echo e($student_registered_courses[0]->session ?? ''); ?> ">
                                                    <input type="hidden" name="level"
                                                        value="<?php echo e($student_registered_courses[0]->level  ?? ''); ?>">
                                                    <input type="hidden" name="semester"
                                                        value="<?php echo e($student_registered_courses[0]->semester  ?? ''); ?>">
                                                    <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                                                    <?php $__currentLoopData = $student_registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>
                                                            <td><?php echo e($student_course->student_name); ?> <input type="hidden"
                                                                    name="reg_ids[]" value="<?php echo e($student_course->id); ?>"></td>
                                                            <td><?php echo e($student_course->student_matric); ?></td>
                                                            <td><?php echo e($student_course->course_code); ?></td>
                                                            <td><input type="number" name="ca_scores[]"
                                                                    value="<?php echo e($student_course->ca_score); ?>"
                                                                    id="<?php echo e('ca' . $student_course->student_id); ?>"
                                                                    class="form-control"></td>
                                                            <td><input type="number" name="exam_scores[]"
                                                                    value="<?php echo e($student_course->exam_score); ?>"
                                                                    id="<?php echo e('exam' . $student_course->student_id); ?>"
                                                                    class="form-control"></td>
                                                            <td><input type="number" name="total_scores[]"
                                                                    value="<?php echo e($student_course->ca_score + $student_course->exam_score); ?>"
                                                                    class="form-control" readonly></td>
                                                            <td><?php echo e($student_course->grade); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" name="button" class="btn btn-success">Save & submit for
                                                approval</button>
                                        </div>
                                    </form>
                                </div>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/results/scores_upload.blade.php ENDPATH**/ ?>