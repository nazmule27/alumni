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
            <h4>Feedback on instructor <?php echo  $username;?> of <?php echo $course_id; ?></h4>
            <a class="download-pdf" href="<?php echo base_url().'super_admin_home/instructor_feedback_pdf/'.$teacher_id.'/'.$course_id.'/'.$semester_id ?>"><img src="<?=base_url();?>assets/img/pdfIcon.png" alt=""></a>
            <br>
            <table class="table">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Statement</th>
                    <th>Strongly Agree</th>
                    <th>Partial Agree</th>
                    <th>Uncertain</th>
                    <th>Disagree</th>
                    <th>Strongly Disagree</th>
                </tr>
                </thead>
                <tbody>
                <?php $k=1; for ($i = 0; $i < count($teacher_feedback); ++$i) {?>
                    <tr>
                        <td><?php echo $k;?></td>
                        <td><?php echo $teacher_feedback[$i]->question;?></td>
                        <td><?php echo $teacher_feedback[$i]->count4;?></td>
                        <td><?php echo $teacher_feedback[$i]->count3;?></td>
                        <td><?php echo $teacher_feedback[$i]->count2;?></td>
                        <td><?php echo $teacher_feedback[$i]->count1;?></td>
                        <td><?php echo $teacher_feedback[$i]->count0;?></td>
                    </tr>
                    <?php $k++;} ?>
                </tbody>
            </table>
            <h4>Comments:</h4>
            <a class="download-pdf" href="<?php echo base_url().'super_admin_home/instructor_feedbackComments_pdf/'.$teacher_id.'/'.$course_id.'/'.$semester_id ?>"><img src="<?=base_url();?>assets/img/pdfIcon.png" alt=""></a>
            <br>
            <?php $k=1; for ($i = 0; $i < count($instructor_comment); ++$i) {?>
                <p><?php echo $k.'. '.$instructor_comment[$i]->comments;?></p>
            <?php $k++;} ?>
        </div>

    </div>
</div>
<!-- /home -->
<?php
$this->load->view('common/footer');
?>

