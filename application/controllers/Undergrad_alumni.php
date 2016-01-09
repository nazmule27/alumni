<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undergrad_alumni extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('undergrad_alumni_model');
    }

    public function index()
    {
        $data['all_student'] = $this->undergrad_alumni_model->selectStudent();
        $data['a_years'] = $this->undergrad_alumni_model->getAddYear();
        $data['p_years'] = $this->undergrad_alumni_model->getPassYear();
        $this->load->view('undergrad_alumni_view',$data);
    }
    function alumniByPassingYear() {
        $a_year=$this->input->post('admission_year');
        $p_year=$this->input->post('passing_year');
        $data['all_student'] = $this->undergrad_alumni_model->selectStudentByYear($a_year, $p_year);
        $data['a_years'] = $this->undergrad_alumni_model->getAddYear();
        $data['p_years'] = $this->undergrad_alumni_model->getPassYear();
        $this->load->view('undergrad_alumni_view',$data);
    }

}
?>