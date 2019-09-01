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
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0 d-inline-block">
                                        <?php echo e(__('Products')); ?>

                                    </h2>
                                    <a href="<?php echo e(route('seller.products.upload')); ?>" class="btn btn-base-1 ml-3"><?php echo e(__('Add New Product')); ?></a>

                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('seller.products')); ?>"><?php echo e(__('Products')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order history table -->
                        <div class="card no-border mt-4">
                            <div>
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Sub Subcategory')); ?></th>
                                            <th><?php echo e(__('Current Qty')); ?></th>
                                            <th><?php echo e(__('Base Price')); ?></th>
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
                                                <td><?php echo e($product->subsubcategory->name); ?></td>
                                                <td>
                                                    <?php
                                                        $qty = 0;
                                                        foreach (json_decode($product->variations) as $key => $variation) {
                                                            $qty += $variation->qty;
                                                        }
                                                        echo $qty;
                                                    ?>
                                                </td>
                                                <td><?php echo e($product->unit_price); ?></td>
                                                <td><label class="switch">
                                                    <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                                    <span class="slider round"></span></label>
                                                </td>
                                                <td><label class="switch">
                                                    <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                                    <span class="slider round"></span></label>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenuButton-<?php echo e($key); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-<?php echo e($key); ?>">
                                                            <a href="<?php echo e(route('seller.products.edit', encrypt($product->id))); ?>" class="dropdown-item"><?php echo e(__('Edit')); ?></a>
        					                                <button onclick="confirm_modal('<?php echo e(route('products.destroy', $product->id)); ?>')" class="dropdown-item"><?php echo e(__('Delete')); ?></button>
                                                            <a href="<?php echo e(route('products.duplicate', $product->id)); ?>" class="dropdown-item"><?php echo e(__('Duplicate')); ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($products->links()); ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
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
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>