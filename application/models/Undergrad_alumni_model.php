<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undergrad_alumni_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function selectStudent () {
        $this->db->select("student_id,full_name, u_university_passing_year, email, location");
        $this->db->from("students");
        $this->db->where('`student_id` != "headcse"');
        $this->db->order_by('u_university_admission_year','DESC');
        $this->db->order_by('student_id','ASC');
        $query = $this->db->get();

        return $result = $query->result();
    }
    function selectStudentByYear($a_year, $p_year) {
        $this->db->select('student_id,full_name, u_university_passing_year, email, location');
        $this->db->from("students");
        $this->db->where('`student_id` != "headcse"');
        if($a_year!=='All'){
            $this->db->where('u_university_admission_year',$a_year);
        }
        if($p_year!=='All'){
            if($p_year==''){
                $this->db->where('u_university_passing_year is NULL');
            }
            else {
            $this->db->where('u_university_passing_year',$p_year);
            }
        }

        $this->db->order_by('u_university_admission_year','DESC');
        $this->db->order_by('student_id','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getPassYear()
    {
        $arr=array();
        $this->db->select('DISTINCT(u_university_passing_year)');
        $this->db->from('students');
        $this->db->order_by('u_university_passing_year DESC');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['u_university_passing_year']]=$row['u_university_passing_year'];
        }
        return $arr;
    }
    public function getAddYear()
    {
        $arr=array();
        $this->db->select('DISTINCT(u_university_admission_year)');
        $this->db->from('students');
        $this->db->where('u_university_admission_year!=0');
        $this->db->order_by('u_university_admission_year DESC');
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['u_university_admission_year']]=$row['u_university_admission_year'];
        }
        return $arr;
    }


    function __destruct() {
        $this->db->close();
    }

}