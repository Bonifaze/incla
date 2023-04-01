<?php $__env->startComponent('mail::message'); ?>
<p align='center'> <img src="<?php echo e(asset('img/veritasin.jpg')); ?>" width='1000' height='100' border='0' /></p>

 <?php echo e($emailData['title']); ?>


<h4><?php echo e($emailData['surname']); ?></h4>
 <?php echo e($emailData['msg']); ?>

 <br><br>
 <center> <strong><?php echo e($emailData['name_no']); ?> <?php echo e($emailData['identity_no']); ?>  </strong>  </center>
<br>
<center> <strong> LOGIN DETAILS </strong> </center>
<center> <strong> USERNAME: </strong> <?php echo e($emailData['email']); ?>  </center>

<center> <strong> PASSWORD: </strong> <?php echo e($emailData['password']); ?> </center>


<?php $__env->startComponent('mail::button', ['url' => $emailData['url']]); ?>
Click to Login your account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/mails/welcome.blade.php ENDPATH**/ ?>