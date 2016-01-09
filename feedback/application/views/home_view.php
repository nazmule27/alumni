<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
$CI = &get_instance();
$role = $CI->session->userdata('role');
$username = $CI->session->userdata('username');
$full_name = $CI->session->userdata('full_name');
?>

<div class="container paddingT75">
    <div class="row">
        <div class="col-md-12 col-ms-12 col-xs-12">
            <p >Name: <?php echo $full_name;?></p>
            <p >Student ID: <?php echo $username;?></p>
            <p >Feedback Detail:</p>
            <table class="table">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Courses</th>
                    <th>Course Feedback</th>
                    <th>Instructor Feedback</th>
                </tr>
                </thead>
                <tbody>
                <?php $k=1; for ($i = 0; $i < count($course); ++$i) {?>
                    <tr>
                        <td><?php echo $k;?></td>
                        <td><?php echo $course[$i]->course_id;?></td>
                        <?php
                            $status=$course[$i]->course_status;
                            if($status=='1') {
                                $status='btn disabled disableCus';
                            }
                        ?>
                        <td><a target="_blank" class="<?php echo $status ?>" href="<?=base_url();?>course_feedback?cid=<?php echo $course[$i]->course_id;?>"> <?php echo $course[$i]->course_id;?> Give Feedback </a></td>
                        <td>
                        <?php
                            $teachers=explode(",", $course[$i]->teacher_id);
                            $teacher_status=explode(",", $course[$i]->teacher_status);
                            for ($x = 0; $x < count($teachers); ++$x) {
                                $status=$teacher_status[$x];
                                if($status=='1') {
                                    $status='btn disabled disableCus';
                                }
                            ?>
                                <p class="margin0"><a target="_blank" class="<?php echo $status ?>" href="<?=base_url();?>instructor_feedback?cid=<?php echo $course[$i]->course_id;?>&tid=<?php echo $teachers[$x];?>"> <?php echo $teachers[$x];?> Give Feedback </a></p>
                            <?php
                            }
                         ?>
                        </td>

                    </tr>
                    <?php $k++;} ?>
                </tbody>
            </table>
            <?php
            $exit_status='btn disabled disNon';
            if (isset($exit[0]->exit_status)) {
                $exit_status=$exit[0]->exit_status;
                if($exit_status=='1') {
                    $exit_status='btn disabled disableCus';
                }
                else if($exit_status=='0') {
                    $exit_status='';
                }
            }
            ?>
            <a target="_blank" class="<?php echo $exit_status ?>" href="<?=base_url();?>exit_feedback">Exit Survey</a>
        </div>

    </div>
</div>
<!-- /home -->
<?php
$this->load->view('common/footer');
?>
