<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_list extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('news_list_model');
    }

    public function index() {
        $data['all_news'] = $this->news_list_model->getNews();
        $this->load->view('news_list_view', $data);
    }
    public function delete_news($id) {
        $this->news_list_model->deleteNewsById($id);
        $data['all_news'] = $this->news_list_model->getNews();
        $this->load->view('news_list_view', $data);
    }

    public function load_edit_news($news_id) {
        $data['e_news'] =$this->news_list_model->getNewsById($news_id);
        $this->load->view('edit_news_view', $data);
    }
    public function update_news($news_id) {
        $heading=$this->input->post('news_heading');
        if(isset($_POST['status'])) {
            $status='active';
        }
        else {
            $status='inactive';
        }

        $data = array(
            'heading' => $heading,
            'status' => $status,
        );
        $this->news_list_model->updateNews($news_id, $data);
        $data['e_news'] =$this->news_list_model->getNewsById($news_id);

        $data['success_msg'] = '<div class="alert alert-success text-center">News updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        //$this->load->view('edit_news_view', $data);
        redirect('news_list');
    }

}
?>