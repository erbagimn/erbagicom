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
                                        <?php echo e(__('Riwayat Donasi')); ?>

                                    </h2>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('riwayat.donasi')); ?>"><?php echo e(__('Riwayat Donasi Pengguna')); ?></a></li>
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
                                            <table class="table-cart table-cart-review">
                                            <thead>
                                                <tr>
                                                    <th class="product-name"><i class="fa fa-calendar"></i>&nbsp;<?php echo e(__('Tanggal Transaksi')); ?></th>
                                                    <th class="product-name"><i class="fa fa-building-o"></i>&nbsp;<?php echo e(__('Tujuan Donasi')); ?></th>
                                                    <th class="product-total text-right"><i class="fa fa-money"></i>&nbsp;<?php echo e(__('Nominal')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php $__currentLoopData = $donasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$dona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                <p><?php echo e($dona->created_at); ?></p>
                                                            </td>
                                                            <td class="product-name">
                                                                <?php
                                                                    $getTujuan = DB::table('events')
                                                                            ->join('communities', 'communities.id', '=', 'events.id_komunitas')
                                                                            ->where('events.id_event', $dona->id_event)
                                                                            ->select('events.nama_event', 'communities.name') 
                                                                            ->first();
                                                                    /* tentukan nama komunitas dan nama event */  
                                                                    $nama_event= $getTujuan->nama_event;
                                                                    $nama_komunitas = $getTujuan->name;

                                                                ?>
                                                                <p>
                                                                    <?php echo e($nama_event); ?> <br>
                                                                    (<?php echo e($nama_komunitas); ?>)
                                                                </p>
                                                            </td>
                                                            <td class="product-total text-right">
                                                                <span class="pl-4"><?php echo e(rupiah($dona->nominal_donasi)); ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            </table>        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($donasi->links()); ?>

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