<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_event extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('post_event_model');
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('post_event_view');

    }
    public function upload() {


        $config['upload_path'] = 'assets/img/events/';
        $config['allowed_types'] = 'doc|pdf';
        $config['max_size']    = '1000';


        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('event_file_name'))
        {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            $this->load->view('post_event_view', $upload_error);
        }
        else
        {
            // case - success
            $upload_data = $this->upload->data();

            $CI = &get_instance();
            $student_id = $CI->session->userdata('username');

            $data = array(
                'heading' => $this->input->post('event_heading'),
                'file_name' => $upload_data['file_name'],
                'published_date' => $this->input->post('event_published_date'),
                'published_by' => $student_id,
            );
            $this->post_event_model->saveEvent($data);
            $data['success_msg'] = '<div class="alert alert-success text-center">Your News <strong>'.'<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>'. $data['heading'].' and file '.$upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $this->load->view('post_event_view', $data);
        }

    }

}
?>