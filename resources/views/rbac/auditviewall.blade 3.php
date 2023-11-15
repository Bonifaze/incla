@extends('layouts.mini2')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('v3/plugins/chart.js/Chart.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('v3/dist/css/adminlte.min.css') }}" />

    <style>
        @keyframes pulse {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>

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

@section('content')

<div class="w-full p-10 min-h-screen bg-slate-900">

    <div class="flex items-center justify-between mb-5">
        <h1 class="text-white text-3xl font-semibold uppercase pulse-animation">Spotlight Audit Record of Modified Result</h1>
        <a href="/program-courses/results/resultBarchat" class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">
            View Chart
        </a>
         <a href="/program-courses/results/ProgramResultBarchat" class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">
            View Program
        </a>
    </div>

    @include('partialsv3.flash')

    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-white">
            <th>S/N</th>
            <th>Staff Name</th>
            <th>Course </th>
            <th>session</th>
            <th>Semester</th>
            <th>Level</th>
            <th>Old Score</th>
            <th>New Score</th>
            <th>Student MatNo.</th>
            <th>Student Name</th>
            <th>Date</th>
        </thead>

        <tbody>
            @foreach ($modify as $key => $audit)
            <tr>
                <td class="text-white">{{ $loop->iteration }}</td>
                <td class="text-white">{{ $audit->staff->full_name ?? null}}</td>
                {{-- <td>{{ $audit->modifiedBy->full_name ?? null}}</td> --}}
                <td class="text-white">{{ $audit->course->course_code}} ({{ $audit->course->course_title}})</td>

                <td class="text-white">{{ $audit->sessions->name }}</td>

                @if($audit->semester==1)
                <td class="text-white">First</td>
                @else
                <td class="text-white">Second</td>
                @endif
                <td class="text-white">{{ $audit->level}}</td>
                <td class="text-warning h2">{{ $audit->old_total ?? null}}</td>
                <td class="text-success h1">{{ $audit->total ?? null}}</td>
                <td class="text-white">{{ $audit->student->academic->mat_no ?? null}}</td>
                <td class="text-white">{{ $audit->full_name}}</td>
                <td class="text-white">{{ $audit->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
    <div class="flex justify-center mb-4">
        {{ $modify->links() }}
    </div>
</div>

@endsection
