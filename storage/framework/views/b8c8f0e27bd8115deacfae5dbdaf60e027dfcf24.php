<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<title><?php echo e($student->full_name); ?> Results</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top">

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

                        <br />
<br />


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 
                        
      </td>
  </tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/admin/result_history.blade.php ENDPATH**/ ?>