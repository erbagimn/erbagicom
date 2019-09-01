<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Home Default Currency')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('business_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Home Default Currency')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control demo-select2-placeholder" name="home_default_currency">
                                <?php $__currentLoopData = $active_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($currency->id); ?>" <?php if(\App\BusinessSetting::where('type', 'home_default_currency')->first()->value == $currency->id) echo 'selected'?> ><?php echo e($currency->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <input type="hidden" name="types[]" value="home_default_currency">
                        <div class="col-lg-3">
                            <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('System Default Currency')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('business_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('System Default Currency')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control demo-select2-placeholder" name="system_default_currency">
                                <?php $__currentLoopData = $active_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($currency->id); ?>" <?php if(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value == $currency->id) echo 'selected'?> ><?php echo e($currency->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <input type="hidden" name="types[]" value="system_default_currency">
                        <div class="col-lg-3">
                            <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Set Currency Formats')); ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('business_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="symbol_format">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('Symbol Format')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control demo-select2-placeholder" name="symbol_format">
                                <option value="1">[Symbol] [Amount]</option>
                                <option value="2">[Amount] [Symbol]</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="types[]" value="no_of_decimals">
                        <div class="col-lg-3">
                            <label class="control-label"><?php echo e(__('No of decimals')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control demo-select2-placeholder" name="no_of_decimals">
                                <option value="0">12345</option>
                                <option value="1">1234.5</option>
                                <option value="2">123.45</option>
                                <option value="3">12.345</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('All Currency')); ?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('Currency name')); ?></th>
                        <th><?php echo e(__('Currency symbol')); ?></th>
                        <th><?php echo e(__('Currency code')); ?></th>
                        <th><?php echo e(__('Exchange rate')); ?>(1 USD = ?)</th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th width="10%"><?php echo e(__('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($currencies)-1; $i++): ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e($currencies[$i]->name); ?></td>
                            <td><?php echo e($currencies[$i]->symbol); ?></td>
                            <td><?php echo e($currencies[$i]->code); ?></td>
                            <td><input id="exchange_rate_<?php echo e($currencies[$i]->id); ?>" class="form-control" type="number" min="0" step="0.01" value="<?php echo e($currencies[$i]->exchange_rate); ?>"></td>
                            <td><label class="switch"><input id="status_<?php echo e($currencies[$i]->id); ?>" type="checkbox" <?php if($currencies[$i]->status == 1) echo "checked";?> ><span class="slider round"></span></label></td>
                            <td><button class="btn btn-purple" type="submit" onclick="updateCurrency(<?php echo e($currencies[$i]->id); ?>)"><?php echo e(__('Save')); ?></button></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td><?php echo e(count($currencies)); ?></td>
                        <td><input id="name_<?php echo e($currencies[count($currencies)-1]->id); ?>" class="form-control" type="text" value="<?php echo e($currencies[count($currencies)-1]->name); ?>"></td>
                        <td><input id="symbol_<?php echo e($currencies[count($currencies)-1]->id); ?>" class="form-control" type="text" value="<?php echo e($currencies[count($currencies)-1]->symbol); ?>"></td>
                        <td><input id="code_<?php echo e($currencies[count($currencies)-1]->id); ?>" class="form-control" type="text" value="<?php echo e($currencies[count($currencies)-1]->code); ?>"></td>
                        <td><input id="exchange_rate_<?php echo e($currencies[count($currencies)-1]->id); ?>" class="form-control" type="number" min="0" step="0.01" value="<?php echo e($currencies[count($currencies)-1]->exchange_rate); ?>"></td>
                        <td><label class="switch"><input id="status_<?php echo e($currencies[count($currencies)-1]->id); ?>" class="demo-sw" type="checkbox" <?php if($currencies[count($currencies)-1]->status == 1) echo "checked";?> ><span class="slider round"></span></label></td>
                        <td><button class="btn btn-purple" type="submit" onclick="updateYourCurrency(<?php echo e($currencies[count($currencies)-1]->id); ?>)" ><?php echo e(__('Save')); ?></button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        //Updates default currencies
        function updateCurrency(i){
            var exchange_rate = $('#exchange_rate_'+i).val();
            if($('#status_'+i).is(':checked')){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('currency.update')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:i, exchange_rate:exchange_rate, status:status}, function(data){
                location.reload();
            });
        }

        //Updates your currency
        function updateYourCurrency(i){
            var name = $('#name_'+i).val();
            var symbol = $('#symbol_'+i).val();
            var code = $('#code_'+i).val();
            var exchange_rate = $('#exchange_rate_'+i).val();
            if($('#status_'+i).is(':checked')){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('your_currency.update')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:i, name:name, symbol:symbol, code:code, exchange_rate:exchange_rate, status:status}, function(data){
                location.reload();
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>