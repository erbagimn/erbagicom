<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <div class="image" style="background-image:url('<?php echo e(asset(Auth::user()->avatar_original)); ?>')"></div>
            <?php if(Auth::user()->seller->verification_status == 1): ?>
                <div class="name mb-0"><?php echo e(Auth::user()->name); ?> <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div>
            <?php else: ?>
                <div class="name mb-0"><?php echo e(Auth::user()->name); ?> <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span></div>
            <?php endif; ?>
        </div>
        <div class="sidebar-widget-title py-3">
            <span><?php echo e(__('Menu')); ?></span>
        </div>
        <div class="widget-profile-menu py-3">
            <ul class="categories categories--style-3">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(areActiveRoutesHome(['dashboard'])); ?>">
                        <i class="la la-dashboard"></i>
                        <span class="category-name">
                            <?php echo e(__('Dashboard')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('purchase_history.index')); ?>" class="<?php echo e(areActiveRoutesHome(['purchase_history.index'])); ?>">
                        <i class="la la-file-text"></i>
                        <span class="category-name">
                            <?php echo e(__('Purchase History')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('wishlists.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wishlists.index'])); ?>">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Wishlist')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('seller.products')); ?>" class="<?php echo e(areActiveRoutesHome(['seller.products', 'seller.products.upload', 'seller.products.edit'])); ?>">
                        <i class="la la-diamond"></i>
                        <span class="category-name">
                            <?php echo e(__('Products')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(areActiveRoutesHome(['orders.index'])); ?>">
                        <i class="la la-file-text"></i>
                        <span class="category-name">
                            <?php echo e(__('Orders')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('reviews.seller')); ?>" class="<?php echo e(areActiveRoutesHome(['reviews.seller'])); ?>">
                        <i class="la la-star-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Product Reviews')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('shops.index')); ?>" class="<?php echo e(areActiveRoutesHome(['shops.index'])); ?>">
                        <i class="la la-cog"></i>
                        <span class="category-name">
                            <?php echo e(__('Shop Setting')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('payments.index')); ?>" class="<?php echo e(areActiveRoutesHome(['payments.index'])); ?>">
                        <i class="la la-cc-mastercard"></i>
                        <span class="category-name">
                            <?php echo e(__('Payment History')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(areActiveRoutesHome(['profile'])); ?>">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            <?php echo e(__('Manage Profile')); ?>

                        </span>
                    </a>
                </li>
                <?php if(\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1): ?>
                    <li>
                        <a href="<?php echo e(route('wallet.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wallet.index'])); ?>">
                            <i class="la la-dollar"></i>
                            <span class="category-name">
                                <?php echo e(__('My Wallet')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('support_ticket.index')); ?>" class="<?php echo e(areActiveRoutesHome(['support_ticket.index'])); ?>">
                        <i class="la la-support"></i>
                        <span class="category-name">
                            <?php echo e(__('Support Ticket')); ?>

                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-widget-title py-3">
            <span><?php echo e(__('Earnings')); ?></span>
        </div>
        <div class="widget-balance pb-3 pt-1">
            <div class="text-center">
                <div class="heading-4 strong-700 mb-4">
                    <?php
                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                        $total = 0;
                        foreach ($orderDetails as $key => $orderDetail) {
                            if($orderDetail->order->payment_status == 'paid'){
                                $total += $orderDetail->price;
                            }
                        }
                    ?>
                    <small class="d-block text-sm alpha-5 mb-2"><?php echo e(__('Your earnings (current month)')); ?></small>
                    <span class="p-2 bg-base-1 rounded"><?php echo e(single_price($total)); ?></span>
                </div>
                <table class="text-left mb-0 table w-75 m-auto">
                    <tr>
                        <?php
                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                            $total = 0;
                            foreach ($orderDetails as $key => $orderDetail) {
                                if($orderDetail->order->payment_status == 'paid'){
                                    $total += $orderDetail->price;
                                }
                            }
                        ?>
                        <td class="p-1 text-sm">
                            <?php echo e(__('Total earnings')); ?>:
                        </td>
                        <td class="p-1">
                            <?php echo e(single_price($total)); ?>

                        </td>
                    </tr>
                    <tr>
                        <?php
                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                            $total = 0;
                            foreach ($orderDetails as $key => $orderDetail) {
                                if($orderDetail->order->payment_status == 'paid'){
                                    $total += $orderDetail->price;
                                }
                            }
                        ?>
                        <td class="p-1 text-sm">
                            <?php echo e(__('Last Month earnings')); ?>:
                        </td>
                        <td class="p-1">
                            <?php echo e(single_price($total)); ?>

                        </td>
                    </tr>
                </table>
            </div>
            <table>

            </table>
        </div>
    </div>
</div>
