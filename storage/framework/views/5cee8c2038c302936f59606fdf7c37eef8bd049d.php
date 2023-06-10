<?php $__env->startComponent('mail::message'); ?>
 

<p align='center'> <img src="<?php echo e(asset('img/veritasin.jpg')); ?>" width='1000' height='100' border='0' /></p>

Hello: Sir/ Madem <br>

This is  <?php echo e($emailData['surname']); ?> i am applying for admission at Veritas Univeristy School of Postgraduate.
<br> <br>i kindly request for you to be one of my referee. <br><br>
If my request is acceptanced please kindly fill the form.


<?php $__env->startComponent('mail::button', ['url' => $emailData['url']]); ?>
Click to Fill The Form
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/mails/referee.blade.php ENDPATH**/ ?>