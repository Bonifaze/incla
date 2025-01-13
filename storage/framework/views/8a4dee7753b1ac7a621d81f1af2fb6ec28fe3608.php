<!DOCTYPE html>
<html>

<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title> <?php echo $__env->yieldContent('pagetitle'); ?> | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
  <link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>">


  <link rel="stylesheet" href="<?php echo e(asset('asnew/css/file-upload.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/plyr.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/full-calendar.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/jquery-ui.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/editor-quill.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/apexcharts.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/css/main.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('aswnew/css/css/jquery-jvectormap-2.0.5.css')); ?>" />


  <?php echo $__env->yieldContent('css'); ?>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php echo $__env->make("adminsials1.navbar1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <?php echo $__env->make("adminsials1.sidebar1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- /.content-wrapper -->






    <!-- Footer starts -->


    <?php echo $__env->make("adminsials1.footer1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>









    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo e(asset('v3/plugins/jquery/jquery.min.js')); ?>')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo e(asset('v3/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>')}}"></script>
  <!-- ChartJS -->
  <script src="<?php echo e(asset('v3/plugins/chart.js/Chart.min.js')); ?>')}}"></script>
  <!-- Sparkline -->
  <script src="<?php echo e(asset('v3/plugins/sparklines/sparkline.js')); ?>')}}"></script>
  <!-- JQVMap -->
  <script src="<?php echo e(asset('v3/plugins/jqvmap/jquery.vmap.min.js')); ?>')}}"></script>
  <script src="<?php echo e(asset('v3/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo e(asset('v3/plugins/jquery-knob/jquery.knob.min.js')); ?>')}}"></script>
  <!-- daterangepicker -->
  <script src="<?php echo e(asset('v3/plugins/moment/moment.min.js')); ?>')}}"></script>
  <script src="<?php echo e(asset('v3/plugins/daterangepicker/daterangepicker.js')); ?>')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo e(asset('v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>')}}"></script>
  <!-- Summernote -->
  <script src="<?php echo e(asset('v3/plugins/summernote/summernote-bs4.min.js')); ?>')}}"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo e(asset('v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>')}}"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(asset('v3/dist/js/adminlte.js')); ?>')}}"></script>



  
  <script src="<?php echo e(asset('asnew/js/main.js')); ?>"></script>

  <script src="<?php echo e(asset('asnew/js/jquery-3.7.1.min.js')); ?>"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="<?php echo e(asset('asnew/js/boostrap.bundle.min.js')); ?>"></script>
    <!-- Phosphor Js -->
    <script src="<?php echo e(asset('asnew/js/phosphor-icon.js')); ?>"></script>
    <!-- file upload -->
    <script src="<?php echo e(asset('asnew/js/file-upload.js')); ?>"></script>
    <!-- file upload -->
    <script src="<?php echo e(asset('asnew/js/plyr.js')); ?>"></script>
    <!-- dataTables -->
    <script src="../../cdn.datatables.net/2.0.8/js/dataTables.min.js')}}"></script>
    <!-- full calendar -->
    <script src="<?php echo e(asset('asnew/js/full-calendar.js')); ?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo e(asset('asnew/js/jquery-ui.js')); ?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo e(asset('asnew/js/editor-quill.js')); ?>"></script>
    <!-- apex charts -->
    <script src="<?php echo e(asset('asnew/js/apexcharts.min.js')); ?>"></script>
    <!-- jvectormap Js -->
    <script src="<?php echo e(asset('asnew/js/jquery-jvectormap-2.0.5.min.js')); ?>"></script>
    <!-- jvectormap world Js -->
    <script src="<?php echo e(asset('asnew/js/jquery-jvectormap-world-mill-en.js')); ?>"></script>

    <!-- main js -->
    <script src="<?php echo e(asset('asnew/js/main.js')); ?>"></script>

  

  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(asset('v3/dist/js/demo.js')); ?>')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>



  <?php echo $__env->yieldContent('pagescript'); ?>
</body>

</html><?php /**PATH C:\Users\CLINTON\Downloads\incla\resources\views/layouts/adminsials1.blade.php ENDPATH**/ ?>