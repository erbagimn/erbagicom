<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <div class="image" style="background-image:url('<?php echo e(asset(Auth::user()->avatar_original)); ?>')"></div>
           
            <div class="name mb-0"><?php echo e(Auth::user()->name); ?> <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div>
            <br>
            <?php echo e(__('ID Komunitas')); ?> &nbsp; <?php echo e(Auth::user()->id_komunitas); ?>

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
                            <?php echo e(__('Riwayat Donasi')); ?>

                        </span>
                    </a>
                </li>
                <!--<li>
                    <a href="<?php echo e(route('wishlists.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wishlists.index'])); ?>">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Event ')); ?>

                        </span>
                    </a>
                </li>-->
                <li>
                    <a href="" class="">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Event Kegiatan')); ?>

                        </span>
                    </a>
                </li>

                 <li>
                    <a href="#" class="">
                        <i class="la la-file-text"></i>
                        <span class="category-name">
                            <?php echo e(__('Berita')); ?>

                        </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="">
                        <i class="la la-star-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Review')); ?>

                        </span>
                    </a>
                </li>
               
                <li>
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(areActiveRoutesHome(['profile'])); ?>">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            <?php echo e(__('Kelola Profile')); ?>

                        </span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="sidebar-widget-title py-3">
            <span><?php echo e(__('Donasi Terkumpul')); ?></span>
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
                    <small class="d-block text-sm alpha-5 mb-2"><?php echo e(__('Yang Terkumpul (current month)')); ?></small>
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
