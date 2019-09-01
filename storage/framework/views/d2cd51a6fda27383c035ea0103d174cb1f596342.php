<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link name="favicon" type="image/x-icon" href="<?php echo e(asset('img/favicon.png')); ?>" rel="shortcut icon" />

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <!--active-shop Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/active-shop.min.css')); ?>" rel="stylesheet">

    <!--active-shop Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo e(asset('css/demo/active-shop-demo-icons.min.css')); ?>" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo e(asset('css/demo/active-shop-demo.min.css')); ?>" rel="stylesheet">

    <!--Theme [ DEMONSTRATION ]-->
    <link href="<?php echo e(asset('css/themes/type-c/theme-navy.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

</head>
<body>
    <div id="container" class="">
        <div class="cls-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel">
                            <div class="panel-body">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src=" <?php echo e(asset('js/jquery.min.js')); ?>"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>


    <!--active-shop [ RECOMMENDED ]-->
    <script src="<?php echo e(asset('js/active-shop.min.js')); ?>"></script>

    <!--Alerts [ SAMPLE ]-->
    <script src="<?php echo e(asset('js/demo/ui-alerts.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>

</body>
</html>
