<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Slider Information')); ?></h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="<?php echo e(route('sliders.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label"><?php echo e(__('Slider Images')); ?></label>
                    <strong>(850px*315px)</strong>
                </div>
                <div class="col-sm-9">
                    <div id="photos">

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
        $("#photos").spartanMultiImagePicker({
            fieldName:        'photos[]',
            maxCount:         10,
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
