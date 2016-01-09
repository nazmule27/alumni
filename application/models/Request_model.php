<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @name: Login model
 * @author: Nazmul
 */
class Request_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate_user($data) {
        $this->db->select("s.email, u.username, u.password");
        $this->db->from("users u, students s");
        $this->db->where('`u`.`username`=`s`.`student_id`');
        $this->db->where('`s`.`full_name`', ($data['name']));
        $this->db->where('`u`.`username`', ($data['student_id']));
        return $this->db->get()->row();
    }
    public function update_email($p_data) {
        $data =array (
            'email'=>$p_data['email'],
        );
        $this->db->where('student_id',$p_data['student_id']);
        $this->db->update('students', $data);
    }

    function __destruct() {
        $this->db->close();
    }

}