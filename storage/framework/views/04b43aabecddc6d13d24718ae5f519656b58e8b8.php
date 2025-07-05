<?php $__env->startSection('pagetitle'); ?> Staff Role details <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('list-staff'); ?> active <?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col_full">
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    <?php echo e($staff->fullName); ?>

                </h1>

                <div class="card ">


                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>username</th>


                            </thead>


                            <tbody>

                                <tr>
                                    
                                    <td><?php echo e($staff->fullName); ?></td>
                                    <td><?php echo e($staff->email); ?></td>
                                    <td><?php echo e($staff->phone); ?></td>
                                    <td><?php echo e($staff->username); ?></td>

                                </tr>

                            </tbody>



                        </table>


                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title"> List of assigned Roles</h4>
                        </div>
                    </div>


                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Description</th>


                            </thead>


                            <tbody>

                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td><?php echo e($role->role); ?></td>
                                    <td><?php echo e($role->description); ?></td>


                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>



                        </table>



                    </div>



                   <div class="container-fluid pt-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Permissions List</h4>
        </div>
        <div class="card-body">
            <!-- Table responsive with DataTable -->
            <div class="table-responsive">
                <table id="permissionsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($perm->name); ?></td>
                                <td><?php echo e($perm->description); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



              













                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

<script>
    function submitAForm(id) {
        bootbox.dialog({
            message: "<h4>Confirm you want to assign this Role</h4>"
            , buttons: {
                confirm: {
                    label: 'Yes'
                    , className: 'btn-success'
                    , callback: function() {
                        document.getElementById("addRForm" + id).submit();
                    }
                }
                , cancel: {
                    label: 'No'
                    , className: 'btn-danger'
                , }
            }
            , callback: function(result) {}

        });
        // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
    }




    function submitRForm(id) {
        bootbox.dialog({
            message: "<h4>Confirm you want to assign remove this Role</h4>"
            , buttons: {
                confirm: {
                    label: 'Yes'
                    , className: 'btn-success'
                    , callback: function() {
                        document.getElementById("removeRForm" + id).submit();
                    }
                }
                , cancel: {
                    label: 'No'
                    , className: 'btn-danger'
                , }
            }
            , callback: function(result) {}

        });
        // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
    }

</script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#permissionsTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/staff/roles.blade.php ENDPATH**/ ?>