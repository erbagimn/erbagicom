<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php if(Auth::user()->user_type == 'seller'): ?>
                        <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php elseif(Auth::user()->user_type == 'customer'): ?>
                        <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 d-flex align-items-center">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('My Wallet')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('wallet.index')); ?>"><?php echo e(__('My Wallet')); ?></a></li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-dollar"></i>
                                        <span class="d-block title"><?php echo e(single_price(Auth::user()->balance)); ?></span>
                                        <span class="d-block sub-title">in your wallet</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <button class="btn btn-base-1" onclick="show_wallet_modal()"><?php echo e(__('Recharge Wallet')); ?></button>
                            </div>
                        </div>

                        <div class="card no-border mt-4">
                            <table class="table table-sm table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment Method')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr>
                                           <td><?php echo e($key+1); ?></td>
                                           <td><?php echo e(date('d-m-Y', strtotime($wallet->created_at))); ?></td>
                                           <td><?php echo e(single_price($wallet->amount)); ?></td>
                                           <td><?php echo e(ucfirst(str_replace('_', ' ', $wallet ->payment_method))); ?></td>
                                       </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($wallets->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(__('Recharge Wallet')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="<?php echo e(route('wallet.recharge')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Amount')); ?> <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" class="form-control mb-3" name="amount" placeholder="Amount" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Payment Method')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option">
                                        <option value="paypal"><?php echo e(__('Paypal')); ?></option>
                                        <option value="stripe"><?php echo e(__('Stripe')); ?></option>
                                        <option value="sslcommerz"><?php echo e(__('SSLCommerz')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                        <button type="submit" class="btn btn-base-1"><?php echo e(__('Confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_wallet_modal(){
            $('#wallet_modal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>