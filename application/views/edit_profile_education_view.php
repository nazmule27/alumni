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
                    <p><a href="<?=base_url();?>edit_profile/education"><i class="glyphicon glyphicon-pencil"></i> <b>Edit Education</b></a></p>
                    <p><a href="<?=base_url();?>edit_profile/biography"><i class="glyphicon glyphicon-pencil"></i> Edit Biography</a></p>
                    <p><a href="<?=base_url();?>edit_profile/employment"><i class="glyphicon glyphicon-pencil"></i> Edit Employment</a></p>
                    <p><a href="<?=base_url();?>edit_profile/photograph"><i class="glyphicon glyphicon-pencil"></i> Edit Photograph</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <?php if (isset($success_msg)) { echo $success_msg; } ?>
            <div class="row">
                <h2 class="col-lg-12">Edit Educational Information</h2>
                <br>
                <br>
                <form role="form" method="post" action="<?=base_url();?>edit_profile/update_education_info">
                    <div class="col-lg-12">
                        <h3 class="edit-heading">Secondary Education</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="high_school_name">Your high school name</label>
                        <input type="text" class="form-control custom-text" name="high_school_name" id="high_school_name" placeholder="Your high school name" value="<?php echo $s_education[0]->high_school_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="high_school_location">Your high school location</label>
                        <input type="text" class="form-control custom-text" name="high_school_location" id="high_school_location" placeholder="Your high school location" value="<?php echo $s_education[0]->high_school_location;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="high_school_passing_year">Your high school passing year</label>
                        <input type="text" class="form-control custom-text" name="high_school_passing_year" id="high_school_passing_year" maxlength="4" placeholder="Your high school passing year" value="<?php echo $s_education[0]->high_school_passing_year;?>">
                    </div>

                    <div class="col-lg-12">
                        <h3 class="edit-heading">Higher Secondary Education</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="college_name">Your college name</label>
                        <input type="text" class="form-control custom-text" name="college_name" id="college_name" placeholder="Your college name *" value="<?php echo $s_education[0]->college_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="college_location">Your college location</label>
                        <input type="text" class="form-control custom-text" name="college_location" id="college_location" placeholder="Your college location" value="<?php echo $s_education[0]->college_location;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="college_passing_year">Your college passing year</label>
                        <input type="text" class="form-control custom-text" name="college_passing_year" id="college_passing_year" maxlength="4" placeholder="Your college passing year" value="<?php echo $s_education[0]->college_passing_year;?>">
                    </div>

                    <div class="col-lg-12">
                        <h3 class="edit-heading">Under Graduate Education</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="u_university_name">Your university name *</label>
                        <input type="text" class="form-control custom-text" name="u_university_name" id="u_university_name" placeholder="Your university name *" value="<?php echo $s_education[0]->u_university_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="u_university_location">Your university location *</label>
                        <input type="text" class="form-control custom-text" name="u_university_location" id="u_university_location" placeholder="Your university location *" value="<?php echo $s_education[0]->u_university_location;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="u_university_subject">Your university subject name *</label>
                        <input type="text" class="form-control custom-text" name="u_university_subject" id="u_university_subject" placeholder="Your university subject name *" value="<?php echo $s_education[0]->u_university_subject;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="u_university_admission_year">Your university admission year *</label>
                        <input type="text" class="form-control custom-text" name="u_university_admission_year" maxlength="4" id="u_university_admission_year" placeholder="Your University Admission Year *" value="<?php echo $s_education[0]->u_university_admission_year;?>">
                    </div>
                    <?php
                    if(($s_education[0]->u_university_a_year_privateyn)==1) {
                        $checked_ug = 'checked=""';
                    }
                    else{
                        $checked_ug='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="u_university_a_year_privateyn"><input type="checkbox" name="u_university_a_year_privateyn" <?php echo $checked_ug ?> value=""> Hide from others ?</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="u_university_passing_year">Your university passing year *</label>
                        <input type="text" class="form-control custom-text" name="u_university_passing_year" id="u_university_passing_year" maxlength="4" placeholder="Your university passing year *" value="<?php echo $s_education[0]->u_university_passing_year;?>">
                    </div>

                    <div class="col-lg-12">
                        <h3 class="edit-heading">Post Graduate Education</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_university_name">Your university name *</label>
                        <input type="text" class="form-control custom-text" name="p_university_name" id="p_university_name" placeholder="Your university name *" value="<?php echo $s_education[0]->p_university_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_university_location">Your university location *</label>
                        <input type="text" class="form-control custom-text" name="p_university_location" id="p_university_location" placeholder="Your university location *" value="<?php echo $s_education[0]->p_university_location;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_university_subject">Your university subject name *</label>
                        <input type="text" class="form-control custom-text" name="p_university_subject" id="p_university_subject" placeholder="Your university subject name *" value="<?php echo $s_education[0]->p_university_subject;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="p_university_admission_year">Your university admission year *</label>
                        <input type="text" class="form-control custom-text" name="p_university_admission_year" maxlength="4" id="p_university_admission_year" placeholder="Your University Admission Year *" value="<?php echo $s_education[0]->p_university_admission_year;?>">
                    </div>
                    <?php
                    if(($s_education[0]->p_university_a_year_privateyn)==1) {
                        $checked_pg = 'checked=""';
                    }
                    else{
                        $checked_pg='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="p_university_a_year_privateyn"><input type="checkbox" name="p_university_a_year_privateyn" <?php echo $checked_pg ?> value=""> Hide from others ?</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_university_passing_year">Your university passing year *</label>
                        <input type="text" class="form-control custom-text" name="p_university_passing_year" maxlength="4" id="p_university_passing_year" placeholder="Your university passing year *" value="<?php echo $s_education[0]->p_university_passing_year;?>">
                    </div>

                    <div class="col-lg-12">
                        <h3 class="edit-heading">Doctoral Education</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="d_university_name">Your university name *</label>
                        <input type="text" class="form-control custom-text" name="d_university_name" id="d_university_name" placeholder="Your university name *" value="<?php echo $s_education[0]->d_university_name;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="d_university_location">Your university location *</label>
                        <input type="text" class="form-control custom-text" name="d_university_location" id="d_university_location" placeholder="Your university location *" value="<?php echo $s_education[0]->d_university_location;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="d_university_subject">Your Studied subject name *</label>
                        <input type="text" class="form-control custom-text" name="d_university_subject" id="d_university_subject" placeholder="Your studied subject name *" value="<?php echo $s_education[0]->d_university_subject;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="d_university_admission_year">Your university admission year *</label>
                        <input type="text" class="form-control custom-text" name="d_university_admission_year" maxlength="4" id="d_university_admission_year" placeholder="Your University Admission Year *" value="<?php echo $s_education[0]->d_university_admission_year;?>">
                    </div>
                    <?php
                    if(($s_education[0]->d_university_a_year_privateyn)==1) {
                        $checked_dg = 'checked=""';
                    }
                    else{
                        $checked_dg='';
                    }
                    ?>
                    <div class="form-group col-md-2 padding0">
                        <label class="per_check" for="d_university_a_year_privateyn"><input type="checkbox" name="d_university_a_year_privateyn" <?php echo $checked_dg ?> value=""> Hide from others ?</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="d_university_passing_year">Your university passing year *</label>
                        <input type="text" class="form-control custom-text" name="d_university_passing_year" maxlength="4" id="d_university_passing_year" placeholder="Your university passing year *" value="<?php echo $s_education[0]->d_university_passing_year;?>">
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default custom-text">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /edit_profile_personal -->
<?php
$this->load->view('common/footer');
?>
