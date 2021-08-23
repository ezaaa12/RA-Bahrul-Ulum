<?php

class Admintahun extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();

      $this->load->model('Tahun_model');
   }

   public function index()
   {
      $data['title'] = 'Management Tahun Ajaran';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['thnajaran'] = $this->Tahun_model->getDataTahun();

      $this->form_validation->set_rules('thnajaran', 'Tahun', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/admin/tahun', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['thnajaran' => $this->input->post('thnajaran')];

         $this->db->insert('table_thnajaran', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
                Tahun ajaran berhasil ditambahkan!
               </div>');
         redirect('admintahun');
      }
   }

   public function hapustahun($id)
   {
      $this->Tahun_model->hapusDataTahun($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
                Data tahun ajaran berhasil dihapus!
               </div>');
      redirect('admintahun/index');
   }

   public function ubahtahun($id)
   {
      $data['title'] = 'Ubah Tahun Ajaran';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['thnajaran'] = $this->Tahun_model->getTahunById($id);

      $this->form_validation->set_rules('thnajaran', 'Tahun', 'required');


      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/admin/ubahtahun', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Tahun_model->ubahDataTahun('');
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
                Tahun ajaran berhasil diubah!
               </div>');
         redirect('admintahun');
      }
   }
}
