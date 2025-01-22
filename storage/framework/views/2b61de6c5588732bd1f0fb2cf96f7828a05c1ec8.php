<?php $__env->startComponent('mail::message'); ?>

<p align='center'> <img src="<?php echo e(asset('img/logs.png')); ?>" width='1000' height='100' border='0' /></p>


 <?php echo e($emailData['title']); ?>


Hello: <?php echo e($emailData['surname']); ?>

# <?php echo e($emailData['msg']); ?>



<?php $__env->startComponent('mail::button', ['url' => $emailData['url']]); ?>
Click to activate your account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/mails/confirmation.blade.php ENDPATH**/ ?>