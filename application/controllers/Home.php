<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index() {
        $data['news'] = $this->home_model->getNews();
        $data['events'] = $this->home_model->getEvents();
        $this->load->view('home_view', $data);
    }

}
?>