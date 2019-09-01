<a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
    <span class="nav-box-text d-none d-xl-inline-block"><?php echo e(__('Cart')); ?></span>
    <?php if(Session::has('cart')): ?>
        <span class="nav-box-number"><?php echo e(count(Session::get('cart'))); ?></span>
    <?php else: ?>
        <span class="nav-box-number">0</span>
    <?php endif; ?>
</a>
<ul class="dropdown-menu dropdown-menu-right px-0">
    <li>
        <div class="dropdown-cart px-0">
            <?php if(Session::has('cart')): ?>
                <?php if(count($cart = Session::get('cart')) > 0): ?>
                    <div class="dc-header">
                        <h3 class="heading heading-6 strong-700"><?php echo e(__('Cart Items')); ?></h3>
                    </div>
                    <div class="dropdown-cart-items c-scrollbar">
                        <?php
                            $total = 0;
                        ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = \App\Product::find($cartItem['id']);
                                $total = $total + $cartItem['price']*$cartItem['quantity'];
                            ?>
                            <div class="dc-item">
                                <div class="d-flex align-items-center">
                                    <div class="dc-image">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>">
                                            <img src="<?php echo e(asset($product->thumbnail_img)); ?>" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="dc-content">
                                        <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                            <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                <?php echo e(__($product->name)); ?>

                                            </a>
                                        </span>

                                        <span class="dc-quantity">x<?php echo e($cartItem['quantity']); ?></span>
                                        <span class="dc-price"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                    </div>
                                    <div class="dc-actions">
                                        <button onclick="removeFromCart(<?php echo e($key); ?>)">
                                            <i class="la la-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="dc-item py-3">
                        <span class="subtotal-text"><?php echo e(__('Subtotal')); ?></span>
                        <span class="subtotal-amount"><?php echo e(single_price($total)); ?></span>
                    </div>
                    <div class="py-2 text-center dc-btn">
                        <ul class="inline-links inline-links--style-3">
                            <li class="pr-3">
                                <a href="<?php echo e(route('cart')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                    <i class="la la-shopping-cart"></i> <?php echo e(__('View cart')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                    <i class="la la-mail-forward"></i> <?php echo e(__('Checkout')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="dc-header">
                        <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="dc-header">
                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </li>
</ul>
