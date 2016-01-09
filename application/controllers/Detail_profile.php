<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_profile extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('detail_profile_model');
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index($std_id) {
        $data['detail_student'] = $this->detail_profile_model->selectStudentById($std_id);
        $this->load->view('detail_profile_view', $data);
    }

}
?>