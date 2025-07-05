<!DOCTYPE html>
<html>
<head>
    <title>Institute of Consecrated Life in Africa (InCLA) Admisssion Letter </title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
 

<?php $__env->startComponent('mail::message'); ?>


<p align='center'> <img src="<?php echo e(asset('img/logs.png')); ?>" width='1000' height='100' border='0' /></p>


 

Hi: <?php echo e($emailData['surname']); ?>

# <?php echo e($emailData['msg']); ?>


There was a request to change your password!
<br><br>
                If you did not make this request then please ignore this emial.
<br><br>
                Otherwise Please Click this Button below to Reset your password:

<?php $__env->startComponent('mail::button', ['url' => $emailData['url']]); ?>
Click to Reset Password
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
</body>
</head>
</html>
<?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/mails/forgotpassword.blade.php ENDPATH**/ ?>