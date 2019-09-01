<?php $__env->startSection('content'); ?>

<?php if($type != 'Seller'): ?>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Product')); ?></a>
        </div>
    </div>
<?php endif; ?>

<br>

<div class="col-lg-12">
    <div class="panel">
        <!--Panel heading-->
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__($type.' Products')); ?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%"><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Photo')); ?></th>
                        <th><?php echo e(__('Current qty')); ?></th>
                        <th><?php echo e(__('Base Price')); ?></th>
                        <th><?php echo e(__('Todays Deal')); ?></th>
                        <th><?php echo e(__('Published')); ?></th>
                        <th><?php echo e(__('Featured')); ?></th>
                        <th><?php echo e(__('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank"><?php echo e(__($product->name)); ?></a></td>
                            <td><img class="img-md" src="<?php echo e(asset($product->thumbnail_img)); ?>" alt="Image"></td>
                            <td>
                                <?php
                                    $qty = 0;
                                    foreach (json_decode($product->variations) as $key => $variation) {
                                        $qty += $variation->qty;
                                    }
                                    echo $qty;
                                ?>
                            </td>
                            <td><?php echo e(number_format($product->unit_price,2)); ?></td>
                            <td><label class="switch">
                                <input onchange="update_todays_deal(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->todays_deal == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                            <td><label class="switch">
                                <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                            <td><label class="switch">
                                <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <?php if($type == 'Seller'): ?>
                                            <li><a href="<?php echo e(route('products.seller.edit', encrypt($product->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                        <?php else: ?>
                                            <li><a href="<?php echo e(route('products.admin.edit', encrypt($product->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                        <?php endif; ?>
                                        <li><a onclick="confirm_modal('<?php echo e(route('products.destroy', $product->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                        <li><a href="<?php echo e(route('products.duplicate', $product->id)); ?>"><?php echo e(__('Duplicate')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.todays_deal')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Todays Deal updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>