<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_list_model extends CI_Model
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

    public function getNewsById($news_id) {
        $this->db->select("*");
        $this->db->from("alumni_news");
        $this->db->where("id", $news_id);
        $query = $this->db->get();

        return $result = $query->result();
    }

    public function updateNews($nid, $data) {
        $this->db->where('id',$nid);
        $this->db->update('alumni_news', $data);
    }

    public function deleteNewsById($news_id) {
        $this->db->where('id', $news_id);
        $this->db->delete('alumni_news');
    }


    function __destruct() {
        $this->db->close();
    }

}