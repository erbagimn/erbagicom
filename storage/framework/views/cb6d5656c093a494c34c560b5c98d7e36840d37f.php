<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo e(route('languages.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Language')); ?></a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(__('Language')); ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Code')); ?></th>
                            <th><?php echo e(__('RTL')); ?></th>
                            <th width="10%"><?php echo e(__('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($language->name); ?></td>
                                <td><?php echo e($language->code); ?></td>
                                <td><label class="switch">
                                    <input onchange="update_rtl_status(this)" value="<?php echo e($language->id); ?>" type="checkbox" <?php if($language->rtl == 1) echo "checked";?> >
                                    <span class="slider round"></span></label>
                                </td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                            <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo e(route('languages.show', encrypt($language->id))); ?>"><?php echo e(__('Translation')); ?></a></li>
                                            <li><a href="<?php echo e(route('languages.edit', encrypt($language->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                            <?php if($language->code != 'en'): ?>
                                                <li><a onclick="confirm_modal('<?php echo e(route('languages.destroy', $language->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $i++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_rtl_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('languages.update_rtl_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>