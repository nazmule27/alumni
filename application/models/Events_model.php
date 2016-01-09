<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getEvents() {
        $this->db->select("*");
        $this->db->from("alumni_events");
        $this->db->order_by("published_date desc");
        $query = $this->db->get();

        return $result = $query->result();
    }


    function __destruct() {
        $this->db->close();
    }

}