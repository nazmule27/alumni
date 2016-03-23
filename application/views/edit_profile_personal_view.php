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
                    <p><a href="<?=base_url();?>edit_profile/index"><i class="glyphicon glyphicon-pencil"></i> <b>Edit Personal</b></a></p>
                    <p><a href="<?=base_url();?>edit_profile/education"><i class="glyphicon glyphicon-pencil"></i> Edit Education</a></p>
                    <p><a href="<?=base_url();?>edit_profile/biography"><i class="glyphicon glyphicon-pencil"></i> Edit Biography</a></p>
                    <p><a href="<?=base_url();?>edit_profile/employment"><i class="glyphicon glyphicon-pencil"></i> Edit Employment</a></p>
                    <p><a href="<?=base_url();?>edit_profile/photograph"><i class="glyphicon glyphicon-pencil"></i> Edit Photograph</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row">
                <h2 class="col-lg-12">Edit Personal Information</h2>
                <br>
                <br>
                <form role="form" method="post" action="<?=base_url();?>edit_profile/update_personal_info">
                    <div class="form-group col-md-6">
                        <label for="full_name">Your full name *</label>
                        <input type="text" class="form-control custom-text" name="full_name" id="full_name" placeholder="Your full name *" readonly value="<?php echo $s_personal[0]->full_name;?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="father_name">Your father name</label>
                        <input type="text" class="form-control custom-text" name="father_name" id="father_name" placeholder="Your father name *" value="<?php echo $s_personal[0]->father_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mother_name">Your mother name</label>
                        <input type="text" class="form-control custom-text" name="mother_name" id="mother_name" placeholder="Your mother name *" value="<?php echo $s_personal[0]->mother_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Your email *</label>
                        <input type="email" class="form-control custom-text" name="email" id="email" placeholder="Your email *" value="<?php echo $s_personal[0]->email;?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Your cell number *</label>
                        <input type="text" class="form-control custom-text" name="mobile" id="mobile" maxlength="15" placeholder="Your cell number (8801xxxxxxxxx) *" value="<?php echo $s_personal[0]->mobile;?>" required="">
                    </div>
                    <?php
                    if(($s_personal[0]->mobile_yn)==1) {
                        $checked_m = 'checked=""';
                    }
                    else{
                        $checked_m='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="mobile_yn"><input type="checkbox" name="mobile_yn" <?php echo $checked_m ?> value=""> Hide from others ?</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Your gender *</label>
                        <select class="form-control custom-text" name="gender" id="gender" required>
                            <option>Select Gender</option>
                            <option <?php if($s_personal[0]->gender=='Male') echo ' selected="selected"' ?> value="Male">Male</option>
                            <option <?php if($s_personal[0]->gender=='Female') echo ' selected="selected"' ?>  value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="placeholder">Your birth date *</label>
                        <input type="text" class="form-control custom-text" name="birth_date" id="birth_date" placeholder="Your Date of Birth *" value="<?php echo $s_personal[0]->birth_date;?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="district">Your home district *</label>
                        <?php
                        $options=$district;
                        $options = array('0' => 'Select District') + $options;
                        $district_id = $s_personal[0]->district;
                        echo form_dropdown('district', $options, $selected=$district_id, 'class="form-control custom-text"');
                        ?>
                    </div>
                    <?php
                    if(($s_personal[0]->district_yn)==1) {
                        $checked_d = 'checked=""';
                    }
                    else{
                        $checked_d='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="district_yn"><input type="checkbox" name="district_yn" <?php echo $checked_d ?> value=""> Hide from others ?</label>
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
<!-- /edit_profile_personal -->
<?php
$this->load->view('common/footer');
?>
