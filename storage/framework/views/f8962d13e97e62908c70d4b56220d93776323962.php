<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title><?php echo e($student->full_name); ?> <?php echo e($session->name); ?> Course Form</title>

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top"><table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">

      <tr>
        <td align="center" valign="top"><h1><strong> Course Form </strong></h1></td>
      </tr>
    </table>
      <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: <?php echo e($student->full_name); ?>  </strong></td>
          <td><strong>  Matric. No.: <?php echo e($academic->mat_no); ?>  </strong></td>
        </tr>
        <tr>
            <?php
                $col;
            ?>
          
          <td><strong>Gender: <?php echo e($student->gender); ?>  </strong></td>
        </tr>
        <tr>
          <td><strong>Programme:  <?php echo e($academic->program->name); ?>  </strong></td>
          <td><strong>Dept:    <?php echo e($academic->program->department->name); ?> </strong></td>
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
                            <td colspan="3" align="center"><strong>ACADEMIC SESSION: <?php echo e($session->name); ?></strong></td>
                            <td colspan="1" align="center"><strong> </strong></td>
                            <td colspan="1" align="center"><strong> </strong> </td>
                          </tr>
                          <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                            <td width="40%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold">Remark</span></div></td>
                          </tr>
                           <?php
                                $tatolCredits = 0;
                            ?>

                               <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php
                                      $tatolCredits += $result->course_unit;

                                   ?>
						 <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"><?php echo e($key+1); ?></span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"><?php echo e($result->course_code); ?> </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold"> <?php echo e($result->course_title); ?></span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold"><?php echo e($result->course_unit); ?> </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold">Total </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold"> <?php echo e($tatolCredits); ?> </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>


                         </table>
                         <br>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/results/course_form.blade.php ENDPATH**/ ?>