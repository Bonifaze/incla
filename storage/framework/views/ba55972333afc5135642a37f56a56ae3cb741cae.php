<?php $__env->startSection('pagetitle'); ?>
    Programs
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        <?php echo e($college->name); ?> Faculty Programs
                    </h1>

                    <div class="card">
                        <div class="table-responsive card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Program</th>
                                    <th>Students</th>
                                    <th>View</th>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($program->name); ?></td>
                                            <td> <?php echo e($program->registeredStudentsCount(1000)); ?> </td>
                                            <td><a class="btn btn-outline-info"
                                                    href="<?php echo e(route('academia.college.manage_program', base64_encode($program->id))); ?>">
                                                    View </a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

    <script>
        function deleteCollege(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this College</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteCollegeForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/academia/colleges/programs.blade.php ENDPATH**/ ?>