<!DOCTYPE html>
<?php if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
    <html dir="rtl">
<?php else: ?>
    <html>
<?php endif; ?>
<head>

<?php
    $seosetting = \App\SeoSetting::first();
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="description" content="<?php echo $__env->yieldContent('meta_description', $seosetting->description); ?>" />
<meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', $seosetting->keyword); ?>">
<meta name="author" content="<?php echo e($seosetting->author); ?>">
<meta name="sitemap_link" content="<?php echo e($seosetting->sitemap_link); ?>">
<?php echo $__env->yieldContent('meta'); ?>

<!-- Favicon -->
<link name="favicon" type="image/x-icon" href="<?php echo e(asset(\App\GeneralSetting::first()->favicon)); ?>" rel="shortcut icon" />

<title><?php echo $__env->yieldContent('meta_title', config('app.name', 'Laravel')); ?></title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" type="text/css">

<!-- Icons -->
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/line-awesome.min.css')); ?>" type="text/css">

<link type="text/css" href="<?php echo e(asset('frontend/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/jodit.min.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/sweetalert2.min.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/slick.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/xzoom.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/jquery.share.css')); ?>" rel="stylesheet">
<link type="text/css" href="<?php echo e(asset('frontend/css/datepicker.css')); ?>" rel="stylesheet">

<!-- Style For Full Calendar -->
<link href="<?php echo e(asset('frontend/fullcalendar-4.2.0/packages/core/main.css')); ?>" rel='stylesheet' />
<link href="<?php echo e(asset('frontend/fullcalendar-4.2.0/packages/daygrid/main.css')); ?>" rel='stylesheet' />

<!-- Global style (main) -->
<link type="text/css" href="<?php echo e(asset('frontend/css/active-shop.css')); ?>" rel="stylesheet" media="screen">

<!--Spectrum Stylesheet [ REQUIRED ]-->
<link href="<?php echo e(asset('css/spectrum.css')); ?>" rel="stylesheet">

<!-- Custom style -->
<link type="text/css" href="<?php echo e(asset('frontend/css/custom-style.css')); ?>" rel="stylesheet">

<?php if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
     <!-- RTL -->
    <link type="text/css" href="<?php echo e(asset('frontend/css/active.rtl.css')); ?>" rel="stylesheet">
<?php endif; ?>

<!-- Facebook Chat style -->
<link href="<?php echo e(asset('frontend/css/fb-style.css')); ?>" rel="stylesheet">

<!-- color theme -->
<link href="<?php echo e(asset('frontend/css/colors/'.\App\GeneralSetting::first()->frontend_color.'.css')); ?>" rel="stylesheet">

<!-- jQuery -->
<script src="<?php echo e(asset('frontend/js/vendor/jquery.min.js')); ?>"></script>

