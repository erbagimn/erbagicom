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
                                        <?php echo e(__('Daftar Sekolah')); ?>

                                    </h2>
                                    <!--
                                    <a href="#" class="btn btn-base-1 ml-3"><?php echo e(__('Buat Event')); ?></a>
                                     -->

                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('school.lists')); ?>"><?php echo e(__('Daftar Sekolah')); ?></a></li>
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
                                            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="event-menu">
                                                        <h3 class="event-name">
                                                            <a href="#" ><?php echo e(__($sk->sc_name)); ?></a>
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <!-- Rating stars -->
                                                                <div class="rating mb-1">
                                                                   
                                                                    <p>
                                                                         <span class="mr-2"><b><?php echo e(__('Alamat')); ?> : </b></span>
                                                                        <?php if( !is_null($sk->address) ): ?>
                                                                            <strong><i>  
                                                                                <?php echo e($sk->address); ?>  
                                                                             </i></strong>

                                                                        <?php else: ?> 
                                                                            <strong><span style="color: red;">Not Set</span> </strong>    
                                                                        <?php endif; ?>
                                                                    </p>

                                                                     <p>
                                                                         <span class="mr-2"><b><?php echo e(__('NPSN')); ?> : </b></span>
                                                                        <?php if( !is_null($sk->nispn) ): ?>
                                                                            <strong><i>  
                                                                                <?php echo e($sk->nispn); ?>  
                                                                             </i></strong>

                                                                        <?php else: ?> 
                                                                            <strong><span style="color: red;">Not Set</span>  </strong> 
                                                                        <?php endif; ?>
                                                                    </p>
                                                                   
                                                                </div>

                                                            </div>
                                                            <!-- bagian panel untuk ketersediaan product -->
                                                            <div class="col-6 text-right">
                                                                <ul class="inline-links inline-links--style-1">
                                                                   
                                                                    <?php if(!is_null($sk->status)): ?>
                                                                        <li>
                                                                            <span class="badge badge-md badge-pill bg-green"><?php echo e($sk->status); ?> </span>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                </ul>
                                                             
                                                            </div>
                                                            <!-- bagian panel untuk ketersediaan product -->

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                 <a href="#">
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div>
                                                                                <div class="img">
                                                                                        <img src="<?php echo e(asset($sk->sc_logo)); ?>" class="img-fluid">
                                                                                </div>
                                                                        </div>       
                                                                    </div>
                                                                </a>

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
                                <?php echo e($schools->links()); ?>

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
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>