<?php $__env->startSection('content'); ?>

    <div class="pad-all text-center">
        <form class="" action="<?php echo e(route('seller_report.index')); ?>" method="GET">
            <div class="box-inline mar-btm pad-rgt">
                 Sort by verificarion status:
                 <div class="select">
                     <select class="demo-select2" name="verification_status" required>
                        <option value="1">Approved</option>
                        <option value="0">Non Approved</option>
                     </select>
                 </div>
            </div>
            <button class="btn btn-default" type="submit">Filter</button>
        </form>
    </div>


    <div class="col-md-offset-2 col-md-8">
        <div class="panel">
            <!--Panel heading-->
            <div class="panel-heading">
                <h3 class="panel-title">Seller report</h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no demo-dt-basic">
                        <thead>
                            <tr>
                                <th>Seller Name</th>
                                <th>Email</th>
                                <th>Shop Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($seller->user != null): ?>
                                    <tr>
                                        <td><?php echo e($seller->user->name); ?></td>
                                        <td><?php echo e($seller->user->email); ?></td>
                                        <td><?php echo e($seller->user->shop->name); ?></td>
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
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>