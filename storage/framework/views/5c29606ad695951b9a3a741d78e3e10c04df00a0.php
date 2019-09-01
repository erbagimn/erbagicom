<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-12 mx-auto">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Track Order')); ?>

                                    </h2>
                                </div>
                            </div>
                        </div>
                        <form class="" action="<?php echo e(route('orders.track')); ?>" method="GET" enctype="multipart/form-data">
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Order Info')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Order Code')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Order Code')); ?>" name="order_code" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Track Order')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if(isset($order)): ?>
                <div class="card mt-4">
                    <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                        <div class="float-left"><?php echo e(__('Order Summary')); ?></div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="details-table table">
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Order Code')); ?>:</td>
                                        <td><?php echo e($order->code); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Customer')); ?>:</td>
                                        <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Email')); ?>:</td>
                                        <?php if($order->user_id != null): ?>
                                            <td><?php echo e($order->user->email); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Shipping address')); ?>:</td>
                                        <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="details-table table">
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Order date')); ?>:</td>
                                        <td><?php echo e(date('d-m-Y H:m A', $order->date)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Total order amount')); ?>:</td>
                                        <td><?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Shipping method')); ?>:</td>
                                        <td><?php echo e(__('Flat shipping rate')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 strong-600"><?php echo e(__('Payment method')); ?>:</td>
                                        <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $status = $orderDetail->delivery_status;
                    ?>
                    <div class="card mt-4">
                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                            <ul class="process-steps clearfix">
                                <li <?php if($status == 'pending'): ?> class="active" <?php else: ?> class="done" <?php endif; ?>>
                                    <div class="icon">1</div>
                                    <div class="title"><?php echo e(__('Order placed')); ?></div>
                                </li>
                                <li <?php if($status == 'on_review'): ?> class="active" <?php elseif($status == 'on_delivery' || $status == 'delivered'): ?> class="done" <?php endif; ?>>
                                    <div class="icon">2</div>
                                    <div class="title"><?php echo e(__('On review')); ?></div>
                                </li>
                                <li <?php if($status == 'on_delivery'): ?> class="active" <?php elseif($status == 'delivered'): ?> class="done" <?php endif; ?>>
                                    <div class="icon">3</div>
                                    <div class="title"><?php echo e(__('On delivery')); ?></div>
                                </li>
                                <li <?php if($status == 'delivered'): ?> class="done" <?php endif; ?>>
                                    <div class="icon">4</div>
                                    <div class="title"><?php echo e(__('Delivered')); ?></div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="col-6">
                                <table class="details-table table">
                                    <?php if($orderDetail->product != null): ?>
                                        <tr>
                                            <td class="w-50 strong-600"><?php echo e(__('Product Name')); ?>:</td>
                                            <td><?php echo e($orderDetail->product->name); ?> (<?php echo e($orderDetail->variation); ?>)</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 strong-600"><?php echo e(__('Quantity')); ?>:</td>
                                            <td><?php echo e($orderDetail->quantity); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 strong-600"><?php echo e(__('Shipped By')); ?>:</td>
                                            <td><?php echo e($orderDetail->product->user->name); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>