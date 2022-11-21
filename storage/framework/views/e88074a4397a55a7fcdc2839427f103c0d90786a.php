<?php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
?>


<?php $__env->startSection('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body">
                                <h4 class="card-title mb-4">
                                    <?php echo e($course->course_title); ?>

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
                                                  <th>#</th>
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
                                            <input type="hidden" name="session" value="<?php echo e($student_registered_courses[0]->session); ?>">
                                            <input type="hidden" name="level" value="<?php echo e($student_registered_courses[0]->level); ?>">
                                            <input type="hidden" name="semester" value="<?php echo e($student_registered_courses[0]->semester); ?>">
                                            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                                              <?php $__currentLoopData = $student_registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <tr>
                                                      <td><?php echo e($loop->iteration); ?></td>
                                                      <td><?php echo e($student_course->student_name); ?> <input type="hidden" name="reg_ids[]" value="<?php echo e($student_course->id); ?>"></td>
                                                      <td><?php echo e($student_course->student_matric); ?></td>
                                                      <td><?php echo e($student_course->course_code); ?></td>
                                                      <td><input type="number" name="ca_scores[]" value="<?php echo e($student_course->ca_score); ?>" id="<?php echo e('ca'.$student_course->student_id); ?>" class="form-control"></td>
                                                      <td><input type="number" name="exam_scores[]" value="<?php echo e($student_course->exam_score); ?>" id="<?php echo e('exam'.$student_course->student_id); ?>" class="form-control"></td>
                                                      <td><input type="number" name="total_scores[]" value="<?php echo e($student_course->ca_score + $student_course->exam_score); ?>" class="form-control" readonly></td>
                                                      <td><?php echo e($student_course->grade); ?></td>
                                                  </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="mb-4">
                                    <button type="submit" name="button" class="btn btn-success">Save & submit for approval</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/results/scores_upload.blade.php ENDPATH**/ ?>