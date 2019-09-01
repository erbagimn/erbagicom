<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
    <div id="navbar-container" class="boxed">

        <?php
            $generalsetting = \App\GeneralSetting::first();
        ?>

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-brand">
                <?php if($generalsetting->logo != null): ?>
                    <img src="<?php echo e(asset($generalsetting->admin_logo)); ?>" class="brand-icon" alt="<?php echo e($generalsetting->site_name); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/logo_shop.png')); ?>" class="brand-icon" alt="<?php echo e($generalsetting->site_name); ?>">
                <?php endif; ?>
                <div class="brand-title">
                    <span class="brand-text"><?php echo e($generalsetting->site_name); ?></span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">

            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->



                

            </ul>
            <ul class="nav navbar-top-links">

                <?php
                    $orders = DB::table('orders')
                                ->orderBy('code', 'desc')
                                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                                ->where('order_details.seller_id', Auth::user()->id)
                                ->where('orders.viewed', 0)
                                ->select('orders.id')
                                ->distinct()
                                ->count();
                    $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                ?>

                <li class="dropdown" id="lang-change">
                    <?php
                        if(Session::has('locale')){
                            $locale = Session::get('locale', Config::get('app.locale'));
                        }
                        else{
                            $locale = 'en';
                        }
                    ?>
                    <a href="" class="dropdown-toggle top-bar-item" data-toggle="dropdown">
                        <img src="<?php echo e(asset('frontend/images/icons/flags/'.$locale.'.png')); ?>" class="flag" style="margin-right:6px;"><span class="language"><?php echo e(\App\Language::where('code', $locale)->first()->name); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php $__currentLoopData = \App\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dropdown-item <?php if($locale == $language): ?> active <?php endif; ?>">
                                <a href="#" data-flag="<?php echo e($language->code); ?>"><img src="<?php echo e(asset('frontend/images/icons/flags/'.$language->code.'.png')); ?>" class="flag" style="margin-right:6px;"><span class="language"><?php echo e($language->name); ?></span></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                        <i class="demo-pli-bell"></i>
                        <?php if($orders > 0 || $sellers > 0): ?>
                            <span class="badge badge-header badge-danger"></span>
                        <?php endif; ?>
                    </a>

                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="opacity: 1;">
                        <div class="nano scrollable has-scrollbar" style="height: 265px;">
                            <div class="nano-content" tabindex="0" style="right: -17px;">
                                <ul class="head-list">
                                    <?php if($orders > 0): ?>
                                        <li>
                                            <a class="media" href="<?php echo e(route('orders.index.admin')); ?>" style="position:relative">
                                                <span class="badge badge-header badge-info" style="right:auto;left:3px;"></span>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold"><?php echo e($orders); ?> new order(s)</p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($sellers > 0): ?>
                                        <li>
                                            <a class="media" href="<?php echo e(route('sellers.index')); ?>">
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold"><?php echo e(__('New verification request(s)')); ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="nano-pane" style="">
                                <div class="nano-slider" style="height: 170px; transform: translate(0px, 0px);"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">

                            <i class="demo-pli-male"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="<?php echo e(route('profile.index')); ?>"><i class="demo-pli-male icon-lg icon-fw"></i> <?php echo e(__('Profile')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> <?php echo e(__('Logout')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
