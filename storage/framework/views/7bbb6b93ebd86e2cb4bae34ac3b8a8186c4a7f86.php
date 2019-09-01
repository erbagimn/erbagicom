<?php $__env->startSection('content'); ?>

    <div class="pad-all text-center">
        <form class="" action="<?php echo e(route('stock_report.index')); ?>" method="GET">
            <div class="box-inline mar-btm pad-rgt">
                 Sort by Category:
                 <div class="select">
                     <select id="demo-ease" class="demo-select2" name="category_id" required>
                         <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($category->id); ?>"><?php echo e(__($category->name)); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h3 class="panel-title">Product wise stock report</h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mar-no demo-dt-basic">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $qty = 0;
                                    foreach (json_decode($product->variations) as $key => $variation) {
                                        $qty += $variation->qty;
                                    }
                                ?>
                                <tr>
                                    <td><?php echo e(__($product->name)); ?></td>
                                    <td><?php echo e($qty); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>