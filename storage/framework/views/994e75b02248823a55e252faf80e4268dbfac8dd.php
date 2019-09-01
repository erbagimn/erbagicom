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
                                        <?php echo e(__('Event Kegiatan Komunitas')); ?>

                                    </h2>
                                    <a href="<?php echo e(route('community_event.create')); ?>" class="btn btn-base-1 ml-3"><?php echo e(__('Buat Event')); ?></a>

                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('community.events')); ?>"><?php echo e(__('Daftar Event')); ?></a></li>
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
                                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="event-menu">
                                                        <h3 class="event-name">
                                                            <a href="#" ><?php echo e(__($event->nama_event)); ?></a>
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <!-- Rating stars -->
                                                                <div class="rating mb-1">
                                                                    <?php
                                                                        $total_review = 0;
                                                                        $total_review += $event->event_reviews->count();
                                                                    ?>
                                                                    <span class="rating-count">(<?php echo e($total_review); ?> <?php echo e(__('Jumlah Review')); ?>)</span>
                                                                    <p>
                                                                         <span class="mr-2"><b><?php echo e(__('Nama Komunitas')); ?> : </b></span>
                                                                        <?php if( !is_null($event->id_komunitas) AND  $event->id_komunitas > 0): ?>
                                                                            <strong><i>  
                                                                                <?php
                                                                                    $nama_komunitas = DB::table('communities')->where('id', $event->id_komunitas)->select('name')->pluck('name')->first();
                                                                                ?>  
                                                                                <?php echo e($nama_komunitas); ?>  
                                                                             </i></strong>

                                                                        <?php else: ?> 
                                                                            <strong><i> - </i></strong>    
                                                                        <?php endif; ?>
                                                                    </p>
                                                                    
                                                                </div>
                                                            </div>
                                                            <!-- bagian panel untuk ketersediaan product -->
                                                            <div class="col-6 text-right">
                                                                <ul class="inline-links inline-links--style-1">
                                                                   
                                                                    <?php if($event->is_butuh_donasi > 0): ?>
                                                                        <li>
                                                                            <span class="badge badge-md badge-pill bg-green">
                                                                               <a href="<?php echo e(route('community_event.donasi', $event->id_event)); ?>">          
                                                                            <?php echo e(__('Terima Donasi')); ?> </a></span>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                </ul>
                                                                <ul class="inline-links inline-links--style-1">
                                                                   
                                                                    <?php if($event->is_butuh_sponsor > 0): ?>
                                                                        <li>
                                                                            <span class="badge badge-md badge-pill bg-green"><?php echo e(__('Terima Sponsorship')); ?></span>
                                                                        </li>
                                                                        
                                                                    <?php endif; ?>
                                                                        
                                                                </ul><br><br>

                                                                <?php if( !empty($event->event_dana) ): ?>
                                                                    <span class="text-sm">
                                                                        <strong><?php echo e(__('Donasi Yang Diperlukan')); ?>:</strong>
                                                                    </span><br/>
                                                                    <h3 class="badge badge-lg bg-blue" style="width:250px;font-size: 18px;">
                                                                        <?php echo e(rupiah($event->event_dana)); ?>

                                                                    </h3>
                                                                <?php endif; ?>    
                                                            </div>
                                                            <!-- bagian panel untuk ketersediaan product -->

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                 <a href="#">
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div>
                                                                                <div class="img">
                                                                                        <img src="<?php echo e(asset($event->thumbnail_img)); ?>" class="img-fluid">
                                                                                </div>
                                                                        </div>       
                                                                    </div>
                                                                </a>

                                                            </div>
                                                        </div>

                                                       
                                                        <div class="row">
                                                            <div class="col-12">
                                                                 
                                                                    <?php if( !empty($event->abstrak) ): ?>

                                                                       <p style="width: 100%; white-space: pre-line; text-align: justify;">
                                                                        <h4><strong>Abstrak :</strong></h4> 
                                                                            <?php
                                                                                $abs = htmlspecialchars_decode($event->abstrak); 
                                                                                //$abstrak = preg_replace('/[\r\n]+/', "\n", $abs);
                                                                                //$abstrak = preg_replace('/[ \t]+/', ' ', $abstrak);  
                                                                                echo $abs;  
                                                                            ?>
                                                                           
                                                                       </p>
                                                                    <?php endif; ?>   
                                                                   <p style="width: 100%; white-space: pre-line;">
                                                                        <?php
                                                                            $desc = htmlspecialchars_decode($event->deskripsi); 
                                                                            $string = preg_replace('/[\r\n]+/', "\n", $desc);
                                                                            //echo preg_replace('/[ \t]+/', ' ', $string);
                                                                        ?>

                                                                        <?php echo readMoreFunction($string , route('community.events.detail', $event->id_event) ); ?>

                                                                   </p>                   
                                                                   
                                                                   
                                                               
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
                                <?php echo e($events->links()); ?>

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

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>