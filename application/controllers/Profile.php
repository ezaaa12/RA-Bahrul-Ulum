<?php

class Profile extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Profil_model');
   }

   public function index()
   {

      $data['judul'] = 'Profil';
      $data['profil'] = $this->Profil_model->getDataProfil();
      $data['visi'] = $this->Profil_model->getDataVisi();
      $data['misi'] = $this->Profil_model->getDataMisi();
      $data['tujuan'] = $this->Profil_model->getDataTujuan();
      $data['dataguru'] = $this->Profil_model->getDataGuru();

      $this->load->view('templates/header', $data);
      $this->load->view('profile/profile', $data);
      $this->load->view('templates/footer');
   }
}
