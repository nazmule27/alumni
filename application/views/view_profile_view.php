<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
$s_photograph=$student[0]->student_id;
if(file_exists("assets/img/profile/$s_photograph.jpg"))
    $profileImage = "$s_photograph.jpg";
else
    $profileImage = "nonimage.jpg";
?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row>">
                <div class="profileCon">
                    <img class="profile-img2" src="<?=base_url();?>assets/img/profile/<?php echo $profileImage;?>">
                    <div class=" biography">
                        <h4>Biography of <b><?php echo $student[0]->full_name;?></b> </h4>
                        <?php echo $student[0]->biography;?>
                    </div>
                </div>
                <div class="profileTextCon">
                    <h3 class="profDetail">Detail of <b><?php echo $student[0]->full_name;?></b></h3>
                    <p><span class="left-half2">Student Id :&nbsp;</span> <span class="right-half2"><?php echo $student[0]->student_id;?></span></p>
                    <p><span class="left-half2">Father Name :&nbsp;</span> <span class="right-half"><?php echo $student[0]->father_name;?></span></p>
                    <p><span class="left-half2">Mother Name :&nbsp;</span> <span class="right-half"><?php echo $student[0]->mother_name;?></span></p>
                    <p><span class="left-half2">Birth Date :&nbsp;</span> <span class="right-half"><?php echo $student[0]->birth_date;?></span></p>
                    <p><span class="left-half2">Gender :&nbsp;</span> <span class="right-half"><?php echo $student[0]->gender;?></span></p>
                    <p><span class="left-half2">Home District :&nbsp;</span> <span class="right-half"><?php echo $student[0]->district_name;?></span></p>
                    <p><span class="left-half2">Email :&nbsp;</span> <span class="right-half"><?php echo $student[0]->email;?></span></p>
                    <p><span class="left-half2">Cell Phone :&nbsp;</span> <span class="right-half"><?php echo $student[0]->mobile;?></span></p>
                    <p><span class="left-half2">High School Name:&nbsp;</span> <span class="right-half"><?php echo $student[0]->high_school_name;?></span></p>
                    <p><span class="left-half2">High School Location:&nbsp;</span> <span class="right-half"><?php echo $student[0]->high_school_location;?></span></p>
                    <p><span class="left-half2">High School Passing Year:&nbsp;</span> <span class="right-half"><?php echo $student[0]->high_school_passing_year;?></span></p>
                    <p><span class="left-half2">College Name:&nbsp;</span> <span class="right-half"><?php echo $student[0]->college_name;?></span></p>
                    <p><span class="left-half2">College Location:&nbsp;</span> <span class="right-half"><?php echo $student[0]->college_location;?></span></p>
                    <p><span class="left-half2">College Passing Year:&nbsp;</span> <span class="right-half"><?php echo $student[0]->college_passing_year;?></span></p>
                    <p><span class="left-half2">Undergraduate University:&nbsp;</span> <span class="right-half"><?php echo $student[0]->u_university_name;?></span></p>
                    <p><span class="left-half2">Undergraduate University Location:&nbsp;</span> <span class="right-half"><?php echo $student[0]->u_university_location;?></span></p>
                    <p><span class="left-half2">Subject :&nbsp;</span> <span class="right-half"><?php echo $student[0]->u_university_subject;?></span></p>
                    <p><span class="left-half2">Admission Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->u_university_admission_year;?></span></p>
                    <p><span class="left-half2">Passing Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->u_university_passing_year;?></span></p>
                    <p><span class="left-half2">Postgraduate University :&nbsp;</span> <span class="right-half"><?php echo $student[0]->p_university_name;?></span></p>
                    <p><span class="left-half2">Postgraduate University Location:&nbsp;</span> <span class="right-half"><?php echo $student[0]->p_university_location;?></span></p>
                    <p><span class="left-half2">Subject :&nbsp;</span> <span class="right-half"><?php echo $student[0]->p_university_subject;?></span></p>
                    <p><span class="left-half2">Admission Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->p_university_admission_year;?></span></p>
                    <p><span class="left-half2">Passing Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->p_university_passing_year;?></span></p>
                    <p><span class="left-half2">Doctoral University :&nbsp;</span> <span class="right-half"><?php echo $student[0]->d_university_name;?></span></p>
                    <p><span class="left-half2">Doctoral University :&nbsp;</span> <span class="right-half"><?php echo $student[0]->d_university_location;?></span></p>
                    <p><span class="left-half2">Subject :&nbsp;</span> <span class="right-half"><?php echo $student[0]->d_university_subject;?></span></p>
                    <p><span class="left-half2">Admission Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->d_university_admission_year;?></span></p>
                    <p><span class="left-half2">Passing Year :&nbsp;</span> <span class="right-half"><?php echo $student[0]->d_university_passing_year;?></span></p>
                    <p><span class="left-half2">Current Location:&nbsp;</span> <span class="right-half"><?php echo $student[0]->location;?></span></p>
                    <p><span class="left-half2">Designation:&nbsp;</span> <span class="right-half"><?php echo $student[0]->designation;?></span></p>
                    <p><span class="left-half2">Organization:&nbsp;</span> <span class="right-half"><?php echo $student[0]->organization;?></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /view_profile -->

<?php
$this->load->view('common/footer');
?>
