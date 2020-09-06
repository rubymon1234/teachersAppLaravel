@extends('layouts.admin')
@section('title', 'Role Management')
@section('content')
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">@yield('title') :: Event Detail </h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-6">
                                <label>Category</label>
                                <select name="category" class="form-control" required="required">
                                    <option value="0">Select categorg</option>
                                    <?php foreach ($categorys as $key => $category) { ?>
                                        <option value='<?php echo $category->id ?>' > <?php echo $category->event_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>StartDate & EndDate:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" name="startEndDate" class="form-control pull-right" id="reservation" required="required">
                                </div>
                            </div>
                            <div class="timeline-item">
                                <label>Layout Image:</label>
                                  <div class="timeline-body">
                                    <img src="http://placehold.it/150x100" alt="..." style="width: 150px; height: 103px;">
                                  </div>
                                  <input type="file" id="layoutImage" name="layoutImage" class="form-control-file" value="" onchange="previewFile('#layoutImage', ' .timeline-body img', '178X246')">
                                  <a href="javascript:void(0)" class="DeleteImage" onclick="deletePreview('.imgProfile img','#layoutImage');">Delete This Image</a>
                            </div>
                            <div class="form-group">
                                <label>Event Images</label>
                                <input type="file" name="eventImage[]"   class="form-control" placeholder="Enter Description." value="{{ old('eventImage') }}" multiple >
                            </div>
                            <div class="form-group">
                                <label>PriceRange (ex: $100 - $200)</label>
                                <input type="text" name="prizeRange" class="form-control" placeholder="Enter Display Name." value="{{ old('prizeRange') }}" required="required">
                            </div>
                            <div class="box-footer">
                                @if ($errors->any())
                                    <label class="control-label" for="inputError" style="color: #dd4b39">
                                        <i class="fa fa-times-circle-o" ></i> 
                                        {{ implode('', $errors->all(':message')) }} .
                                    </label>
                                @endif
                                <button type="submit" class="btn btn-danger pull-right" name="Cancel" value="cancel">Cancel</button>&nbsp;
                                <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px;" name="Update" value="Save">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-12">
                <div class="timeline-body">
                    <?php
                    $cmsDetailGallery = unserialize($cmsDetailGallery);
                    foreach ($cmsDetailGallery['event_image'] as $key => $gallery) { ?>
                        <img id="u_{{ $key }}" src="{{ url('/') }}/eventEventImg/{{ $gallery }}" alt="..." style="width: 150px; height: 103px;">
                        <a href="javascript:void(0)" class="DeleteImage" onclick="deletePreviewNow('{{ $gallery }} ', {{ $key }});">Delete This Image</a>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
</section>
@endsection

<script type="text/javascript">
    function deletePreviewNow(image,divId){

        alert(image);

    }
    function deletePreview(previewField,field) {
        //$("input[type='file']").css('visibility', 'hidden');
        $('.deletepreview').hide();
        $(previewField).attr('src', c7Object['NoImgFound']);
        if (typeof ($(previewField).attr('data-old-src') != undefined)) {
            $(previewField).attr('src', $(previewField).attr('data-old-src'));
        }
        $(field).val('');   
        $("input[name='hiddenImageName']").val('');
    }

    function previewFile(field, previewField, imgHW) {

        var preview = document.querySelector(previewField);
        var file = document.querySelector(field).files[0];
        //10 mb max
        if (file.size > 10485760) {
            alert('Upload a valid image less than 10 MB');
            $(field).val('');
            $('.deletepreview').hide();
            return false;
        }
        if (file.type != "image/jpeg" && file.type != "image/png") {
            alert('Upload a valid image file (.jpeg / .png)');
             $('.deletepreview').hide();
            $(field).val('');
            return false;
        }
        var reader = new FileReader();
        var old_src = preview.src;
        reader.addEventListener("load", function () {
            preview.src = reader.result;
           // $(previewField).attr('data-old-src', old_src);
            $(previewField).css('visibility', 'visible');
            $('.deletepreview').show();
            $("input[name='hiddenImageName']").val(old_src);
        }, false);
        if (file) {
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;

                    imgsize = imgHW.split('X');
                    var img_status = 1;
                    if (typeof (imgsize[0]) != undefined) {
                        if (height < imgsize[0]) {
                            img_status = 0;
                        }

                    }
                    if (typeof (imgsize[1]) != undefined) {
                        if (width < imgsize[1]) {
                            img_status = 0;
                        }
                    }

                    if (img_status == 0) {
                        alert('Please upload an image larger than ' + imgHW + '( H X W)');
                         $('.deletepreview').hide();
                        $(field).val('');
                        if (old_src != '') {
                            $(previewField).attr('src', old_src);
                        } else {
                            $(previewField).attr('src', c7Object['noImage']);
                        }

                    }

                };

            }
        }
    }
</script>
