<?php $__env->startSection('content'); ?>
    <section class="home-banner-area mb-4">
        <div class="container">
            <div class="row no-gutters position-relative">
                <div class="col-lg-3 position-static order-2 order-lg-0">
                    <div class="category-sidebar">
                        <div class="all-category d-none d-lg-block">
                            <span ><?php echo e(__('Categories')); ?></span>
                            <a href="<?php echo e(route('categories.all')); ?>">
                                <span class="d-none d-lg-inline-block"><?php echo e(__('See All')); ?> ></span>
                            </a>
                        </div>
                        <ul class="categories no-scrollbar">
                            <li class="d-lg-none">
                                <a href="<?php echo e(route('categories.all')); ?>">
                                    <img class="cat-image" src="<?php echo e(asset('frontend/images/icons/list.png')); ?>" width="30">
                                    <span class="cat-name"><?php echo e(__('All')); ?> <br> <?php echo e(__('Categories')); ?></span>
                                </a>
                            </li>
                            <?php $__currentLoopData = \App\Category::all()->take(11); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $brands = array();
                                ?>
                                <li>
                                    <a href="<?php echo e(route('products.category', $category->id)); ?>">
                                        <img class="cat-image" src="<?php echo e(asset($category->icon)); ?>" width="30">
                                        <span class="cat-name"><?php echo e(__($category->name)); ?></span>
                                    </a>
                                    <?php if(count($category->subcategories)>0): ?>
                                        <div class="sub-cat-menu c-scrollbar">
                                            <div class="sub-cat-main row no-gutters">
                                                <div class="col-9">
                                                    <div class="sub-cat-content">
                                                        <div class="sub-cat-list">
                                                            <div class="card-columns">
                                                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="card">
                                                                        <ul class="sub-cat-items">
                                                                            <li class="sub-cat-name"><a href="<?php echo e(route('products.subcategory', $subcategory->id)); ?>"><?php echo e(__($subcategory->name)); ?></a></li>
                                                                            <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    foreach (json_decode($subsubcategory->brands) as $brand) {
                                                                                        if(!in_array($brand, $brands)){
                                                                                            array_push($brands, $brand);
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->id)); ?>"><?php echo e(__($subsubcategory->name)); ?></a></li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="sub-cat-featured">
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="sub-cat-brand">
                                                        <ul class="sub-brand-list">
                                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(\App\Brand::find($brand_id) != null): ?>
                                                                    <li class="sub-brand-item">
                                                                        <a href="<?php echo e(route('products.brand', $brand_id)); ?>" ><img src="<?php echo e(asset(\App\Brand::find($brand_id)->logo)); ?>" class="img-fluid"></a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="home-slide">
                        <div class="home-slide">
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                                <?php $__currentLoopData = \App\Slider::where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="" style="height:275px;">
                                        <img class="d-block w-100 h-100" src="<?php echo e(asset($slider->photo)); ?>" alt="Slider Image">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="trending-category  d-none d-lg-block">
                        <ul>
                            <?php $__currentLoopData = \App\Category::where('featured', 1)->get()->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li <?php if($key == 0): ?> class="active" <?php endif; ?>>
                                    <div class="trend-category-single">
                                        <a href="<?php echo e(route('products.category', $category->id)); ?>" class="d-block">
                                            <div class="name"><?php echo e(__($category->name)); ?></div>
                                            <div class="img" style="background-image:url('<?php echo e(asset($category->banner)); ?>')">
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <?php
                    $flash_deal = \App\FlashDeal::where('status', 1)->first();
                ?>
                <?php if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date): ?>
                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="flash-deal-box bg-white h-100">
                            <div class="title text-center p-2 gry-bg">
                                <h3 class="heading-6 mb-0">
                                    <?php echo e(__('Flash Deal')); ?>

                                    <span class="badge badge-danger"><?php echo e(__('Hot')); ?></span>
                                </h3>
                                <div class="countdown countdown--style-1 countdown--style-1-v1" data-countdown-date="<?php echo e(date('m/d/Y', $flash_deal->end_date)); ?>" data-countdown-label="show"></div>
                            </div>
                            <div class="flash-content c-scrollbar">
                                <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product = \App\Product::find($flash_deal_product->product_id);
                                    ?>
                                    <?php if($product != null): ?>
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block flash-deal-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="img" style="background-image:url('<?php echo e(asset($product->flash_deal_img)); ?>')">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="price">
                                                        <span class="d-block"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                            <del class="d-block"><?php echo e(home_base_price($product->id)); ?></del>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="flash-deal-box bg-white h-100">
                            <div class="title text-center p-2 gry-bg">
                                <h3 class="heading-6 mb-0">
                                    <?php echo e(__('Todays Deal')); ?>

                                    <span class="badge badge-danger"><?php echo e(__('Hot')); ?></span>
                                </h3>
                            </div>
                            <div class="flash-content c-scrollbar c-height">
                                <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product != null): ?>
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block flash-deal-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="img" style="background-image:url('<?php echo e(asset($product->flash_deal_img)); ?>')">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="price">
                                                        <span class="d-block"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                            <del class="d-block"><?php echo e(home_base_price($product->id)); ?></del>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>



    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 1)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 1)->where('published', 1)->get())); ?>">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(asset($banner->photo)); ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="container">
            <div class="p-4 bg-white shadow-sm">
                <div class="section-title-1 clearfix">
                    <h3 class="heading-5 strong-700 mb-0 float-left">
                        <span class="mr-4"><?php echo e(__('Featured Products')); ?></span>
                    </h3>
                </div>
                <div class="caorusel-box">
                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                        <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-card-2 card card-product m-2 shop-cards shop-tech">
                            <div class="card-body p-0">

                                <div class="card-image">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block" style="background-image:url('<?php echo e(asset($product->featured_img)); ?>');">
                                    </a>
                                </div>

                                <div class="p-3">
                                    <div class="price-box">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>
                                    <div class="star-rating star-rating-sm mt-1">
                                        <?php echo e(renderStarRating($product->rating)); ?>

                                    </div>
                                    <h2 class="product-title p-0 text-truncate-2">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(\App\BusinessSetting::where('type', 'best_selling')->first()->value == 1): ?>
        <section class="mb-4">
            <div class="container">
                <div class="p-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Best Selling')); ?></span>
                        </h3>
                        <ul class="inline-links float-right">
                            <li><a  class="active"><?php echo e(__('Top 20')); ?></a></li>
                        </ul>
                    </div>
                    <div class="caorusel-box">
                        <div class="slick-carousel" data-slick-items="3" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="2" data-slick-xs-items="1" data-slick-dots="true" data-slick-rows="2">
                            <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-2">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block product-image h-100" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');">
                                                </a>
                                                <div class="product-btns">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                    <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <?php echo e(renderStarRating($product->rating)); ?>

                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                        <?php endif; ?>
                                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                    </div>
                                                    <div class="float-right">
                                                        <button class="add-to-cart btn" title="Add to Cart" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
                                                            <i class="la la-shopping-cart"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php $__currentLoopData = \App\HomeCategory::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $homeCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="mb-4">
            <div class="container">
                <div class="p-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e($homeCategory->category->name); ?></span>
                        </h3>
                        <ul class="inline-links float-right nav d-none d-lg-inline-block">
                            <?php $__currentLoopData = json_decode($homeCategory->subsubcategories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\SubSubCategory::find($subsubcategory) != null): ?>
                                    <li class="<?php if($key == 0) echo 'active'; ?>">
                                        <a href="#subsubcat-<?php echo e($subsubcategory); ?>" data-toggle="tab" class="d-block <?php if($key == 0) echo 'active'; ?>"><?php echo e(\App\SubSubCategory::find($subsubcategory)->name); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php $__currentLoopData = json_decode($homeCategory->subsubcategories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\App\SubSubCategory::find($subsubcategory) != null): ?>
                            <div class="tab-pane fade <?php if($key == 0) echo 'show active'; ?>" id="subsubcat-<?php echo e($subsubcategory); ?>">
                                <div class="row gutters-5 sm-no-gutters">
                                    <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('subsubcategory_id', $subsubcategory))->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                            <div class="product-box-2 bg-white alt-box my-2">
                                                <div class="position-relative overflow-hidden">
                                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block product-image h-100" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');" tabindex="0">
                                                    </a>
                                                    <div class="product-btns clearfix">
                                                        <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)" tabindex="0">
                                                            <i class="la la-heart-o"></i>
                                                        </button>
                                                        <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)" tabindex="0">
                                                            <i class="la la-refresh"></i>
                                                        </button>
                                                        <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" tabindex="0">
                                                            <i class="la la-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="p-3 border-top">
                                                    <h2 class="product-title p-0 text-truncate">
                                                        <a href="<?php echo e(route('product', $product->slug)); ?>" tabindex="0"><?php echo e(__($product->name)); ?></a>
                                                    </h2>
                                                    <div class="star-rating mb-1">
                                                        <?php echo e(renderStarRating($product->rating)); ?>

                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="price-box float-left">
                                                            <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                                <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                            <?php endif; ?>
                                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 2)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 2)->where('published', 1)->get())); ?>">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(asset($banner->photo)); ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
        <?php
            $array = array();
            foreach (\App\Seller::all() as $key => $seller) {
                if($seller->user != null && $seller->user->shop != null){
                    $total_sale = 0;
                    foreach ($seller->user->products as $key => $product) {
                        $total_sale += $product->num_of_sale;
                    }
                    $array[$seller->id] = $total_sale;
                }
            }
            asort($array);
        ?>
        <section class="mb-5">
            <div class="container">
                <div class="p-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Best Sellers')); ?></span>
                        </h3>
                        <ul class="inline-links float-right">
                            <li><a  class="active"><?php echo e(__('Top 20')); ?></a></li>
                        </ul>
                    </div>
                    <div class="caorusel-box">
                        <div class="slick-carousel" data-slick-items="3" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="2" data-slick-xs-items="1" data-slick-dots="true" data-slick-rows="2">
                            <?php
                                $count = 0;
                            ?>
                            <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($count < 20): ?>
                                    <?php
                                        $count ++;
                                        $seller = \App\Seller::find($key);
                                        $total = 0;
                                        $rating = 0;
                                        foreach ($seller->user->products as $key => $seller_product) {
                                            $total += $seller_product->reviews->count();
                                            $rating += $seller_product->reviews->sum('rating');
                                        }
                                    ?>
                                    <div class="p-2">
                                        <div class="row no-gutters box-3 align-items-center border">
                                            <div class="col-4">
                                                <a href="<?php echo e(route('shop.visit', $seller->user->shop->slug)); ?>" class="d-block product-image p-3">
                                                    <img src="<?php echo e(asset($seller->user->shop->logo)); ?>" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-8 border-left">
                                                <div class="p-3">
                                                    <h2 class="product-title mb-0 p-0 text-truncate">
                                                        <a href="<?php echo e(route('shop.visit', $seller->user->shop->slug)); ?>"><?php echo e(__($seller->user->shop->name)); ?></a>
                                                    </h2>
                                                    <div class="star-rating star-rating-sm mb-2">
                                                        <?php if($total > 0): ?>
                                                            <?php echo e(renderStarRating($rating/$total)); ?>

                                                        <?php else: ?>
                                                            <?php echo e(renderStarRating(0)); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="">
                                                        <a href="<?php echo e(route('shop.visit', $seller->user->shop->slug)); ?>" class="icon-anim">
                                                            <?php echo e(__('Visit Store')); ?> <i class="la la-angle-right text-sm"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="mb-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top 10 Catogories')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('categories.all')); ?>" class="active"><?php echo e(__('View All Catogories')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        <?php $__currentLoopData = \App\Category::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.category', $category->id)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(asset($category->banner)); ?>" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($category->name)); ?></div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top 10 Brands')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('brands.all')); ?>" class="active"><?php echo e(__('View All Brands')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = \App\Brand::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.brand', $brand->id)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(asset($brand->logo)); ?>" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($brand->name)); ?></div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>