<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_list extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('event_list_model');
    }

    public function index() {
        $data['all_event'] = $this->event_list_model->getEvents();
        $this->load->view('event_list_view', $data);
    }
    public function delete_event($id) {
        $this->event_list_model->deleteeventById($id);
        $data['all_event'] = $this->event_list_model->getEvents();
        $this->load->view('event_list_view', $data);
    }

    public function load_edit_event($event_id) {
        $data['e_event'] =$this->event_list_model->getEventById($event_id);
        $this->load->view('edit_event_view', $data);
    }
    public function update_event($event_id) {
        $heading=$this->input->post('event_heading');
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
        $this->event_list_model->updateEvent($event_id, $data);
        $data['e_event'] =$this->event_list_model->getEventById($event_id);

        $data['success_msg'] = '<div class="alert alert-success text-center">Event updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        //$this->load->view('edit_news_view', $data);
        redirect('event_list');
    }

}
?>