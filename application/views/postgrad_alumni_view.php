<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container paddingT75" id="u_a">
    <div class="row">
        <div class="col-lg-12">
            <h3>All students</h3>
            <hr>
            <div class="row">
                <label for="passing_year" class="pull-left">Filter by passing year</label>
                <div class="form-group col-md-2">
                    <select class="form-control custom-text col-md-12" name="passing_year" id="passing_year" required>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 id="u_con"">

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="mini-profile-img-con">
                                <img class="mini-profile-img" id="" src="assets/img/profile/<?php echo $all_student[$i]->student_id;?>.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                        <div class="mini-profile-text-con">
                            <center><h3 class="mini-profDetail"><a href="#"> <?php echo $all_student[$i]->full_name;?></a></h3></center>
                            <p><span class="mini-left-half">Student ID:&nbsp;</span> <span class="right-half"> <?php echo $all_student[$i]->student_id;?></span></p>
                            <p><span class="mini-left-half">Undergrad Passing Year:&nbsp;</span> <span class="right-half"> <?php echo $all_student[$i]->u_university_passing_year;?></span></p>
                            <p><span class="mini-left-half">Email:&nbsp;</span> <span class="right-half"> <?php echo $all_student[$i]->email;?></span></p>
                            <p><span class="mini-left-half">Current Location:&nbsp;</span> <span class="right-half"> <?php echo $all_student[$i]->location;?></span></p>
                        </div>
                    </div>

            </div>

        </div>
        <!--end block-->

        </div>
    </div>
</div>
<!-- /undergrad_alumni -->

<?php
$this->load->view('common/footer');
?>
