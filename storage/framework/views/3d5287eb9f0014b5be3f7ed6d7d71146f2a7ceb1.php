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
                                        <?php echo e(__('Support Ticket')); ?>

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
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <button class="btn btn-base-1" onclick="show_ticket_modal()"><?php echo e(__('Send Your Ticket')); ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="card no-border mt-4">
                            <table class="table table-sm table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Sending Date')); ?></th>
                                        <th><?php echo e(__('Subject')); ?></th>
                                        <th><?php echo e(__('Options')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr>
                                           <td><?php echo e($key+1); ?></td>
                                           <td><?php echo e($ticket->created_at); ?></td>
                                           <td><?php echo e($ticket->subject); ?></td>
                                           <td>
                                           <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton-<?php echo e($key); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-<?php echo e($key); ?>">
                                                    <a href="<?php echo e(route('support_ticket.show', encrypt($ticket->id))); ?>" class="dropdown-item"><?php echo e(__('View')); ?></a>
                                                </div>
                                            </div>
                                           </td>
                                       </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                            <?php echo e($tickets->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>


</section>

    <div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(__('Send Ticket')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="<?php echo e(route('support_ticket.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control mb-3" name="subject" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="editor" name="details"></textarea>
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
        function show_ticket_modal(){
            $('#ticket_modal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>