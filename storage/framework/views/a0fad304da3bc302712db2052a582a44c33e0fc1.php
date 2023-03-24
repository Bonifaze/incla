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
                            <div class="card-header">

                                 <h5 class="app-page-title text-uppercase h5 font-weight p-2 mb-2 shadow-sm text-center text">
                         <?php echo e($session->name); ?> Academic Session <?php echo e($session->semesterName($semester)); ?>

                    </h5>

                            </div>
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
                                    <form method="POST" action="/results/update">
                                        <?php echo csrf_field(); ?>
                                        <div class="table-responsive mt-5 mb-4">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Course Title</th>
                                                        <th>Course Code</th>
                                                        <th>CA1 Score</th>
                                                        <th>CA2 Score</th>
                                                        <th>CA3 Score</th>
                                                        <th>Exam Score</th>
                                                          <th>Change Total Score</th>
                                                        <th>Total Score</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" name="reg_ids[]" value="<?php echo e($student_course->id); ?>">
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>
                                                            <td><?php echo e($student_course->course_title); ?></td>
                                                            <td><?php echo e($student_course->course_code); ?></td>
                                                            <td><input type="number" name="ca1_scores[]"
                                                                    value="<?php echo e($student_course->ca1_score); ?>"
                                                                    id="<?php echo e('ca1' . $student_course->student_id); ?>"
                                                                    class="form-control ca" readonly></td>
                                                            <td><input type="number" name="ca2_scores[]"
                                                                value="<?php echo e($student_course->ca2_score); ?>"
                                                                id="<?php echo e('ca2' . $student_course->student_id); ?>"
                                                                class="form-control ca" readonly></td>
                                                            <td><input type="number" name="ca3_scores[]"
                                                                value="<?php echo e($student_course->ca3_score); ?>"
                                                                id="<?php echo e('ca3' . $student_course->student_id); ?>"
                                                                class="form-control ca" readonly></td>
                                                            <td><input type="number" name="exam_scores[]"
                                                                    value="<?php echo e($student_course->exam_score); ?>"
                                                                    id="<?php echo e('exam' . $student_course->student_id); ?>"
                                                                    class="form-control exam" readonly></td>
                                                                    <td><input type="number" name="total[]"
                                                                    value="<?php echo e($student_course->total); ?>"
                                                                    id="<?php echo e('exam' . $student_course->student_id); ?>"
                                                                    class="form-control exam"></td>

                                                            <td><input type="number" name="total_scores[]"
                                                                    value="<?php echo e($student_course->total); ?>"
                                                                    class="form-control" readonly></td>
                                                            <td><?php echo e($student_course->grade); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" name="button" class="btn btn-success">Update Scores</button>
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


    <!--<div class="modal fade" id="uploadModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Scoresheet</h4>
                    <a href="#" class="close" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                    <form action="/admin/upload-scores" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="file">Scoresheet</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".csv">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
    <script>
        $('body').on('keyup', '.ca', function () {
            let input = $(this)
            input.parent().find($('.xs')).remove()
            if (input.val() > 10)
            {
                input.parent().append(`<span class="text-danger text-small text-sm xs">The input value should be less than or equals 10</span>`);
            }else{
                input.parent().find($('.xs')).remove()
            }
        })
        $('body').on('keyup', '.exam', function () {
            let input = $(this)
            input.parent().find($('.ex')).remove()
            if (input.val() > 100)
            {
                input.parent().append(`<span class="text-danger text-small text-sm ex">The input value should be less than or equals 100</span>`);
            }else{
                input.parent().find($('.ex')).remove()
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/modify.blade.php ENDPATH**/ ?>