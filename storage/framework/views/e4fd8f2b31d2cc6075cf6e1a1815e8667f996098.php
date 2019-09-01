<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo e(route('coupon.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Coupon')); ?></a>
        </div>
    </div><br>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Coupon Information')); ?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('Code')); ?></th>
                        <th><?php echo e(__('Type')); ?></th>
                        <th><?php echo e(__('Start Date')); ?></th>
                        <th><?php echo e(__('End Date')); ?></th>
                        <th width="10%"><?php echo e(__('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($coupon->code); ?></td>
                            <td><?php if($coupon->type == 'cart_base'): ?>
                                    <?php echo e(__('Cart Base')); ?>

                                <?php elseif($coupon->type == 'product_base'): ?>
                                    <?php echo e(__('Product Base')); ?>

                            <?php endif; ?></td>
                            <td><?php echo e(date('d-m-Y', $coupon->start_date)); ?></td>
                            <td><?php echo e(date('d-m-Y', $coupon->start_date)); ?></td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('coupon.edit', encrypt($coupon->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('coupon.destroy', $coupon->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>