<?php $__env->startSection('content'); ?>

<div class="all-category-wrap py-4 gry-bg">
    <div class="sticky-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white all-category-menu">
                        <ul class="clearfix no-scrollbar">
                            <?php if(count($categories) > 12): ?>
                                <?php for($i = 0; $i < 11; $i++): ?>
                                    <li class="<?php if($i == 0) echo 'active' ?>">
                                        <a href="#<?php echo e($i); ?>" class="row no-gutters align-items-center">
                                            <div class="col-md-3">
                                                <img class="cat-image" src="<?php echo e(asset($categories[$i]->icon)); ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="cat-name"><?php echo e($categories[$i]->name); ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="">
                                    <a href="#more" class="row no-gutters align-items-center">
                                        <div class="col-md-3">
                                            <i class="fa fa-ellipsis-h cat-icon"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="cat-name"><?php echo e(__('More Categories')); ?></div>
                                        </div>
                                    </a>
                                </li>
                            <?php else: ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if($key == 0) echo 'active' ?>">
                                        <a href="#<?php echo e($key); ?>" class="row no-gutters align-items-center">
                                            <div class="col-md-3">
                                                <img class="cat-image" src="<?php echo e(asset($category->icon)); ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="cat-name"><?php echo e(__($category->name)); ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($categories)>12 && $key == 11): ?>
                                <div class="sub-category-menu active" id="more">
                                    <h3 class="category-name"><a href="<?php echo e(route('products.category', $category->id)); ?>"><?php echo e(__($category->name)); ?></a></h3>
                                    <ul>
                                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->id)); ?>" ><?php echo e(__($subsubcategory->name)); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <div class="sub-category-menu <?php if($key < 12) echo 'active'; ?>" id="<?php echo e($key); ?>">
                                    <h3 class="category-name"><a href="<?php echo e(route('products.category', $category->id)); ?>" ><?php echo e(__($category->name)); ?></a></h3>
                                    <ul>
                                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->id)); ?>" ><?php echo e(__($subsubcategory->name)); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>