<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_feedback_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function checkInstructorGivenFeedback($seid, $cid, $sid, $tid) {
        $this->db->select('teacher_status');
        $this->db->from('semester_course_instructor');
        $this->db->where('semester_id',$seid);
        $this->db->where('course_id',$cid);
        $this->db->where('student_id',$sid);
        $this->db->where('teacher_id',$tid);
        return $this->db->get()->row();
    }

    public function saveFeedbackInstructor($data)
    {
        $this->db->insert('feedbacks_for_instructor', $data);
    }
    public function updateListInstructor($sid, $cid, $tid, $data) {
        $this->db->where('student_id',$sid);
        $this->db->where('course_id',$cid);
        $this->db->where('teacher_id',$tid);
        $this->db->update('semester_course_instructor', $data);
    }

    function __destruct() {
        $this->db->close();
    }

}