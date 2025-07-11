<!DOCTYPE html>
<html>
<head>

<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

 <title> <?php echo $__env->yieldContent('pagetitle'); ?> | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
 <link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>" >

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/fontawesome-free/css/all.min.css')); ?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>"/>
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/jqvmap/jqvmap.min.css')); ?>"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/dist/css/adminlte.min.css')); ?>"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/daterangepicker/daterangepicker.css')); ?>"/>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/summernote/summernote-bs4.css')); ?>"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/css/plugins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/css/custom.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/css/demo.css')); ?>">


<?php echo $__env->yieldContent('css'); ?>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <?php echo $__env->make("spartials.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
   <?php echo $__env->make("spartials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



  <!-- Content Wrapper. Contains page content -->
   <?php echo $__env->yieldContent('content'); ?>

  <!-- /.content-wrapper -->






<!-- Footer starts -->


 <?php echo $__env->make("spartials.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>









  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('v3/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('v3/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('v3/plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('v3/plugins/sparklines/sparkline.js')); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(asset('v3/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('v3/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('v3/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('v3/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('v3/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('v3/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('v3/dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
                            </script>

<script>
   
</script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('v3/dist/js/demo.js')); ?>"></script>
 <?php echo $__env->yieldContent('pagescript'); ?>
</body>
</html>
<?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/layouts/student.blade.php ENDPATH**/ ?>