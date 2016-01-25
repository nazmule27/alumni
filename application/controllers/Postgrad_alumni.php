<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postgrad_alumni extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('postgrad_alumni_model');
    }

    public function index()
    {
        $data['all_student'] = $this->postgrad_alumni_model->selectStudent();
        $data['a_years'] = $this->postgrad_alumni_model->getAddYear();
        $data['p_years'] = $this->postgrad_alumni_model->getPassYear();
        $this->load->view('postgrad_alumni_view',$data);
    }
    function alumniByPassingYear() {
        $a_year=$this->input->post('admission_year');
        $p_year=$this->input->post('passing_year');
        $data['all_student'] = $this->postgrad_alumni_model->selectStudentByYear($a_year, $p_year);
        $data['a_years'] = $this->postgrad_alumni_model->getAddYear();
        $data['p_years'] = $this->postgrad_alumni_model->getPassYear();
        $this->load->view('postgrad_alumni_view',$data);
    }

}
?>