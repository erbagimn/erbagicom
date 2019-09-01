<?php $__env->startSection('content'); ?>

    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('SEO Settings')); ?></h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" action="<?php echo e(route('seosetting.update',$seosetting->id )); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PATCH">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="tag"><?php echo e(__('Keyword')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tags[]" value="<?php echo e($seosetting->keyword); ?>" placeholder="<?php echo e(__('Type and Hit Enter')); ?>" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="address"><?php echo e(__('Author')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="author" name="author" value="<?php echo e($seosetting->author); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="revisit"><?php echo e(__('Revisit After')); ?></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" step="1" value="<?php echo e($seosetting->revisit); ?>" placeholder="<?php echo e(__('Revisit After')); ?>" name="revisit" class="form-control" required>
                        </div>
                        <label class="col-sm-1 control-label" for="days"><?php echo e(__('Days')); ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="sitemap"><?php echo e(__('Sitemap Link')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" id="sitemap" name="sitemap" value="<?php echo e($seosetting->sitemap_link); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description"><?php echo e(__('Description')); ?></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="description"><?php echo e($seosetting->description); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>