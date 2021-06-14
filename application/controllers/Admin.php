<?php

class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Admin_model');
   }

   public function index()
   {
      $data['title'] = 'Dashboard';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/admin/dashboard', $data);
      $this->load->view('templates/footer-admin');
   }
}
