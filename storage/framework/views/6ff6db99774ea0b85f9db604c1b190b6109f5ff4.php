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
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0 d-inline-block">
                                        <?php echo e(__('Support Ticket Details')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('support_ticket.index')); ?>"><?php echo e(__('Support Ticket')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body">
                            <div class="form-box-content mt-3">
                                <label class="col-sm-2 control-label"><strong><?php echo e(__('Subject')); ?></strong></label>
                                <div class="col-sm-9">
                                    <p class="form-control mb-3"><?php echo e($ticket->subject); ?></p>
                                </div>
                            </div>
                            <div class="form-box-content">
                                <label class="col-sm-2 control-label" for="subject"><strong><?php echo e(__('Deatils')); ?></strong></label>
                                <div class="col-sm-9">
                                <p class="form-control"><?php echo e($ticket->details); ?></p>
                                </div>
                            </div>
                            <div class="form-box-content">
                                <label class="col-sm-2 control-label" for="subject"><strong><?php echo e(__('Leave A Reply')); ?></strong></label>
                                <div class="col-sm-9">
                                    <form class="form-horizontal" action="<?php echo e(route('support_ticket.seller_store')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e($ticket->user_id); ?>">
                                        <textarea class="editor" name="reply" required></textarea>
                                        <div class="text-right mt-3">
                                            <button class="btn btn-base-1" type="submit"><?php echo e(__('Send Reply')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="form-box-content">
                                <?php $__currentLoopData = $ticket_replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketreply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="block block-comment">
                                        <div class="block-image">
                                            <img src="<?php echo e(asset($ticketreply->user->avatar_original)); ?>" class="rounded-circle">
                                        </div>
                                        <div class="block-body">
                                            <div class="block-body-inner">
                                                <div class="row no-gutters">
                                                    <div class="col">
                                                        <h3 class="heading heading-6">
                                                            <a href="javascript:;"><?php echo e($ticketreply->user->name); ?></a>
                                                        </h3>
                                                        <span class="comment-date">
                                                            <?php echo e(date('d-m-Y', strtotime($ticketreply->created_at))); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <p class="comment-text">
                                                    <?php
                                                        echo $ticketreply->reply;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                    </div>
                </div>



            </div>
        </div>


</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>