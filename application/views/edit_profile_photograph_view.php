<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
if(file_exists("assets/img/profile/$s_photograph.jpg"))
    $profileImage = "$s_photograph.jpg";
else
    $profileImage = "nonimage.jpg";
?>
<div class="container paddingT75">
    <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-4 col-sm-5 sidebar-offcanvas">
            <div class="panel panel-success">
                <div class="panel-heading"><strong><i class="glyphicon glyphicon-wrench"></i> Edit Profile</strong></div>
                <div class="panel-body light-green">
                    <p><a href="<?=base_url();?>view_profile"><i class="glyphicon glyphicon-search"></i> View Profile</a></p>
                    <p><a href="<?=base_url();?>edit_profile/password"><i class="glyphicon glyphicon-pencil"></i> Change Password</a></p>
                    <p><a href="<?=base_url();?>edit_profile/index"><i class="glyphicon glyphicon-pencil"></i> Edit Personal</a></p>
                    <p><a href="<?=base_url();?>edit_profile/education"><i class="glyphicon glyphicon-pencil"></i> Edit Education</a></p>
                    <p><a href="<?=base_url();?>edit_profile/biography"><i class="glyphicon glyphicon-pencil"></i> Edit Biography</a></p>
                    <p><a href="<?=base_url();?>edit_profile/employment"><i class="glyphicon glyphicon-pencil"></i> Edit Employment</a></p>
                    <p><a href="<?=base_url();?>edit_profile/photograph"><i class="glyphicon glyphicon-pencil"></i> <b>Edit Photograph</b></a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row">
                <h2 class="col-lg-12">Edit Photograph</h2>
                <br>
                <br>
                <div class="col-lg-12 padb20">
                    <img class="profile-photo" id="profile_img" src="<?=base_url();?>assets/img/profile/<?php echo $profileImage;?>" alt="Image not found">
                    <div class="hints">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-success">
                                <h4 class="list-group-item-heading">Instruction:</h4>
                                <p class="list-group-item-text">Image should be jpg format and <br>360 pixel width and 400 pixel height.</p>
                            </a>
                        </div>
                        <p><a target="_blank" href="http://www.resize.it/advanced-online-photo-tools.html">[Photo can edit here]</a> </p>
                        <p><a target="_blank" href="http://www.garyshood.com/imageconvert/">[Photo can edit here]</a> </p>
                    </div>
                </div>
                <form role="form" method="post" action="<?=base_url();?>edit_profile/update_photograph" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <input type="file" name="profile_img" id="profile_img" onchange="readURL(this);">
                        <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Upload</button>
                    </div>
                </form>
            </div>
            <?php /*if (isset($success_msg)) { echo $success_msg; } */?>
            <?php echo $this->session->flashdata('success_msg_pho'); ?>
        </div>
    </div>
</div>
<!-- /edit_profile_biography -->
<?php
$this->load->view('common/footer');
?>
