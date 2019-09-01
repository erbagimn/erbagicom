<?php $__env->startSection('content'); ?>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Orders')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Order Code')); ?></th>
                    <th><?php echo e(__('Num. of Products')); ?></th>
                    <th><?php echo e(__('Customer')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('Delivery Status')); ?></th>
                    <th><?php echo e(__('Payment Method')); ?></th>
                    <th><?php echo e(__('Payment Status')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $order = \App\Order::find($order_id->id);
                    ?>
                    <?php if($order != null): ?>
                        <tr>
                            <td>
                                <?php echo e($key+1); ?>

                            </td>
                            <td>
                                <?php echo e($order->code); ?> <?php if($order->viewed == 0): ?> <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span> <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(count($order->orderDetails->where('seller_id', Auth::user()->id))); ?>

                            </td>
                            <td>
                                <?php if($order->user_id != null): ?>
                                    <?php echo e($order->user->name); ?>

                                <?php else: ?>
                                    Guest (<?php echo e($order->guest_id); ?>)
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?>

                            </td>
                            <td>
                                <?php
                                    $status = $order->orderDetails->first()->delivery_status;
                                ?>
                                <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                            </td>
                            <td>
                                <?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?>

                            </td>
                            <td>
                                <span class="badge badge--2 mr-4">
                                    <?php if($order->orderDetails->where('seller_id',  Auth::user()->id)->first()->payment_status == 'paid'): ?>
                                        <i class="bg-green"></i> Paid
                                    <?php else: ?>
                                        <i class="bg-red"></i> Unpaid
                                    <?php endif; ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('orders.show', encrypt($order->id))); ?>"><?php echo e(__('View')); ?></a></li>
                                        <li><a href="<?php echo e(route('seller.invoice.download', $order->id)); ?>"><?php echo e(__('Download Invoice')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('orders.destroy', $order->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>