<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Form Css -->
    <link rel="stylesheet" href="{{ asset('scss/common/extend.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/common/fonts.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/common/global.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/common/minxi.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/common/variables.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/layouts/main.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/layouts/responsive.scss')}}">
    <link rel="stylesheet" href="{{ asset('scss/style.scss')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css.map')}}">
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <title>Institute of Consecrated Life in Africa (InCLA) Admissions Portal</title>
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>
