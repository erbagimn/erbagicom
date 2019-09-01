<?php $__env->startSection('content'); ?>


<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><?php echo e(__('Language Info')); ?></h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="<?php echo e(route('languages.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="control-label"><?php echo e(__('Name')); ?></label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="control-label"><?php echo e(__('Code')); ?></label>
                    </div>
                    <div class="col-lg-6">
                        <select class="country-flag-select" name="code">
                            <?php $__currentLoopData = \File::files(base_path('public/frontend/images/icons/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(pathinfo($path)['filename']); ?>" data-flag="<?php echo e(asset('frontend/images/icons/flags/'.pathinfo($path)['filename'].'.png')); ?>"> <?php echo e(strtoupper(pathinfo($path)['filename'])); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>