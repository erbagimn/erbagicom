<div class="modal-header">
    <h5 class="modal-title strong-600 heading-5"><?php echo e(__('Order id')); ?>: <?php echo e($order->code); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php
    $status = $order->orderDetails->first()->delivery_status;
    $payment_status = $order->orderDetails->first()->payment_status;
?>

<div class="modal-body gry-bg px-3 pt-0">
    <div class="pt-4">
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
    <div class="row mt-5">
        <div class="offset-lg-2 col-lg-4 col-sm-6">
            <div class="form-inline">
                <select class="form-control selectpicker form-control-sm"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                    <option value="unpaid" <?php if($payment_status == 'unpaid'): ?> selected <?php endif; ?>><?php echo e(__('Unpaid')); ?></option>
                    <option value="paid" <?php if($payment_status == 'paid'): ?> selected <?php endif; ?>><?php echo e(__('Paid')); ?></option>
                </select>
                <label class="my-2" ><?php echo e(__('Payment Status')); ?></label>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="form-inline">
                <select class="form-control selectpicker form-control-sm"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                    <option value="pending" <?php if($status == 'pending'): ?> selected <?php endif; ?>><?php echo e(__('Pending')); ?></option>
                    <option value="on_review" <?php if($status == 'on_review'): ?> selected <?php endif; ?>><?php echo e(__('On review')); ?></option>
                    <option value="on_delivery" <?php if($status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(__('On delivery')); ?></option>
                    <option value="delivered" <?php if($status == 'delivered'): ?> selected <?php endif; ?>><?php echo e(__('Delivered')); ?></option>
                </select>
                <label class="my-2" ><?php echo e(__('Delivery Status')); ?></label>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header py-2 px-3 ">
        <div class="heading-6 strong-600"><?php echo e(__('Order Summary')); ?></div>
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
                            <td class="w-50 strong-600"><?php echo e(__('Order status')); ?>:</td>
                            <td><?php echo e($status); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(__('Total order amount')); ?>:</td>
                            <td><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?></td>
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
    <div class="row">
        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-header py-2 px-3 heading-6 strong-600"><?php echo e(__('Order Details')); ?></div>
                <div class="card-body pb-0">
                    <table class="details-table table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="40%"><?php echo e(__('Product')); ?></th>
                                <th><?php echo e(__('Variation')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderDetails->where('seller_id', Auth::user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank"><?php echo e($orderDetail->product->name); ?></a></td>
                                    <td>
                                        <?php echo e($orderDetail->variation); ?>

                                    </td>
                                    <td>
                                        <?php echo e($orderDetail->quantity); ?>

                                    </td>
                                    <td><?php echo e($orderDetail->price); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mt-4">
                <div class="card-header py-2 px-3 heading-6 strong-600"><?php echo e(__('Order Ammount')); ?></div>
                <div class="card-body pb-0">
                    <table class="table details-table">
                        <tbody>
                            <tr>
                                <th><?php echo e(__('Subtotal')); ?></th>
                                <td class="text-right">
                                    <span class="strong-600"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Shipping')); ?></th>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Tax')); ?></th>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><span class="strong-600"><?php echo e(__('Total')); ?></span></th>
                                <td class="text-right">
                                    <strong>
                                        <span><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?>

                                        </span>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#update_delivery_status').on('change', function(){
        var order_id = <?php echo e($order->id); ?>;
        var status = $('#update_delivery_status').val();
        $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
            $('#order_details').modal('hide');
            showFrontendAlert('success', 'Order status has been updated');
            location.reload().setTimeOut(500);
        });
    });

    $('#update_payment_status').on('change', function(){
        var order_id = <?php echo e($order->id); ?>;
        var status = $('#update_payment_status').val();
        $.post('<?php echo e(route('orders.update_payment_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
            $('#order_details').modal('hide');
            //console.log(data);
            showFrontendAlert('success', 'Payment status has been updated');
            location.reload().setTimeOut(500);
        });
    });
</script>
