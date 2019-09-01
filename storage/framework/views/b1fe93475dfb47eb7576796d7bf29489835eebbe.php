<div class="panel-heading">
    <h3 class="panel-title"><?php echo e(__('Add Your Product Base Coupon')); ?></h3>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_code"><?php echo e(__('Coupon code')); ?></label>
    <div class="col-lg-9">
        <input type="text" placeholder="<?php echo e(__('Coupon code')); ?>" id="coupon_code" name="coupon_code" value="<?php echo e($coupon->code); ?>" class="form-control" required>
    </div>
</div>
<div class="product-choose-list">
    <?php $__currentLoopData = json_decode($coupon->details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-choose">
            <div class="form-group">
               <label class="col-lg-3 control-label"><?php echo e(__('Category')); ?></label>
               <div class="col-lg-9">
                  <select class="form-control category_id demo-select2" name="category_ids[]" required>
                     <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($category->id); ?>" <?php if($details->category_id == $category->id): ?>
                             selected
                         <?php endif; ?> ><?php echo e($category->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               </div>
            </div>
            <div class="form-group" id="subcategory">
               <label class="col-lg-3 control-label"><?php echo e(__('Sub Category')); ?></label>
               <div class="col-lg-9">
                  <select class="form-control subcategory_id demo-select2" name="subcategory_ids[]" required>
                      <?php $__currentLoopData = \App\SubCategory::where('category_id', $details->category_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($subcategory->id); ?>" <?php if($details->subcategory_id == $subcategory->id): ?>
                              selected
                          <?php endif; ?> ><?php echo e($subcategory->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               </div>
            </div>
            <div class="form-group" id="subsubcategory">
               <label class="col-lg-3 control-label"><?php echo e(__('Sub Sub Category')); ?></label>
               <div class="col-lg-9">
                  <select class="form-control subsubcategory_id demo-select2" name="subsubcategory_ids[]" required>
                      <?php $__currentLoopData = \App\SubSubCategory::where('sub_category_id', $details->subcategory_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($subsubcategory->id); ?>" <?php if($details->subsubcategory_id == $subsubcategory->id): ?>
                              selected
                          <?php endif; ?> ><?php echo e($subsubcategory->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label" for="name"><?php echo e(__('Product')); ?></label>
                <div class="col-lg-9">
                    <select name="product_ids[]" class="form-control product_id demo-select2" required>
                        <?php $__currentLoopData = \App\Product::where('subsubcategory_id', $details->subsubcategory_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" <?php if($details->product_id == $product->id): ?>
                                selected
                            <?php endif; ?> ><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="more hide">
    <div class="product-choose">
        <div class="form-group">
           <label class="col-lg-3 control-label"><?php echo e(__('Category')); ?></label>
           <div class="col-lg-9">
              <select class="form-control category_id" name="category_ids[]" onchange="get_subcategories_by_category(this)">
                 <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
           </div>
        </div>
        <div class="form-group" id="subcategory">
           <label class="col-lg-3 control-label"><?php echo e(__('Sub Category')); ?></label>
           <div class="col-lg-9">
              <select class="form-control subcategory_id" name="subcategory_ids[]" onchange="get_subsubcategories_by_subcategory(this)">

              </select>
           </div>
        </div>
        <div class="form-group" id="subsubcategory">
           <label class="col-lg-3 control-label"><?php echo e(__('Sub Sub Category')); ?></label>
           <div class="col-lg-9">
              <select class="form-control subsubcategory_id" name="subsubcategory_ids[]" onchange="get_products_by_subsubcategory(this)">

              </select>
           </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label" for="name"><?php echo e(__('Product')); ?></label>
            <div class="col-lg-9">
                <select name="product_ids[]" class="form-control product_id">

                </select>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="text-right">
    <button class="btn btn-primary" type="button" name="button" onclick="appendNewProductChoose()"><?php echo e(__('Add More')); ?></button>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="start_date"><?php echo e(__('Date')); ?></label>
    <div class="col-lg-9">
        <div id="demo-dp-range">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start_date" value="<?php echo e(date('m/d/Y', $coupon->start_date)); ?>" autocomplete="off">
                <span class="input-group-addon"><?php echo e(__('to')); ?></span>
                <input type="text" class="form-control" name="end_date" value="<?php echo e(date('m/d/Y', $coupon->end_date)); ?>" autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label"><?php echo e(__('Discount')); ?></label>
   <div class="col-lg-8">
      <input type="number" min="0" step="0.01" placeholder="<?php echo e(__('Discount')); ?>" value="<?php echo e($coupon->discount); ?>" name="discount" class="form-control" required>
   </div>
   <div class="col-lg-1">
      <select class="demo-select2" name="discount_type">
         <option value="amount" <?php if($coupon->discount_type == 'amount'): ?> selected  <?php endif; ?>>$</option>
         <option value="percent" <?php if($coupon->discount_type == 'percent'): ?> selected  <?php endif; ?>>%</option>
      </select>
   </div>
</div>


<script type="text/javascript">

    function appendNewProductChoose(){
        $('.product-choose-list').append($('.more').html());
        $('.product-choose-list').find('.product-choose').last().find('.category_id').select2();
    }

    function get_subcategories_by_category(el){
		var category_id = $(el).val();
        console.log(category_id);
        $(el).closest('.product-choose').find('.subcategory_id').html(null);
		$.post('<?php echo e(route('subcategories.get_subcategories_by_category')); ?>',{_token:'<?php echo e(csrf_token()); ?>', category_id:category_id}, function(data){
		    for (var i = 0; i < data.length; i++) {
		        $(el).closest('.product-choose').find('.subcategory_id').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		    }
            $(el).closest('.product-choose').find('.subcategory_id').select2();
		    get_subsubcategories_by_subcategory($(el).closest('.product-choose').find('.subcategory_id'));
		});
	}

    function get_subsubcategories_by_subcategory(el){
		var subcategory_id = $(el).val();
        console.log(subcategory_id);
        $(el).closest('.product-choose').find('.subsubcategory_id').html(null);
		$.post('<?php echo e(route('subsubcategories.get_subsubcategories_by_subcategory')); ?>',{_token:'<?php echo e(csrf_token()); ?>', subcategory_id:subcategory_id}, function(data){
		    for (var i = 0; i < data.length; i++) {
		        $(el).closest('.product-choose').find('.subsubcategory_id').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		    }
            $(el).closest('.product-choose').find('.subsubcategory_id').select2();
		    get_products_by_subsubcategory($(el).closest('.product-choose').find('.subsubcategory_id'));
		});
	}

    function get_products_by_subsubcategory(el){
        var subsubcategory_id = $(el).val();
        console.log(subsubcategory_id);
        $(el).closest('.product-choose').find('.product_id').html(null);
        $.post('<?php echo e(route('products.get_products_by_subsubcategory')); ?>',{_token:'<?php echo e(csrf_token()); ?>', subsubcategory_id:subsubcategory_id}, function(data){
            for (var i = 0; i < data.length; i++) {
                $(el).closest('.product-choose').find('.product_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $(el).closest('.product-choose').find('.product_id').select2();
        });
    }

    $(document).ready(function(){
        $('.demo-select2').select2();
        //get_subcategories_by_category($('.category_id'));
    });

    $('.category_id').on('change', function() {
        get_subcategories_by_category(this);
    });

    $('.subcategory_id').on('change', function() {
	    get_subsubcategories_by_subcategory(this);
	});

    $('.subsubcategory_id').on('change', function() {
 	    get_products_by_subsubcategory(this);
 	});


</script>
