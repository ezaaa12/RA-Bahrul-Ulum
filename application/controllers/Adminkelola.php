<?php

class Adminkelola extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Admin_model');
   }

   public function kelolaadmin()
   {
      $data['title'] = 'Managemet User';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['admin'] = $this->Admin_model->getDataAdmin();

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/admin/kelolaadmin', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
         ];

         $this->db->insert('table_user', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
                Admin berhasil ditambahkan!
               </div>');
         redirect('adminkelola/kelolaadmin');
      }
   }

   public function hapusadmin($id)
   {
      $this->Admin_model->hapusDataAdmin($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
                Data admin berhasil dihapus!
               </div>');
      redirect('adminkelola/kelolaadmin');
   }

   public function ubahadmin($id)
   {
      $data['title'] = 'Ubah Data Admin';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['admin'] = $this->Admin_model->getAdminById($id);

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/admin/ubahadmin', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Admin_model->ubahDataAdmin();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
                Data admin berhasil diubah!
               </div>');
         redirect('adminkelola/kelolaadmin');
      }
   }
}
