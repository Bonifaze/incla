<?php $__env->startSection('pagetitle'); ?>
Home
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->
<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>
<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">
    <section class="content p-5">

        <?php if(session('signUpMsg')): ?>
        <?php echo session('signUpMsg'); ?>

        <?php endif; ?>

        <div class="card p-5 shadow">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-success fw-bold text-capitalize" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Biodata</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sponsor Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2-tab-pane" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="false">Academic Record</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3-tab-pane" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="false">Uploaded Documents</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile4-tab" data-bs-toggle="tab" data-bs-target="#profile4-tab-pane" type="button" role="tab" aria-controls="profile4-tab-pane" aria-selected="false">Password</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="/editbiodata" enctype="multipart/form-data" class="p-3">
                        <?php echo csrf_field(); ?>
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2">
                                        Passport Photo
                                    </div>
                                    <div class="rounded-circle">
                                        <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails ->passport); ?>" alt="Applicant Passport" style="height: 180px; width:200px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <?php if(session('statusMsg')): ?>
                            <?php echo session('statusMsg'); ?>

                            <?php endif; ?>
                            <label for="passport"><?php echo e(__('Upload Passport Photograph')); ?> </label>

                            <div class="form-group">
                                <input id="passport" type="file" class="form-control" name="passport">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Surname')); ?> </label>
                            <input id="surname" type="text" class="form-control" value="<?php echo e($applicantsDetails -> surname); ?>" name="surname" placeholder="<?php echo e($applicantsDetails -> surname); ?>" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('First Name')); ?> </label>
                            <input id="first_name" type="text" class="form-control" value="<?php echo e($applicantsDetails -> first_name); ?>" name="first_name" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Other Name')); ?> </label>
                            <input id="middle_name" type="text" class="form-control" value="<?php echo e($applicantsDetails -> middle_name); ?>" name="middle_name"  autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Email')); ?> </label>
                            <input id="email" type="email" class="form-control" value="<?php echo e($applicantsDetails -> email); ?>" name="email" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Phone')); ?> </label>
                            <input id="phone" type="phone" class="form-control" value="<?php echo e($applicantsDetails -> phone); ?>" name="phone" autocomplete="phone" autofocus>
                        </div>



                        <div class="form-group">
                            <label for=""><?php echo e(__('Gender:')); ?> </label>
                            <select class="form-select text-lg col-12" name="gender">
                                <option value="<?php echo e($applicantsDetails -> gender); ?>"><?php echo e($applicantsDetails -> gender); ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="dob"><?php echo e(__('Date of Birth')); ?>:<?php echo e($applicantsDetails -> dob); ?></label>
                            <input id="dob" type="date" class="form-control" value="<?php echo e($applicantsDetails -> dob); ?>" name="dob" required>
                        </div>



                        <div class="form-group">
                            <label for=""><?php echo e(__('State of Origin')); ?> </label>
                            <input id="state_origin" type="text" class="form-control" name="state_origin" value="<?php echo e($applicantsDetails -> state_origin); ?> ">
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Local Area Governemt')); ?> </label>
                            <input id="lga" type="text" class="form-control" name="lga" required value=" <?php echo e($applicantsDetails -> lga); ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Address')); ?> </label>
                            <input id="address" type="text" class="form-control" name="address" value="<?php echo e($applicantsDetails -> address); ?>">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-5">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>

                    </form>
                </div>

                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                    
                    <form method="POST" action="/editsponsers" class="p-3">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for=""><?php echo e(__(' Name')); ?> </label>
                            <input id="fname" type="text" name="sponsor_surname" class="form-control" value="<?php echo e($applicantsDetails->sponsor_surname); ?> " autofocus>
                        </div>
                          <div class="form-group">
                            <label for=""><?php echo e(__(' Name')); ?> </label>
                            <input id="fname" type="text" name="sponsor_othername" class="form-control" value="<?php echo e($applicantsDetails->sponsor_othername); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Phone No.')); ?> </label>
                            <input id="phone" type="text" name="sponsors_phone" class="form-control" value="<?php echo e($applicantsDetails -> sponsors_phone); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Sponsor email')); ?> </label>
                            <input id="foccupation" type="text" name="sponsors_email" class="form-control" value="<?php echo e($applicantsDetails -> sponsors_email); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Address')); ?> </label>
                            <input id="address" type="text" class="form-control" name="sponsors_address" value="<?php echo e($applicantsDetails -> sponsors_address); ?>">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="profile4-tab-pane" role="tabpanel" aria-labelledby="profile4-tab">

                    <form method="POST" action="/editpassword" class="p-3">
                        <?php echo csrf_field(); ?>
                        <input id="email" type="hidden" class="form-input form-control" name="email" value="<?php echo e($applicantsDetails -> email); ?>">
                        <div class="form-group">
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required placeholder="New Password" autocomplete="new-password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">

                    <form method="POST" action="/editutmejamb" class="p-3">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="refferal"><?php echo e(__('Admission Type')); ?> </label>
                            <input id="score" type="text" name="admission_typ" class="form-control" value="<?php echo e($applicantsDetails->admission_type); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal"><?php echo e(__('Course of Study')); ?> </label>
                            <select class="form-select" name="course_program">
                                <option value="<?php echo e($applicantsDetails->course_program); ?>}"><?php echo e($applicantsDetails->course_program); ?></option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="refferal"><?php echo e(__('School Attended')); ?> </label>
                            <input id="school_attended" type="text" name="school_attended" class="form-control" value="<?php echo e($applicantsDetails->school_attended); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal"><?php echo e(__('Certificates Obtained')); ?> </label>
                            <input id="certificates_obtained" type="text" name="certificates_obtained" class="form-control" value="<?php echo e($applicantsDetails->certificates_obtained); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal"><?php echo e(__('Previous Reaearch Topic')); ?> </label>
                            <input id="pr_topic" type="text" name="pr_topic" class="form-control" value="<?php echo e($applicantsDetails->pr_topic); ?>" autofocus>
                        </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">

                    <form method="POST" action="/editutmeuploads" enctype="multipart/form-data" class="p-3">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel1); ?>" alt="Transcipt" style="height: 300px; width:300px;" /></div>
                            <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->cert); ?>" alt="Olevel" style="height: 300px; width:300px;" /></div>
                            
                        </div>
                        <div class="form-group">

                                <?php if(session('statusMsg')): ?>
                                <?php echo session('statusMsg'); ?>

                                <?php endif; ?>
                                <label for="passport"><?php echo e(__('certificate :')); ?>

                                    
                                </label>

                                <div class="form-group">
                                    <input id="jamb" type="file" class="form-control" name="cert">
                                </div>
                            </div>




                            <div class="form-group">
                                <label><?php echo e(__('Upload Olevel Result:')); ?></label>

                                <div class="form-group">
                                    <input id="olevel1" type="file" class="form-control" name="olevel1">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    
                                    <button type="submit" class="btn btn-success">
                                        <?php echo e(__('Update')); ?>

                                    </button>
                                </div>
                            </div>


         </form>
                </div>
            </div>
        </div>

    </section>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<!-- External JavaScripts
            ============================================= -->
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>


<script>
    $(document).ready(function() {
        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#passport").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-user\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });

    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#jamb").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#olevel1").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#olevel2").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions//editprofile.blade.php ENDPATH**/ ?>