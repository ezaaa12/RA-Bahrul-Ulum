<?php

class Vpembelajaran extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Video_model');
   }

   public function index()
   {

      $data['judul'] = 'Video Pembelajaran';
      $data['video'] = $this->Video_model->getDataVideo();

      $this->load->view('templates/header', $data);
      $this->load->view('video/pembelajaran');
      $this->load->view('templates/footer');
   }
}
