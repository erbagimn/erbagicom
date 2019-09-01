<?php $__env->startSection('content'); ?>
    <!-- <section>
        <img src="https://via.placeholder.com/2000x300.jpg" alt="" class="img-fluid">
    </section> -->
	<!-- Khusus bagian perhitungan dan statistik -->
    <?php
        $total = 0;
        $rating = 0;
        foreach ($comunity->user->products as $key => $seller_product) {
            $total += $seller_product->reviews->count();
            $rating += $seller_product->reviews->sum('rating');
        }
    ?>

    <section class="gry-bg pt-4 ">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-md-6">
                    <div class="d-flex">
                        <img height="70" src="<?php echo e(asset($comunity->logo)); ?>" alt="Logo Komunitas Erbagi">
                        <div class="pl-4">
                            <h3 class="strong-700 heading-4 mb-0"><?php echo e($comunity->name); ?>

                                <?php if($comunity->user->seller->verification_status == 1): ?>
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                <?php else: ?>
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                <?php endif; ?>
                            </h3>
                            <div class="star-rating star-rating-sm mb-1">
                                <?php if($total > 0): ?>
                                    <?php echo e(renderStarRating($rating/$total)); ?>

                                <?php else: ?>
                                    <?php echo e(renderStarRating(0)); ?>

                                <?php endif; ?>
                            </div>
                            <div class="location alpha-6"><?php echo e($comunity->address); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="text-md-right mt-4 mt-md-0 social-nav model-2">
                        <?php if($comunity->facebook != null): ?>
                            <li>
                                <a href="<?php echo e($comunity->facebook); ?>" class="facebook social_a" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($comunity->twitter == null): ?>
                            <li>
                                <a href="<?php echo e($comunity->twitter); ?>" class="twitter social_a" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($comunity->instagram != null): ?>
                            <li>
                                <a href="<?php echo e($comunity->instagram); ?>" class="instagram social_a" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($comunity->google == null): ?>
                            <li>
                                <a href="<?php echo e($comunity->google); ?>" class="google-plus social_a" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($comunity->youtube != null): ?>
                            <li>
                                <a href="<?php echo e($comunity->youtube); ?>" class="youtube social_a" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>
	
    <section class="bg-white">
        <div class="container">
            <div class="row sticky-top mt-4">
                <div class="col">
                    <div class="seller-shop-menu">
                        <ul class="inline-links">
                            <li <?php if(!isset($type)): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('community.visit', $comunity->slug)); ?>"><?php echo e(__('Beranda Komunitas')); ?></a></li>
                            <!--    
                            <li <?php if(isset($type) && $type == 'top_selling'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('community.visit.type', ['slug'=>$comunity->slug, 'type'=>'top_selling'])); ?>"><?php echo e(__('Penjualan Terlaris')); ?></a></li>
                            <li <?php if(isset($type) && $type == 'all_products'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('community.visit.type', ['slug'=>$comunity->slug, 'type'=>'all_products'])); ?>"><?php echo e(__('Semua Produk')); ?></a></li>-->
							<li <?php if(isset($type) && $type == 'news'): ?> class="active" <?php endif; ?>>
                                <a href=""><?php echo e(__('Berita')); ?></a></li>
                            <li <?php if(isset($type) && $type == 'kegiatan'): ?> class="active" <?php endif; ?>>
                                <a href=""><?php echo e(__('Kalender Kegiatan')); ?></a></li>    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if(!isset($type)): ?>
        <section class="py-4">
            <div class="container">
                <div class="home-slide">
                    <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true">
                        <?php if($comunity->sliders != null): ?>
                            <?php $__currentLoopData = json_decode($comunity->sliders); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="">
                                    <img class="d-block w-100" src="<?php echo e(asset($slide)); ?>" alt="<?php echo e($key); ?> slide" style="max-height:300px;">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <section class="<?php if(!isset($type)): ?> gry-bg <?php endif; ?> pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="seller-info-box mb-3">
                        <div class="sold-by position-relative">
                            <?php if($comunity->user->seller->verification_status == 1): ?>
                                <div class="position-absolute medal-badge">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2">
                                        <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                        <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                        <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                        <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                        60,116.6 124.1,116.6 "/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <div class="title"><?php echo e(__('Info Komunitas')); ?></div>
                            <a href="" class="name d-block"><?php echo e($comunity->name); ?></a>
                            <div class="location"><?php echo e($comunity->address); ?></div>
							
                            <div class="rating text-center d-block">
                                <span class="star-rating star-rating-sm d-block">
                                    <?php if($total > 0): ?>
                                        <?php echo e(renderStarRating($rating/$total)); ?>

                                    <?php else: ?>
                                        <?php echo e(renderStarRating(0)); ?>

                                    <?php endif; ?>
                                </span>
                                <span class="rating-count d-block ml-0">(<?php echo e($total); ?> <?php echo e(__('Review Pengguna')); ?>)</span>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <ul class="social-media social-media--style-1-v4 text-center">
                                    <li>
                                        <a href="<?php echo e($comunity->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <!--<li>
                                        <a href="<?php echo e($comunity->google); ?>" class="google" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e($comunity->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="<?php echo e($comunity->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="seller-category-box bg-white sidebar-box mb-3">
                        <div class="box-title" style="color:#ffffff;background-color:#74dff7;">
                            <?php echo e(__('Kategori yang Dijual')); ?>

                        </div>
                        <div class="box-content">
                            <div class="category-accordion">
                                <?php
                                    $brands = array();
                                ?>
                                <?php $__currentLoopData = \App\Product::where('user_id', $comunity->user->id)->select('category_id')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-category">
                                        <button class="btn w-100 category-name collapsed" type="button" data-toggle="collapse" data-target="#category-<?php echo e($key); ?>" aria-expanded="false">
                                        <?php echo e(App\Category::findOrFail($category->category_id)->name); ?>

                                        </button>

                                        <div id="category-<?php echo e($key); ?>" class="collapse">
                                            <?php $__currentLoopData = \App\Product::where('user_id', $comunity->user->id)->where('category_id', $category->category_id)->select('subcategory_id')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single-sub-category">
                                                    <button class="btn w-100 sub-category-name" type="button" data-toggle="collapse" data-target="#subCategory-<?php echo e($subcategory->subcategory_id); ?>" aria-expanded="false">
                                                    <?php echo e(App\SubCategory::findOrFail($subcategory->subcategory_id)->name); ?>

                                                    </button>
                                                    <div id="subCategory-<?php echo e($subcategory->subcategory_id); ?>" class="collapse">
                                                        <ul class="sub-sub-category-list">
                                                            <?php $__currentLoopData = \App\Product::where('user_id', $comunity->user->id)->where('category_id',            $category->category_id)->where('subcategory_id', $subcategory->subcategory_id)->select('subsubcategory_id')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $subsubcategory = App\SubSubCategory::findOrFail($subsubcategory->subsubcategory_id);
                                                                    foreach (json_decode($subsubcategory->brands) as $brand) {
                                                                        if(!in_array($brand, $brands)){
                                                                            array_push($brands, $brand);
                                                                        }
                                                                    }
                                                                ?>
                                                                <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->id)); ?>"><?php echo e(__($subsubcategory->name)); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
					
                    <div class="seller-top-products-box bg-white sidebar-box mb-4">
                        <div class="box-title" style="color:#ffffff;background-color:#74dff7;">
                            <?php echo e(__('Provider')); ?>

                        </div>
                        <div class="box-content">
                            <div class="seller-brands">
                        		<ul class="seller-brand-list">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="brand-item">
                                            <a href="<?php echo e(route('products.brand', $brand_id)); ?>"><img src="<?php echo e(asset(\App\Brand::find($brand_id)->logo)); ?>" class="img-fluid"></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        		</ul>
                        	</div>
                        </div>
                    </div>
					
					<!-- Panel POIN -->
					 <div class="seller-top-products-box bg-white sidebar-box mb-4">
                        <div class="box-title" style="color:#ffffff;background-color:#74dff7;">
                            <?php echo e(__('Total Point')); ?>

                        </div>
                        <div class="box-content">
                            <div class="rating text-center d-block">
								<h2><strong>100 P</strong></h2>
							</div>
                        </div>
                        <div class="widget-seller-btn pt-4">
                            <?php
                                //$community_id = isset(Auth::user()->id_komunitas) ? Auth::user()->id_komunitas : 0;
                            ?>    

                            <?php if( isset(Auth::user()->id_komunitas) && Auth::user()->id_komunitas != $comunity->id): ?>
                                <a href="<?php echo e(route('community.join', $comunity->id)); ?>" class="btn btn-anim-primary w-100"><i class="fa fa-handshake-o"></i> 
                                        <?php echo e(__('Mau Bergabung')); ?></a>
                            <?php else: ?> 
                                 <a href="#" class="btn btn-success w-100"><i class="fa fa-check-circle"></i> 
                                        <?php echo e(__('Anda Member Komunitas ini')); ?></a>
                            <?php endif; ?>            

                        </div>
                            
                    </div>
					    
                </div>

                <!-- Start Coloumn Content -->
                <div class="col-xl-9">
                    <h4 class="heading-5 strong-600 border-bottom pb-3 mb-4">
                        <?php if(!isset($type)): ?>
                            <?php echo e(__('Beranda')); ?>

                        <?php elseif($type == 'top_selling'): ?>
                            <?php echo e(__('Terlaris')); ?>

                        <?php elseif($type == 'all_products'): ?>
                            <?php echo e(__('Semua Produk')); ?>

                        <?php endif; ?>
                    </h4>
					
                    <div class="product-list row gutters-5 sm-no-gutters">
                        <?php
                            if (!isset($type)){
                                $products = \App\Product::where('user_id', $comunity->user->id)->where('published', 1)->orderBy('created_at', 'desc')->paginate(12);
                            }
                            /*
                            elseif ($type == 'top_selling'){
                                $products = \App\Product::where('user_id', $comunity->user->id)->where('published', 1)->orderBy('num_of_sale', 'desc')->paginate(12);
                            }
                            elseif ($type == 'all_products'){
                                $products = \App\Product::where('user_id', $comunity->user->id)->where('published', 1)->paginate(12);
                            }
                            */
                        ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="card product-box-1 mb-3">
                                    <div class="card-image">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');" tabindex="0">
                                        </a>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="px-3 py-2">
                                            <h2 class="title text-truncate-2 mb-0">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                            </h2>
                                        </div>
                                        <div class="price-bar row no-gutters">
                                            <div class="price col-7">
                                                <?php if(home_price($product->id) != home_discounted_price($product->id)): ?>
                                                    <del class="old-product-price strong-600"><?php echo e(home_base_price($product->id)); ?></del>
                                                    <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                <?php else: ?>
                                                    <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-5">
                                                <div class="star-rating star-rating-sm float-right">
                                                    <?php echo e(renderStarRating($product->rating)); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-add d-flex">
                                                <button class="btn add-wishlist border-right" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)">
                                                    <i class="la la-heart-o"></i>
                                                </button>
                                                <button class="btn add-compare border-right" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)">
                                                    <i class="la la-refresh"></i>
                                                </button>
                                                <button type="button" class="btn btn-block btn-icon-left" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
                                                    <span class="d-none d-sm-inline-block"><?php echo e(__('Klik untuk proses')); ?></span><i class="la la-shopping-cart ml-2"></i>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="products-pagination my-5">
                                <nav aria-label="Center aligned pagination">
                                    <ul class="pagination justify-content-center">
                                        <?php echo e($products->links()); ?>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- End Coloumn Content -->

            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>