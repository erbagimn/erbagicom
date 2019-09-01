<?php $__env->startSection('content'); ?>

	<div class="col-sm-12">

		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><?php echo e(__('Seller Verification Form')); ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo e(route('seller_verification_form.update')); ?>" method="post">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-lg-8 form-horizontal" id="form">
							<?php $__currentLoopData = json_decode(\App\BusinessSetting::where('type', 'verification_form')->first()->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($element->type == 'text' || $element->type == 'file'): ?>
									<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">
									    <input type="hidden" name="type[]" value="<?php echo e($element->type); ?>">
									    <div class="col-lg-3">
									        <label class="control-label"><?php echo e(ucfirst($element->type)); ?></label>
									    </div>
									    <div class="col-lg-7">
									        <input class="form-control" type="text" name="label[]" value="<?php echo e($element->label); ?>" placeholder="Label">
									    </div>
									    <div class="col-lg-2"><span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span></div>
									</div>
								<?php elseif($element->type == 'select' || $element->type == 'multi_select' || $element->type == 'radio'): ?>
									<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">
									    <input type="hidden" name="type[]" value="<?php echo e($element->type); ?>">
									    <input type="hidden" name="option[]" class="option" value="<?php echo e($key); ?>">
									    <div class="col-lg-3">
									        <label class="control-label"><?php echo e(ucfirst(str_replace('_', ' ', $element->type))); ?></label>
									    </div>
									    <div class="col-lg-7">
									        <input class="form-control" type="text" name="label[]" value="<?php echo e($element->label); ?>" placeholder="Select Label" style="margin-bottom:10px">
									        <div class="customer_choice_options_types_wrap_child">
												<?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="form-group">
													    <div class="col-sm-6 col-sm-offset-4">
													        <input class="form-control" type="text" name="options_<?php echo e($key); ?>[]" value="<?php echo e($value); ?>" required="">
													    </div>
													    <div class="col-sm-2"> <span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span></div>
													</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
									        <button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>
									    </div>
									    <div class="col-lg-2"><span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span></div>
									</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="col-lg-4">

							<ul class="list-group">
								<li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('text')"><?php echo e(__('Text Input')); ?></li>
								<li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('select')"><?php echo e(__('Select')); ?></li>
								<li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('multi-select')"><?php echo e(__('Multiple Select')); ?></li>
								<li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('radio')"><?php echo e(__('Radio')); ?></li>
								<li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('file')"><?php echo e(__('File')); ?></li>
							</ul>

						</div>
					</div>
					<div class="panel-footer text-right">
		                <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
		            </div>
				</form>
			</div>
		</div>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">

		var i = 0;

		function add_customer_choice_options(em){
			var j = $(em).closest('.form-group').find('.option').val();
			var str = '<div class="form-group">'
							+'<div class="col-sm-6 col-sm-offset-4">'
								+'<input class="form-control" type="text" name="options_'+j+'[]" value="" required>'
							+'</div>'
							+'<div class="col-sm-2"> <span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
							+'</div>'
						+'</div>'
			$(em).parent().find('.customer_choice_options_types_wrap_child').append(str);
		}
		function delete_choice_clearfix(em){
			$(em).parent().parent().remove();
		}
		function appenddToForm(type){
			//$('#form').removeClass('seller_form_border');
			if(type == 'text'){
				var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
								+'<input type="hidden" name="type[]" value="text">'
								+'<div class="col-lg-3">'
									+'<label class="control-label">Text</label>'
								+'</div>'
								+'<div class="col-lg-7">'
									+'<input class="form-control" type="text" name="label[]" placeholder="Label">'
								+'</div>'
								+'<div class="col-lg-2">'
									+'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
								+'</div>'
							+'</div>';
				$('#form').append(str);
			}
			else if (type == 'select') {
				i++;
				var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
								+'<input type="hidden" name="type[]" value="select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
								+'<div class="col-lg-3">'
									+'<label class="control-label">Select</label>'
								+'</div>'
								+'<div class="col-lg-7">'
									+'<input class="form-control" type="text" name="label[]" placeholder="Select Label" style="margin-bottom:10px">'
									+'<div class="customer_choice_options_types_wrap_child">'

									+'</div>'
									+'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
								+'</div>'
								+'<div class="col-lg-2">'
									+'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
								+'</div>'
							+'</div>';
				$('#form').append(str);
			}
			else if (type == 'multi-select') {
				i++;
				var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
								+'<input type="hidden" name="type[]" value="multi_select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
								+'<div class="col-lg-3">'
									+'<label class="control-label">Multiple select</label>'
								+'</div>'
								+'<div class="col-lg-7">'
									+'<input class="form-control" type="text" name="label[]" placeholder="Multiple Select Label" style="margin-bottom:10px">'
									+'<div class="customer_choice_options_types_wrap_child">'

									+'</div>'
									+'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
								+'</div>'
								+'<div class="col-lg-2">'
									+'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
								+'</div>'
							+'</div>';
				$('#form').append(str);
			}
			else if (type == 'radio') {
				i++;
				var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
								+'<input type="hidden" name="type[]" value="radio"><input type="hidden" name="option[]" class="option" value="'+i+'">'
								+'<div class="col-lg-3">'
									+'<label class="control-label">Radio</label>'
								+'</div>'
								+'<div class="col-lg-7">'
									+'<input class="form-control" type="text" name="label[]" placeholder="Radio Label" style="margin-bottom:10px">'
									+'<div class="customer_choice_options_types_wrap_child">'

									+'</div>'
									+'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
								+'</div>'
								+'<div class="col-lg-2">'
									+'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
								+'</div>'
							+'</div>';
				$('#form').append(str);
			}
			else if (type == 'file') {
				var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
								+'<input type="hidden" name="type[]" value="file">'
								+'<div class="col-lg-3">'
									+'<label class="control-label">File</label>'
								+'</div>'
								+'<div class="col-lg-7">'
									+'<input class="form-control" type="text" name="label[]" placeholder="Label">'
								+'</div>'
								+'<div class="col-lg-2">'
									+'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
								+'</div>'
							+'</div>';
				$('#form').append(str);
			}
		}
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>