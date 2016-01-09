<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('events_model');
    }

    public function index() {
        $data['all_events'] = $this->events_model->getEvents();
        $this->load->view('events_view', $data);
    }

}
?>
