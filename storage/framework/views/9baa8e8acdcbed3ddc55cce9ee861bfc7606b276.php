<?php $__env->startSection('pagetitle'); ?> <?php echo e($program->name); ?> Programs <?php $__env->stopSection(); ?>
<!-- Treeview -->
<?php $__env->startSection('results-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?> active <?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo e($program->name); ?> </h3>

				</div>
            
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>Level</th>
                              <th>100L</th>
							 <th>200L</th>
							 <th>300L</th>
							 <th>400L</th>
                              <th>500L</th>
                              <th>PGD</th>
                              <th>MSc</th>
                              <th>PhD</th>


							  
							   
							
						  </thead>
						  
						  
						  <tbody>
                          <tr>
                              <td> Courses</td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),100])); ?>">  Show (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),200])); ?>">  Show (<?php echo e($program->levelCoursesCount(200)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),300])); ?>">  Show (<?php echo e($program->levelCoursesCount(300)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),400])); ?>">  Show (<?php echo e($program->levelCoursesCount(400)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),500])); ?>">  Show (<?php echo e($program->levelCoursesCount(500)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),700])); ?>">  Show (<?php echo e($program->levelCoursesCount(700)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),800])); ?>">  Show (<?php echo e($program->levelCoursesCount(800)); ?>)</a></td>
                              <td><a class="btn btn-outline-dark" href="<?php echo e(route('exam_officer.program_level_courses',[base64_encode($program->id),900])); ?>">  Show (<?php echo e($program->levelCoursesCount(900)); ?>)</a></td>
                          </tr>

                         <tr>
                             <td> Results</td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,100])); ?>">  Download (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,200])); ?>">  Download (<?php echo e($program->levelCoursesCount(200)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,300])); ?>">  Download (<?php echo e($program->levelCoursesCount(300)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,400])); ?>">  Download (<?php echo e($program->levelCoursesCount(400)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,500])); ?>">  Download (<?php echo e($program->levelCoursesCount(500)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,700])); ?>">  Download (<?php echo e($program->levelCoursesCount(700)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,800])); ?>">  Download (<?php echo e($program->levelCoursesCount(800)); ?>)</a></td>
                             <td><a class="btn btn-outline-dark" href="<?php echo e(route('academia.department.export_view',[$program->id,900])); ?>">  Download (<?php echo e($program->levelCoursesCount(900)); ?>)</a></td>
                         </tr>



							
						  </tbody>
						  
						  
						  
						</table>

						
            </div>
            
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/exam-officers/manage_program.blade.php ENDPATH**/ ?>