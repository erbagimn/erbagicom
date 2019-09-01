<div class="keyword">
    <?php if(sizeof($keywords) > 0): ?>
        <div class="title"><?php echo e(__('Popular Suggestions')); ?></div>
        <ul>
            <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('suggestion.search', $keyword)); ?>"><?php echo e($keyword); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<div class="category">
    <?php if(count($subsubcategories) > 0): ?>
        <div class="title"><?php echo e(__('Category Suggestions')); ?></div>
        <ul>
            <?php $__currentLoopData = $subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->id)); ?>"><?php echo e(__($subsubcategory->name)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<div class="product">
    <?php if(count($products) > 0): ?>
        <div class="title"><?php echo e(__('Products')); ?></div>
        <ul>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('product', $product->slug)); ?>">
                        <div class="d-flex search-product align-items-center">
                            <div class="image" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');">
                            </div>
                            <div class="w-100 overflow--hidden">
                                <div class="product-name text-truncate">
                                    <?php echo e(__($product->name)); ?>

                                </div>
                                <div class="clearfix">
                                    <div class="price-box float-left">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>
                                    <div class="stock-box float-right">
                                        <?php
                                            $qty = 0;
                                            foreach (json_decode($product->variations) as $key => $variation) {
                                                $qty += $variation->qty;
                                            }
                                        ?>
                                        <?php if(count(json_decode($product->variations, true)) >= 1): ?>
                                            <?php if($qty > 0): ?>
                                                <span class="badge badge-pill bg-green"><?php echo e(__('Point 70')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge badge-pill bg-red"><?php echo e(__('Out of stock')); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>


<div class="product">
        <?php if(count($schools) > 0): ?>
            <div class="title"><?php echo e(__('Sekolah Terdaftar')); ?></div>
            <ul>
                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                       
                         <a href="#">   
                            <div class="d-flex search-product align-items-center">
                                <div class="image" style="background-image:url('<?php echo e(asset($sk->sc_logo)); ?>');">
                                </div>
                                <div class="w-100 overflow--hidden ">
                                    <div class="product-name text-truncate heading-6 strong-600">
                                        <?php echo e($sk->sc_name); ?>


                                        <div class="stock-box d-inline-block">
                                         
                                            <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i>&nbsp; <?php echo e($sk->nispn); ?></span>
                                           
                                        </div>
                                    </div>
                                    <div class="price-box alpha-6">
                                        <?php echo e($sk->address); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
</div>

