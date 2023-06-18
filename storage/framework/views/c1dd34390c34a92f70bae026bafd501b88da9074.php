<aside class="main-sidebar sidebar-dark-primary elevation-4 nav-flat" style="background-color: #218c74; color: #fff">
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="#">
            <img src="<?php echo e(asset('img/veritasin.jpg')); ?>" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/png;base64,<?php echo e(Auth::guard('staff')->user()->passport); ?>"
                    class="img-circle elevation-2" alt="User Image" style="width: 50px;">
            </div>

            <div class="info text-wrap">
                <a href="<?php echo e(route('staff.profile')); ?>" class="d-block"><?php echo e(Auth::guard('staff')->user()->full_name); ?></a>
            </div>
        </div>
        

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(route('staff.home')); ?>" class="nav-link <?php echo $__env->yieldContent('staff-home'); ?>">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?php echo $__env->yieldContent('staff-opens'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('staffs'); ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.profile')); ?>" class="nav-link <?php echo $__env->yieldContent('staff-profile'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.roles')); ?>" class="nav-link <?php echo $__env->yieldContent('list-staff'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>My Roles</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.password')); ?>" class="nav-link <?php echo $__env->yieldContent('staff-password'); ?>">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview <?php echo $__env->yieldContent('results-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Academia
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item ml-4">
                            <a href="/admin/upload" class="nav-link <?php echo $__env->yieldContent('staff-courses'); ?>">
                                <i class="fas fa-book-open nav-icon"></i>
                                <p>My Courses</p>
                            </a>
                        </li>
                        


                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gstallocate', 'App\ProgramCourse')): ?>
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?> ml-1">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Courses
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?php echo e(route('course.create')); ?>" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Create Course</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="<?php echo e(route('program_course.create')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Assign Program Course </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('program_course.assign')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Assign Course to Staff </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('program_course.list')); ?>" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Allocted Courses </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('course.search')); ?>" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-search nav-icon"></i>
                                        <p>Search Course</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('program_course.search')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-search nav-icon"></i>
                                        <p>List Program Course</p>
                                    </a>
                                </li>



                            </ul>

                        </li>
                         <?php else: ?>
                          <li></li>
                          <?php endif; ?>
                    </ul>

                    <ul class="nav nav-treeview">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('programs', 'App\College')): ?>
                        <li class="nav-item ">
                            <a href="<?php echo e(route('academia.college.programs')); ?>" class="nav-link <?php echo $__env->yieldContent('faculties'); ?>">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Faculties</p>
                            </a>
                        </li>
                             <?php else: ?>
                          <li></li>
        <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('programs', 'App\AcademicDepartment')): ?>
                        <li class="nav-item ">
                            <a href="<?php echo e(route('academia.department.programs')); ?>"
                                class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                         <?php else: ?>
                          <li></li>
        <?php endif; ?>
 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('examOfficer', 'App\StudentResult')): ?>
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?>">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Exam Officers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ml-4">
                                    <a href="<?php echo e(route('result.program_search_student')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-search-dollar nav-icon"></i>
                                        <p>Result & Remark </p>
                                    </a>
                                </li>
                                <li class="nav-item ml-4">
                                    <a href="<?php echo e(route('exam_officer.program')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Result Download</p>
                                    </a>
                                </li>


                            </ul>
                             <?php else: ?>
            <div></div>
        <?php endif; ?>
                    </ul>

                </li>


                
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('searchapplicant', 'App\Session')): ?>
                <li class="nav-item has-treeview <?php echo $__env->yieldContent('results-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Admissions
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admissions.student.search')); ?>" class="nav-link <?php echo $__env->yieldContent('faculties'); ?>">
                                <i class="fa fa-search nav-icon"></i>
                                <p>Search</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="/adminallApplicants" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>All Applicant</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?> ">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Applicant Type
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('undergraduateapplicant', 'App\Session')): ?>
                                <li class="nav-item">
                                    <a href="/adminutme" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>UTME</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/adminde" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>DIRECT ENTRY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admintransfer" class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>TRANSFER</p>
                                    </a>
                                </li>
                                 <?php else: ?>
            <li></li>
        <?php endif; ?>
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('postgraduateapplicant', 'App\Session')): ?>
                                <li class="nav-item">
                                    <a href="/adminpg" class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Postgraduate</p>
                                    </a>
                                </li>
 <li></li>
        <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
 <?php else: ?>
            <div></div>
        <?php endif; ?>

        
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?>">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Establishment
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview ml-4">

                                <li class="nav-item">
                                    <a href="<?php echo e(route('academia.college.list')); ?>" class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>List
                                            Faculty</p>
                                    </a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('academia.department.list')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>"> <i class="fas fa-list-alt nav-icon"></i>
                                        <p>List
                                            Departments</p>
                                    </a></li>
                                <li class="nav-item"><a href="<?php echo e(route('academia.program.list')); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>"> <i class="fas fa-list-alt nav-icon"></i>
                                        <p>List
                                            Programs</p>
                                    </a></li>
                                
                                    </a>
                                </li>

                            </ul>
                        </li>
                        

                <li class="nav-item has-treeview <?php echo $__env->yieldContent('results-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Student
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="<?php echo e(route('student.search')); ?>" class="nav-link <?php echo $__env->yieldContent('faculties'); ?>">
                                <i class="fa fa-search nav-icon"></i>
                                <p>Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('student.create')); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?>">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    list level
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 100)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>100 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 200)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>200 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 300)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>300 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 400)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>400 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 500)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>500 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 600)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>600 Level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 700)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>PGD</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 800)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p> Masters </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_level', 900)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>PhD</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?>">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    list Session
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 16)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2022/2023 </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 15)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-remark'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2021/2022</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 14)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2022/2021</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 13)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2019/2020</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 12)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2018/2019</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('student.list_session', 11)); ?>"
                                        class="nav-link <?php echo $__env->yieldContent('exam-download'); ?>">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2017/2018</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo e(route('student.getGradStudent', 600)); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>UnderGraduate</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo e(route('student.getGradStudent', 700)); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>PostGraduate</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo e(route('student.getGradStudent', 1000)); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Gradutaed</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview <?php echo $__env->yieldContent('results-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Staff
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.create')); ?>" class="nav-link <?php echo $__env->yieldContent('faculties'); ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.search')); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fa fa-search nav-icon"></i>
                                <p>Search Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('staff.list')); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>List Staff</p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="<?php echo e(route('admin.department.list')); ?>" class="nav-link <?php echo $__env->yieldContent('departments'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>List Staff Dept/Unit</p>
                            </a>
                        </li>
                    </ul>
                </li>


                
 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('search', 'App\Bursary')): ?>
                <li class="nav-item has-treeview <?php echo $__env->yieldContent('bursary-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('bursary'); ?>">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Bursary
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        

                        <li class="nav-item">
                            
                        </li>
                        
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('remita.search-rrr')); ?>" class="nav-link <?php echo $__env->yieldContent('remita-search'); ?>">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Remita Search</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('exam-officers-open'); ?>">
                            
                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="/utmePayment" class="nav-link <?php echo $__env->yieldContent('bursary-search'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Undergraute</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/pgPayment" class="nav-link <?php echo $__env->yieldContent('bursary-search'); ?>">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Postgraduate</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        
                        <li class="nav-item">
                            <a href="/addRemitaServiceType" class="nav-link <?php echo $__env->yieldContent('remita-list1'); ?>">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Service Type</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="/viewRemitaServiceType" class="nav-link <?php echo $__env->yieldContent('remita-list2'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Service Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/bursary/remita/fee-types" class="nav-link <?php echo $__env->yieldContent('remita-list3'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Show Remita Fee Type</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php echo $__env->yieldContent('bursary-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('bursary'); ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Session
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                     <li class="nav-item" ><a href="<?php echo e(route('session.createBursary')); ?>" class="nav-link <?php echo $__env->yieldContent('remita-list3'); ?>"> <i class="fa fa-plus nav-icon"></i>Create Sessions</a></li>
                    <li class="nav-item" ><a href="<?php echo e(route('session.listBursary')); ?>" class="nav-link <?php echo $__env->yieldContent('remita-list3'); ?>"> <i class="fa fa-eye nav-icon"></i>List Sessions</a></li>
                    </ul>
                        

                    </ul>
                </li>
   <?php else: ?>
            <div></div>
        <?php endif; ?>




                

                <li class="nav-item">
                    <a href="<?php echo e(route('staff.logout')); ?>" class="nav-link"Contact
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off nav-icon text-danger"></i>
                        <?php echo e(__('Logout')); ?>

                        <form id="logout-form" action="<?php echo e(route('staff.logout')); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/partialsv3/sidebar.blade.php ENDPATH**/ ?>