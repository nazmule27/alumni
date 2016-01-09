<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_list_model extends CI_Model
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

    public function getEventById($event_id) {
        $this->db->select("*");
        $this->db->from("alumni_events");
        $this->db->where("id", $event_id);
        $query = $this->db->get();

        return $result = $query->result();
    }

    public function updateEvent($eid, $data) {
        $this->db->where('id',$eid);
        $this->db->update('alumni_events', $data);
    }

    public function deleteEventById($event_id) {
        $this->db->where('id', $event_id);
        $this->db->delete('alumni_events');
    }


    function __destruct() {
        $this->db->close();
    }

}