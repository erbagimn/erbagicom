<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Banner Information')); ?></h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="<?php echo e(route('home_banners.update', $banner->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3" for="url"><?php echo e(__('URL')); ?></label>
                <div class="col-sm-9">
                    <input type="text" placeholder="<?php echo e(__('URL')); ?>" id="url" name="url" value="<?php echo e($banner->url); ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label"><?php echo e(__('Banner Images')); ?></label>
                    <strong>(850px*420px)</strong>
                </div>
                <div class="col-sm-9">
                    <?php if($banner->photo != null): ?>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="img-upload-preview">
                                <img src="<?php echo e(asset($banner->photo)); ?>" alt="" class="img-responsive">
                                <input type="hidden" name="previous_photo" value="<?php echo e($banner->photo); ?>">
                                <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div id="photo">

                    </div>
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

<script type="text/javascript">

    $(document).ready(function(){

        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });

        $('.demo-select2').select2();

        $("#photo").spartanMultiImagePicker({
            fieldName:        'photo',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-9 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
    });

</script>
