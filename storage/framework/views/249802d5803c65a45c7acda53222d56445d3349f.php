<?php $__env->startSection('content'); ?>

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Sub Subcategory Information')); ?></h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('subsubcategories.update', $subsubcategory->id)); ?>" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            <?php echo csrf_field(); ?>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Name')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(__('Name')); ?>" id="name" name="name" class="form-control" required value="<?php echo e($subsubcategory->name); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Category')); ?></label>
                    <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control demo-select2" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e(__($category->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Subcategory')); ?></label>
                    <div class="col-sm-9">
                        <select name="sub_category_id" id="sub_category_id" class="form-control demo-select2" required>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Brands')); ?></label>
                    <div class="col-sm-9">
                        <select name="brands[]" id="brands" class="form-control demo-select2" multiple  required data-placeholder="Choose Brands">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>" <?php if(in_array($brand->id, json_decode($subsubcategory->brands))) echo "selected";?> ><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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


<?php $__env->startSection('script'); ?>

<script type="text/javascript">

    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('<?php echo e(route('subcategories.get_subcategories_by_category')); ?>',{_token:'<?php echo e(csrf_token()); ?>', category_id:category_id}, function(data){
            $('#sub_category_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#sub_category_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
        });
    }

    $('.demo-select2').select2();

    $(document).ready(function(){

        $("#category_id > option").each(function() {
            if(this.value == '<?php echo e($subsubcategory->subcategory->category_id); ?>'){
                $("#category_id").val(this.value).change();
            }
        });

        get_subcategories_by_category();
    });

    $('#category_id').on('change', function() {
        get_subcategories_by_category();
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>