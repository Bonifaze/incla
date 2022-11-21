 
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
    <a href="<?php echo e(asset( url('/') )); ?>"><b>Veritas University </b>ECampus</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body loginbg">
  <a class="btn btn-block bg-gradient-primary" style='font-size:20px'; href="<?php echo e(route('staff.login')); ?>"> <i class="fa fa-user" style='font-size:36px';></i> Staff Login </a>
   
  </div>
  
  <div> <p> </p> </div>
  
  <div class="login-box-body loginbg">
  <a class="btn btn-block bg-gradient-primary" href="<?php echo e(route('student.login')); ?>" style='font-size:20px;'> <i class="fa fa-graduation-cap" style='font-size:36px;'></i> Student Login </a>
   
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




<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/errors/419.blade.php ENDPATH**/ ?>