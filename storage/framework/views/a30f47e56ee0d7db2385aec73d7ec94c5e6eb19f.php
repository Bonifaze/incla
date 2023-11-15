<?php $__env->startSection('content'); ?>

<div class="bg-slate-900 p-10 min-h-screen">
    <!-- left column -->
    <div class="col_full">
        <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-white border">
            Score Upload for <?php echo e($student->full_name); ?>



        </h1>

        <div class="">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="">
                        <div class="">

                            <h5 class="app-page-title text-uppercase h5 font-weight p-2 mb-2 shadow-sm text-center text-white">
                                <?php echo e($session->name); ?> Academic Session <?php echo e($session->semesterName($semester)); ?>

                            </h5>

                        </div>
                        <div class="">
                            <div class="">
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
                                                    <th class="text-white">S/N</th>
                                                    <th class="text-white">Course Title</th>
                                                    <th class="text-white">Course Code</th>
                                                    <th class="text-white">CA1 Score</th>
                                                    <th class="text-white">CA2 Score</th>
                                                    <th class="text-white">CA3 Score</th>
                                                    <th class="text-white">Exam Score</th>
                                                    <th class="text-white">Change Total Score</th>
                                                    <th class="text-white">Total Score</th>
                                                    <th class="text-white">Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" name="reg_ids[]"
                                                        value="<?php echo e($student_course->id); ?>">
                                                    <tr>
                                                        <td class="text-white"><?php echo e($loop->iteration); ?></td>
                                                        <td class="text-white"><?php echo e($student_course->course_title); ?></td>
                                                        <td class="text-white"><?php echo e($student_course->course_code); ?></td>
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

                                                        <input type="hidden" name="old_total[]"
                                                            value="<?php echo e($student_course->total); ?>"
                                                            id="<?php echo e('exam' . $student_course->student_id); ?>"
                                                            class="form-control exam">

                                                        <td><input type="number" name="total_scores[]"
                                                                value="<?php echo e($student_course->total); ?>"
                                                                class="form-control" readonly></td>
                                                        <td class="text-white"><?php echo e($student_course->grade); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" name="button" class="btn btn-success">Update
                                            Scores</button>
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
        $('body').on('keyup', '.ca', function() {
            let input = $(this)
            input.parent().find($('.xs')).remove()
            if (input.val() > 10) {
                input.parent().append(
                    `<span class="text-danger text-small text-sm xs">The input value should be less than or equals 10</span>`
                );
            } else {
                input.parent().find($('.xs')).remove()
            }
        })
        $('body').on('keyup', '.exam', function() {
            let input = $(this)
            input.parent().find($('.ex')).remove()
            if (input.val() > 100) {
                input.parent().append(
                    `<span class="text-danger text-small text-sm ex">The input value should be less than or equals 100</span>`
                );
            } else {
                input.parent().find($('.ex')).remove()
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/Spotlight/modifySpotlight.blade.php ENDPATH**/ ?>