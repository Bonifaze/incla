

<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title><?php echo e($student->full_name); ?> Transcript</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body >
<table width="650" border="0" cellspacing="0" cellpadding="0" style="margin:auto">
  <tr>
    <td height="650" valign="top"><table width="100%" height="174" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="138" valign="top"><h1>&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
        </tr>
      <tr>
        <td align="center" valign="top"><h1><strong>Academic  Transcript </strong></h1></td>
      </tr>
    </table>
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

	 <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	

        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>:
                             <?php echo e($session->name); ?>

                             </td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>:
                             <?php echo e($session->registered_courses1->last()?->level); ?>

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
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td  colspan="7">&nbsp;</td>
                            </tr>
                            <?php 
                              $courses = $registered_courses->where('session','<=', $session->id);
                              //dd($courses);
                              $tgp_cgpa = 0;
                              $tcu_cgpa = 0;
                              foreach ($courses as $course) {
                                if (($course->session == $session->id && $course->semester != 2) || $course->session < $session->id)
                                {
                                  $tgp_cgpa += $course->grade_point * $course->course_unit;
                                  $tcu_cgpa += $course->course_unit;
                                }
                              }
                              //dd($tgp_cgpa, $tcu_cgpa);
                            ?>
                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
                            <td colspan="2" align="left"><strong> <?php echo e($tc1); ?></strong></td>
                            <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
                            <td width="10%" align="left"><strong> <?php echo e($tgp1); ?></strong></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
                            <td width="13%">&nbsp;</td>
                            <td><span style="font-weight: bold">GPA : <?php echo e($tgp1 > 0 && $tc1 > 0 ? number_format($tgp1/$tc1,2) : '0.00'); ?> </span></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TC</strong></td>
                           <td>&nbsp;</td>
                            <td><strong> <?php echo e($tcu_cgpa); ?></strong></td>
                            <td>&nbsp;</td>
                          </tr>

                           <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TGP</strong></td>
                            <td>&nbsp;</td>
                            <td><strong> <?php echo e($tgp_cgpa); ?></strong></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
                            <td>&nbsp;</td>
                            <td><span style="font-weight: bold">CGPA : <?php echo e($tgp_cgpa > 0 && $tcu_cgpa > 0 ? number_format($tgp_cgpa/$tcu_cgpa, 2) : '0.00'); ?></span></td>
                            <td>&nbsp; </td>
                          </tr>


                        </table>
                        <br />
<br />

<table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><strong>ACADEMIC SESSION</strong>:
     <?php echo e($session->name); ?>

     </td>
    <td colspan="2" align="center"><strong>LEVEL</strong>:
     <?php echo e($session->registered_courses2->last()?->level); ?>

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

 <?php
      $tgp_cgpa2 = 0;
      $tcu_cgpa2 = 0;
      foreach ($courses as $course) {
          $tgp_cgpa2 += $course->grade_point * $course->course_unit;
          $tcu_cgpa2 += $course->course_unit;
      }
      //dd($tgp_cgpa, $tcu_cgpa);
    ?>

 </table>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="7">&nbsp;</td>
    </tr>

  <tr>
    <td width="2%">&nbsp;</td>
    <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
    <td colspan="2" align="left"><strong> <?php echo e($tc2); ?></strong></td>
    <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
    <td width="10%" align="left"><strong> <?php echo e($tgp2); ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
    <td width="13%">&nbsp;</td>
    <td><span style="font-weight: bold">GPA : <?php echo e($tgp2 > 0 && $tc2 > 0 ? number_format($tgp2/$tc2, 2) : '0.00'); ?> </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>TC</strong></td>
   <td>&nbsp;</td>
    <td><strong> <?php echo e($tcu_cgpa2); ?></strong></td>
    <td>&nbsp;</td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>TGP</strong></td>
    <td>&nbsp;</td>
    <td><strong> <?php echo e($tgp_cgpa2); ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
    <td>&nbsp;</td>
    
    <td><span style="font-weight: bold">CGPA : <?php echo e($tgp_cgpa > 0 && $tcu_cgpa > 0 ? number_format($tgp_cgpa2/$tcu_cgpa2, 2) : '0.00'); ?></span></td>
    <td>&nbsp; </td>
  </tr>


</table>
<br />
<br />


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <table width="100%" border="0">
        <tr>
          
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
         <tr>
          <td colspan="2"><br />
            ...............................................<br />
            Dr. (Mrs) Stella Chizoba Okonkwo, FCAI, FIIA, JP<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Registrar </strong></td>
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/students/admin/transcript.blade.php ENDPATH**/ ?>