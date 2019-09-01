<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link name="favicon" type="image/x-icon" href="<?php echo e(asset(\App\GeneralSetting::first()->favicon)); ?>" rel="shortcut icon" />

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!--active-shop Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/active-shop.min.css')); ?>" rel="stylesheet">

    <!--active-shop Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo e(asset('css/demo/active-shop-demo-icons.min.css')); ?>" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">

    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/datatables/media/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">

    <!--Select2 [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    

    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="<?php echo e(asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css')); ?>" rel="stylesheet">

    <!--Summernote [ OPTIONAL ]-->
    <link href="<?php echo e(asset('css/jodit.min.css')); ?>" rel="stylesheet">

    <!--Theme [ DEMONSTRATION ]-->
    <!-- <link href="<?php echo e(asset('css/themes/type-full/theme-dark-full.min.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('css/themes/type-c/theme-navy.min.css')); ?>" rel="stylesheet">

    <!--Spectrum Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/spectrum.css')); ?>" rel="stylesheet">

    <!--Custom Stylesheet [ REQUIRED ]-->
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">


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

    <!--Switchery [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/switchery/switchery.min.js')); ?>"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>

    <!--DataTables Sample [ SAMPLE ]-->
    <script src="<?php echo e(asset('js/demo/tables-datatables.js')); ?>"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>

    <!--Summernote [ OPTIONAL ]-->
    <script src="<?php echo e(asset('js/jodit.min.js')); ?>"></script>

    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/bootstrap-validator/bootstrapValidator.min.js')); ?>"></script>

    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>

    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="<?php echo e(asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="<?php echo e(asset('js/demo/form-wizard.js')); ?>"></script>

    <!--Spectrum JavaScript [ REQUIRED ]-->
    <script src="<?php echo e(asset('js/spectrum.js')); ?>"></script>

    <!--Spartan Image JavaScript [ REQUIRED ]-->
    <script src="<?php echo e(asset('js/spartan-multi-image-picker-min.js')); ?>"></script>

    <!--Custom JavaScript [ REQUIRED ]-->
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            //$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
            if($('.active-link').parent().parent().parent().is('ul')){
                $('.active-link').parent().parent().addClass('in');
                $('.active-link').parent().parent().parent().addClass('in');
            }
            if($('.active-link').parent().parent().is('li')){
                $('.active-link').parent().parent().addClass('active-sub');
            }
            if($('.active-link').parent().is('ul')){
                $('.active-link').parent().addClass('in');
            }

            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-item a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('<?php echo e(route('language.change')); ?>',{_token:'<?php echo e(csrf_token()); ?>', locale:locale}, function(data){
                            location.reload();
                        });

                    });
                });
            }

        });

    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php if(\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133955404-1"></script>

        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', <?php env('TRACKING_ID') ?>);
        </script>
    <?php endif; ?>


</head>
<body>

    <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script type="text/javascript">
            $(document).on('nifty.ready', function() {
                showAlert('<?php echo e($message['level']); ?>', '<?php echo e($message['message']); ?>');
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <?php echo $__env->make('inc.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-content">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </div>

        <?php echo $__env->make('inc.admin_sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('inc.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

        <?php echo $__env->yieldContent('script'); ?>

</body>
</html>
