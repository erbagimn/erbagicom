<?php $__env->startSection('content'); ?>

    <div class="tab-base">

        <!--Nav Tabs-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true"><?php echo e(__('Home slider')); ?></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="false"><?php echo e(__('Home banner 1')); ?></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-3" aria-expanded="false"><?php echo e(__('Home banner 2')); ?></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-4" aria-expanded="false"><?php echo e(__('Home categories')); ?></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-5" aria-expanded="false"><?php echo e(__('Top 10')); ?></a>
            </li>
        </ul>

        <!--Tabs Content-->
        <div class="tab-content">
            <div id="demo-lft-tab-1" class="tab-pane fade active in">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_slider()" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Slider')); ?></a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Home slider')); ?></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Photo')); ?></th>
                                    <th><?php echo e(__('Published')); ?></th>
                                    <th width="10%"><?php echo e(__('Options')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = \App\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><img class="img-md" src="<?php echo e(asset($slider->photo)); ?>" alt="Slider Image"></td>
                                        <td><label class="switch">
                                            <input onchange="update_slider_published(this)" value="<?php echo e($slider->id); ?>" type="checkbox" <?php if($slider->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a onclick="confirm_modal('<?php echo e(route('sliders.destroy', $slider->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-2" class="tab-pane fade">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_banner_1()" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Banner')); ?></a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Home banner')); ?> (Max 3 published)</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Photo')); ?></th>
                                    <th><?php echo e(__('Position')); ?></th>
                                    <th><?php echo e(__('Published')); ?></th>
                                    <th width="10%"><?php echo e(__('Options')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = \App\Banner::where('position', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><img class="img-md" src="<?php echo e(asset($banner->photo)); ?>" alt="banner Image"></td>
                                        <td><?php echo e(__('Banner Position ')); ?><?php echo e($banner->position); ?></td>
                                        <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="<?php echo e($banner->id); ?>" type="checkbox" <?php if($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a onclick="edit_home_banner_1(<?php echo e($banner->id); ?>)"><?php echo e(__('Edit')); ?></a></li>
                                                    <li><a onclick="confirm_modal('<?php echo e(route('home_banners.destroy', $banner->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-3" class="tab-pane fade">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_banner_2()" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Banner')); ?></a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Home banner')); ?> (Max 3 published)</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Photo')); ?></th>
                                    <th><?php echo e(__('Position')); ?></th>
                                    <th><?php echo e(__('Published')); ?></th>
                                    <th width="10%"><?php echo e(__('Options')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = \App\Banner::where('position', 2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><img class="img-md" src="<?php echo e(asset($banner->photo)); ?>" alt="banner Image"></td>
                                        <td><?php echo e(__('Banner Position ')); ?><?php echo e($banner->position); ?></td>
                                        <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="<?php echo e($banner->id); ?>" type="checkbox" <?php if($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a onclick="edit_home_banner_2(<?php echo e($banner->id); ?>)"><?php echo e(__('Edit')); ?></a></li>
                                                    <li><a onclick="confirm_modal('<?php echo e(route('home_banners.destroy', $banner->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-4" class="tab-pane fade">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_home_category()" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Category')); ?></a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Home Categories')); ?></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Subsubcategories')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th width="10%"><?php echo e(__('Options')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = \App\HomeCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $home_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($home_category->category->name); ?></td>
                                        <td>
                                            <?php $__currentLoopData = json_decode($home_category->subsubcategories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(\App\SubSubCategory::find($subsubcategory_id) != null): ?>
                                                    <span class="badge badge-info"><?php echo e(\App\SubSubCategory::find($subsubcategory_id)->name); ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td><label class="switch">
                                            <input onchange="update_home_category_status(this)" value="<?php echo e($home_category->id); ?>" type="checkbox" <?php if($home_category->status == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a onclick="edit_home_category(<?php echo e($home_category->id); ?>)"><?php echo e(__('Edit')); ?></a></li>
                                                    <li><a onclick="confirm_modal('<?php echo e(route('home_categories.destroy', $home_category->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-5" class="tab-pane fade">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Top 10 Information')); ?></h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" action="<?php echo e(route('top_10_settings.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3" for="url"><?php echo e(__('Banner Position')); ?></label>
                                <div class="col-sm-9">
                                    <select class="form-control demo-select2-max-10" name="top_categories[]" multiple required>
                                        <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if($category->top == 1): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url"><?php echo e(__('Banner Position')); ?></label>
                                <div class="col-sm-9">
                                    <select class="form-control demo-select2-max-10" name="top_brands[]" multiple required>
                                        <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($brand->id); ?>" <?php if($brand->top == 1): ?> selected <?php endif; ?>><?php echo e($brand->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!--End Horizontal Form-->

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">

    function updateSettings(el, type){
        if($(el).is(':checked')){
            var value = 1;
        }
        else{
            var value = 0;
        }
        $.post('<?php echo e(route('business_settings.update.activation')); ?>', {_token:'<?php echo e(csrf_token()); ?>', type:type, value:value}, function(data){
            if(data == 1){
                showAlert('success', 'Settings updated successfully');
            }
            else{
                showAlert('danger', 'Something went wrong');
            }
        });
    }

    function add_slider(){
        $.get('<?php echo e(route('sliders.create')); ?>', {}, function(data){
            $('#demo-lft-tab-1').html(data);
        });
    }

    function add_banner_1(){
        $.get('<?php echo e(route('home_banners.create', 1)); ?>', {}, function(data){
            $('#demo-lft-tab-2').html(data);
        });
    }

    function add_banner_2(){
        $.get('<?php echo e(route('home_banners.create', 2)); ?>', {}, function(data){
            $('#demo-lft-tab-3').html(data);
        });
    }

    function edit_home_banner_1(id){
        var url = '<?php echo e(route("home_banners.edit", "home_banner_id")); ?>';
        url = url.replace('home_banner_id', id);
        $.get(url, {}, function(data){
            $('#demo-lft-tab-2').html(data);
            $('.demo-select2-placeholder').select2();
        });
    }

    function edit_home_banner_2(id){
        var url = '<?php echo e(route("home_banners.edit", "home_banner_id")); ?>';
        url = url.replace('home_banner_id', id);
        $.get(url, {}, function(data){
            $('#demo-lft-tab-3').html(data);
            $('.demo-select2-placeholder').select2();
        });
    }

    function add_home_category(){
        $.get('<?php echo e(route('home_categories.create')); ?>', {}, function(data){
            $('#demo-lft-tab-3').html(data);
            $('.demo-select2-placeholder').select2();
        });
    }

    function edit_home_category(id){
        var url = '<?php echo e(route("home_categories.edit", "home_category_id")); ?>';
        url = url.replace('home_category_id', id);
        $.get(url, {}, function(data){
            $('#demo-lft-tab-3').html(data);
            $('.demo-select2-placeholder').select2();
        });
    }

    function update_home_category_status(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post('<?php echo e(route('home_categories.update_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
            if(data == 1){
                showAlert('success', 'Home Page Category status updated successfully');
            }
            else{
                showAlert('danger', 'Something went wrong');
            }
        });
    }

    function update_banner_published(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post('<?php echo e(route('home_banners.update_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
            if(data == 1){
                showAlert('success', 'Banner status updated successfully');
            }
            else{
                showAlert('danger', 'Maximum 4 banners to be published');
            }
        });
    }

    function update_slider_published(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        var url = '<?php echo e(route('sliders.update', 'slider_id')); ?>';
        url = url.replace('slider_id', el.value);

        $.post(url, {_token:'<?php echo e(csrf_token()); ?>', status:status, _method:'PATCH'}, function(data){
            if(data == 1){
                showAlert('success', 'Published sliders updated successfully');
            }
            else{
                showAlert('danger', 'Something went wrong');
            }
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>