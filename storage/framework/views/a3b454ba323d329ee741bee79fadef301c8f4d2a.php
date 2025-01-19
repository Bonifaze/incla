<?php $__env->startSection('pagetitle'); ?>
    Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

 <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Change Password
                </h1>
<div class="">

                                            
                                            <form method="POST" action="/editpassword" class="p-3">
                                                <?php echo csrf_field(); ?>
                                                <input id="email" type="hidden" class="form-input form-control"
                                                    name="email" value="<?php echo e($applicantsDetails->email); ?>">
<div class="row">
<div class="col">
                           <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password" type="password"
                                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           required placeholder="Current Password"
                                                            autocomplete="new-password">

                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
</div>
<div class="col">

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password" type="password"
                                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="password" required placeholder="New Password"
                                                            autocomplete="new-password">

                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
</div>
<div class="col">
  <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            placeholder="Confirm Password" autocomplete="new-password">
                                                    </div>
                                                </div>
</div>

</div>



                                                <div class="form-group">
                                                    <div class="form-group">

                                                        
                                                        <button type="submit" class="btn btn-success">
                                                            <?php echo e(__('Update')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('pagescript'); ?>
    <!-- External JavaScripts
             ============================================= -->


    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

    <!-- bootstrap datepicker -->
    <script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/admissions//changeuserpassword.blade.php ENDPATH**/ ?>