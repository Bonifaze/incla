
<table class="table table-striped">
						  <thead>

						  </thead>


						  <tbody>
                            <tr>
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="8"> </td>


                                  <td colspan="8"> VERITAS UNIVERSITY ABUJA </td>



                              <td colspan="8"> </td>
                          </tr>

                            <tr>
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="12">Faculty:  <?php echo e($meta['program']->department->college->name); ?> (<?php echo e($meta['program']->department->college->code); ?>)</td>
                              

                                  <td> </td>


                              
                              <td colspan="12">Session: <?php echo e($meta['session']->name); ?> </td>
                          </tr>

                          <tr>
                              <td colspan="12">Department: <?php echo e($meta['program']->department->name); ?> </td>
                              

                                  <td> </td>


                              
                              <td colspan="12">Semester:
                                <?php if( $meta['semester']  == 1): ?>
                              First Semester
                             <?php else: ?>
                             Second Semester
                             <?php endif; ?>
                              </td>
                          </tr>


                          <tr>
                              <td colspan="12">Program:
                                <?php if( $meta['level'] <= 600): ?>
                                <?php echo e($meta['program']->degree); ?>

                                <?php else: ?>
                                  <?php echo e($meta['program']->masters); ?>

                                  <?php endif; ?>
                                 <?php echo e($meta['program']->name); ?>  </td>
                              

                                  <td> </td>


                              
                              <td colspan="12">Level: <?php echo e($meta['level']); ?></td>
                          </tr>

                          <tr>
                              <td colspan="4"> </td>
                              

                                  <td> </td>


                              
                              <td colspan="4"> </td>
                          </tr>



                <tr>
                    <th colspan="<?php echo e(8 + $program_courses->count()); ?>"></th>
                </tr>
                <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">MATRIC NUMBER</th>
                    <th rowspan="2">NAME</th>
                    <th rowspan="2">Gender</th>
                    <th colspan="<?php echo e($program_courses->count()); ?>">Courses, Credit, Scores, Grades, GP</th>
                    <th rowspan="2">TC</th>
                    <th rowspan="2">GP</th>
                    <th rowspan="2">GPA</th>
                    <th rowspan="2">TC (BF)</th>
                    <th rowspan="2">TGP(BF)</th>
                    <th rowspan="2">TC (Total)</th>
                    <th rowspan="2">TGP (Total)</th>
                    <th rowspan="2">CGPA</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr>
                    <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $course_ids[] = $program_course->course_id;
                        ?>
                        <th><?php echo e($program_course->course_code); ?><br> <?php echo e($program_course->credit_unit); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>

                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $tc = 0;
                        $tgp = 0;
                        $gpa = 0.00;
                        $tcbf = 0;
                        $tgpbf = 0;
                        $cgpa = 0.00;
                    ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($student->matric_number); ?></td>
                        <td><?php echo e($student->full_name); ?></td>
                        <td><?php echo e($student->gender[0]); ?></td>
                        <?php

                            foreach ($student->previous_registered_courses as $course) {
                                $tcbf += $course?->course_unit;
                                $tgpbf += $course?->course_unit * $course?->grade_point;
                            }
                        ?>
                        <?php for($x = 0; $x < $program_courses->count(); $x++): ?>
                        <td>
                            <?php
                                $student_course = $student->registered_courses->where('course_id', $course_ids[$x])->first();
                                $tc += $student_course?->course_unit;
                                $tgp += $student_course?->course_unit * $student_course?->grade_point;
                            ?>
                            <?php echo e($student_course?->total); ?> <br>
                            <?php echo e($student_course?->grade); ?> <br>
                           <?php echo e($program_courses->credit_unit); ?>

                            
                        </td>
                        <?php endfor; ?>
                        <td><?php echo e($tc); ?></td>
                        <td><?php echo e($tgp); ?></td>
                        <td><?php echo e($tc > 0 && $tgp > 0 ? number_format($tgp/$tc, 2) : '0.00'); ?></td>
                        <td><?php echo e($tcbf); ?></td>
                        <td><?php echo e($tgpbf); ?></td>
                        <td><?php echo e($tc + $tcbf); ?></td>
                        <td><?php echo e($tgp + $tgpbf); ?></td>
                        <td><?php echo e(($tc + $tcbf) >0 && ($tgp + $tgpbf) > 0 ? number_format(($tgp + $tgpbf)/($tc + $tcbf), 2): '0.00'); ?></td>
                        <td class="small">
                         

                                  <?php echo e($student->semesterResultRemark()); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/departments/program_level_results_export.blade.php ENDPATH**/ ?>