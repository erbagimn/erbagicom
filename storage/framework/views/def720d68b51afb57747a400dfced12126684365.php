<?php $__env->startSection('content'); ?>

    <section class="slice-xs sct-color-2 border-bottom">
        <div class="container container-sm">
            <div class="row cols-delimited">
                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon mb-0">
                            <i class="icon-hotel-restaurant-105"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(__('My Cart')); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon mb-0">
                            <i class="icon-finance-067"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(__('Shipping info')); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="icon-finance-059"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. <?php echo e(__('Payment')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-4 gry-bg" id="cart-summary">
        <div class="container">
            <?php if(Session::has('cart')): ?>
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xl-8">
                    <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
                    <div class="form-default bg-white p-4">
                        <div class="">
                            <div class="">
                                <table class="table-cart border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="product-image"></th>
                                            <th class="product-name"><?php echo e(__('Product')); ?></th>
                                            <th class="product-price d-none d-lg-table-cell"><?php echo e(__('Price')); ?></th>
                                            <th class="product-quanity d-none d-md-table-cell"><?php echo e(__('Quantity')); ?></th>
                                            <th class="product-total"><?php echo e(__('Total')); ?></th>
                                            <th class="product-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        ?>
                                        <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $product = \App\Product::find($cartItem['id']);
                                            $total = $total + $cartItem['price']*$cartItem['quantity'];
                                            $product_name_with_choice = $product->name;
                                            if(isset($cartItem['color'])){
                                                $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                                            }
                                            foreach (json_decode($product->choice_options) as $choice){
                                                $str = $choice->name; // example $str =  choice_0
                                                $product_name_with_choice .= ' - '.$cartItem[$str];
                                            }
                                            ?>
                                            <tr class="cart-item">
                                                <td class="product-image">
                                                    <a href="#" class="mr-3">
                                                        <img src="<?php echo e(asset($product->thumbnail_img)); ?>">
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <span class="pr-4 d-block"><?php echo e($product_name_with_choice); ?></span>
                                                </td>

                                                <td class="product-price d-none d-lg-table-cell">
                                                    <span class="pr-3 d-block"><?php echo e(single_price($cartItem['price'])); ?></span>
                                                </td>

                                                <td class="product-quantity d-none d-md-table-cell">
                                                    <div class="input-group input-group--style-2 pr-4" style="width: 130px;">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-number" type="button" data-type="minus" data-field="quantity[<?php echo e($key); ?>]">
                                                                <i class="la la-minus"></i>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="quantity[<?php echo e($key); ?>]" class="form-control input-number" placeholder="1" value="<?php echo e($cartItem['quantity']); ?>" min="1" max="10" onchange="updateQuantity(<?php echo e($key); ?>, this)">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[<?php echo e($key); ?>]">
                                                                <i class="la la-plus"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    <span><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="#" onclick="removeFromCartView(event, <?php echo e($key); ?>)" class="text-right pl-4">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row align-items-center pt-4">
                            <div class="col-6">
                                <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                    <i class="la la-mail-reply"></i>
                                    <?php echo e(__('Return to shop')); ?>

                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Shipping')); ?></a>
                                <?php else: ?>
                                    <button class="btn btn-styled btn-base-1" onclick="showCheckoutModal()"><?php echo e(__('Continue to Shipping')); ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>

                <div class="col-xl-4 ml-lg-auto">
                    <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <?php else: ?>
                <div class="dc-header">
                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="GuestCheckout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><?php echo e(__('Login')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                    <form class="form-default" role="form" action="<?php echo e(route('cart.login.submit')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="input-group input-group--style-1">
                                                        <input type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>">
                                                        <span class="input-group-addon">
                                                            <i class="text-md ion-person"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="input-group input-group--style-1">
                                                        <input type="password" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>">
                                                        <span class="input-group-addon">
                                                            <i class="text-md ion-locked"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <a href="#" class="link link-xs link--style-3"><?php echo e(__('Forgot password?')); ?></a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-styled btn-base-1 px-4"><?php echo e(__('Sign in')); ?></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                    <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1): ?>
                                        <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-google"></i> <?php echo e(__('Login with Google')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if(\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1): ?>
                                        <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-facebook"></i> <?php echo e(__('Login with Facebook')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if(\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                                    <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 my-4">
                                        <i class="icon fa fa-twitter"></i> <?php echo e(__('Login with Twitter')); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="or or--1 mt-2">
                        <span><?php echo e(__('or')); ?></span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Guest Checkout')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
    function removeFromCartView(e, key){
        e.preventDefault();
        removeFromCart(key);
    }

    function updateQuantity(key, element){
        $.post('<?php echo e(route('cart.updateQuantity')); ?>', { _token:'<?php echo e(csrf_token()); ?>', key:key, quantity: element.value}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }

    function showCheckoutModal(){
        $('#GuestCheckout').modal();
    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>