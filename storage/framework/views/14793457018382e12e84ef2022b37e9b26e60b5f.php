
<section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('sellerpolicy')); ?>">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5"><?php echo e(__('Kebijakan Komunitas')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('returnpolicy')); ?>">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5"><?php echo e(__('Kebijakan Erbagi.com')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('supportpolicy')); ?>">
                        <i class="la la-support"></i>
                        <h4 class="heading-5"><?php echo e(__('Kebijakan Dukungan / Support')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('profile')); ?>">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5"><?php echo e(__('Profil Saya')); ?></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <?php
                    $generalsetting = \App\GeneralSetting::first();
                ?>
                <div class="col-lg-5 col-xl-4 text-center text-md-left">
                    <div class="col">
                        <a href="<?php echo e(route('home')); ?>" class="d-block">
							<!--
                            <?php if($generalsetting->logo != null): ?>
                                <img src="<?php echo e(asset($generalsetting->logo)); ?>" class="" height="44">
                            <?php else: ?>
                                <img src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" class="" height="44">
                            <?php endif; ?>-->
							 <strong>ERBAGI.COM</strong>
                        </a>
                        <p class="mt-3"><?php echo e($generalsetting->description); ?></p>
                        <div class="d-inline-block d-md-block">
                            <form class="form-inline" method="POST" action="<?php echo e(route('subscribers.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="<?php echo e(__('Alamat Emai Anda')); ?>" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-base-1 btn-icon-left">
                                    <?php echo e(__('Subscribe')); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-xl-1 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            <?php echo e(__('Informasi Kontak')); ?>

                        </h4>
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-5"><?php echo e(__('Alamat')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->address); ?></span>
                            </li>
                            <li>
                               <span class="d-block opacity-5"><?php echo e(__('Telp')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->phone); ?></span>
                            </li>
                            <li>
                               <span class="d-block opacity-5"><?php echo e(__('Email')); ?>:</span>
                               <span class="d-block">
                                   <a href="mailto:<?php echo e($generalsetting->email); ?>"><?php echo e($generalsetting->email); ?></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            <?php echo e(__('Link Eksternal')); ?>

                        </h4>
                        <ul class="footer-links">
                            <?php $__currentLoopData = \App\Link::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($link->url); ?>" title="">
                                        <?php echo e($link->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="col text-center text-md-left">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                          <?php echo e(__('Akun Saya')); ?>

                       </h4>

                       <ul class="footer-links">
                            <?php if(Auth::check()): ?>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>" title="Logout">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(route('user.login')); ?>" title="Login">
                                        <?php echo e(__('Login')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('purchase_history.index')); ?>" title="Order History">
                                    <?php echo e(__('Riwayat Pembelian')); ?>

                                </a>
                            </li>
                            <!--<li>
                                <a href="<?php echo e(route('wishlists.index')); ?>" title="My Wishlist">
                                    <?php echo e(__('My Wishlist')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('orders.track')); ?>" title="Track Order">
                                    <?php echo e(__('Track Order')); ?>

                                </a>
                            </li>-->
							<li>
                                <a href="<?php echo e(route('wishlists.index')); ?>" title="My Wishlist">
                                    <?php echo e(__('Saldo')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('orders.track')); ?>" title="Track Order">
                                    <?php echo e(__('Komunitas')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                        <div class="col text-center text-md-left">
                            <div class="mt-4">
                                <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                    <?php echo e(__('Punya Komunitas ?')); ?>

                                </h4>
                                <a href="<?php echo e(route('community.create')); ?>" class="btn btn-base-1 btn-icon-left">
                                    <?php echo e(__('Daftar Sekarang')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3 sct-color-3">
        <div class="container">
            <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © <?php echo e(date('Y')); ?> <?php echo e($generalsetting->site_name); ?>

                            </li>
                            <li>
                                <a href="<?php echo e(route('terms')); ?>"><?php echo e(__('Terms')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(__('Privacy policy')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                        <?php if($generalsetting->facebook != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->instagram != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->instagram); ?>" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->twitter != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->youtube != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->google_plus != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->google_plus); ?>" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
                                <li>
                                    <img src="<?php echo e(asset('frontend/images/icons/cards/paypal.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
                                <li>
                                    <img src="<?php echo e(asset('frontend/images/icons/cards/stripe.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                <li>
                                    <img src="<?php echo e(asset('frontend/images/icons/cards/sslcommerz.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1): ?>
                                <li>
                                    <img src="<?php echo e(asset('frontend/images/icons/cards/cod.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
