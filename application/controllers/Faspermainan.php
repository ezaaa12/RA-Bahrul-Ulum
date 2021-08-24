<?php

class Faspermainan extends CI_Controller
{

    public function __construct()
   {
      parent::__construct();
      $this->load->model('Info_model');
   }

  public function index()
   {
       
      $data['judul'] = 'Fasilitas Permainan';
      $data['tittle'] = "Halaman Faspermainan";
      $data['permainan'] = $this->Info_model->getDataPermainan();

      $this->load->view('templates/header', $data);
      $this->load->view('info/faspermainan');
      $this->load->view('templates/footer');
   }
}
