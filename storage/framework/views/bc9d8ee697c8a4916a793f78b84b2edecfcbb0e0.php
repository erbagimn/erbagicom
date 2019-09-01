<?php $__env->startSection('content'); ?>

    <div id="page-content">

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                   
                    <div class="col-lg-8">
                        <p><strong>*) Wajib untuk mengisi Form Donasi dibawah ini, sebelum melakukan proses submit donasi.</strong></p>    
                        <form class="form-default" data-toggle="validator" action="<?php echo e(route('community_event.submit_donasi')); ?>" role="form" method="POST">
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
                                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>" />
                                                    <input type="hidden" name="event_id" value="<?php echo e($event->id_event); ?>" />
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
                                                    <label class="control-label"><?php echo e(__('Nominal Didonasikan')); ?></label>
                                                    <input type="text" class="form-control" name="nominal_donasi" value="" placeholder="Masukkan Nominal Donasi Anda (Rp.)" required>
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('No. Whatsapp')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e($user->phone); ?>" name="phone" placeholder="Nomor Whatsapp Aktif Anda." required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="donasi_btn" value="logged">
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
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Submit Donasi')); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                      
                        <div class="card sticky-top">
                            <div class="card-title">

                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="heading heading-3 strong-400 mb-0">
                                            <span>Nama Kegiatan :</span>
                                        </h3>
                                    </div>

                                </div>
                                <br>  

                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="heading heading-4 strong-200 mb-0">
                                            <span><?php echo e($event->nama_event); ?></span>
                                        </h3>
                                    </div>

                                </div>
                                <br>    
                                <div class="row">  
                                     <div class="col-6">
                                        <span class="badge badge-md badge-success" style="font-size: 15px;">Dana Dibutuhkan :&nbsp;<?php echo e(rupiah($event->event_dana)); ?></span>
                                    </div>  
                                </div>    
                            </div>

                            <div class="card-body">
                                <table class="table-cart table-cart-review">
                                    <thead>
                                        <tr>
                                            <th class="product-name"><i class="fa fa-users"></i>&nbsp;<?php echo e(__('Jumlah Pendonasi')); ?></th>
                                            <th class="product-total text-right"><i class="fa fa-money"></i>&nbsp;<?php echo e(__('Terkumpul')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $subtotal = 0;
                                            
                                            /* jumlah total pendonasi */
                                            $tp = DB::table('donasi_events')->where('id_event', $event->id_event)->select('id_user')->get();
                                            $total_pendonasi = count($tp);

                                            /* jumlah terkumpul */    
                                            $donasi_terkumpul = DB::table('donasi_events')->where('id_event', $event->id_event)
                                                                            ->select(DB::raw('SUM(nominal_donasi) as donasi_terkumpul'))
                                                                            ->pluck('donasi_terkumpul')->first();

                                            /* sisa yang dibutuhkan */    
                                            $sisa_dibutuhkan = $event->event_dana - $donasi_terkumpul;                         
                                        ?>
                                         
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <strong class="product-quantity"><?php echo e($total_pendonasi); ?></strong>
                                                </td>
                                                <td class="product-total text-right">
                                                    <span class="pl-4"><?php echo e(rupiah($donasi_terkumpul)); ?></span>
                                                </td>
                                            </tr>
                                       
                                    </tbody>
                                </table>


                                <table class="table-cart table-cart-review">
                                     <thead>
                                        <tr>
                                            <th class="product-name"><i class="fa fa-money"></i>&nbsp;<?php echo e(__('Sisa Yang Dibutuhkan')); ?></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?php if( $event->event_dana > $donasi_terkumpul ): ?>
                                                        <strong class="product-quantity" style="color:red;"><?php echo e(rupiah($sisa_dibutuhkan)); ?></strong>
                                                    <?php elseif( $event->event_dana == $donasi_terkumpul ): ?>
                                                        <strong class="product-quantity" style="color:green;">Tercapai</strong>
                                                    <?php elseif( $event->event_dana < $donasi_terkumpul ): ?>
                                                        <?php
                                                            $surplus = $sisa_dibutuhkan = $donasi_terkumpul - $event->event_dana; 
                                                        ?>
                                                        <strong class="product-quantity" style="color:green;">Surplus <?php echo e(rupiah($surplus)); ?></strong>    
                                                    <?php endif; ?>  

                                                </td>
                                            </tr>
                                    </tbody>   
                                </table> 
                            </div>
                        </div>
    

                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>