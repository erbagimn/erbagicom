<?php $__env->startSection('content'); ?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Support Desk')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Sending Date')); ?></th>
                    <th><?php echo e(__('Subject')); ?></th>
                    <th><?php echo e(__('Seller Name')); ?></th>
                    <th><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($ticket->created_at); ?></td>
                        <td><?php echo e($ticket->subject); ?></td>
                        <td><?php echo e($ticket->user->name); ?></td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo e(route('support_ticket.admin_show', encrypt($ticket->id))); ?>"><?php echo e(__('View')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>