@extends('layouts.mini2')

<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('v3/plugins/chart.js/Chart.min.js') }}"></script>


    @yield('pagescript')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000100',
                        light: '#c2c4c4',
                        gray: '#91a1a4'
                    }
                }
            }
        }
    </script>
</head>
@section('content')
<body class="w-full bg-slate-900 min-h-screen p-10">
    <div class="flex items-center justify-between">
        <div class="">
            <h1 class="text-white text-3xl font-semibold uppercase pulse-animation">Results Correction Chart</h1>
            {{--  <p class="text-gray py-5 text-lg">Spotlight RIMS which stands for Spotlight Results Correction System.</p>  --}}
        </div>
        <div class="">
            <a href="/rbac/auditviewall"
                class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">VIEW RESULT
                AUDIT</a>
        </div>
    </div>
    <main class="border border-gray p-5 rounded-lg my-14">
        <canvas id="modificationChart" width="380" height="200"></canvas>
    </main>
    @section('pagescript')
</body>



@endsection

<script>
    var ctx = document.getElementById('modificationChart').getContext('2d');

    var data2 = @json($programModifications);

var data = @json($programModifications->map(function($item) {
    return [
        'program_name' => $item->program->name,
        'result' => $item->ca2_score + $item->ca3_score + $item->ca1_score + $item->exam_score,

    ];
})->toArray());
    var programs = data.map(item => item.program_name);
    var modificationCounts = data2.map(item => item.modification_count);

    var colors = ['rgba(255,0,0)', 'rgba(0,255,0)', 'rgba(0,0,255)', 'rgba(255,255,0)', 'rgba(255,0,255)', 'rgba(0,255,255)', 'rgba(255,255,255)', 'rgba(0,0,128)', 'rgba(139,69,19)', 'rgba(188,143,143)']; // Add more colors if needed
    var backgroundColors = modificationCounts.map((count, index) => colors[index % colors.length]); // Use colors in a cyclic manner

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: programs,
            datasets: [{
                label: 'Result Count changes',
                data: modificationCounts,
                backgroundColor: backgroundColors,
                borderColor: 'rgba(0,0,0)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
