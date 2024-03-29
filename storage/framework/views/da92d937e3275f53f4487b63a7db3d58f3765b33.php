
<div style="margin-left:auto;margin-right:auto;">
<style media="all">
	@import  url('https://fonts.googleapis.com/css?family=Open+Sans:400,700');
	*{
		margin: 0;
		padding: 0;
		line-height: 1.5;
		font-family: 'Open Sans', sans-serif;
		color: #333542;
	}
	div{
		font-size: 1rem;
	}
	.gry-color *,
	.gry-color{
		color:#878f9c;
	}
	table{
		width: 100%;
	}
	table th{
		font-weight: normal;
	}
	table.padding th{
		padding: .5rem .7rem;
	}
	table.padding td{
		padding: .7rem;
	}
	table.sm-padding td{
		padding: .2rem .7rem;
	}
	.border-bottom td,
	.border-bottom th{
		border-bottom:1px solid #eceff4;
	}
	.text-left{
		text-align:left;
	}
	.text-right{
		text-align:right;
	}
	.small{
		font-size: .85rem;
	}
	.strong{
		font-weight: bold;
	}
</style>

	<?php
		$generalsetting = \App\GeneralSetting::first();
	?>

	<div style="background: #eceff4;padding: 1.5rem;">
		<table>
			<tr>
				<td>
					<?php if($generalsetting->logo != null): ?>
						<img src="<?php echo e(asset($generalsetting->logo)); ?>" height="40" style="display:inline-block;">
					<?php else: ?>
						<img src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" height="40" style="display:inline-block;">
					<?php endif; ?>
				</td>
				<td style="font-size: 2.5rem;" class="text-right strong">INVOICE</td>
			</tr>
		</table>
		<table>
			<tr>
				<td style="font-size: 1.2rem;" class="strong"><?php echo e($generalsetting->site_name); ?></td>
				<td class="text-right"></td>
			</tr>
			<tr>
				<td class="gry-color small"><?php echo e($generalsetting->address); ?></td>
				<td class="text-right"></td>
			</tr>
			<tr>
				<td class="gry-color small">Email: <?php echo e($generalsetting->email); ?></td>
				<td class="text-right small"><span class="gry-color small">Order ID:</span> <span class="strong"><?php echo e($order->code); ?></span></td>
			</tr>
			<tr>
				<td class="gry-color small">Phone: <?php echo e($generalsetting->phone); ?></td>
				<td class="text-right small"><span class="gry-color small">Order Date:</span> <span class=" strong"><?php echo e(date('d-m-Y', $order->date)); ?></span></td>
			</tr>
		</table>

	</div>

	<div style="border-bottom:1px solid #eceff4;margin: 0 1.5rem;"></div>

	<div style="padding: 1.5rem;">
		<table>
			<?php
				$shipping_address = json_decode($order->shipping_address);
			?>
			<tr><td class="strong small gry-color">Bill to:</td></tr>
			<tr><td class="strong"><?php echo e($shipping_address->name); ?></td></tr>
			<tr><td class="gry-color small"><?php echo e($shipping_address->address); ?>, <?php echo e($shipping_address->city); ?>, <?php echo e($shipping_address->country); ?></td></tr>
			<tr><td class="gry-color small">Email: <?php echo e($shipping_address->email); ?></td></tr>
			<tr><td class="gry-color small">Phone: <?php echo e($shipping_address->phone); ?></td></tr>
		</table>
	</div>

    <div style="padding: 1.5rem;">
		<table class="padding text-left small border-bottom">
			<thead>
                <tr class="gry-color" style="background: #eceff4;">
                    <th width="50%">Product Name</th>
                    <th width="10%">Qty</th>
                    <th width="15%">Unit Price</th>
                    <th width="10%">Tax</th>
                    <th width="15%" class="text-right">Total</th>
                </tr>
			</thead>
			<tbody class="strong">
                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr class="">
						<td><?php echo e($orderDetail->product->name); ?> (<?php echo e($orderDetail->variation); ?>)</td>
						<td class="gry-color"><?php echo e($orderDetail->quantity); ?></td>
						<td class="gry-color"><?php echo e(single_price($orderDetail->price/$orderDetail->quantity)); ?></td>
						<td class="gry-color"><?php echo e(single_price($orderDetail->tax/$orderDetail->quantity)); ?></td>
	                    <td class="text-right"><?php echo e(single_price($orderDetail->price+$orderDetail->tax)); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
		</table>
	</div>

    <div style="padding:0 1.5rem;">
        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
	        <tbody>
		        <tr>
		            <th class="gry-color text-left">Sub Total</td>
		            <td><?php echo e(single_price($order->orderDetails->sum('price'))); ?></td>
		        </tr>
		        <tr>
		            <th class="gry-color text-left">Shipping Cost</td>
		            <td><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></td>
		        </tr>
		        <tr class="border-bottom">
		            <th class="gry-color text-left">Total Tax</td>
		            <td><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></td>
		        </tr>
		        <tr>
		            <th class="text-left strong">Grand Total</td>
		            <td><?php echo e(single_price($order->grand_total)); ?></td>
		        </tr>
	        </tbody>
	    </table>
    </div>

</div>
