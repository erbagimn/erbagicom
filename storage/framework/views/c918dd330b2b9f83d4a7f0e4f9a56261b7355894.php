<?php $__env->startSection('content'); ?>

    <div class="panel">
    	<div class="panel-body">
    		<div class="invoice-masthead">
    			<div class="invoice-text">
    				<h3 class="h1 text-thin mar-no text-primary"><?php echo e(__('Order Details')); ?></h3>
    			</div>
    		</div>
    		<div class="invoice-bill row">
    			<div class="col-sm-6 text-xs-center">
    				<address>
        				<strong class="text-main"><?php echo e(json_decode($order->shipping_address)->name); ?></strong><br>
                         <?php echo e(json_decode($order->shipping_address)->email); ?><br>
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
                            <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    					<?php echo e(single_price($order->orderDetails->sum('price'))); ?>

    				</td>
    			</tr>
    			<tr>
    				<td>
    					<strong><?php echo e(__('Tax')); ?> :</strong>
    				</td>
    				<td>
    					<?php echo e(single_price($order->orderDetails->sum('tax'))); ?>

    				</td>
    			</tr>
                <tr>
    				<td>
    					<strong><?php echo e(__('Shipping')); ?> :</strong>
    				</td>
    				<td>
    					<?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?>

    				</td>
    			</tr>
    			<tr>
    				<td>
    					<strong><?php echo e(__('TOTAL')); ?> :</strong>
    				</td>
    				<td class="text-bold h4">
    					<?php echo e(single_price($order->grand_total)); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>