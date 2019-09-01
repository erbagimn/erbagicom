<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo e(route('subsubcategories.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Sub Subcategory')); ?></a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Subsubcategories')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Sub Subcategory')); ?></th>
                    <th><?php echo e(__('Subcategory')); ?></th>
                    <th><?php echo e(__('Category')); ?></th>
                    <th><?php echo e(__('Brands')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(__($subsubcategory->name)); ?></td>
                        <td><?php echo e($subsubcategory->subcategory->name); ?></td>
                        <td><?php echo e($subsubcategory->subcategory->category->name); ?></td>
                        <td>
                            <?php $__currentLoopData = json_decode($subsubcategory->brands); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(\App\Brand::find($brand_id) != null): ?>
                                    <span class="badge badge-info"><?php echo e(\App\Brand::find($brand_id)->name); ?></span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo e(route('subsubcategories.edit', encrypt($subsubcategory->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('subsubcategories.destroy', $subsubcategory->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
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