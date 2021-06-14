<?php

class Login extends CI_Controller
{
   public function index()
   {
      $data['judul'] = 'Login';

      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('admin/login', $data);
      } else {
         //jika validasi lolos
         $this->_login();
      }
   }

   private function _login()
   {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('table_user', ['email' => $email])->row_array();

      //jika ada user
      if ($user) {
         if (md5($password) == $user['password']) {
            //jika benar
            $data['email'] = $user['email'];
            $this->session->set_userdata($data);
            redirect('admin');
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah!
               </div>');
            redirect('login');
         }
      } else {
         //usernya gaada
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar!
               </div>');
         redirect('login');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('email');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Logout!
               </div>');
      redirect('login');
   }
}
