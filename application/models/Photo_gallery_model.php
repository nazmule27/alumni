<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_gallery_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPhotoGallery() {
        $this->db->select("*");
        $this->db->from("photo_gallery");
        $this->db->order_by("upload_time desc");
        $query = $this->db->get();

        return $result = $query->result();
    }


    function __destruct() {
        $this->db->close();
    }

}