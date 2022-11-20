<?php $__env->startSection('content'); ?>

    <body class="hold-transition login-page" style="background-image: url(<?php echo e(asset( 'dist/img/bg-home.jpg' )); ?>); background-repeat: no-repeat; background-size: cover;">
    <div  style="float:right; padding-right: 200px; padding-top: 100px;">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo e(asset( url('/') )); ?>"><b>Veritas University </b>ECampus</a>
            </div>

            <!-- /.login-logo -->


          <div class="login-box-body loginbg">
            <div class="login-logo">
                <b>404 Page Not Found. </b>
            </div>
            <p class="h4">
            We can't find the page you are looking for. This page may no longer exist in the new ECampus.
            Meanwhile, you may <a href="<?php echo e(url('/')); ?>">return to dashboard</a>.<br />
              If this continues, contact Veritas University ICT on <?php echo e(env('ICT_NUM')); ?>

          </p>

          
        </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('pagescript'); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/errors/404.blade.php ENDPATH**/ ?>