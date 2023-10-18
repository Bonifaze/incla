@extends('layouts.mini2')

<body class="h-screen w-full bg-slate-900 flex justify-center items-center px-10">
    <div class="flex items-center justify-evenly space-x-5">
        <a href="/rbac/auditviewall" class="border border-slate-700 text-center p-4 rounded-lg space-y-2 hover:scale-110 transition duration-200 shadow-lg">
            <i class="fas fa-book fa-xl" style="color: #ffffff; font-size:2rem"></i>
            <h1 class="text-2xl font-semibold text-white">View Result Changes</h1>
        </a>
        <a href="/results/programSearchStudentSpotlight" class="border border-slate-700 text-center p-4 rounded-lg space-y-2 hover:scale-110 transition duration-200 shadow-lg">
            <i class="fas fa-pen fa-xl" style="color: #ffffff; font-size:2rem"></i>
            <h1 class="text-2xl font-semibold text-white">Modify Result</h1>
        </a>
    </div>
</body>

</html>
