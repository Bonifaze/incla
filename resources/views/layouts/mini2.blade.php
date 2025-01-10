<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('v3/plugins/fontawesome-free/css/all.min.css') }}" />

    <title> Spotlight System | Institute of Consecrated Life in Africa (InCLA), Abuja </title>
    <link rel="shortcut icon" href="{{ asset('img/letter_logo.png') }}">

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

<body class="h-screen w-full bg-slate-900">

    <nav class="mb-4 p-4 border-b-2 border-slate-700 flex items-center justify-between">
        <div class="">
            <h2 class="text-white text-lg font-semibold">
                VERITAS Spotlight
            </h2>
            <p class="text-slate-400 text-center text-md">The Spotlight Result Correction System is a product of Veritas
                University ICT
                Unit.</p>
        </div>
        <a href="/staff/home"
            class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">Return to
            Ecampus</a>
    </nav>
    <div class="p-5">
        @yield('content')
    </div>


    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>




    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js">
    </script>
</body>

</html>
