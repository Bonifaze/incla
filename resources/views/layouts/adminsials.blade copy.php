<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagetitle') | Institute of Consecrated Life in Africa (InCLA), Abuja</title>
    <link rel="shortcut icon" href="{{ asset('img/uaes.png') }}">

    <!-- Meta Tags for Responsiveness -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/demo.css') }}">

    @yield('css')  <!-- Custom Page-specific CSS -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('adminsials.nav')  
        <!-- Include the Navbar -->

        <!-- Main Sidebar Container -->
        @include('adminsials.side')  
        <!-- Include the Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')  <!-- Page-specific Content -->
        </div>

        <!-- Footer -->
        @include('adminsials.foot')  
        <!-- Include the Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/js/kaiadmin.min.js') }}"></script>
    @yield('pagescript')  <!-- Page-specific Scripts -->
</body>

</html>
