<!DOCTYPE html>
<html>

<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title> <?php echo $__env->yieldContent('pagetitle'); ?> | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
  <link rel="shortcut icon" href="<?php echo e(asset('img/uaes.png')); ?>">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/fontawesome-free/css/all.min.css')); ?>" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>" />
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/jqvmap/jqvmap.min.css')); ?>" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/dist/css/adminlte.min.css')); ?>" />
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/daterangepicker/daterangepicker.css')); ?>" />
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/summernote/summernote-bs4.css')); ?>" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">

  <!-- FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />







  <?php echo $__env->yieldContent('css'); ?>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php echo $__env->make("adminsials.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <?php echo $__env->make("adminsials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- /.content-wrapper -->






    <!-- Footer starts -->


    <?php echo $__env->make("adminsials.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>









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

  <!-- jQuery (required for FullCalendar) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <!-- Moment.js (required for FullCalendar) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  
  <!-- FullCalendar JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
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

  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(asset('v3/dist/js/demo.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <?php echo $__env->yieldContent('pagescript'); ?>
</body>

</html><?php /**PATH C:\Users\hp\Desktop\incla\resources\views/layouts/adminsials.blade.php ENDPATH**/ ?>