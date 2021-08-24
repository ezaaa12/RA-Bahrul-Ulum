<?php

class Subindex extends CI_Controller
{

    public function __construct()
   {
      parent::__construct();
      $this->load->model('Info_model');
   }

  public function index()
   {
    
      $data['judul'] = 'Fasilitas Sekolah';
      $data['tittle'] = "Halaman Subindex";
      $data['fasilitas'] = $this->Info_model->getDataFasilitas();

      $this->load->view('templates/header', $data);
      $this->load->view('info/subindex');
      $this->load->view('templates/footer');
   }
}
