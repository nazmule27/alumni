<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function verify_password($sid, $pass) {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username',$sid);
        //$this->db->where('password',md5($pass));
        $this->db->where('password',$pass);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function updatePassword($sid, $data) {
        $this->db->where('username',$sid);
        $this->db->update('users', $data);
    }

    public function getPersonalInfo($sid) {
        $this->db->select('full_name, father_name, mother_name, email, mobile, mobile_yn, gender, birth_date, district, district_yn');
        $this->db->from('students');
        $this->db->where('student_id',$sid);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getEducationInfo($sid) {
        $this->db->select('high_school_name, high_school_location, high_school_passing_year, college_name, college_location, college_passing_year, u_university_name, u_university_location, u_university_subject, u_university_admission_year, u_university_a_year_privateyn, u_university_passing_year, p_university_name, p_university_location, p_university_subject, p_university_admission_year, p_university_a_year_privateyn, p_university_passing_year, d_university_name, d_university_location, d_university_subject, d_university_admission_year, d_university_a_year_privateyn, d_university_passing_year');
        $this->db->from('students');
        $this->db->where('student_id',$sid);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getBiography($sid) {
        $this->db->select('biography');
        $this->db->from('students');
        $this->db->where('student_id',$sid);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getEmployment($sid) {
        $this->db->select('designation, organization, location');
        $this->db->from('students');
        $this->db->where('student_id',$sid);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function updateProfile($sid, $data) {
        $this->db->where('student_id',$sid);
        $this->db->update('students', $data);
    }

    public function getDistrict()
    {
        $arr=array();
        $this->db->select('*');
        $this->db->from('district');
        $this->db->order_by('district_name');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['district_id']]=$row['district_name'];
        }
        return $arr;
    }

    function __destruct() {
        $this->db->close();
    }

}