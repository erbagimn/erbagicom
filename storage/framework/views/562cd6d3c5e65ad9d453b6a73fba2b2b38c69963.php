<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Seller')); ?></a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('sellers')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Email Address')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Num. of Products')); ?></th>
                    <th><?php echo e(__('Due to seller')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($seller->user->name); ?></td>
                        <td><?php echo e($seller->user->email); ?></td>
                        <td>
                            <?php if($seller->verification_status == 1): ?>
                                <div class="label label-table label-success">
                                    <?php echo e(__('Verified')); ?>

                                </div>
                            <?php elseif($seller->verification_info != null): ?>
                                <a href="<?php echo e(route('sellers.show_verification_request', $seller->id)); ?>">
                                    <div class="label label-table label-info">
                                        <?php echo e(__('Requested')); ?>

                                    </div>
                                </a>
                            <?php else: ?>
                                <div class="label label-table label-danger">
                                    <?php echo e(__('Not Verified')); ?>

                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(\App\Product::where('user_id', $seller->user->id)->count()); ?></td>
                        <td>
                            <?php if($seller->admin_to_pay > 0): ?>
                                <?php echo e(single_price($seller->admin_to_pay)); ?>

                            <?php else: ?>
                                <?php echo e(single_price(0)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a onclick="show_seller_payment_modal('<?php echo e($seller->id); ?>');"><?php echo e(__('Pay')); ?></a></li>
                                    <li><a href="<?php echo e(route('sellers.edit', encrypt($seller->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('sellers.destroy', $seller->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>


<div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_seller_payment_modal(id){
            $.post('<?php echo e(route('sellers.payment_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>