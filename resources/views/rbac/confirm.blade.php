@extends('layouts.mini2')

    <body class="h-screen w-full bg-slate-900 flex justify-center items-center px-20">
        <div class="border border-slate-700 text-center p-4 rounded-lg space-y-2">
            <h1 class="text-2xl font-semibold text-white">Welcome to Spotlight RIMS</h1>
            <p class="text-slate-600 text-sm">Spotlight RIMS which stands for Spotlight Results Integrity Management System
                is a product of the ICT unit of Veritas University.
            </p>
            <p class="text-slate-400 text-md mt-4">You are about to enter Spotlight RIMS. Ensure you have appropriate permission
                to access this application. All of your activities will be totally transparent. Adjustments to results will
                be seen by members of your department and all members of the University Senate.
            </p>
            <p class="text-slate-400 text-md mt-4">Click YES to continue. or NO to return to Veritas ecampus dashboard.</p>
            <div class="space-x-3 mt-4">
                <a href="/spotlight/option" class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">YES</a>
                <a href="/staff/home" class="bg-rose-500 hover:bg-rose-700 text-white font-semi bold py-2 px-6 rounded-lg">NO</a>
            </div>
        </div>
    </body>

</html>