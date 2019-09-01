<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Paypal Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <input type="hidden" name="payment_method" value="paypal">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Paypal Client Id')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYPAL_CLIENT_ID" value="<?php echo e(env('PAYPAL_CLIENT_ID')); ?>" placeholder="Paypal Client ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Paypal Client Secret')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET" value="<?php echo e(env('PAYPAL_CLIENT_SECRET')); ?>" placeholder="Paypal Client Secret" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Paypal Sandbox Mode')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <label class="switch">
                                <input value="1" name="paypal_sandbox" type="checkbox" <?php if(\App\BusinessSetting::where('type', 'paypal_sandbox')->first()->value == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
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
                <h3 class="panel-title text-center"><?php echo e(__('Sslcommerz Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="sslcommerz">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="SSLCZ_STORE_ID">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Sslcz Store Id')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="SSLCZ_STORE_ID" value="<?php echo e(env('SSLCZ_STORE_ID')); ?>" placeholder="<?php echo e(__('Sslcz Store Id')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="SSLCZ_STORE_PASSWD">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Sslcz store password')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="SSLCZ_STORE_PASSWD" value="<?php echo e(env('SSLCZ_STORE_PASSWD')); ?>" placeholder="<?php echo e(__('Sslcz store password')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Sslcommerz Sandbox Mode')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <label class="switch">
                                <input value="1" name="sslcommerz_sandbox" type="checkbox" <?php if(\App\BusinessSetting::where('type', 'sslcommerz_sandbox')->first()->value == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
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
                <h3 class="panel-title text-center"><?php echo e(__('Stripe Credential')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="stripe">
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="STRIPE_KEY">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Stripe Key')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="STRIPE_KEY" value="<?php echo e(env('STRIPE_KEY')); ?>" placeholder="STRIPE KEY" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="STRIPE_SECRET">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Stripe Secret')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="STRIPE_SECRET" value="<?php echo e(env('STRIPE_SECRET')); ?>" placeholder="STRIPE SECRET" required>
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