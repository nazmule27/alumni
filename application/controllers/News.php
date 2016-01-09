<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index() {
        $data['all_news'] = $this->news_model->getNews();
        $this->load->view('news_view', $data);
    }

}
?>