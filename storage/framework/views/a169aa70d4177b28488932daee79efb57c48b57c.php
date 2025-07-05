<?php $__env->startSection('content'); ?>

<body class="flex justify-center items-center px-20">
    <div class="">

        <div class="border border-slate-700 p-4 rounded-lg">
            <h1 class="text-3xl text-center font-semibold text-white">Welcome,</h1>

            <p class="text-slate-400 text-center text-md mt-4">You are about to enter Veritas Spotlight. Ensure you have
                appropriate
                permission
                to access this application. All of your activities will be totally transparent. Adjustments to results
                will
                be seen by members of your departmental board and core members of the University Senate.
            </p>

            <div class="text-center">
                <p class="text-slate-400 text-md mt-4">Click YES to continue. or NO to return to Veritas
                    ecampus dashboard.
                </p>
                <div class="space-x-3 mt-4">
                    <a href="/spotlight/option"
                        class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">YES</a>
                    <a href="/staff/home"
                        class="bg-rose-500 hover:bg-rose-700 text-white font-semi bold py-2 px-6 rounded-lg">NO</a>
                </div>
            </div>
        </div>

        <div class="my-8 space-y-5 border p-4 rounded-lg" style="background-color: #ffffff;">
            <h2 class="text-3xl text-center font-semibold text-slate-700 underline">Permission for Result Modification</h2>
            <ul class="text-slate-700" style="list-style-type: disc;">
                <li>Results will only be modified after appropriate evaluation by the Senate Business Committee (SBC) and due approval by the University Senate. </li>
                <li>Once results have been approved, only the HOD will have direct access to modify the results.</li>
                <li>The HOD may temporarily grant this privilege to another member of staff by issuing a written
                    request
                    to the ICT Unit.</li>
                <li>The ICT Unit will only modify results if granted written permission by the University Senate through
                    the SBC
                    or the Vice Chancellor. </li>
            </ul>
        </div>
    </div>

</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/rbac/confirm.blade.php ENDPATH**/ ?>