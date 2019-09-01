<?php $__env->startSection('content'); ?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(ucfirst(str_replace('_', ' ',$policy->name))); ?></h3>
        </div>
        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('policies.store')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <div class="panel-body">
                <div class="form-group">
                    <input type="hidden" name="name" value="<?php echo e($policy->name); ?>">
                    <label class="col-sm-2 control-label" for="name"><?php echo e(__('Content')); ?></label>
                    <div class="col-sm-10">
                        <textarea class="editor" name="content" required><?php echo e($policy->content); ?></textarea>
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