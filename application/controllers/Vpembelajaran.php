<?php

class Vpembelajaran extends CI_Controller
{
   public function index()
   {

      $data['judul'] = 'Video Pembelajaran';

      $this->load->view('templates/header', $data);
      $this->load->view('video/pembelajaran');
      $this->load->view('templates/footer');
   }
}
