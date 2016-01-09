<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postgrad_alumni extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('undergrad_alumni_model');
    }

    public function index()
    {
        //$data['all_student'] = $this->undergrad_alumni_model->selectStudent();
        //$this->load->view('postgrad_alumni_view',$data);
    }
    function give_more_data() {
        if (isset($_POST['passing_year'])) {
            $models  = $this->undergrad_alumni_model->selectStudentByYear($_POST['passing_year']);
            $output = array(
                    'html'=>$this->load->view("postgrad_alumni_view",$models, true),
                    'data'=>$models
            );

            echo json_encode($output);
            //$this->load->view('undergrad_alumni_view',$data);
            //print_r($data);
        }
    }

}
?>