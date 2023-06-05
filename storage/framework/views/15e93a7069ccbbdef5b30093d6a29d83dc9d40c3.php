<?php $__env->startSection('pagetitle'); ?>
    Edit Session
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Edit Admission Session
                    </h1>
                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo Form::model($sessions, ['method' => 'PATCH', 'route' => ['session.updateAdmission', $sessions->id]]); ?>


                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="name">Session Name :</label>
                                        <?php echo Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary'])); ?>

                            </div>

                            <?php echo Form::close(); ?>


                                    <div class="row">


                                        <div class="table-responsive card-body">

                                            <table class="table table-striped">
                                                <thead>

                                                    <th>S/N</th>
                                                    <th>Name</th>


                                                    <th>Status</th>

                                                    <th>Action</th>





                                                </thead>


                                                <tbody>

                                                    <?php $__currentLoopData = $admission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>

                                                            <td><?php echo e($session->name); ?></td>


                                                            <?php if($session->status == 1): ?>
                                                                <td>Admission is Open </td>
                                                            <?php else: ?>
                                                                <td>Admision is Close</td>
                                                            <?php endif; ?>

                                                            <?php if($session->status == 1): ?>
                                                            <td>
                                                                <?php echo Form::open([
                                                                        'method' => 'Patch',
                                                                        'route' => 'closeAdmissionType',
                                                                        'id' => 'setCurrentForm' . $session->id,
                                                                    ]); ?>

                                                                    <?php echo e(Form::hidden('id', $session->id)); ?>



                                                                    <button onclick="setCurrent(<?php echo e($session->id); ?>)"
                                                                        type="submit"
                                                                        class="<?php echo e($session->id); ?> btn btn-danger"> Deactive
                                                                    </button>
                                                                    <?php echo Form::close(); ?>

                                                                    </td>
                                                            <?php elseif($session->status == 0): ?>
                                                                <td>
                                                                    <?php echo Form::open([
                                                                        'method' => 'Patch',
                                                                        'route' => 'openAdmissionType',
                                                                        'id' => 'setCurrentForm' . $session->id,
                                                                    ]); ?>

                                                                    <?php echo e(Form::hidden('id', $session->id)); ?>



                                                                    <button onclick="setCurrent(<?php echo e($session->id); ?>)"
                                                                        type="submit"
                                                                        class="<?php echo e($session->id); ?> btn btn-primary"> Active
                                                                    </button>
                                                                    <?php echo Form::close(); ?>


                                                                </td>
                                                            <?php endif; ?>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>



                                            </table>


                                        </div>


                                    </div>





                            </div>



                        </div>
                    </div>
                </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

	<script>


		function setCurrent(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to set this as the current session?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("setCurrentForm"+id).submit();
						}
					},
					cancel: {
						label: 'No',
						className: 'btn-danger',
					}
				},
				callback: function (result) {}

			});
			// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
		}

	</script>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/sessions/editAdmission.blade.php ENDPATH**/ ?>