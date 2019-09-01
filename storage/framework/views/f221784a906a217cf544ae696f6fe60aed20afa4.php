<?php $__env->startSection('content'); ?>

    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited">
                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon mb-0">
                                <i class="icon-hotel-restaurant-105"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(__('Pesanan')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="icon-finance-067"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(__('Informasi')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="icon-finance-059"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. <?php echo e(__('Pembayaran')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form class="form-default" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <?php if(Auth::check()): ?>
                                    <?php
                                        $user = Auth::user();
                                    ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Nama')); ?></label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Email')); ?></label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Alamat')); ?></label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Negara')); ?></label>
                                                    <select class="form-control selectpicker" data-live-search="true" name="country">
                                                        <?php $__currentLoopData = \App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->name); ?>" selected><?php echo e($country->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Kota')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e($user->city); ?>" name="city" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Kodepos')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e($user->postal_code); ?>" name="postal_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('No. WA')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e($user->phone); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="logged">
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Nama')); ?></label>
                                                    <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Nama')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Email')); ?></label>
                                                    <input type="text" class="form-control" name="email" placeholder="<?php echo e(__('Email')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Alamat')); ?></label>
                                                    <input type="text" class="form-control" name="address" placeholder="<?php echo e(__('Alamat')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Negara')); ?></label>
                                                    <select class="form-control custome-control" data-live-search="true" name="country">
                                                        <?php $__currentLoopData = \App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->name); ?>" selected><?php echo e($country->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Kota')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(__('Kota')); ?>" name="city" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Kodepos')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(__('Kodepos')); ?>" name="postal_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('No. WA')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(__('No. WA')); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="row align-items-center pt-4">
                                <div class="col-6">
                                    <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        <?php echo e(__('Kembali ke Beranda')); ?>

                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Lanjut Ke Pembayaran')); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>