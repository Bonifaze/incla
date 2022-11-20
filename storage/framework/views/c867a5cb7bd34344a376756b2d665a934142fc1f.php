 
 <?php $__env->startSection('pagetitle'); ?>

<title> Laravel Starter Login</title>

<?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('css'); ?>
  
   <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>">
  
  
  

<?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('content'); ?>
  
<body class="hold-transition login-page" style="background-image: url(<?php echo e(asset( 'dist/img/login1.jpg' )); ?>); background-repeat: no-repeat; background-size: cover;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo e(asset( url('/home') )); ?>"><b>Laravel </b>Starter</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="<?php echo e(route('login')); ?>">
     <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        
        <input id="email" type="email" placeholder="Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
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

    
		 <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Admin Password?')); ?>

         </a>
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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




<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/auth/login.blade.php ENDPATH**/ ?>