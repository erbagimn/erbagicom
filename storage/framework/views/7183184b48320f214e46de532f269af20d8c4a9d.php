<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Orders')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('orders.index')); ?>"><?php echo e(__('Orders')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(count($orders) > 0): ?>
                            <!-- Order history table -->
                            <div class="card no-border mt-4">
                                <div>
                                    <table class="table table-sm table-hover table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo e(__('Order Code')); ?></th>
                                                <th><?php echo e(__('Num. of Products')); ?></th>
                                                <th><?php echo e(__('Customer')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                                <th><?php echo e(__('Delivery Status')); ?></th>
                                                <th><?php echo e(__('Payment Status')); ?></th>
                                                <th><?php echo e(__('Options')); ?></th>
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
                                                            <a href="#<?php echo e($order->code); ?>" onclick="show_order_details(<?php echo e($order->id); ?>)"><?php echo e($order->code); ?></a>
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
                                                            <?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price'))); ?>

                                                        </td>
                                                        <td>
                                                            <?php
                                                                $status = $order->orderDetails->first()->delivery_status;
                                                            ?>
                                                            <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                                                        </td>
                                                        <td>
                                                            <span class="badge badge--2 mr-4">
                                                                <?php if($order->orderDetails->where('seller_id', Auth::user()->id)->first()->payment_status == 'paid'): ?>
                                                                    <i class="bg-green"></i> <?php echo e(__('Paid')); ?>

                                                                <?php else: ?>
                                                                    <i class="bg-red"></i> <?php echo e(__('Unpaid')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </button>

                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                                                    <button onclick="show_order_details(<?php echo e($order->id); ?>)" class="dropdown-item"><?php echo e(__('Order Details')); ?></button>
                                                                    <a href="<?php echo e(route('seller.invoice.download', $order->id)); ?>" class="dropdown-item"><?php echo e(__('Download Invoice')); ?></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($orders->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>