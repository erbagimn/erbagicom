<?php $__env->startSection('content'); ?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Send Newsletter')); ?></h3>
        </div>
        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('newsletters.send')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name"><?php echo e(__('Emails')); ?> (<?php echo e(__('Users')); ?>)</label>
                    <div class="col-sm-10">
                        <select class="form-control demo-select2-multiple-selects" name="user_emails[]" multiple>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name"><?php echo e(__('Emails')); ?> (<?php echo e(__('Subscribers')); ?>)</label>
                    <div class="col-sm-10">
                        <select class="form-control demo-select2-multiple-selects" name="subscriber_emails[]" multiple>
                            <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subscriber->email); ?>"><?php echo e($subscriber->email); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="subject"><?php echo e(__('Newsletter subject')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name"><?php echo e(__('Newsletter content')); ?></label>
                    <div class="col-sm-10">
                        <textarea class="editor" name="content" required></textarea>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit"><?php echo e(__('Send')); ?></button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>