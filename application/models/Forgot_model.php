<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @name: Login model
 * @author: Nazmul
 */
class Forgot_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate_user($data) {
        $this->db->select("s.email, u.username, u.password");
        $this->db->from("users u, students s");
        $this->db->where('`u`.`username`=`s`.`student_id`');
        $this->db->where('`u`.`username`', ($data['student_id']));
        $this->db->where('`s`.`email`', ($data['email']));
        return $this->db->get()->row();
    }

    function __destruct() {
        $this->db->close();
    }

}