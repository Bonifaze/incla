



<?php $__env->startSection('pagetitle'); ?>  Course Registration <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('course-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('course'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('registration'); ?> active <?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-10 border border-success p-4 m-4">
          <label>Courses</label>
          <div class="form-check">
          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input class="form-check-input" type="checkbox" id="course" name="course[]" value="">
            <label class="form-check-label"> <?php echo e($courses -> course_code); ?></label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>



        </div>
        <div class="col-lg-2 col-10 border border-success p-4 m-2">
          <div><a href="" class="btn btn-primary">Add Courses </a></div>
          <div> <a href="" class="btn btn-danger">Remove Courses </a></div>


        </div>
        <div class="col-lg-4 col-10 border border-success p-4 m-4">
          <label>Selected Courses</label>
          <div>
            <ol>
              <li> csc101 </li>

            </ol>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js') ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/students/courseReg.blade.php ENDPATH**/ ?>