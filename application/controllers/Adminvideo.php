<?php

class Adminvideo extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Video_model');
   }

   // Video
   public function index()
   {
      $data['title'] = 'Video Pembelajaran';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['video'] = $this->Video_model->getDataVideo();

      $this->form_validation->set_rules('tittle', 'Tittle', 'required');
      $this->form_validation->set_rules('link', 'Link', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/video/video', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $tittle = $this->input->post('tittle', true);
         $link = $this->input->post('link', true);

         $data = [
            'tittle' => $tittle,
            'link' => $link
         ];

         $this->db->insert('table_video', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data video pembelajaran berhasil ditambahkan!
               </div>');
         redirect('adminvideo/index');
      }
   }

   public function hapusvideo($id)
   {
      $this->Video_model->hapusvideo($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Video berhasil dihapus!
               </div>');
      redirect('adminvideo/index');
   }

   public function ubahvideo($id)
   {
      $data['title'] = 'Ubah Video Pembelajaran';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['video'] = $this->Video_model->getVideoById($id);

      $this->form_validation->set_rules('tittle', 'Tittle', 'required');
      $this->form_validation->set_rules('link', 'Link', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/video/ubah', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Video_model->ubahvideo();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
             Video berhasil diubah!
               </div>');
         redirect('adminvideo/index');
      }
   }
}
