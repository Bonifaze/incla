<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('v3/plugins/fontawesome-free/css/all.min.css') }}" />

        <title> Spotlight System | Veritas University, Abuja </title>
        <link rel="shortcut icon" href="{{ asset('img/letter_logo.png') }}" >
        
    <link rel="stylesheet" href="{{ asset('v3/plugins/jqvmap/jqvmap.min.css') }}" />
        <title>Spotlight RIMS</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('v3/plugins/chart.js/Chart.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('v3/dist/css/adminlte.min.css') }}" />
    
        @yield('pagescript')
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#000375',
                            light: '#c2c4c4',
                            gray: '#91a1a4'
                        }
                    }
                }
            }
        </script>
    </head>

<body class="hold-transition sidebar-mini layout-fixed">

    <script src="{{ asset('v3/plugins/chart.js/Chart.min.js') }}"></script>
    

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js"></script>



    @yield('pagescript')
</body>

</html>
