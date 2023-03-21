<?php $__env->startSection('pagetitle'); ?> Closed Course Registration  <?php $__env->stopSection(); ?>



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
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Course Registration is Closed
                </h1>
<br>
                      <div class="dropdown no-arrow my-3">

                                    <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-print text-white-50"></i> Print Course Form </a>

                                </div>
                </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/closed_registration.blade.php ENDPATH**/ ?>