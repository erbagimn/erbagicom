<?php $__env->startSection('content'); ?>
    <div class="mar-ver pad-btm text-center">
        <h1 class="h3">Checking file permissions</h1>
        <p>We ran diagnosis on your server. Review the items that have a red mark on it. <br> If everything is green, you are good to go to the next step.</p>
    </div>

    <ul class="list-group">
        <li class="list-group-item text-semibold">
            Php version 7.2 +

            <?php
                $phpVersion = number_format((float)phpversion(), 2, '.', '');
            ?>
            <?php if($phpVersion >= 7.20): ?>
                <i class="fa fa-check text-success pull-right"></i>
            <?php else: ?>
                <i class="fa fa-close text-danger pull-right"></i>
            <?php endif; ?>
        </li>
        <li class="list-group-item text-semibold">
            Curl Enabled

            <?php if($permission['curl_enabled']): ?>
                <i class="fa fa-check text-success pull-right"></i>
            <?php else: ?>
                <i class="fa fa-close text-danger pull-right"></i>
            <?php endif; ?>
        </li>
        <li class="list-group-item text-semibold">
            <b>.env</b> File Permission

            <?php if($permission['db_file_write_perm']): ?>
                <i class="fa fa-check text-success pull-right"></i>
            <?php else: ?>
                <i class="fa fa-close text-danger pull-right"></i>
            <?php endif; ?>
        </li>
        <li class="list-group-item text-semibold">
            <b>RouteServiceProvider.php</b> File Permission

            <?php if($permission['routes_file_write_perm']): ?>
                <i class="fa fa-check text-success pull-right"></i>
            <?php else: ?>
                <i class="fa fa-close text-danger pull-right"></i>
            <?php endif; ?>
        </li>
    </ul>

    <p class="text-center">
        <?php if($permission['curl_enabled'] == 1 && $permission['db_file_write_perm'] == 1 && $permission['routes_file_write_perm'] == 1 && $phpVersion >= 7.20): ?>
            <?php if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1'): ?>
                <a href = "<?php echo e(route('step3')); ?>" class="btn btn-info">Go To Next Step</a>
            <?php else: ?>
                <a href = "<?php echo e(route('step2')); ?>" class="btn btn-info">Go To Next Step</a>
            <?php endif; ?>
        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>