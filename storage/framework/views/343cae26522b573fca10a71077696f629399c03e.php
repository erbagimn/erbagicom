<?php $__env->startSection('content'); ?>
    <section class="home-banner-area mb-4">
        <div class="container">
            <div class="row no-gutters position-relative">
             
                <div class="col-lg-10 order-1 order-lg-0">
                    <div class="home-slide">
                        <div class="home-slide">
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                                <?php
                                    $index=0;
                                ?>
                                <?php $__currentLoopData = \App\Slider::where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $index++;
                                    ?>
                                    <div class="" style="height:405px;">
                                        <img class="d-block w-100 h-100" src="<?php echo e(asset($slider->photo)); ?>" alt="Slider Image">
                                    </div>
                                   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                   
                </div>

                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="flash-deal-box bg-white h-100">
                            <div class="title text-center p-2 gry-bg">
                                <h3 class="heading-6 mb-0">
                                    <?php echo e(__('Komunitas')); ?>

                                    <span class="badge badge-danger"><?php echo e(__('Trending')); ?></span>
                                </h3>
                            </div>
                            <div class="flash-content c-scrollbar c-height">
                                
                                        <a href="#" class="d-block flash-deal-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="img" style="background-image:url('<?php echo e(asset('uploads/communities/logo/community-banner.png')); ?>')">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="price">
                                                        <span class="d-block"><small>Komunitas A</small></span>
                                                    </div>
                                                     <span class="badge badge-success" style="margin-left:12px;"><?php echo e(__('10 View')); ?></span>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="d-block flash-deal-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="img" style="background-image:url('<?php echo e(asset('uploads/communities/logo/community-banner.png')); ?>')">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="price">
                                                        <span class="d-block"><small>Komunitas B</small></span>
                                                    </div>
                                                    
                                                     <span class="badge badge-success" style="margin-left:12px;"><?php echo e(__('7 View')); ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
    </section>


    <!-- Banner Menu Utama-->
     <section class="mb-4">
        <div class="container">
            <div class="row">

                        <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('search')); ?>" class="d-block">
                                       <i class="fa fa-mobile fa-4x"></i>
                                        <span class="d-block title">Produk Pulsa</span>
                                        <span class="d-block sub-title"><strong>Selengkapnya</strong></span>
                                    </a>
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('community.events')); ?>" class="d-block">
                                        <i class="fa fa-handshake-o fa-4x"></i>
                                        <span class="d-block title">Donasi</span>
                                        <span class="d-block sub-title"><strong>Selengkapnya</strong></span>
                                    </a>
                                </div>
                        </div>
                            
                        <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('community.lists')); ?>" class="d-block">
                                       <i class="fa fa-users fa-4x"></i>
                                        <span class="d-block title">Komunitas</span>
                                         <span class="d-block sub-title"><strong>Selengkapnya</strong></span>
                                    </a>
                                </div>
                        </div>  

                        <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('calendar.events')); ?>" class="d-block">
                                       <i class="fa fa-calendar fa-4x"></i>
                                        <span class="d-block title">Kalender Kegiatan</span>
                                        <span class="d-block sub-title"><strong>Selengkapnya</strong></span>
                                    </a>
                                </div>
                        </div>

                
            </div>
         </div>
     </section>           
    <!-- End Banner Utama -->


    <section id="blog" class="mb-4">
        <div class="container">
          <div class="p-4 bg-white shadow-sm">  
            <div class="row ">
                <!-- Title -->
                <div class="col-sm-12">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Event Komunitas')); ?></span>
                        </h3>
                        <ul class="inline-links float-right">
                            <li><a href="<?php echo e(route('community.events')); ?>" class="active"><?php echo e(__('Semua Event')); ?></a></li>
                        </ul>
                    </div>
                </div><!-- Title -->
            </div><!-- Row -->
            
            <div class="row">
                <!-- Item Begins -->
                <?php $__currentLoopData = \App\Event::where('id_komunitas', '>=', 0)->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4 product-card-2 card">

                    <!-- Blog Grid Wrapper -->
                    <div class="blog-wrap">
                        <div class="blog-img-wrap">
                            <a href="#">
                                <img src="<?php echo e(asset($event->thumbnail_img)); ?>" class="img-fluid" alt="Blog" style="height: 180px;width: 100%;">
                                <h6 class="post-type">&nbsp;<i class="fa fa-image"></i>&nbsp;</h6>
                            </a>
                                &nbsp;    
                                <span class="badge badge-md badge-success" style="font-size: 12px; float: left;">
                                        Dana Diperlukan :&nbsp;<strong><?php echo e(rupiah($event->event_dana)); ?></strong>
                                </span>
                               
                        </div><br>
                        <!-- Blog Detail Wrapper -->
                        <div class="blog-details">
                            <h6><strong><a href="<?php echo e(route('community.events.detail', $event->id_event)); ?>"><?php echo e(__($event->nama_event)); ?></a></strong></h6>
                            <ul class="blog-meta">
                                <div class="text-capitalize">
                                    <p>
                                       <i class="fa fa-map-marker"></i> Lokasi : <b><?php echo e($event->lokasi); ?></b><br>
                                       <i class="fa fa-calendar"></i> Tanggal : <b><?php echo e(tanggal($event->tgl_mulai)); ?> s/d <?php echo e(tanggal($event->tgl_akhir)); ?></b><br>
                                      <i class="fa fa-clock-o"></i> Pukul : <b><?php echo e($event->jam_mulai); ?> s/d <?php echo e($event->jam_selesai); ?></b>
                                    </p>
                                </div>
                                <!-- Blog Description -->
                            </ul><!-- Blog Meta Details -->
                            
                             <!--<a class="btn btn-sm btn-success" href="#">Detail</a>-->
                        </div><!-- Blog Detail Wrapper -->
                    </div><!-- Blog Wrapper -->
                </div><!-- Column -->

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- Row -->
          </div>  
        </div><!-- Container -->
    </section><!-- Section Blog -->


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
                            <span class="mr-4"><?php echo e(__('Komunitas Kami')); ?></span>
                        </h3>
                        <ul class="inline-links float-right">
                            <li><a href="<?php echo e(route('community.lists')); ?>" class="active"><?php echo e(__('Lihat Semua')); ?></a></li>
                        </ul>
                    </div>
                    <div class="caorusel-box">
                        <div class="slick-carousel" data-slick-items="3" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="2" data-slick-xs-items="1" data-slick-dots="true" data-slick-rows="2">
                            <?php
                                $count = 0;

                            ?>
                            <?php $__currentLoopData = \App\Community::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($count < 20): ?>
                                    <?php
                                        $count ++;
                                        // $seller = \App\Community::find($key);
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
                                                <a href="<?php echo e(route('shop.visit', $seller->user->community->slug)); ?>" class="d-block product-image p-3">
                                                    <img src="<?php echo e(asset($seller->user->community->logo)); ?>" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-8 border-left">
                                                <div class="p-3">
                                                    <h2 class="product-title mb-0 p-0 text-truncate">
                                                        <a href="<?php echo e(route('community.visit', $seller->user->community->slug)); ?>"><?php echo e(__($seller->name)); ?></a>
                                                    </h2>
                                                    <p>
                                                        <small><?php echo e($seller->user->community->address); ?></small>
                                                    </p>
                                                    <div class="star-rating star-rating-sm mb-2">
                                                        <?php if($total > 0): ?>
                                                            <?php echo e(renderStarRating($rating/$total)); ?>

                                                        <?php else: ?>
                                                            <?php echo e(renderStarRating(0)); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="">
                                                        <a href="<?php echo e(route('community.visit', $seller->user->community->slug)); ?>" class="icon-anim">
                                                            <?php echo e(__('Lihat Info')); ?> <i class="la la-angle-right text-sm"></i>
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

    <!-- Section Cari Pulsa -->
    <section class="mb-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-12">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Cari Pulsa')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('brands.all')); ?>" class="active"><?php echo e(__('Lihat Semua')); ?></a>
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
    <!-- End Cari Pulsa -->

    <section class="mb-4">
        <div class="container">
            <div class="p-4 bg-white shadow-sm">
                <div class="section-title-1 clearfix">
                    <h3 class="heading-5 strong-700 mb-0 float-left">
                        <span class="mr-4"><?php echo e(__('Tawaran Menarik')); ?></span>
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

<!--   
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
-->	


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
       $(document).ready(function(){
          
          $('.card_more_button').on('click', function() {
              $(this).closest('.card').toggleClass('card_full');     
              $(this).siblings('.card_more_content').slideToggle('fast');
              $(this).toggleClass('flipY');
            }
           );

       });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>