<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<title><?php echo e($student->full_name); ?> Transcript</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
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
      
	 <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
	<?php $results = $reg->result(); ?>
	
	<?php $gpa = $reg->gpa(); ?>
	
	<?php $cgpa = $reg->cgpa(); ?>
  
        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>: <?php echo e($reg->session->name); ?></td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>: <?php echo e($reg->level); ?> </td>
                            <td colspan="2"><strong>SEMESTER</strong>: <?php echo e($reg->session->semesterName($reg->semester)); ?></td>
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
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
						 <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"><?php echo e($loop->iteration); ?> </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"><?php echo e($result->programCourse->course->code); ?> </span></div></td>
                            <td width="23%"><div align="center"><span style="font-weight: bold"><?php echo e($result->programCourse->course->title); ?> </span></div></td>
                            <td width="14%"><div align="center"><span style="font-weight: bold"><?php echo e($result->programCourse->hours); ?> </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result->total); ?></span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold"><?php echo e($result->grade); ?></span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold"><?php echo e($result->pass_status); ?></span></div></td>
                          </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                          
                        
                         </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td  colspan="7">&nbsp;</td>
                            </tr>
                            
                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
                            <td colspan="2" align="left"><strong> <?php echo e($gpa->hours); ?></strong></td>
                            <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
                            <td width="10%" align="left"><strong> <?php echo e($gpa->units); ?></strong></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
                            <td width="13%">&nbsp;</td>
                            <td><span style="font-weight: bold">GPA : <?php echo e($gpa->value); ?> </span></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TC</strong></td>
                           <td>&nbsp;</td>
                            <td><strong> <?php echo e($cgpa->hours); ?></strong></td>
                            <td>&nbsp;</td>
                          </tr>
                          
                           <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TGP</strong></td>
                            <td>&nbsp;</td>
                            <td><strong> <?php echo e($cgpa->units); ?></strong></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
                            <td>&nbsp;</td>
                            <td><span style="font-weight: bold">CGPA : <?php echo e($cgpa->value); ?></span></td>
                            <td>&nbsp; </td>
                          </tr>
                          
                          
                        </table>
                        <br />
<br />


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 
                        
      <table width="100%" border="0">
        <tr>
          <td width="46%"><strong>Total Credit Load : </strong> <?php echo e($totalCGPA->hours); ?></td>
          <td width="54%"><strong>Total Credit Unit Value: </strong> <?php echo e($totalCGPA->units); ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Final CGPA</strong>:  <?php echo e($totalCGPA->value); ?> </td>
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
<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/transcript.blade.php ENDPATH**/ ?>