<div class="modal-body p-4">
    <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
        <div class="col-lg-6">
            <div class="product-gal d-flex flex-row-reverse">
                <div class="product-gal-img">
                    <img class="xzoom img-fluid" src="<?php echo e(asset(json_decode($product->photos)[0])); ?>" xoriginal="<?php echo e(asset(json_decode($product->photos)[0])); ?>" />
                </div>
                <div class="product-gal-thumb">
                    <div class="xzoom-thumbs">
                        <?php $__currentLoopData = json_decode($product->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(asset($photo)); ?>">
                                <img class="xzoom-gallery" width="80" src="<?php echo e(asset($photo)); ?>"  <?php if($key == 0): ?> xpreview="<?php echo e(asset($photo)); ?>" <?php endif; ?>>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Product description -->
            <div class="product-description-wrapper">
                <!-- Product title -->
                <h2 class="product-title">
                    <?php echo e(__($product->name)); ?>

                </h2>

                <div class="row no-gutters mt-4">
                    <div class="col-2">
                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                    </div>
                    <div class="col-10">
                        <div class="product-price-old">
                            <del>
                                <?php echo e(home_price($product->id)); ?>

                                <span>/<?php echo e($product->unit); ?></span>
                            </del>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="product-description-label"><?php echo e(__('Discount Price')); ?>:</div>
                    </div>
                    <div class="col-10">
                        <div class="product-price">
                            <strong>
                                <?php echo e(home_discounted_price($product->id)); ?>

                            </strong>
                            <span class="piece">/<?php echo e($product->unit); ?></span>
                        </div>
                    </div>
                </div>

                <hr>

                <form id="option-choice-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">

                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e($choice->title); ?>:</div>
                        </div>
                        <div class="col-10">
                            <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <input type="radio" id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>" name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>">
                                        <label for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(count(json_decode($product->colors)) > 0): ?>
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label"><?php echo e(__('Color')); ?>:</div>
                            </div>
                            <div class="col-10">
                                <ul class="list-inline checkbox-color mb-1">
                                    <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <input type="radio" id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>" name="color" value="<?php echo e($color); ?>">
                                            <label style="background: <?php echo e($color); ?>;" for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>" data-toggle="tooltip"></label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <hr>

                    <!-- Quantity + Add to cart -->
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2"><?php echo e(__('Quantity')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                            <i class="la la-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                            <i class="la la-plus"></i>
                                        </button>
                                    </span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(__('Total Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price">

                                </strong>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="d-table width-100 mt-3">
                    <div class="d-table-cell">
                        <!-- Add to cart button -->
                        <button type="button" class="btn btn-base-1 btn-icon-left" onclick="addToCart()">
                            <i class="icon ion-bag"></i> <?php echo e(__('Add to cart')); ?>

                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });
</script>
