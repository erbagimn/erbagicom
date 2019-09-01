<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <!-- <a href="<?php echo e(route('reviews.create')); ?>" class="btn btn-info pull-right"><?php echo e(__('Add New')); ?></a> -->
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Product Reviews')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Product')); ?></th>
                    <th><?php echo e(__('Product Owner')); ?></th>
                    <th><?php echo e(__('Customer')); ?></th>
                    <th><?php echo e(__('Rating')); ?></th>
                    <th><?php echo e(__('Comment')); ?></th>
                    <th><?php echo e(__('Published')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($review->product != null && $review->user != null): ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><a href="<?php echo e(route('product', $review->product->slug)); ?>" target="_blank"><?php echo e(__($review->product->name)); ?></a></td>
                            <td><?php echo e($review->product->added_by); ?></td>
                            <td><?php echo e($review->user->name); ?> (<?php echo e($review->user->email); ?>)</td>
                            <td><?php echo e($review->rating); ?></td>
                            <td><?php echo e($review->comment); ?></td>
                            <td><label class="switch">
                                <input onchange="update_published(this)" value="<?php echo e($review->id); ?>" type="checkbox" <?php if($review->status == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('reviews.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published reviews updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>