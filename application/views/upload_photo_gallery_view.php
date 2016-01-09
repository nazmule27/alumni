<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <h2 class="col-lg-12">Upload Photo Gallery</h2>
                <br>
                <br>
                <div class="col-lg-12 padb20">
                    <img class="gallery_img" id="gallery_img" src="" alt="">
                    <div class="hints">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-success">
                                <h4 class="list-group-item-heading">Instruction:</h4>
                                <p class="list-group-item-text">Image should be jpg or jpeg format.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <form role="form" method="post" action="<?=base_url();?>upload_photo_gallery/upload_photo" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <input type="file" name="gallery_img" id="gallery_img" onchange="readPhotoURL(this);">
                        <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                    </div>
                    <div class="form-group col-md-5 col-sm-6">
                        <input type="text" id="photo_caption" name="photo_caption" class="form-control custom-text" maxlength="125"  placeholder="Give photo caption *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Upload</button>
                    </div>
                </form>
            </div>
            <?php if (isset($success_msg)) { echo $success_msg; } ?>
        </div>
    </div>
</div>
<!-- /edit_profile_biography -->
<?php
$this->load->view('common/footer');
?>
