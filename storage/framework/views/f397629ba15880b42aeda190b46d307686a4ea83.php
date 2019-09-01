<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Buat Event Kegiatan')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('community_event.create')); ?>"><?php echo e(__('Create Event')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="" action="<?php echo e(route('community_event.submit')); ?>" method="POST" enctype="multipart/form-data" id="community_event_form">
                            <?php echo csrf_field(); ?>
                          
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2 bg-red">
                                    <?php echo e(__('Basic Info')); ?>

                                </div>

                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Nama Event')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="nama_event" placeholder="<?php echo e(__('Nama Event / Kegiatan')); ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Deskripsi Event')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="editor" id="deskripsi" name="deskripsi" rows="5">
                                            </textarea>
                                        </div>
                                    </div>                                                
                                    <br>    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Lokasi Event')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="lokasi" placeholder="<?php echo e(__('Lokasi Tempat Event / Kegiatan')); ?>" required>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Jenis Event')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3" name="id_jenis" id="id_jenis">
                                                <option value="">:: Pilih Jenis Event ::</option>
                                                <?php $__currentLoopData = \App\JenisEvent::orderBy('jenis_event', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $jev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($jev->id_jenis); ?>"><?php echo e(__($jev->jenis_event)); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </select>    
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Tanggal Mulai')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulainya Event" required>
                                        </div>
                                    </div>   

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Tanggal Selesai')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Berakhirnya Event" required>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Jam Mulai')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="jam_mulai" placeholder="Event dimulai pada pukul.." onkeypress="formatTime(this)" MaxLength="8" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Jam Selesai')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="jam_selesai" placeholder="Event berakhir pada pukul.." onkeypress="formatTime(this)" MaxLength="8" required>
                                        </div>
                                    </div>    
                                  
                                  <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Butuh Donasi ?')); ?> <span class="required-star"></span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3 tgl" name="is_butuh_donasi" id="is_butuh_donasi">
                                                 <option value=''>:: Pilih Opsi ::</option>
                                                 <option value='0'>Tidak Perlu</option>
                                                 <option value='1'>Perlu</option>
                                            </select>    
                                        </div>
                                  </div>   

                                  <div class="row" id="sec_desc_donasi" style="display: none;">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Deskripsikan Alasan Butuh Donasi :')); ?> <span class="required-star"></span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control mb-3 rounded-0" id="deskripsi_donasi" name="deskripsi_donasi" rows="5">
                                            </textarea> 
                                        </div>
                                  </div>    
                                    
                                <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Butuh Sponsorship ?')); ?> <span class="required-star"></span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3 tgl" name="is_butuh_sponsor" id="is_butuh_sponsor">
                                                 <option value=''>:: Pilih Opsi ::</option>
                                                 <option value='0'>Tidak Perlu</option>
                                                 <option value='1'>Perlu</option>
                                            </select>    
                                        </div>
                                </div>     
                                  
                                <div class="row" id="sec_desc_sponsor" style="display: none;">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Deskripsikan Alasan Butuh Sponsorship :')); ?> <span class="required-star"></span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control mb-3 rounded-0" id="deskripsi_sponsor" name="deskripsi_sponsor" rows="5">
                                            </textarea> 
                                        </div>
                                </div>    


                              </div>      
                                
                            </div>

                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Foto')); ?>

                                </div>

                                <div class="form-box-content p-3">
                                    <div id="product-images">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label><?php echo e(__('Foto Utama')); ?> <span class="required-star">*</span></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" name="photos" id="photos-1" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                                <label for="photos-1" class="mw-100 mb-3">
                                                    <span></span>
                                                    <strong>
                                                        <i class="fa fa-upload"></i>
                                                        <?php echo e(__('Pilih Gambar')); ?>

                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--    
                                    <div class="text-right">
                                        <button type="button" class="btn btn-info mb-3" onclick="add_more_slider_image()"><?php echo e(__('Tambah Lagi')); ?></button>
                                    </div>
                                    -->

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Gambar Thumbnail')); ?> <small>(290x300)</small> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="thumbnail_img" id="file-2" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-2" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    <?php echo e(__('Choose image')); ?>

                                                </strong>
                                            </label>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                        <!--        
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Videos')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Video From')); ?></label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="video_provider">
                                                    <option value="youtube"><?php echo e(__('Youtube')); ?></option>
                                                    <option value="dailymotion"><?php echo e(__('Dailymotion')); ?></option>
                                                    <option value="vimeo"><?php echo e(__('Vimeo')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Video URL')); ?></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="video_link" placeholder="<?php echo e(__('Video link')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!--
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Description')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Description')); ?></label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <textarea class="editor" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->


                            <div class="form-box mt-4 text-right">
                                <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="jenisSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Pilih Jenis Event</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="target-category heading-6">
                        <span class="mr-3"><?php echo e(__('Target Jenis Event')); ?>:</span>
                    </div>
                    <div class="row no-gutters modal-categories mt-2 mb-2">
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar">
                                <div class="modal-category-list has-right-arrow">
                                    <ul id="jenis_events">
                                        <?php $__currentLoopData = \App\JenisEvent::orderBy('jenis_event', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $jev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li onclick="get_subcategories_by_category(this, <?php echo e($jev->id_jenis); ?> , <?php echo e($jev->jenis_event); ?>)"><?php echo e(__($jev->jenis_event)); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                    <button type="button" class="btn btn-primary" onclick="closeModal()"><?php echo e(__('Confirm')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        var jns_event_name = "";
        var jenis_id = null;
        
        $(document).ready(function(){
            $('#subcategory_list').hide();
            //$('#subsubcategory_list').hide();
            $('#is_butuh_donasi').change(function() {
                var opsi = $(this).val();
                if (opsi == 1) {
                    $("#sec_desc_donasi").show();
                } else {
                    $("#sec_desc_donasi").hide();
                }
            });

            $('#is_butuh_sponsor').change(function(){
                var opsi = $(this).val();
                if(opsi == 1) {
                    $("#sec_desc_sponsor").show();
                } else {
                    $("#sec_desc_sponsor").hide();
                }
            });
        });

        function list_item_highlight(el){
            $(el).parent().children().each(function(){
                $(this).removeClass('selected');
            });
            $(el).addClass('selected');
        }

        function get_subcategories_by_category(el, jenis_id, jenis_nama){
            list_item_highlight(el);
            jenis_id = jenis_id;
            jns_event_name = jenis_nama;
        }


        function closeModal(){
            if(jenis_id > 0) {
                $('#jenis_id').val(jenis_id);
                $('#jns_event').val(jns_event_name);
            }
            else{
                alert('Please choose the event types...');
                //console.log(category_id);
                //showAlert();
            }
        }

   

        var photo_id = 2;
        function add_more_slider_image(){
            var photoAdd =  '<div class="row">';
            photoAdd +=  '<div class="col-2">';
            photoAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-10">';
            photoAdd +=  '<input type="file" name="photos[]" id="photos-'+photo_id+'" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '<label for="photos-'+photo_id+'" class="mw-100 mb-3">';
            photoAdd +=  '<span></span>';
            photoAdd +=  '<strong>';
            photoAdd +=  '<i class="fa fa-upload"></i>';
            photoAdd +=  "<?php echo e(__('Choose image')); ?>";
            photoAdd +=  '</strong>';
            photoAdd +=  '</label>';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
            $('#product-images').append(photoAdd);

            photo_id++;
            imageInputInitialize();
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>