<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_blog extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('coming_soon_view');
    }

}
?>