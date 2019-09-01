<?php $__env->startSection('content'); ?>

    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('Coupon Information Adding')); ?></h3>
            </div>

            <form class="form-horizontal" action="<?php echo e(route('coupon.store')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name"><?php echo e(__('Coupon Type')); ?></label>
                        <div class="col-lg-9">
                            <select name="coupon_type" id="coupon_type" class="form-control demo-select2" onchange="coupon_form()" required>
                                <option value="">Select One</option>
                                <option value="product_base"><?php echo e(__('For Products')); ?></option>
                                <option value="cart_base"><?php echo e(__('For Total Orders')); ?></option>
                            </select>
                        </div>
                    </div>

                    <div id="coupon_form">

                    </div>

                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                </div>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script type="text/javascript">

    function coupon_form(){
        var coupon_type = $('#coupon_type').val();
		$.post('<?php echo e(route('coupon.get_coupon_form')); ?>',{_token:'<?php echo e(csrf_token()); ?>', coupon_type:coupon_type}, function(data){
            $('#coupon_form').html(data);

            $('#demo-dp-range .input-daterange').datepicker({
                startDate: '-0d',
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
        	});
		});
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>