<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
              <?php if( isset(Auth::user()->id) ): ?>   
                <div class="col-lg-3 d-none d-lg-block">     
                         <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
                </div>
               <?php endif; ?> 

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0 d-inline-block">
                                        <?php echo e(__('Berita')); ?>

                                    </h2>
                                    <?php if( isset(Auth::user()->id) ): ?>  
                                         <a href="<?php echo e(route('community_event.create')); ?>" class="btn btn-base-1 ml-3"><?php echo e(__('Posting Berita')); ?></a>
                                    <?php endif; ?>        
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('news.lists')); ?>"><?php echo e(__('Daftar Berita')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <hr class="mt-2">
                            
                        <div class="products-box-bar p-3 bg-white">
                            <div class="container">
                                <div class="row sm-no-gutters gutters-5">
                                    <div class="col">
                                        <div class="bg-white">
                                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="event-menu">
                                                        <h3 class="event-name">
                                                            <a href="<?php echo e($br->link); ?>" target="_blank"><?php echo e(__($br->title)); ?></a>
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <!-- Rating stars -->
                                                                <div class="rating mb-1">
                                                                   
                                                                    <p>
                                                                        <span class="mr-2"><b><?php echo e(__('Sumber')); ?> : </b></span>
                                                                       
                                                                        <strong><?php echo e($br->slug); ?></strong>

                                                                    </p>
                                                                    
                                                                </div>
                                                            </div>

                                                            <!-- bagian panel untuk ketersediaan product -->
                                                            <div class="col-6 text-right">
                                                                
                                                                <?php if( !empty($br->submit_by) ): ?>
                                                                    <span class="text-sm">
                                                                        <strong><?php echo e(__('Diposting Oleh ')); ?>:</strong>
                                                                    </span><br/>
                                                                    <span class="badge badge-sm badge-pill bg-red" style="font-size: 12px;">
                                                                        <?php
                                                                            $pemosting = DB::table('users')->where('id', $br->submit_by)->select('name')->pluck('name')->first();
                                                                        ?> 
                                                                        <?php echo e($pemosting); ?>

                                                                    </span>
                                                                <?php endif; ?>    
                                                            </div>
                                                            <!-- bagian panel untuk ketersediaan product -->

                                                        </div>
                                                         <hr class="mt-2">
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                 <a href="#">
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div>
                                                                                <div class="img">
                                                                                        <img src="<?php echo e($br->image); ?>" class="img-fluid">
                                                                                </div>
                                                                        </div>       
                                                                    </div>
                                                                </a>

                                                            </div>
                                                        </div>    
                                                        <br/>    
                                                        <div class="row">
                                                            <div class="col-12">
                                                                 <a class="btn btn-sm btn-success" href="<?php echo e($br->link); ?>" target="_blank">Lihat Berita</a>
                                                            </div>
                                                        </div>    
                                                       
                                                    </div>
                                                    <hr class="mt-2">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($news->links()); ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>