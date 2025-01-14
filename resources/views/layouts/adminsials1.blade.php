<!DOCTYPE html>
<html>

<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('pagetitle') | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
  <link rel="shortcut icon" href="{{ asset('img/letter_logo.png') }}">


<link rel="stylesheet" href="{{ asset('asnew/css/file-upload.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/plyr.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/full-calendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/editor-quill.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/apexcharts.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('asnew/css/css/jquery-jvectormap-2.0.5.css')}}" />


  @yield('css')


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include("adminsials.navbar1")

    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    @include("adminsials.sidebar1")



    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- /.content-wrapper -->






    <!-- Footer starts -->


    @include("adminsials.footer1")









    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('v3/plugins/jquery/jquery.min.js')}}')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js')}}')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('v3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}')}}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('v3/plugins/chart.js/Chart.min.js')}}')}}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('v3/plugins/sparklines/sparkline.js')}}')}}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('v3/plugins/jqvmap/jquery.vmap.min.js')}}')}}"></script>
  <script src="{{ asset('v3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('v3/plugins/jquery-knob/jquery.knob.min.js')}}')}}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('v3/plugins/moment/moment.min.js')}}')}}"></script>
  <script src="{{ asset('v3/plugins/daterangepicker/daterangepicker.js')}}')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}')}}"></script>
  <!-- Summernote -->
  <script src="{{ asset('v3/plugins/summernote/summernote-bs4.min.js')}}')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('v3/dist/js/adminlte.js')}}')}}"></script>



  {{--  ================================================  --}}
  <script src="{{ asset('asnew/js/main.js')}}"></script>

  <script src="{{ asset('asnew/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('asnew/js/boostrap.bundle.min.js')}}"></script>
    <!-- Phosphor Js -->
    <script src="{{ asset('asnew/js/phosphor-icon.js')}}"></script>
    <!-- file upload -->
    <script src="{{ asset('asnew/js/file-upload.js')}}"></script>
    <!-- file upload -->
    <script src="{{ asset('asnew/js/plyr.js')}}"></script>
    <!-- dataTables -->
    <script src="../../cdn.datatables.net/2.0.8/js/dataTables.min.js')}}"></script>
    <!-- full calendar -->
    <script src="{{ asset('asnew/js/full-calendar.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('asnew/js/jquery-ui.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('asnew/js/editor-quill.js')}}"></script>
    <!-- apex charts -->
    <script src="{{ asset('asnew/js/apexcharts.min.js')}}"></script>
    <!-- jvectormap Js -->
    <script src="{{ asset('asnew/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <!-- jvectormap world Js -->
    <script src="{{ asset('asnew/js/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- main js -->
    <script src="{{ asset('asnew/js/main.js')}}"></script>

  {{--  ==================================================  --}}

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('v3/dist/js/demo.js')}}')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>



  @yield('pagescript')
</body>

</html>












<!DOCTYPE html>
<html>

<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('pagetitle') | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
  <link rel="shortcut icon" href="{{ asset('img/uaes.png') }}">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/fontawesome-free/css/all.min.css')}}" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" />
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/jqvmap/jqvmap.min.css')}}" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('v3/dist/css/adminlte.min.css')}}" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/daterangepicker/daterangepicker.css')}}" />
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('v3/plugins/summernote/summernote-bs4.css')}}" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
  {{--  <link rel="stylesheet" href="{{ asset('asnew/css/file-upload.css')}}" />
  <link rel="stylesheet" href="{{ asset('asnew/css/plyr.css')}}" />
  <link rel="stylesheet" href="{{ asset('asnew/css/full-calendar.css')}}" />
  <link rel="stylesheet" href="{{ asset('asnew/css/jquery-ui.css')}}" />
  <link rel="stylesheet" href="{{ asset('asnew/css/editor-quill.css')}}" />
  <link rel="stylesheet" href="{{ asset('asnew/css/apexcharts.css')}}" />  --}}
  <link rel="stylesheet" href="{{ asset('asnew/css/main.css')}}" />
  {{--  <link rel="stylesheet" href="{{ asset('asnew/css/jquery-jvectormap-2.0.5.css')}}" />  --}}




  @yield('css')


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include("adminsials.navbar")

    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    @include("adminsials.sidebar")



    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- /.content-wrapper -->






    <!-- Footer starts -->


    @include("adminsials.footer")









    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('v3/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('v3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('v3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('v3/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('v3/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('v3/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{ asset('v3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('v3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('v3/plugins/moment/moment.min.js')}}"></script>
  <script src="{{ asset('v3/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{ asset('v3/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('v3/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('v3/dist/js/demo.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  {{--  ================================================  --}}
  <script src="{{ asset('asnew/js/main.js')}}"></script>

  <script src="{{ asset('asnew/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('asnew/js/boostrap.bundle.min.js')}}"></script>
    <!-- Phosphor Js -->
    <script src="{{ asset('asnew/js/phosphor-icon.js')}}"></script>
    <!-- file upload -->
    <script src="{{ asset('asnew/js/file-upload.js')}}"></script>
    <!-- file upload -->
    <script src="{{ asset('asnew/js/plyr.js')}}"></script>
    <!-- dataTables -->
    <script src="../../cdn.datatables.net/2.0.8/js/dataTables.min.js')}}"></script>
    <!-- full calendar -->
    <script src="{{ asset('asnew/js/full-calendar.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('asnew/js/jquery-ui.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('asnew/js/editor-quill.js')}}"></script>
    <!-- apex charts -->
    <script src="{{ asset('asnew/js/apexcharts.min.js')}}"></script>
    <!-- jvectormap Js -->
    <script src="{{ asset('asnew/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <!-- jvectormap world Js -->
    <script src="{{ asset('asnew/js/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- main js -->
    <script src="{{ asset('asnew/js/main.js')}}"></script>

  {{--  ==================================================  --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  @yield('pagescript')
</body>

</html>







<!DOCTYPE html>
<html>

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('pagetitle') | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
  <link rel="shortcut icon" href="{{ asset('img/uaes.png') }}">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">

  <!-- FullCalendar CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">
  <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">

  @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include("adminsials.navbar1")

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include("adminsials.sidebar1")

    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- /.content-wrapper -->
    <!-- Footer starts -->
    @include("adminsials.footer1")

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="{{ asset('src/js/vendors.min.js') }}"></script>
  <script src="{{ asset('src/js/pages/chat-popup.js') }}"></script>
  <script src="{{ asset('src/assets/icons/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('src/assets/icons/feather-icons/feather.min.js') }}"></script>

  <script src="{{ asset('src/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
  <script src="{{ asset('src/assets/vendor_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('src/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <!-- edulearn App -->
  <script src="{{ asset('src/js/demo.js') }}"></script>
  <script src="{{ asset('src/js/demo.js') }}"></script>
  <script src="{{ asset('src/js/template.js') }}"></script>
  <script src="{{ asset('src/js/pages/dashboard.js') }}"></script>
  <!-- jQuery (required for FullCalendar) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Moment.js (required for FullCalendar) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

  <!-- FullCalendar JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  @yield('pagescript')
</body>

</html>