<?php if(\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
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


<!-- MAIN WRAPPER -->
<div class="body-wrap shop-default shop-cards shop-tech gry-bg">

    <!-- Header -->
    <?php echo $__env->make('frontend.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    <?php if(\App\BusinessSetting::where('type', 'facebook_chat')->first()->value == 1): ?>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="<?php echo e(env('FACEBOOK_PAGE_ID')); ?>">
        </div>
    <?php endif; ?>

</div><!-- END: body-wrap -->

<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>

<!-- Core -->
<script src="<?php echo e(asset('frontend/js/vendor/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/vendor/bootstrap.min.js')); ?>"></script>

<!-- Plugins: Sorted A-Z -->
<script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/nouislider.min.js')); ?>"></script>


<script src="<?php echo e(asset('frontend/js/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/jquery.share.js')); ?>"></script>

<script type="text/javascript">
    function showFrontendAlert(type, message){
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

<?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script type="text/javascript">
        showFrontendAlert('<?php echo e($message['level']); ?>', '<?php echo e($message['message']); ?>');
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Date Picker -->
<script src="<?php echo e(asset('frontend/js/datepicker.standalone.js')); ?>"></script>

<script type="text/javascript">
		const input = document.querySelector('#tgl_mulai');
		const picker = new MaterialDatePicker()
			.on('submit', (val) => {
			  //var vv = val.format("DD/MM/YYYY");
			  var vv = val.format("YYYY-MM-DD");
			  $("#tgl_mulai").val(vv);
			});

		input.addEventListener('focus', () => picker.open());
		
		const input2 = document.querySelector('#tgl_akhir');
		const picker2 = new MaterialDatePicker()
			.on('submit', (val) => {
			  //var vv = val.format("DD/MM/YYYY");
			  var vv = val.format("YYYY-MM-DD");
			  $("#tgl_akhir").val(vv);
			});

		input2.addEventListener('focus', () => picker2.open());
</script>	



<script>

    $(document).ready(function() {
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

        if ($('#currency-change').length > 0) {
            $('#currency-change .dropdown-item a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var currency_code = $this.data('currency');
                    $.post('<?php echo e(route('currency.change')); ?>',{_token:'<?php echo e(csrf_token()); ?>', currency_code:currency_code}, function(data){
                        location.reload();
                    });

                });
            });
        }
		
    });

    $('#search').on('keyup', function(){
        search();
    });

    $('#search').on('focus', function(){
        search();
    });

    function search(){
        var search = $('#search').val();
        if(search.length > 0){
            $('body').addClass("typed-search-box-shown");

            $('.typed-search-box').removeClass('d-none');
            $('.search-preloader').removeClass('d-none');
            $.post('<?php echo e(route('search.ajax')); ?>', { _token: '<?php echo e(@csrf_token()); ?>', search:search}, function(data){
                if(data == '0'){
                    // $('.typed-search-box').addClass('d-none');
                    $('#search-content').html(null);
                    $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                    $('.search-preloader').addClass('d-none');

                }
                else{
                    $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                    $('#search-content').html(data);
                    $('.search-preloader').addClass('d-none');
                }
            });
        }
        else {
            $('.typed-search-box').addClass('d-none');
            $('body').removeClass("typed-search-box-shown");
        }
    }

    function updateNavCart(){
        $.post('<?php echo e(route('cart.nav_cart')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
            $('#cart_items').html(data);
        });
    }

    function removeFromCart(key){
        $.post('<?php echo e(route('cart.removeFromCart')); ?>', {_token:'<?php echo e(csrf_token()); ?>', key:key}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
            showFrontendAlert('success', 'Item has been removed from cart');
            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
        });
    }

    function addToCompare(id){
        $.post('<?php echo e(route('compare.addToCompare')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:id}, function(data){
            $('#compare').html(data);
            showFrontendAlert('success', 'Item has been added to compare list');
            $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
        });
    }

    function addToWishList(id){
        <?php if(Auth::check()): ?>
            $.post('<?php echo e(route('wishlists.store')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:id}, function(data){
                if(data != 0){
                    $('#wishlist').html(data);
                    showFrontendAlert('success', 'Item has been added to wishlist');
                }
                else{
                    showFrontendAlert('warning', 'Please login first');
                }
            });
        <?php else: ?>
            showFrontendAlert('warning', 'Please login first');
        <?php endif; ?>
    }

    function showAddToCartModal(id){
        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }
        $('#addToCart-modal-body').html(null);
        $('#addToCart').modal();
        $('.c-preloader').show();
        $.post('<?php echo e(route('cart.showCartModal')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:id}, function(data){
            $('.c-preloader').hide();
            $('#addToCart-modal-body').html(data);
            $('.xzoom, .xzoom-gallery').xzoom({
                Xoffset: 20,
                bg: true,
                tint: '#000',
                defaultScale: -1
            });
        });
    }

    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });

    function getVariantPrice(){
        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
            $.ajax({
               type:"POST",
               url: '<?php echo e(route('products.variant_price')); ?>',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#option-choice-form #chosen_price_div').removeClass('d-none');
                   $('#option-choice-form #chosen_price_div #chosen_price').html(data);
               }
           });
        }
    }

    function checkAddToCartValidity(){
        var names = {};
        $('#option-choice-form input:radio').each(function() { // find unique names
              names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function() { // then count them
              count++;
        });
        if($('input:radio:checked').length == count){
            return true;
        }
        return false;
    }

    function addToCart(){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '<?php echo e(route('cart.addToCart')); ?>',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#addToCart-modal-body').html(null);
                   $('.c-preloader').hide();
                   $('#modal-size').removeClass('modal-lg');
                   $('#addToCart-modal-body').html(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function buyNow(){
     
        if( checkAddToCartValidity() ) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '<?php echo e(route('cart.addToCart')); ?>',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   //$('#addToCart-modal-body').html(null);
                   //$('.c-preloader').hide();
                   //$('#modal-size').removeClass('modal-lg');
                   //$('#addToCart-modal-body').html(data);
                   updateNavCart();
                   $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
                   <?php if(empty(Auth::user()) )  { ?>
                        window.location.replace("<?php echo e(route('user.login')); ?>");
                   <?php } else { ?>
                        window.location.replace("<?php echo e(route('checkout.shipping_info')); ?>");
                   <?php } ?>     
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function show_purchase_history_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('<?php echo e(route('purchase_history.details')); ?>', { _token : '<?php echo e(@csrf_token()); ?>', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function show_order_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('<?php echo e(route('orders.details')); ?>', { _token : '<?php echo e(@csrf_token()); ?>', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function cartQuantityInitialize(){
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

     function imageInputInitialize(){
         $('.custom-input-file').each(function() {
             var $input = $(this),
                 $label = $input.next('label'),
                 labelVal = $label.html();

             $input.on('change', function(e) {
                 var fileName = '';

                 if (this.files && this.files.length > 1)
                     fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                 else if (e.target.value)
                     fileName = e.target.value.split('\\').pop();

                 if (fileName)
                     $label.find('span').html(fileName);
                 else
                     $label.html(labelVal);
             });

             // Firefox bug fix
             $input
                 .on('focus', function() {
                     $input.addClass('has-focus');
                 })
                 .on('blur', function() {
                     $input.removeClass('has-focus');
                 });
         });
     }
	 
	 /* format waktu */
	 function formatTime(timeInput) {
		  intValidNum = timeInput.value;

		  if (intValidNum < 24 && intValidNum.length == 2) {
			  timeInput.value = timeInput.value + ":";
			  return false;  
		  }
		  if (intValidNum == 24 && intValidNum.length == 2) {
			  timeInput.value = timeInput.value.length - 2 + "0:";
			  return false;
		  }
		  if (intValidNum > 24 && intValidNum.length == 2) {
			  timeInput.value = "";
			  return false;
		  }

		  if (intValidNum.length == 5 && intValidNum.slice(-2) < 60) {
			timeInput.value = timeInput.value + ":";
			return false;
		  }
		  if (intValidNum.length == 5 && intValidNum.slice(-2) > 60) {
			timeInput.value = timeInput.value.slice(0, 2) + ":";
			return false;
		  }
		  if (intValidNum.length == 5 && intValidNum.slice(-2) == 60) {
			timeInput.value = timeInput.value.slice(0, 2) + ":00:";
			return false;
		  }


		  if (intValidNum.length == 8 && intValidNum.slice(-2) > 60) {
			timeInput.value = timeInput.value.slice(0, 5) + ":";
			return false;
		  }
		  if (intValidNum.length == 8 && intValidNum.slice(-2) == 60) {
			timeInput.value = timeInput.value.slice(0, 5) + ":00";
			return false;
		  }

		} //end function

</script>

<script src="<?php echo e(asset('frontend/js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jodit.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/xzoom.min.js')); ?>"></script>

<!-- App JS -->
<script src="<?php echo e(asset('frontend/js/active-shop.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/fb-script.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
