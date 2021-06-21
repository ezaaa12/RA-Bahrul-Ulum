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

      $this->form_validation->set_rules('kategori', 'Kategori', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/kategori', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->db->insert('table_kategori', ['kategori' => $this->input->post('kategori')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data kategori berhasil ditambahkan!
               </div>');
         redirect('admingaleri/kategori');
      }
   }

   public function hapuskategori($id)
   {
      $this->Galeri_model->hapusKategori($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data kategori berhasil dihapus!
               </div>');
      redirect('admingaleri/kategori');
   }

   public function ubahkategori($id)
   {
      $data['title'] = 'Ubah Kategori';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kategori'] = $this->Galeri_model->getKategoriById($id);

      $this->form_validation->set_rules('kategori', 'Kategori', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/ubahkategori', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Galeri_model->ubahDataKategori();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data kategori berhasil diubah!
               </div>');
         redirect('admingaleri/kategori');
      }
   }
}
