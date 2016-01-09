<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_event_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function saveEvent($data)
    {
        $this->db->insert('alumni_events', $data);
    }


    function __destruct() {
        $this->db->close();
    }

}