<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
              
                <div class="col-lg-12">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0 d-inline-block">
                                        <?php echo e(__('Kalender Kegiatan')); ?>

                                    </h2>
                                    <a href="<?php echo e(route('community.events')); ?>" class="btn btn-sm btn-round btn-base-1 ml-3"><?php echo e(__('Ke Daftar Event')); ?></a>

                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('calendar.events')); ?>"><?php echo e(__('Kalender Event')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <hr class="mt-2">
                            
                        <div class="products-box-bar p-3 bg-white">
                            <div class="container">
                                <div class="row sm-no-gutters gutters-5">
                                    <div class="col">
                                        <div class="bg-white">
                                            <div id='calendar'></div>
                                        <hr class="mt-2">  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- Script Full Calendar -->
 <script src="<?php echo e(asset('frontend/fullcalendar-4.2.0/packages/core/main.js')); ?>"></script>
 <script src="<?php echo e(asset('frontend/fullcalendar-4.2.0/packages/daygrid/main.js')); ?>"></script>
 <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '<?php echo '2019-07-01'; //echo date("Y-m-d"); ?>',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?php echo json_encode($list); ?>, 
      color: 'red',   // a non-ajax option
      textColor: 'white' // a non-ajax option

    });

    calendar.render();
  });

 
 </script>   

    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

       
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>