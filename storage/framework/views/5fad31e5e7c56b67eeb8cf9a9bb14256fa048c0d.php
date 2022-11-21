<?php $__env->startSection('pagetitle'); ?>
    List of Academic Departments
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
                        List of Academic Departments
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>College</th>
                                    <th>Programs</th>
                                    <th>Action</th>
                                    
                                </thead>

                                <tbody>

                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?>.</td>
                                            <td><?php echo e($department->name); ?></td>
                                            <td><?php echo e($department->college->name); ?></td>

                                            <td><?php echo e($department->programs->count()); ?></td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', 'App\AcademicDepartment')): ?>
                                                <td><a class="btn btn-primary"
                                                        href="<?php echo e(route('academia.department.edit', $department->id)); ?>"> Edit
                                                    </a></td>
                                            <?php else: ?>
                                                <td> </td>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', 'App\AcademicDepartment')): ?>
                                                
                                            <?php else: ?>
                                                <td> </td>
                                            <?php endif; ?>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                            <?php echo $departments->render(); ?>

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
        function deleteDepartment(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this Department</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteDepartmentForm" + id).submit();
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/academia/departments/list.blade.php ENDPATH**/ ?>