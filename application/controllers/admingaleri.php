<?php

class Admingaleri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Galeri_model');
   }

   //galeri
   public function galeri()
   {
      $data['title'] = 'Galeri Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/galeri/galeri', $data);
      $this->load->view('templates/footer-admin');
   }

   //Kategori
   public function kategori()
   {
      $data['title'] = 'Kategori Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kategori'] = $this->Galeri_model->getDataKategori();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/galeri/kategori', $data);
      $this->load->view('templates/footer-admin');
   }
}
