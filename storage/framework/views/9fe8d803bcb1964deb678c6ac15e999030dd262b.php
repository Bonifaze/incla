<!-- Flash messages
    ======================================================================== -->

<!-- display input success if any exists -->
<?php if($success = Session::get('success')): ?>

<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> <?php echo $success; ?></div>

<?php endif; ?>

<!-- display input message if any exists -->
<?php if($message = Session::get('message')): ?>


<div class="alert alert-primary alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> <?php echo $message; ?></div>

<?php endif; ?>

<!-- display input errors if any exists -->
<?php if($errors = Session::get('errors')): ?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> <?php echo $error; ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<!-- display input errors if any exists -->
<?php if($error = Session::get('error')): ?>

<center><div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> <?php echo $error; ?></div></center>

<?php endif; ?>


<!-- display input errors if any exists -->
<?php if($warnings = Session::get('warnings')): ?>

<?php $__currentLoopData = $warnings->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $warning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> <?php echo $warning; ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


    <!--Flash messages / End -->
<?php /**PATH /Users/unnice/Desktop/workspace/laravel/laraproject/resources/views/partialsv3/flash.blade.php ENDPATH**/ ?>