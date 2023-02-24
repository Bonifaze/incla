<?php $__env->startSection('pagetitle'); ?>
    Search Remita
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
<?php $__env->startSection('remita-search'); ?>
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
                        Applicant Remita Search
                    </h1>
                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card card-olive">
                        
                        
                        <!-- /.box-body -->




                        <?php echo Form::close(); ?>

                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Search RRR </h3>
                        </div>
                        <div class="table-responsive">
                            <!-- form start -->
                            <?php echo Form::open(['route' => 'remita.find-rrrA', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                               <?php if(session('approvalMsg')): ?>
                            <?php echo session('approvalMsg'); ?>

                            <?php endif; ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div <?php if($errors->has('data')): ?> class ='has-error form-group' <?php endif; ?>>
                                                <label for="data">Enter Remita RRR:</label>
                                                <?php echo Form::search('data', null, [
                                                    'placeholder' => 'RRR',
                                                    'class' => 'form-control',
                                                    'id' => 'data',
                                                    'required' => 'required',
                                                ]); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <?php echo e(Form::submit('Search', ['class' => 'btn btn-success'])); ?>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <?php echo Form::close(); ?>

                    </div>

                    






                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/bursary/remita_searchA.blade.php ENDPATH**/ ?>