

<nav class="main-header navbar navbar-expand bg-white navbar-dark mb-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #218c74;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        

        
        

        

        

        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ICTOfficers', 'App\StudentResult')): ?>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="nav-link dropdown-toggle">Security</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                    <!-- Level two dropdown-->

                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">Staff/Students</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="<?php echo e(route('rbac.create-role')); ?>" class="dropdown-item">Create Role </a></li>
                            <li><a href="<?php echo e(route('rbac.create-perm')); ?>" class="dropdown-item">Create Permissions</a></li>
                            <li><a href="<?php echo e(route('rbac.list-roles')); ?>" class="dropdown-item">List Roles</a></li>
                            <li><a href="<?php echo e(route('rbac.list-perms')); ?>" class="dropdown-item">List Permissions</a></li>
                        </ul>
                    </li>
                    <!-- End Level two -->
                    <!-- Level two dropdown-->
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">Applicants</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            
                            <li><a href="/adminTaskToRole" class="dropdown-item">Add Task to Role</a></li>
                            <li><a href="/roleToAdmin" class="dropdown-item">Assign Role to Admin</a></li>
                            <li><a href="/adminRemoveTaskFromRole" class="dropdown-item">Remove Task</a></li>
                            <li><a href="/removeRoleFromAdmin" class="dropdown-item">Remove Role</a></li>


                        </ul>
                    </li>

                    
                    <li><a href="<?php echo e(route('rbac.audit')); ?>" class="dropdown-item">Audit </a></li>
                    <li><a href="<?php echo e(route('staff.securitylist')); ?>" class="dropdown-item">List Staff Roles </a></li>
                      <li><a href="<?php echo e(route('session.create')); ?>" class="dropdown-item">Create Academic Sessions</a></li>
                    <li><a href="<?php echo e(route('session.list')); ?>" class="dropdown-item">List Academic Sessions</a></li>
                     <li><a href="<?php echo e(route('session.createAdmission')); ?>" class="dropdown-item">Create Admission Sessions</a></li>
                    <li><a href="<?php echo e(route('session.listAdmission')); ?>" class="dropdown-item">List Admission Sessions</a></li>
                     
                    <!-- End Level two -->
                </ul>
            </li>
        <?php else: ?>
            <div></div>
        <?php endif; ?>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1"style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">HR</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?php echo e(route('admin.department.create')); ?>" class="dropdown-item">New Admin Dept </a></li>
                <li><a href="<?php echo e(route('admin.department.list')); ?>" class="dropdown-item">List Admin Depts</a></li>
                
                
                
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">Results</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                
                

                
                
                
                
                <li><a href="<?php echo e(route('program_course.sbc_level', 100)); ?>" class="dropdown-item">100L SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 200)); ?>" class="dropdown-item">200L SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 300)); ?>" class="dropdown-item">300L SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 400)); ?>" class="dropdown-item">400L SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 500)); ?>" class="dropdown-item">500L SBC Approval</a>
                </li>
                
                <li><a href="<?php echo e(route('program_course.sbc_level', 700)); ?>" class="dropdown-item">PGD SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 800)); ?>" class="dropdown-item">MSc SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.sbc_level', 900)); ?>" class="dropdown-item">PhD SBC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 100)); ?>" class="dropdown-item">100L VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 200)); ?>" class="dropdown-item">200L VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 300)); ?>" class="dropdown-item">300L VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 400)); ?>" class="dropdown-item">400L VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 500)); ?>" class="dropdown-item">500L VC Approval</a>
                </li>
                
                <li><a href="<?php echo e(route('program_course.vc_level', 700)); ?>" class="dropdown-item">PGD VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 800)); ?>" class="dropdown-item">MSc VC Approval</a>
                </li>
                <li><a href="<?php echo e(route('program_course.vc_level', 900)); ?>" class="dropdown-item">PhD VC Approval</a>
                </li>
                <li class="dropdown-submenu dropdown-hover">
                    
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        <li><a href="<?php echo e(route('admin.approve_scores')); ?>" class="dropdown-item">Courses Result
                            </a></li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 100)); ?>" class="dropdown-item">100L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 200)); ?>" class="dropdown-item">200L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 300)); ?>" class="dropdown-item">300L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 400)); ?>" class="dropdown-item">400L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 500)); ?>" class="dropdown-item">500L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 600)); ?>" class="dropdown-item">600L
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 700)); ?>" class="dropdown-item">PGD
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 800)); ?>" class="dropdown-item">MSc
                                Result</a>
                        </li>
                        <li><a href="<?php echo e(route('program_course.ict_level', 900)); ?>" class="dropdown-item">PhD
                                Result</a>
                        </li>

                        <li><a href="<?php echo e(route('admin.notuploaded_scores')); ?>"
                                class="dropdown-item text-warning">Courses Result<br>not Upload
                            </a></li>
                    </ul>
                </li>



            </ul>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ICTOfficers', 'App\StudentResult')): ?>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ICT</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?php echo e(route('result.search_student')); ?>" class="dropdown-item">Manage Student</a></li>
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Results</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="<?php echo e(route('program_course.ict_level', 100)); ?>" class="dropdown-item">100L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 200)); ?>" class="dropdown-item">200L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 300)); ?>" class="dropdown-item">300L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 400)); ?>" class="dropdown-item">400L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 500)); ?>" class="dropdown-item">500L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 600)); ?>" class="dropdown-item">600L
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 700)); ?>" class="dropdown-item">PGD
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 800)); ?>" class="dropdown-item">MSc
                                    Result</a>
                            </li>
                            <li><a href="<?php echo e(route('program_course.ict_level', 900)); ?>" class="dropdown-item">PhD
                                    Result</a>
                            </li>
                              <li><a href="<?php echo e(route('program_course.ict_manage_oldresut')); ?>" class="dropdown-item">Download Result</a>
                            </li>
                        </ul>
                    </li>
                            <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Courses Results</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="<?php echo e(route('admin.approve_scores')); ?>" class="dropdown-item">Courses uploaded
                        </a></li>
                         <li><a href="<?php echo e(route('admin.notuploaded_scores')); ?>" class="dropdown-item text-warning">Courses
                        not Upload
                        </a></li>
                        </ul>
                    </li>




                    <hr>
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Create</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="<?php echo e(route('academia.college.create')); ?>" class="dropdown-item">Create Faculty
                                </a></li>
                            <li><a href="<?php echo e(route('academia.department.create')); ?>" class="dropdown-item">Create
                                    Department
                                </a></li>
                            <li><a href="<?php echo e(route('academia.program.create')); ?>" class="dropdown-item">Create Program
                                </a></li>
                                                <li><a href="<?php echo e(route('admin.department.create')); ?>" class="dropdown-item">New Admin Dept </a></li>

                        </ul>
                    </li>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">List</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                             <li><a href="<?php echo e(route('academia.college.list')); ?>" class="dropdown-item">List Faculty
                        </a></li>

                    <li><a href="<?php echo e(route('academia.department.list')); ?>" class="dropdown-item">List Department
                        </a></li>

                    <li><a href="<?php echo e(route('academia.program.list')); ?>" class="dropdown-item">List Program
                        </a></li>
                         <li><a href="<?php echo e(route('admin.department.list')); ?>" class="dropdown-item">List Admin Depts</a></li>
                        </ul>
                    </li>



                </ul>
            </li>
        <?php else: ?>
            <div></div>
        <?php endif; ?>
        


        



    </ul>
    

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->

</nav>
<?php /**PATH C:\Users\hp\Documents\WEB DEV\Work-VUNA\laraproject\resources\views/partialsv3/navbar.blade.php ENDPATH**/ ?>