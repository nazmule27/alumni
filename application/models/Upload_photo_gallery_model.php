<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_photo_gallery_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function savePhoto($data)
    {
        $this->db->insert('photo_gallery', $data);
    }


    function __destruct() {
        $this->db->close();
    }

}