<?php $__env->startSection('pagetitle'); ?>
Staff Home
<?php $__env->stopSection(); ?>

 <style>
    #multi-filter-select {
        table-layout: fixed;
        width: 100%;
    }

    #multi-filter-select td, #multi-filter-select th {
        white-space: nowrap; /* Prevent text from wrapping */
        overflow: hidden; /* Hide overflowed text */
        text-overflow: ellipsis; /* Show ellipsis (...) when text overflows */
        padding: 5px 10px;
    }

    /* Set fixed width for columns */
  /
    #multi-filter-select td:nth-child(4) {
        width: 150px;
    }

    #multi-filter-select td:nth-child(6),
    #multi-filter-select td:nth-child(5) {
        width: 1px;
    }

    /
</style>

<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col_full">
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    All Registered Users
                </h1>

                <div class="card shadow border border-success">

                    <div class="container">
                        <div class="page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="multi-filter-select" class=" table table-striped table-hover" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Surname</th>
                                                            <th>First Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Edit Action</th>
                                                            <th>Reset Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Surname</th>
                                                            <th>First Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Edit</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php $__currentLoopData = $allApplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allApp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($allApp->surname); ?></td>
                                                            <td><?php echo e($allApp->first_name); ?></td>
                                                            <td><?php echo e($allApp->phone); ?></td>
                                                            <td><?php echo e($allApp->email); ?></td>
                                                            <td><a href="/editusers/<?php echo e($allApp->email); ?>" class="btn btn-warning">Edit</a></td>
                                                            <td>
                                                                <form method="POST" action="resetuserspassword">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" value="<?php echo e($allApp->email); ?>" placeholder="<?php echo e($allApp->email); ?>" name="email">
                                                                    <button class="btn btn-danger">Reset Password</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>



            </div>
        </div>

</div>


</section>
</div>
<?php $__env->stopSection(); ?>
<script>
    $(document).ready(function() {
        $('#multi-filter-select').DataTable();
    });

</script>
<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/admissions/allUsers.blade.php ENDPATH**/ ?>