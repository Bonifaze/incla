 <?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>Veritas University Abuja</title>

<?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>

   <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>">

  <style>

  .loginbg {
  	background-color: rgba(0,0,0,0.1);
    border: 1px solid;
    border-top-color: rgba(255,255,255,.4);
    border-left-color: rgba(255,255,255,.4);
    border-bottom-color: rgba(60,60,60,.4);
    border-right-color: rgba(60,60,60,.4);
}
  </style>



<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

<body class="hold-transition login-page" style="background-image: url(<?php echo e(asset( 'dist/img/bg-home.jpg' )); ?>); background-repeat: no-repeat; background-size: cover;">
<div  style="float:right; padding-right: 200px; padding-top: 100px;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo e(asset( url('/') )); ?>"><b>Veritas University</b> ECampus</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body loginbg">
    <p class="login-box-msg">Student Login </p>

    <form method="POST" action="<?php echo e(route('student.login.submit')); ?>">
     <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        <?php if($errors->has('debt')): ?>
          <span class="danger"> <strong><?php echo e($errors->first('debt')); ?></strong> </span>
        <?php endif; ?>

        <input id="email" type="email" placeholder="Veritas Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php if($errors->has('email')): ?>
            <span class="invalid-feedback"> <strong><?php echo e($errors->first('email')); ?></strong> </span>
             <?php endif; ?>

      </div>



      <div class="form-group has-feedback">
        <input id="password" type="password" placeholder="Password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
		 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		 <?php if($errors->has('password')): ?>
		 <span class="invalid-feedback"><strong><?php echo e($errors->first('password')); ?></strong></span>
          <?php endif; ?>
      </div>



      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <button type="submit" class="btn btn-primary"> <?php echo e(__('Login')); ?></button>



        </div>
        <!-- /.col -->
      </div>
    </form>




  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<!-- iCheck -->
<script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/auth/login.blade.php ENDPATH**/ ?>