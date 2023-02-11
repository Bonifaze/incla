

<nav class="main-header navbar navbar-expand bg-white navbar-dark mb-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #218c74;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        

        
        

        

        

        
        

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">Security</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                <!-- Level two dropdown-->
                 <li><a href="<?php echo e(route('rbac.create-role')); ?>" class="dropdown-item">Create Role</a></li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Staff/Students</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        
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

                    
                <!-- End Level two -->
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1"style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">HR</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?php echo e(route('admin.department.create')); ?>" class="dropdown-item">New Admin Dept </a></li>
                <li><a href="<?php echo e(route('admin.department.list')); ?>" class="dropdown-item">List Admin Depts</a></li>
                 
                
             
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Results</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
               <li><a href="<?php echo e(route('admin.course_upload')); ?>" class="dropdown-item">Staff Score Upload </a></li>
                <li><a href="<?php echo e(route('admin.approve_scores')); ?>" class="dropdown-item">Approved Result
                        </a></li>

                         <li><a href="<?php echo e(route('admin.show_compute')); ?>" class="dropdown-item">Compute Result
                        </a></li>
                <li><a href="<?php echo e(route('result.search_student')); ?>" class="dropdown-item">ICT Upload Results </a></li>
                  
               


            </ul>
        </li>
        


        



    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->

</nav>
<?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/partialsv3/navbar.blade.php ENDPATH**/ ?>