<?php $__env->startSection('content'); ?>

<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Ticket Details')); ?></h3>
        </div>

        <div class="panel-body">
            <form class="" action="<?php echo e(route('support_ticket.admin_store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                        <label class="col-lg-2 control-label" for="subject"><strong><?php echo e(__('Subject')); ?></strong></label>
                        <div class="col-lg-9">
                            <p class="form-control"><?php echo $ticket->subject; ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label" for="subject"><strong><?php echo e(__('Details')); ?></strong></label>
                        <div class="col-lg-9">
                            <p class="form-control"><?php echo $ticket->details; ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label" for="subject"><strong><?php echo e(__('Reply')); ?></strong></label>
                        <div class="col-lg-9">
                            <textarea class="editor" name="reply"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-9">
                            <div class="panel-footer text-right">
                                <button class="btn btn-purple" type="submit"><?php echo e(__('Send Your Reply')); ?></button>
                            </div>
                        </div>
                    </div>
            </form>




            <?php $__currentLoopData = $ticket_replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketreply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="<?php echo e(asset($ticketreply->user->avatar_original)); ?>">
                    </a>
                    <div class="media-body">
                        <div class="comment-header">
                            <a href="#" class="media-heading box-inline text-main text-bold"><?php echo e($ticketreply->user->name); ?></a>
                            <p class="text-muted text-sm"><?php echo e($ticketreply->created_at); ?></p>
                        </div>
                        <p>
                            <?php
                                echo $ticketreply->reply;
                            ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="<?php echo e(asset($ticket->user->avatar_original)); ?>">
                </a>
                <div class="media-body">
                    <div class="comment-header">
                        <a href="#" class="media-heading box-inline text-main text-bold"><?php echo e($ticket->user->name); ?></a>
                        <p class="text-muted text-sm"><?php echo e($ticket->created_at); ?></p>
                    </div>
                    <p>
                        <?php
                            echo $ticket->details;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>