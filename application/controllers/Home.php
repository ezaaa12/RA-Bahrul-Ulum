<?php

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Home_model');
   }

   public function index()
   {

      $data['judul'] = 'Beranda';
      $data['sambutan'] = $this->Home_model->getDataSambutan();
      $data['kegiatan'] = $this->Home_model->getDataKegiatan();
      $data['gambar'] = $this->Home_model->getDataGaleri();

      $this->load->view('templates/header', $data);
      $this->load->view('home/index');
      $this->load->view('templates/footer');
   }
}
