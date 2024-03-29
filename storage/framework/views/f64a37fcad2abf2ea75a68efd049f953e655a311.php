<?php $__env->startSection('content'); ?>

<?php if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body text-center dash-widget dash-widget-left">
                <div class="dash-widget-vertical">
                    <div class="rorate">PRODUCTS</div>
                </div>
                <div class="pad-ver mar-top text-main">
                    <i class="demo-pli-data-settings icon-4x"></i>
                </div>
                <br>
                <p class="text-lg text-main">Total published products: <span class="text-bold"><?php echo e(\App\Product::where('published', 1)->get()->count()); ?></span></p>
                <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                    <p class="text-lg text-main">Total seller's products: <span class="text-bold"><?php echo e(\App\Product::where('published', 1)->where('added_by', 'seller')->get()->count()); ?></span></p>
                <?php endif; ?>
                <p class="text-lg text-main">Total admin's products: <span class="text-bold"><?php echo e(\App\Product::where('published', 1)->where('added_by', 'admin')->get()->count()); ?></span></p>
                <br>
                <a href="<?php echo e(route('products.admin')); ?>" class="btn btn-primary mar-top">Manage Products <i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-normal text-main">Total product category</p>
                        <p class="text-semibold text-3x text-main"><?php echo e(\App\Category::all()->count()); ?></p>
                        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Create Category</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-normal text-main">Total product sub sub category</p>
                        <p class="text-semibold text-3x text-main"><?php echo e(\App\SubSubCategory::all()->count()); ?></p>
                        <a href="<?php echo e(route('subsubcategories.create')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Create Sub Sub Category</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-normal text-main">Total product sub category</p>
                        <p class="text-semibold text-3x text-main"><?php echo e(\App\SubCategory::all()->count()); ?></p>
                        <a href="<?php echo e(route('subcategories.create')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Create Sub Category</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-normal text-main">Total product brand</p>
                        <p class="text-semibold text-3x text-main"><?php echo e(\App\Brand::all()->count()); ?></p>
                        <a href="<?php echo e(route('brands.create')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Create Brand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if((Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions))) && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
    <div class="row">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body text-center dash-widget dash-widget-left">
                <div class="dash-widget-vertical">
                    <div class="rorate">SELLERS</div>
                </div>
                <br>
                <p class="text-normal text-main">Total sellers</p>
                <p class="text-semibold text-3x text-main"><?php echo e(\App\Seller::all()->count()); ?></p>
                <br>
                <a href="<?php echo e(route('sellers.index')); ?>" class="btn-link">Manage Sellers <i class="fa fa-long-arrow-right"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body text-center dash-widget">
                <br>
                <p class="text-normal text-main">Total approved sellers</p>
                <p class="text-semibold text-3x text-main"><?php echo e(\App\Seller::where('verification_status', 1)->get()->count()); ?></p>
                <br>
                <a href="<?php echo e(route('sellers.index')); ?>" class="btn-link">Manage Sellers <i class="fa fa-long-arrow-right"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body text-center dash-widget">
                <br>
                <p class="text-normal text-main">Total pending sellers</p>
                <p class="text-semibold text-3x text-main"><?php echo e(\App\Seller::where('verification_status', 0)->count()); ?></p>
                <br>
                <a href="<?php echo e(route('sellers.index')); ?>" class="btn-link">Manage Sellers <i class="fa fa-long-arrow-right"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="panel">
            <!--Panel heading-->
            <div class="panel-heading">
                <h3 class="panel-title">Category wise product sale</h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__($category->name)); ?></td>
                                    <td><?php echo e(\App\Product::where('category_id', $category->id)->sum('num_of_sale')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <!--Panel heading-->
            <div class="panel-heading">
                <h3 class="panel-title">Category wise product stock</h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $products = \App\Product::where('category_id', $category->id)->get();
                                    $qty = 0;
                                    foreach ($products as $key => $product) {
                                        foreach (json_decode($product->variations) as $key => $variation) {
                                            $qty += $variation->qty;
                                        }
                                    }
                                ?>
                                <tr>
                                    <td><?php echo e(__($category->name)); ?></td>
                                    <td><?php echo e($qty); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body text-center dash-widget pad-no">
                <div class="pad-ver mar-top text-main">
                    <i class="demo-pli-data-settings icon-4x"></i>
                </div>
                <br>
                <p class="text-3x text-main bg-primary pad-ver">Frontend <strong>Setting</strong></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            Home page <br>
                            setting
                        </p>
                        <br>
                        <a href="<?php echo e(route('home_settings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            Policy page <br>
                            setting
                        </p>
                        <br>
                        <a href="<?php echo e(route('privacypolicy.index', 'privacy_policy')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            General <br>
                            setting
                        </p>
                        <br>
                        <a href="<?php echo e(route('generalsettings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            Useful link <br>
                            setting
                        </p>
                        <br>
                        <a href="<?php echo e(route('links.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="flex-row">
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Activation <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('activation.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    SMTP <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('smtp_settings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Payment method <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('payment_method.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Social media <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('social_login.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-12 flex-col-12">
        <div class="panel">
            <div class="panel-body text-center dash-widget bg-primary">
                <br>
                <br>
                <i class="demo-pli-gear icon-5x"></i>
                <br>
                <br>
                <br>
                <br>
                <p class="text-semibold text-2x text-light mar-ver">
                    Business <br>
                    setting
                </p>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Currency <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('currency.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no ">Click Here</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Seller verification <br>
                    form setting
                </p>
                <br>
                <a href="<?php echo e(route('seller_verification_form.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Language <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('languages.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no">Click Here</a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    Seller commission <br>
                    setting
                </p>
                <br>
                <a href="<?php echo e(route('business_settings.vendor_commission')); ?>" class="btn btn-primary mar-top btn-block">Click Here</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>