<?php if(count($combinations[0]) > 0): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(__('Variant')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(__('Variant Price')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(__('SKU')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(__('Quantity')); ?></label>
				</td>
			</tr>
		</thead>
		<tbody>
<?php endif; ?>

<?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$sku = '';
		foreach (explode(' ', $product_name) as $key => $value) {
			$sku .= substr($value, 0, 1);
		}

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Color::where('code', $item)->first()->name;
					$str .= $color_name;
					$sku .='-'.$color_name;
				}
				else{
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
			}
		}
	?>
	<?php if(strlen($str) > 0): ?>
		<tr>
			<td>
				<label for="" class="control-label"><?php echo e($str); ?></label>
			</td>
			<td>
				<input type="number" name="price_<?php echo e($str); ?>" value="<?php
                    if ($product->unit_price == $unit_price) {
						if(isset(json_decode($product->variations)->$str->price)){
	                        echo json_decode($product->variations)->$str->price;
	                    }
	                    else{
	                        echo $unit_price;
	                    }
                    }
					else{
						echo $unit_price;
					}
                ?>" min="0" step="0.01" class="form-control" required>
			</td>
			<td>
				<input type="text" name="sku_<?php echo e($str); ?>" value="<?php echo e($sku); ?>" class="form-control" required>
			</td>
			<td>
				<input type="number" name="qty_<?php echo e($str); ?>" value="<?php
                    if(isset(json_decode($product->variations)->$str->qty)){
                        echo json_decode($product->variations)->$str->qty;
                    }
                    else{
                        echo '10';
                    }
                ?>" min="0" step="1" class="form-control" required>
			</td>
		</tr>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</tbody>
</table>
