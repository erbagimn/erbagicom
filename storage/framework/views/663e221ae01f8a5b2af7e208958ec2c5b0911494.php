<?php $__env->startSection('content'); ?>

    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('General Settings')); ?></h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" action="<?php echo e(route('generalsettings.update',$generalsetting->id )); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PATCH">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name"><?php echo e(__('Site Name')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="name" name="name" value="<?php echo e($generalsetting->site_name); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="address"><?php echo e(__('Address')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="address" name="address" value="<?php echo e($generalsetting->address); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name"><?php echo e(__('Footer Text')); ?></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="4" name="description" required><?php echo e($generalsetting->description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="phone"><?php echo e(__('Phone')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="phone" name="phone" value="<?php echo e($generalsetting->phone); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="email"><?php echo e(__('Email')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="email" name="email" value="<?php echo e($generalsetting->email); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="facebook"><?php echo e(__('Facebook')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="facebook" name="facebook" value="<?php echo e($generalsetting->facebook); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="instagram"><?php echo e(__('Instagram')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="instagram" name="instagram" value="<?php echo e($generalsetting->instagram); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="twitter"><?php echo e(__('Twitter')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="twitter" name="twitter" value="<?php echo e($generalsetting->twitter); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="youtube"><?php echo e(__('Youtube')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="youtube" name="youtube" value="<?php echo e($generalsetting->youtube); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="google_plus"><?php echo e(__('Google Plus')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="google_plus" name="google_plus" value="<?php echo e($generalsetting->google_plus); ?>" class="form-control">
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