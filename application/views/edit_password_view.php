<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container paddingT75">
    <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-4 col-sm-5 sidebar-offcanvas">
            <div class="panel panel-success">
                <div class="panel-heading"><strong><i class="glyphicon glyphicon-wrench"></i> Edit Profile</strong></div>
                <div class="panel-body light-green">
                    <p><a href="<?=base_url();?>view_profile"><i class="glyphicon glyphicon-search"></i> View Profile</a></p>
                    <p><a href="<?=base_url();?>edit_profile/password"><i class="glyphicon glyphicon-pencil"></i> <b> Change Password</b></a></p>
                    <p><a href="<?=base_url();?>edit_profile/index"><i class="glyphicon glyphicon-pencil"></i> Edit Personal</a></p>
                    <p><a href="<?=base_url();?>edit_profile/education"><i class="glyphicon glyphicon-pencil"></i> Edit Education</a></p>
                    <p><a href="<?=base_url();?>edit_profile/biography"><i class="glyphicon glyphicon-pencil"></i> Edit Biography</a></p>
                    <p><a href="<?=base_url();?>edit_profile/employment"><i class="glyphicon glyphicon-pencil"></i> Edit Employment</a></p>
                    <p><a href="<?=base_url();?>edit_profile/photograph"><i class="glyphicon glyphicon-pencil"></i> Edit Photograph</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row">
                <h2 class="col-lg-12">Edit password</h2>
                <br>
                <br>

                <form id="pchange" role="form" onsubmit="return isPasswordMatch()" method="post" action="<?=base_url();?>edit_profile/update_password">
                    <div class="form-group col-md-6">
                        <label for="old_password">Your current password *</label>
                        <input type="password" class="form-control custom-text" name="old_password" id="old_password" placeholder="Your current password *" value="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="organization">Type your new password *</label>
                        <input type="password" class="form-control custom-text" name="new_password" id="new_password" placeholder="Your new password *" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">Type again your new password *</label>
                        <input type="password" class="form-control custom-text" name="confirmPassword" id="confirmPassword"  placeholder="Your new password again*" required>
                        <div id="divCheckPassword"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Update</button>
                    </div>
                </form>
            </div>
            <?php if (isset($msg)) { echo $msg; } ?>
        </div>
    </div>
</div>
<!-- /edit_profile_employment-->
<?php
$this->load->view('common/footer');
?>
