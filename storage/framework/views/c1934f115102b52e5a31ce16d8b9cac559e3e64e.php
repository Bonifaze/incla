<?php $__env->startSection('pagetitle'); ?> Remita Payments  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('fees-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('fees'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('remita'); ?> active <?php $__env->stopSection(); ?>
 
 <!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Remita Payments</h3>
				</div>
            
             <div class="table-responsive">

				 <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                   <?php if($update = Session::get('update')): ?>

                     <div style="color:#090; font-weight:bolder;"> <?php echo $update; ?></div>

                 <?php endif; ?>

             </div>

                <div class="table-responsive">
                   <h1>
                    <a class="btn btn-info" href="<?php echo e(route("student.remita-generate")); ?>" > Generate New Remita Reference </a>
                    </h1>

                        <h1> Current debt: </h1>
                    <h1> Payment: </h1>

                    <div class="card-body">
                        <div class="box-body">

                           <div class="row" style="font-weight: bold">
                                 <div class="col-md-3 form-group">
                                        Remita RRR
                                 </div>
                               <div class="col-md-2 form-group">
                                   Amount
                               </div>
                               <div class="col-md-2 form-group">
                                   Status
                               </div>
                               <div class="col-md-2 form-group">
                                   Description
                               </div>
                               <div class="col-md-1 form-group">
                                   Action
                               </div>
                               <div class="col-md-2 form-group">
                                   Payment
                               </div>
                           </div>
                           <?php $__currentLoopData = $remitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $remita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <?php echo e($remita->rrr); ?>

                                    </div>
                                    <div class="col-md-2 form-group">
                                        &#8358;<?php echo e(number_format($remita->amount)); ?>

                                    </div>
                                    <div class="col-md-2 form-group">
                                        <?php echo e($remita->status); ?>

                                    </div>
                                    <div class="col-md-2 form-group">
                                        <?php echo e($remita->feeType->name); ?>

                                    </div>

                                    <?php if($remita->status_code !== 1): ?>
                                    <div class="col-md-1 form-group">
                                        <?php echo Form::open(['method' => 'Post', 'url' => config('app.REMITA_DOMAIN').'/remita/ecomm/finalize.reg', 'id'=>'payForm'.$remita->id]); ?>

                                        <?php echo e(Form::hidden('rrr', $remita->rrr)); ?>

                                        <?php echo e(Form::hidden('hash', hash('sha512',config('app.REMITA_MERCHANT_ID').$remita->rrr.config('app.REMITA_API_KEY')))); ?>

                                        <?php echo e(Form::hidden('merchantId', config('app.REMITA_MERCHANT_ID'))); ?>

                                        <?php echo e(Form::hidden('responseurl', "https://ecampus.veritas.edu.ng/students/remita/response")); ?>

                                        <button onclick="pay(<?php echo e($remita->id); ?>)" type="button" class="<?php echo e($remita->id); ?> btn btn-success" > Pay </button>
                                        <?php echo Form::close(); ?>


                                    </div>
                                    <!--
                                    <div class="col-md-2 form-group">
                                        <?php echo Form::open(['method' => 'Post', 'route' => 'student.remita-verify', 'id'=>'verifyRemita'.$remita->id]); ?>

                                        <?php echo e(Form::hidden('remita_id', $remita->id)); ?>

                                        <button type="submit" class="<?php echo e($remita->id); ?> btn btn-outline-warning" > Verify Payment</button>
                                        <?php echo Form::close(); ?>

                                    </div>
                                    -->
                                    <?php elseif($remita->status_code == 1): ?>
                                        <div class="col-md-1 form-group">
                                            <a class="btn btn-info" target="_blank" href="<?php echo e(route("student.remita-print",$remita->id)); ?>" > Print Receipt </a>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            Payment Received
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        function pay(id)
        {
            document.getElementById("payForm"+id).submit();
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


    </script>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/remita.blade.php ENDPATH**/ ?>