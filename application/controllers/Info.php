<?php

class Info extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Info_model');
   }


   public function index()
   {

      $data['judul'] = 'Info';
      $data['kelas'] = $this->Info_model->getDataKelas();
      $data['kurikulum'] = $this->Info_model->getDataKurikulum();
      $data['prestasi'] = $this->Info_model->getDataPrestasi();
      $data['kegiatan'] = $this->Info_model->getDataKegiatan();
      $data['fasilitas'] = $this->Info_model->getDataFasilitas();
      $data['permainan'] = $this->Info_model->getDataPermainan();

      $this->load->view('templates/header', $data);
      $this->load->view('info/index');
      $this->load->view('templates/footer');
   }
}
