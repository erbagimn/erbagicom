<?php $__env->startSection('content'); ?>
<div class="text-center">
    <h1 class="error-code text-danger"><?php echo e(__('500')); ?></h1>
    <p class="h4 text-uppercase text-bold"><?php echo e(__('OOPS!')); ?></p>
    <div class="pad-btm">
        <?php echo e(__('Something went wrong. Looks like server failed to load your request.')); ?>

    </div>
    <hr class="new-section-sm bord-no">
    <div class="pad-top"><a class="btn btn-primary" href="<?php echo e(env('APP_URL')); ?>"><?php echo e(__('Return Home')); ?></a></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>