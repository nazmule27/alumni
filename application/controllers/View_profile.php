<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_profile extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('view_profile_model');
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['student'] = $this->view_profile_model->selectStudentById($student_id);
        $this->load->view('view_profile_view', $data);
    }

}
?>