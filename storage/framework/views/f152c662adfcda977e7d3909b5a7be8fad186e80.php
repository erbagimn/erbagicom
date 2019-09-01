<?php $__env->startSection('content'); ?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Flash Deal Information')); ?></h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('flash_deals.update', $flash_deal->id)); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Title')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(__('Title')); ?>" id="name" name="title" value="<?php echo e($flash_deal->title); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="start_date"><?php echo e(__('Date')); ?></label>
                    <div class="col-sm-9">
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control" name="start_date" value="<?php echo e(date('m/d/Y', $flash_deal->start_date)); ?>">
                                <span class="input-group-addon"><?php echo e(__('to')); ?></span>
                                <input type="text" class="form-control" name="end_date" value="<?php echo e(date('m/d/Y', $flash_deal->end_date)); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="products"><?php echo e(__('Products')); ?></label>
                    <div class="col-sm-9">
                        <select name="products[]" id="products" class="form-control demo-select2" multiple required data-placeholder="Choose Products">
                            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                                ?>
                                <option value="<?php echo e($product->id); ?>" <?php if($flash_deal_product != null) echo "selected";?> ><?php echo e(__($product->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group" id="discount_table">

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

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){

            get_flash_deal_discount();

            $('#products').on('change', function(){
                get_flash_deal_discount();
            });

            function get_flash_deal_discount(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('<?php echo e(route('flash_deals.product_discount_edit')); ?>', {_token:'<?php echo e(csrf_token()); ?>', product_ids:product_ids, flash_deal_id:<?php echo e($flash_deal->id); ?>}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>