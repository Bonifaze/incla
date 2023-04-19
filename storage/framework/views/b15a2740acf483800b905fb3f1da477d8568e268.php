<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title><?php echo e($student->full_name); ?> Results</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
<br>
  <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: <?php echo e($student->full_name); ?> </strong></td>
          <td><strong>  Matric. No.: <?php echo e($academic->mat_no); ?> </strong></td>
        </tr>
        <tr>
          <td><strong>College: <?php echo e($academic->college()->name); ?> </strong></td>
          <td><strong>Gender: <?php echo e($student->gender); ?> </strong></td>
        </tr>
        <tr>
          <td><strong>Programme: <?php echo e($academic->program->name); ?> </strong></td>
          <td><strong>Dept: <?php echo e($academic->program->department->name); ?> </strong></td>
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
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top">

	 <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	

        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>:
                             <?php echo e($session->name); ?>

                             </td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>:
                             <?php echo e($session->registered_courses1->first()?->level); ?>

                             </td>
                            <td colspan="2"><strong>SEMESTER</strong>:
                             
                             FIRST
                             </td>
                          </tr>
                          <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                            <td width="23%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                            <td width="14%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">Score</span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold">Grade</span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">Pass / Fail</span></div></td>
                          </tr>
                          <?php
                            $tc1 = 0;
                            $tc2 = 0;
                            $tgp1 = 0;
                            $tgp2 = 0;
                          ?>
                            <?php $__currentLoopData = $session->registered_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                              $tc1 += $result->course_unit;
                              $tgp1 += $result->grade_point * $result->course_unit;
                            ?>

						<tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"><?php echo e($loop->iteration); ?> </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"><?php echo e($result->course_code); ?> </span></div></td>
                             <td width="23%"><div align="center"><span style="font-weight: bold"><?php echo e($result->course_title); ?> </span></div></td>
                           <td width="14%"><div align="center"><span style="font-weight: bold"><?php echo e($result->course_unit); ?> </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result->total); ?></span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold"><?php echo e($result->grade); ?></span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result->grade_status); ?></span></div></td>
                          </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         </table>

                        <br />
<br />

<table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><strong>ACADEMIC SESSION</strong>:
     <?php echo e($session->name); ?>

     </td>
    <td colspan="2" align="center"><strong>LEVEL</strong>:
     <?php echo e($session->registered_courses2->first()?->level); ?>

     </td>
    <td colspan="2"><strong>SEMESTER</strong>:
     
     SECOND
     </td>
  </tr>
  <tr>
    <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
    <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
    <td width="23%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
    <td width="14%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold">Score</span></div></td>
    <td width="17%"><div align="center"><span style="font-weight: bold">Grade</span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold">Pass / Fail</span></div></td>
  </tr>
    <?php $__currentLoopData = $session->registered_courses2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $tc2 += $result2->course_unit;
      $tgp2 += $result2->grade_point * $result2->course_unit;
    ?>
<tr>
    <td width="5%"><div align="center"><span style="font-weight: bold"><?php echo e($loop->iteration); ?> </span></div></td>
    <td width="15%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->course_code); ?> </span></div></td>
     <td width="23%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->course_title); ?> </span></div></td>
   <td width="14%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->course_unit); ?> </span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->total); ?></span></div></td>
    <td width="17%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->grade); ?></span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result2->grade_status); ?></span></div></td>
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 </table>

<br />
<br />


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </td>
  </tr>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/admin/result_history.blade.php ENDPATH**/ ?>