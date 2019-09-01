<?php $__env->startSection('content'); ?>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('orders')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Code</th>
                    <th>Num. of Products</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Delivery Status</th>
                    <th>Payment Status</th>
                    <th width="10%"><?php echo e(__('options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($key+1); ?>

                        </td>
                        <td>
                            <?php echo e($order->code); ?>

                        </td>
                        <td>
                            <?php echo e(count($order->orderDetails)); ?>

                        </td>
                        <td>
                            <?php if($order->user_id != null): ?>
                                <?php echo e($order->user->name); ?>

                            <?php else: ?>
                                Guest (<?php echo e($order->guest_id); ?>)
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e(single_price($order->grand_total)); ?>

                        </td>
                        <td>
                            <?php
                                $status = 'Delivered';
                                foreach ($order->orderDetails as $key => $orderDetail) {
                                    if($orderDetail->delivery_status != 'delivered'){
                                        $status = 'Pending';
                                    }
                                }
                            ?>
                            <?php echo e($status); ?>

                        </td>
                        <td>
                            <span class="badge badge--2 mr-4">
                                <?php if($order->payment_status == 'paid'): ?>
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
                                    <li><a href="<?php echo e(route('sales.show', encrypt($order->id))); ?>"><?php echo e(__('View')); ?></a></li>
                                    <li><a href="<?php echo e(route('customer.invoice.download', $order->id)); ?>"><?php echo e(__('Download Invoice')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('orders.destroy', $order->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
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


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>