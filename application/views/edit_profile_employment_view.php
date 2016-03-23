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
                    <p><a href="<?=base_url();?>edit_profile/password"><i class="glyphicon glyphicon-pencil"></i> Change Password</a></p>
                    <p><a href="<?=base_url();?>edit_profile/index"><i class="glyphicon glyphicon-pencil"></i> Edit Personal</a></p>
                    <p><a href="<?=base_url();?>edit_profile/education"><i class="glyphicon glyphicon-pencil"></i> Edit Education</a></p>
                    <p><a href="<?=base_url();?>edit_profile/biography"><i class="glyphicon glyphicon-pencil"></i> Edit Biography</a></p>
                    <p><a href="<?=base_url();?>edit_profile/employment"><i class="glyphicon glyphicon-pencil"></i> <b>Edit Employment</b></a></p>
                    <p><a href="<?=base_url();?>edit_profile/photograph"><i class="glyphicon glyphicon-pencil"></i> Edit Photograph</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row">
                <h2 class="col-lg-12">Edit Employment</h2>
                <br>
                <br>
                <form role="form" method="post" action="<?=base_url();?>edit_profile/update_employment">
                    <div class="form-group col-md-6">
                        <label for="designation">Your designation *</label>
                        <input type="text" class="form-control custom-text" name="designation" id="designation" placeholder="Your designation *" value="<?php echo $s_employment[0]->designation;?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="organization">Your organization *</label>
                        <input type="text" class="form-control custom-text" name="organization" id="organization" placeholder="Your organization Name *" value="<?php echo $s_employment[0]->organization;?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">Your location *</label>
                        <input type="text" class="form-control custom-text" name="location" id="location" placeholder="Location *" value="<?php echo $s_employment[0]->location;?>" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Update</button>
                    </div>
                </form>
            </div>
            <?php if (isset($success_msg)) { echo $success_msg; } ?>
        </div>
    </div>
</div>
<!-- /edit_profile_employment-->
<?php
$this->load->view('common/footer');
?>
