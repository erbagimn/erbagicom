<?php $__env->startSection('content'); ?>

    <div class="panel">
    	<div class="panel-body">
    		<div class="invoice-masthead">
    			<div class="invoice-text">
    				<h3 class="h1 text-thin mar-no text-primary"><?php echo e(__('Order Details')); ?></h3>
    			</div>
    		</div>
            <div class="row">
                <?php
                    $delivery_status = $order->orderDetails->first()->delivery_status;
                    $payment_status = $order->orderDetails->first()->payment_status;
                ?>
                <div class="col-lg-offset-6 col-lg-3">
                    <label for=update_payment_status""><?php echo e(__('Payment Status')); ?></label>
                    <select class="form-control demo-select2"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                        <option value="paid" <?php if($payment_status == 'paid'): ?> selected <?php endif; ?>><?php echo e(__('Paid')); ?></option>
                        <option value="unpaid" <?php if($payment_status == 'unpaid'): ?> selected <?php endif; ?>><?php echo e(__('Unpaid')); ?></option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for=update_delivery_status""><?php echo e(__('Delivery Status')); ?></label>
                    <select class="form-control demo-select2"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                        <option value="pending" <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?>><?php echo e(__('Pending')); ?></option>
                        <option value="on_review" <?php if($delivery_status == 'on_review'): ?> selected <?php endif; ?>><?php echo e(__('On review')); ?></option>
                        <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(__('On delivery')); ?></option>
                        <option value="delivered" <?php if($delivery_status == 'delivered'): ?> selected <?php endif; ?>><?php echo e(__('Delivered')); ?></option>
                    </select>
                </div>
            </div>
            <hr>
    		<div class="invoice-bill row">
    			<div class="col-sm-6 text-xs-center">
    				<address>
        				<strong class="text-main"><?php echo e(json_decode($order->shipping_address)->name); ?></strong><br>
                         <?php echo e(json_decode($order->shipping_address)->email); ?><br>
                         <?php echo e(json_decode($order->shipping_address)->phone); ?><br>
        				 <?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?>

                    </address>
    			</div>
    			<div class="col-sm-6 text-xs-center">
    				<table class="invoice-details">
    				<tbody>
    				<tr>
    					<td class="text-main text-bold">
    						<?php echo e(__('Order #')); ?>

    					</td>
    					<td class="text-right text-info text-bold">
    						<?php echo e($order->code); ?>

    					</td>
    				</tr>
    				<tr>
    					<td class="text-main text-bold">
    						<?php echo e(__('Order Status')); ?>

    					</td>
                        <?php
                            $status = $order->orderDetails->first()->delivery_status;
                        ?>
    					<td class="text-right">
                            <?php if($status == 'delivered'): ?>
                                <span class="badge badge-success"><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></span>
                            <?php else: ?>
                                <span class="badge badge-info"><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></span>
                            <?php endif; ?>
    					</td>
    				</tr>
    				<tr>
    					<td class="text-main text-bold">
    						<?php echo e(__('Order Date')); ?>

    					</td>
    					<td class="text-right">
    						<?php echo e(date('d-m-Y H:m A', $order->date)); ?>

    					</td>
    				</tr>
                    <tr>
    					<td class="text-main text-bold">
    						<?php echo e(__('Total amount')); ?>

    					</td>
    					<td class="text-right">
    						<?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?>

    					</td>
    				</tr>
                    <tr>
    					<td class="text-main text-bold">
    						<?php echo e(__('Payment method')); ?>

    					</td>
    					<td class="text-right">
    						<?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?>

    					</td>
    				</tr>
    				</tbody>
    				</table>
    			</div>
    		</div>
    		<hr class="new-section-sm bord-no">
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                                <th class="min-col">#</th>
            					<th class="text-uppercase">
            						<?php echo e(__('Description')); ?>

            					</th>
            					<th class="min-col text-center text-uppercase">
            						<?php echo e(__('Qty')); ?>

            					</th>
            					<th class="min-col text-center text-uppercase">
            						<?php echo e(__('Price')); ?>

            					</th>
            					<th class="min-col text-right text-uppercase">
            						<?php echo e(__('Total')); ?>

            					</th>
            				</tr>
        				</thead>
        				<tbody>
                            <?php $__currentLoopData = $order->orderDetails->where('seller_id', Auth::user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                					<td>
                						<strong><a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank"><?php echo e($orderDetail->product->name); ?></a></strong>
                						<small><?php echo e($orderDetail->variation); ?></small>
                					</td>
                					<td class="text-center">
                						<?php echo e($orderDetail->quantity); ?>

                					</td>
                					<td class="text-center">
                						<?php echo e(single_price($orderDetail->price/$orderDetail->quantity)); ?>

                					</td>
                                    <td class="text-center">
                						<?php echo e(single_price($orderDetail->price)); ?>

                					</td>
                				</tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        				</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="clearfix">
    			<table class="table invoice-total">
    			<tbody>
    			<tr>
    				<td>
    					<strong><?php echo e(__('Sub Total')); ?> :</strong>
    				</td>
    				<td>
    					<?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price'))); ?>

    				</td>
    			</tr>
    			<tr>
    				<td>
    					<strong><?php echo e(__('Tax')); ?> :</strong>
    				</td>
    				<td>
    					<?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?>

    				</td>
    			</tr>
                <tr>
    				<td>
    					<strong><?php echo e(__('Shipping')); ?> :</strong>
    				</td>
    				<td>
    					<?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?>

    				</td>
    			</tr>
    			<tr>
    				<td>
    					<strong><?php echo e(__('TOTAL')); ?> :</strong>
    				</td>
    				<td class="text-bold h4">
    					<?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?>

    				</td>
    			</tr>
    			</tbody>
    			</table>
    		</div>
    		<div class="text-right no-print">
    			<a href="<?php echo e(route('customer.invoice.download', $order->id)); ?>" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
    		</div>
    	</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('#update_delivery_status').on('change', function(){
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_delivery_status').val();
            $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                showAlert('success', 'Delivery status has been updated');
            });
        });

        $('#update_payment_status').on('change', function(){
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_payment_status').val();
            $.post('<?php echo e(route('orders.update_payment_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                showAlert('success', 'Payment status has been updated');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>