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
                            <?php echo e($sum); ?>

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
                                
                                <th>Amout Paid</th>
                                <th>Debt</th>
                                <th>Date</th>

                                <th>Action</th>
                            </thead>
                            <?php $__currentLoopData = $remitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $remita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($remita->rrr); ?></td>
                                    
                                    
                                    <td>&#8358;<?php echo e(number_format($remita->amount_paid)); ?></td>
                                    <td>&#8358;<?php echo e(number_format($remita->debt)); ?></td>
                                    <td><?php echo e($remita->created_at); ?></td>

                                    <td>
                                        <a class="btn btn-info edit-button" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit text-white-50"></i> Edit
                                        </a>
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
                                        <input type="hidden" name="student_id" value="<?php echo e($remita->student_id); ?>">
                                        <input type="hidden" name="staff_id" value="<?php echo e(auth()->user()->id); ?>">
                                        <div class="form-group">
                                            <label for="debt">Debt:</label>
                                            <input type="text" class="form-control" id="debt" name="debt"
                                                value="<?php echo e($remita->debt); ?>">
                                            <input type="hidden" class="form-control" id="debt" name="old_debt"
                                                value="<?php echo e($remita->debt); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="amountPaid">Amount Paid:</label>
                                            <input type="text" class="form-control" id="amountPaid" name="amount_paid"
                                                value="<?php echo e($remita->amount_paid); ?>">
                                            <input type="hidden" class="form-control" id="amountPaid"
                                                name="old_amount_paid" value="<?php echo e($remita->amount_paid); ?>">
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
                                    </td>
                                    <td>
                                         <?php echo Form::open([
                                                            'method' => 'patch',
                                                            'action' => 'RemitaController@disable',
                                                            'id' => 'disableUForm' . $remita->id,
                                                        ]); ?>

                                                        <?php echo e(Form::hidden('id', $remita->id)); ?>

                                                        <?php echo e(Form::hidden('status', 0)); ?>

                                                        <?php echo e(Form::hidden('action', 'disabled')); ?>



                                                        <button type="submit" class="btn btn-danger"><span
                                                                class="icon-line2-trash"></span><i
                                                                class="fas fa-solid fa-trash"></i> Disable</button>
                                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>


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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/bursary/remita_listdebt.blade.php ENDPATH**/ ?>