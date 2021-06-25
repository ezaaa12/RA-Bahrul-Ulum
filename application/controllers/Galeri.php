<?php

class Galeri extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Galeri_model');
   }

   public function index()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/galeri', $data);
   }

   public function keginternal()
   {

      $data['judul'] = 'Galeri';
      $data['galeri'] = $this->Galeri_model->getGInternal();

      $this->load->view('galeri/internal', $data);
   }

   public function kegeksternal()
   {

      $data['judul'] = 'Galeri';
      $data['galeri'] = $this->Galeri_model->getGEksternal();

      $this->load->view('galeri/eksternal', $data);
   }
}
