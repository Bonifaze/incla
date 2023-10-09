<?php $__env->startSection('pagetitle'); ?>
    Remita Payment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('bursary-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bursary'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('remita-list'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">


                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        
                        <br><br>
                        <?php if(isset($sum)): ?>
                            <?php echo e('Total: N' . number_format($sum)); ?>

                        <?php else: ?>
                            Remita Details
                        <?php endif; ?>
                    </h1>



                    <div class="table-responsive card-body">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>RRR</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Service Type</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="">
                                <?php $__currentLoopData = $remitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $remita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($remita->rrr); ?></td>
                                        <td><?php echo e($remita->student->fullname ?? $remita->users->surname ?? null); ?></td>
                                        <td><?php echo e($remita->users->surname ?? null); ?></td>
                                        <td><?php echo e($remita->student->academic->mat_no ?? null); ?></td>
                                        <td><?php echo e($remita->feeType->name ?? null); ?></td>
                                        <td>&#8358;<?php echo e(number_format($remita->amount)); ?></td>
                                        <td><?php echo e($remita->updated_at->format('d-M-Y')); ?></td>
                                        <td>
                                            <?php if($remita->status_code == 1): ?>
                                                <a class="btn btn-info" target="_blank"
                                                    href="<?php echo e(route('remita.print-rrr', $remita->id)); ?>"><i
                                                        class="fas fa-print text-white-50"></i> Print Receipt </a>
                                            <?php else: ?>
                                                <?php echo e($remita->status); ?>

                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tr>
                                <thead></thead>
                                <tr>
                                    <th colspan="3">School Fees</th>
                                    <th colspan="2">School Fee paid</th>
                                    <th colspan="2">School Fees Debt</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                            <tbody class="">
                                <tr>
                                    

                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Debt Entry</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editDebtForm" action="<?php echo e(route('remita.update-debt')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <!-- Form inputs for editing debt and amount paid -->
                                       
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="saveChangesButton">Save
                                        Changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                                                    <div class="dropdown no-arrow  btn btn-sm shadow-sm">

                                        
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
    <script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>

    <script>
        function confirm(id) {
            bootbox.dialog({
                message: "<h4>You are about to confirm a payment</h4> <h5>Note: Are you sure? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("confirmForm" + id).submit();
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

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Ekko Lightbox -->
    <script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/bursary/remita_list.blade.php ENDPATH**/ ?>