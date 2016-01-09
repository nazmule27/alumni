<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_gallery extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('photo_gallery_model');
    }

    public function index() {
        $data['all_photo'] = $this->photo_gallery_model->getPhotoGallery();
        $this->load->view('photo_gallery_view',$data);
    }

}
?>