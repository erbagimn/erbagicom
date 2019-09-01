<?php $__env->startSection('content'); ?>

    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('Logo Settings')); ?></h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" action="<?php echo e(route('generalsettings.logo.store')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="logo"><?php echo e(__('Frontend logo')); ?> <small>(max height 40px)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="logo" name="logo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="admin_logo"><?php echo e(__('Admin logo')); ?> <small>(60x60)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="admin_logo" name="admin_logo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="favicon"><?php echo e(__('Favicon')); ?> <small>(32x32)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="favicon" name="favicon" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="admin_login_background"><?php echo e(__('Admin login background image')); ?> <small>(1920x1080)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="admin_login_background" name="admin_login_background" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="admin_login_sidebar"><?php echo e(__('Admin login sidebar image')); ?> <small>(600x500)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="admin_login_sidebar" name="admin_login_sidebar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>