<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getNews() {
        $this->db->select("*");
        $this->db->from("alumni_news");
        $this->db->order_by("published_date desc");
        $query = $this->db->get();

        return $result = $query->result();
    }


    function __destruct() {
        $this->db->close();
    }

}