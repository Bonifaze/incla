<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<title><?php echo e($student->full_name); ?> Remita Payment</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <body onload="window.print();">
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top"><table width="100%" height="80" border="0" cellpadding="0" cellspacing="0" colspan="2">
     <tr>
        <td align="center" valign="top">
            <a><img src="data:image/png;base64,<?php echo e($student->passport); ?>" class="img elevation-2" alt="Passport" width="100px"> </a>
        </td>
         <td align="center" valign="top"><h1><strong>Remita Payment Receipt </strong></h1></td>
      </tr>
    </table>
      <table width="100%" border="0">
      
        <tr>
          <td><strong>Name of Student: <?php echo e($student->full_name); ?> </strong></td>
          <td><strong>  Matric. No.: <?php echo e($academic->mat_no); ?> </strong></td>
        </tr>
        <tr>
          <td><strong>Phone: <?php echo e($student->phone); ?> </strong></td>
          <td><strong>Gender: <?php echo e($student->gender); ?> </strong></td>
        </tr>
        <tr>
          <td><strong>Programme: <?php echo e($academic->program->name); ?> </strong></td>
          <td><strong>Email: <?php echo e($student->email); ?> </strong></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      

  
        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>RRR</strong>: <?php echo e($remita->rrr); ?></td>
                            <td colspan="2" align="center"><strong>Service</strong>: <?php echo e($feeType->name); ?> </td>
                            <td colspan="2"><strong>Amount</strong>: &#8358;<?php echo e(number_format($remita->amount)); ?></td>
                          </tr>
                        <tr>
                            <td colspan="3"><strong>Bank</strong>: <?php echo e($remita->bankName($remita->bank_code)); ?></td>
                            <td colspan="2" align="center"><strong>Channel</strong>: <?php echo e($remita->channel); ?> </td>
                            <td colspan="2"><strong>Order</strong>: <?php echo e($remita->order_id); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>RRR Date</strong>: <?php echo e($remita->created_at->format('d-M-Y')); ?></td>
                            <td colspan="2" align="center"><strong>Payment Date</strong>: <?php echo e($remita->transaction_date); ?> </td>
                            <td colspan="2"><strong>Updated On</strong>: <?php echo e($remita->updated_at->format('d-M-Y')); ?></td>
                        </tr>


                         </table>

        <table width="100%" border="0">

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2"><br />
                    ...............................................<br />
                    Generated and Stamped by<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name: <?php echo e($name); ?></strong></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table></td>
  </tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/bursary/remita_print.blade.php ENDPATH**/ ?>