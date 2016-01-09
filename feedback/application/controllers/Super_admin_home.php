<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_home extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
        $this->pdf->fontpath = 'font/';
        $this->load->model('admin_home_model');
        $this->load->model('instructor_home_model');
        if(($this->session->userdata('role'))!=='superadmin') {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index() {
        $data['my_courses'] = $this->admin_home_model->getCourses();
        $this->load->view('super_admin_home_view', $data);
    }
    public function feedback_summery_course_wise($tid, $cid, $semid) {
        $data['course_feedback'] = $this->instructor_home_model->getFeedbackSummeryForCourse($tid, $cid, $semid);
        $data['course_comment'] = $this->instructor_home_model->getCommentForCourse($tid, $cid, $semid);
        $data['teacher_id']=$tid;
        $data['course_id']=$cid;
        $data['semester_id']=$semid;
        $this->load->view('course_feedback_summery_view', $data);
    }
    public function feedback_summery_teacher_wise($tid, $cid, $semid) {
        $data['teacher_feedback'] = $this->instructor_home_model->getFeedbackSummeryForTeacher($tid, $cid, $semid);
        $data['instructor_comment'] = $this->instructor_home_model->getCommentForInstructor($tid, $cid, $semid);
        $data['teacher_id']=$tid;
        $data['course_id']=$cid;
        $data['semester_id']=$semid;
        $this->load->view('instructor_feedback_summery_view', $data);
    }
    public function course_feedback_pdf($tid, $cid, $semid){
        $_SESSION["report_name"]='Course Feedback Summery for '.$cid.' of '.$tid.' in Semester '.$semid;
        $data = $this->instructor_home_model->getFeedbackSummeryForCourse($tid, $cid, $semid);
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Statements', 'S.Agr', 'P.Agr', 'Uncert', 'Disagr', 'S.Disa');
        $w = [7, 123, 12, 12, 12, 12, 12];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->SummeryFeedbackTable($header,$w,$data);
        $this->pdf->Output('course_feedback_summery.pdf', 'I');
    }
    public function course_feedbackComments_pdf($tid, $cid, $semid){
        $_SESSION["report_name"]='Course Feedback Comments for '.$cid.' of '.$tid.' in Semester '.$semid;
        $data = $this->instructor_home_model->getCommentForCourse($tid, $cid, $semid);
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('course_feedback_comments.pdf', 'I');
    }

    public function instructor_feedback_pdf($tid, $cid, $semid){
        $_SESSION["report_name"]='Instructor Feedback Summery for '.$cid.' of '.$tid.' in Semester '.$semid;
        $data = $this->instructor_home_model->getFeedbackSummeryForTeacher($tid, $cid, $semid);
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Statements', 'S.Agr', 'P.Agr', 'Uncert', 'Disagr', 'S.Disa');
        $w = [7, 123, 12, 12, 12, 12, 12];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->SummeryFeedbackTable($header,$w,$data);
        $this->pdf->Output('instructor_feedback_summery.pdf', 'I');
    }
    public function instructor_feedbackComments_pdf($tid, $cid, $semid){
        $_SESSION["report_name"]='Instructor Feedback Comments for '.$cid.' of '.$tid.' in Semester '.$semid;
        $data = $this->instructor_home_model->getCommentForInstructor($tid, $cid, $semid);
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('instructor_feedback_comments.pdf', 'I');
    }

    public function exit_feedback_summery() {
        $data['exit_feedback'] = $this->admin_home_model->getFeedbackSummeryForExit();
        $data['next_plan_comments'] = $this->admin_home_model->getExitCommentForNextPlan();
        $data['comments_on_session_jam'] = $this->admin_home_model->getExitCommentForSessionJam();
        $data['suggestions_for_improving'] = $this->admin_home_model->getExitCommentForSuggestions();
        $data['comment_in_issue'] = $this->admin_home_model->getExitCommentForIssue();
        $this->load->view('exit_feedback_summery_view', $data);
    }
    public function exit_summery_feedback_pdf(){
        $_SESSION["report_name"]='Exit Feedback Summery';
        $data = $this->admin_home_model->getFeedbackSummeryForExit();
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Statements', 'S.Agr', 'P.Agr', 'Uncert', 'Disagr', 'S.Disa');
        $w = [7, 123, 12, 12, 12, 12, 12];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->SummeryFeedbackTable($header,$w,$data);
        $this->pdf->Output('exit_feedback_summery.pdf', 'I');
    }
    public function exit_comments_for_next_plan_pdf(){
        $_SESSION["report_name"]='Exit Feedback Comments for Next Plan';
        $data = $this->admin_home_model->getExitCommentForNextPlan();
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('Exit_comments_next_plan.pdf', 'I');
    }
    public function exit_comments_for_session_jam_pdf(){
        $_SESSION["report_name"]='Exit Feedback Comments for Session Jam';
        $data = $this->admin_home_model->getExitCommentForSessionJam();
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('Exit_comments_next_plan.pdf', 'I');
    }
    public function exit_comments_for_improving_pdf(){
        $_SESSION["report_name"]='Exit Feedback Comments for Next Plan';
        $data = $this->admin_home_model->getExitCommentForSuggestions();
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('Exit_comments_next_plan.pdf', 'I');
    }
    public function exit_comments_for_issue_pdf(){
        $_SESSION["report_name"]='Exit Feedback Comments for other Issue';
        $data = $this->admin_home_model->getExitCommentForIssue();
        $data = json_decode(json_encode($data), true);
        $header = array('SL', 'Comments');
        $w = [10, 180];
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetWidths($w);
        $this->pdf->CourseFeedbackComments($header,$w,$data);
        $this->pdf->Output('Exit_comments_next_plan.pdf', 'I');
    }

}
?>