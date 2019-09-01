<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('SMTP Settings')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL DRIVER')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_DRIVER" value="<?php echo e(env('MAIL_DRIVER')); ?>" placeholder="MAIL DRIVER" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_HOST">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL HOST')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_HOST" value="<?php echo e(env('MAIL_HOST')); ?>" placeholder="MAIL HOST" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_PORT">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL PORT')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_PORT" value="<?php echo e(env('MAIL_PORT')); ?>" placeholder="MAIL PORT" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_USERNAME">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL USERNAME')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_USERNAME" value="<?php echo e(env('MAIL_USERNAME')); ?>" placeholder="MAIL USERNAME" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL PASSWORD')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_PASSWORD" value="<?php echo e(env('MAIL_PASSWORD')); ?>" placeholder="MAIL PASSWORD" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL ENCRYPTION')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>" placeholder="MAIL ENCRYPTION" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL FROM ADDRESS')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>" placeholder="MAIL FROM ADDRESS" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('MAIL FROM NAME')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="MAIL_FROM_NAME" value="<?php echo e(env('MAIL_FROM_NAME')); ?>" placeholder="MAIL FROM NAME" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>