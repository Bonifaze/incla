						<table class="table table-striped">
						  <thead>

						  </thead>

						  
						  <tbody>
                          <tr>
                              <td colspan="4"> </td>
                              <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <td> </td>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="4">Faculty: <?php echo e($program->department->college->name); ?></td>
                              <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <td> </td>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <td colspan="4">Session: <?php echo e($session->currentSessionName()); ?></td>
                          </tr>

                          <tr>
                              <td colspan="4">Department: <?php echo e($program->department->name); ?></td>
                              <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <td> </td>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <td colspan="4">Semester: <?php echo e($session->semesterName($session->currentSemester())); ?></td>
                          </tr>


                          <tr>
                              <td colspan="4">Program: <?php echo e($program->name); ?> </td>
                              <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <td> </td>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <td colspan="4">Level: <?php echo e($level); ?></td>
                          </tr>

                          <tr>
                              <td colspan="4"> </td>
                              <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <td> </td>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <td colspan="4"> </td>
                          </tr>


                          <tr>
                          <td>S/N</td>
                          <td>Name</td>
                          <td>Mat No</td>
                          <td>Gender</td>
                          <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <td><?php echo e($program_course->course->code); ?> <br /> <?php echo e($program_course->hours); ?></td>


                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <td>TC</td>
                              <td>GP</td>
                              <td>GPA</td>
                              <td>TC (BF)</td>
                              <td>TGP (BF)</td>
                              <td>TC (Total)</td>
                              <td>TGP (Total)</td>
                              <td>CGPA</td>
                              <td>Remarks</td>
                          </tr>
                          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  //$gpa = $student->unApprovedGPA();
                              $cgpa = $student->excelCGPA();
                              ?>
                              <tr>
                                  <td><?php echo e($loop->iteration); ?></td>
                                  <td><?php echo e($student->fullName); ?></td>
                                  <td><?php echo e($student->academic->mat_no); ?></td>
                                  <td><?php echo e($student->gender); ?></td>
                                  <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                      <td><?php echo $student->programCourseResult($program_course->id); ?></td>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <td><?php echo e($cgpa->currenthours); ?></td>
                                  <td><?php echo e($cgpa->currentunits); ?></td>
                                  <td><?php echo e($cgpa->currentgpa); ?></td>
                                  <td><?php echo e($cgpa->bfhours); ?></td>
                                  <td><?php echo e($cgpa->bfunits); ?></td>
                                  <td><?php echo e($cgpa->hours); ?></td>
                                  <td><?php echo e($cgpa->units); ?></td>
                                  <td><?php echo e($cgpa->value); ?></td>
                                  <td> <?php echo e($student->semesterResultRemark()); ?> </td>

                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </tbody>
						  
						  
						  
						</table>

						
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/departments/program_level_results_export.blade.php ENDPATH**/ ?>