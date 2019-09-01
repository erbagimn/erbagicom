<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Google Login Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="GOOGLE_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Client ID')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="GOOGLE_CLIENT_ID" value="<?php echo e(env('GOOGLE_CLIENT_ID')); ?>" placeholder="Google Client ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="GOOGLE_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Client Secret')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET" value="<?php echo e(env('GOOGLE_CLIENT_SECRET')); ?>" placeholder="Google Client Secret" required>
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
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Facebook Login Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('App ID')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="FACEBOOK_CLIENT_ID" value="<?php echo e(env('FACEBOOK_CLIENT_ID')); ?>" placeholder="Facebook Client ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('App Secret')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="FACEBOOK_CLIENT_SECRET" value="<?php echo e(env('FACEBOOK_CLIENT_SECRET')); ?>" placeholder="Facebook Client Secret" required>
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

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Twitter Login Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="TWITTER_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Client ID')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="TWITTER_CLIENT_ID" value="<?php echo e(env('TWITTER_CLIENT_ID')); ?>" placeholder="Twitter Client ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="TWITTER_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Client Secret')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="TWITTER_CLIENT_SECRET" value="<?php echo e(env('TWITTER_CLIENT_SECRET')); ?>" placeholder="Twitter Client Secret" required>
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