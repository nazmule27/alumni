<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_photo_gallery extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('upload_photo_gallery_model');
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('upload_photo_gallery_view');
    }

    public function upload_photo() {
        $config['upload_path'] = 'assets/img/gallery/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size']    = '1000';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gallery_img'))
        {
            $upload_error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_photo_gallery_view', $upload_error);
        }
        else
        {
            $upload_data = $this->upload->data();

            $CI = &get_instance();
            $student_id = $CI->session->userdata('username');
            $data = array(
                'photo_name' => $upload_data['file_name'],
                'upload_time' => date('Y-m-d h:i:s'),
                'caption' => $this->input->post('photo_caption'),
                'upload_by' => $student_id,
            );
            $this->upload_photo_gallery_model->savePhoto($data);
            $success_msg_con='<div class="alert alert-success text-center">Your photo was successfully uploaded!<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
            $data = array('success_msg' => $success_msg_con);
            $this->load->view('upload_photo_gallery_view', $data);
        }
    }

}
?>