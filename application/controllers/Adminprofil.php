<?php

class Adminprofil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Profil_model');
   }

   // PROFIL
   public function profil()
   {
      $data['title'] = 'Profil Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['profil'] = $this->Profil_model->getDataProfil();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/profil/profil', $data);
      $this->load->view('templates/footer-admin');
   }

   public function ubahprofil($id)
   {
      $data['title'] = 'Ubah Profil';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['profil'] = $this->Profil_model->getProfilById($id);

      $this->form_validation->set_rules('profil', 'Profil', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/ubahprofil', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Profil_model->ubahProfil();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
               Data profil berhasil diubah!
               </div>');
         redirect('adminprofil/profil');
      }
   }

   // VISI
   public function visi()
   {
      $data['title'] = 'Visi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['visi'] = $this->Profil_model->getDataVisi();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/profil/visi', $data);
      $this->load->view('templates/footer-admin');
   }

   public function ubahvisi($id)
   {
      $data['title'] = 'Ubah Visi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['visi'] = $this->Profil_model->getDataVisiById($id);

      $this->form_validation->set_rules('visi', 'Visi', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/ubahvisi', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Profil_model->ubahVisi();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
               Visi sekolah berhasil diubah!
               </div>');
         redirect('adminprofil/visi');
      }
   }

   // Misi
   public function misi()
   {
      $data['title'] = 'Misi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['misi'] = $this->Profil_model->getDataMisi();

      $this->form_validation->set_rules('misi', 'Misi', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/misi', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->db->insert('table_misi', ['misi' => $this->input->post('misi')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data misi berhasil ditambahkan!
               </div>');
         redirect('adminprofil/misi');
      }
   }

   public function hapusmisi($id)
   {
      $this->Profil_model->hapusmisi($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data misi berhasil dihapus!
               </div>');
      redirect('adminprofil/misi');
   }

   public function ubahmisi($id)
   {
      $data['title'] = 'Ubah Misi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['misi'] = $this->Profil_model->getMisiById($id);

      $this->form_validation->set_rules('misi', 'Misi', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/ubahmisi', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Profil_model->ubahDataMisi();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data misi berhasil diubah!
               </div>');
         redirect('adminprofil/misi');
      }
   }

   // Tujuan
   public function tujuan()
   {
      $data['title'] = 'Tujuan Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['tujuan'] = $this->Profil_model->getDataTujuan();

      $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/tujuan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->db->insert('table_tujuan', ['tujuan' => $this->input->post('tujuan')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data tujuan berhasil ditambahkan!
               </div>');
         redirect('adminprofil/tujuan');
      }
   }

   public function hapustujuan($id)
   {
      $this->Profil_model->hapustujuan($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data tujuan berhasil dihapus!
               </div>');
      redirect('adminprofil/tujuan');
   }

   public function ubahtujuan($id)
   {
      $data['title'] = 'Ubah Tujuan Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['tujuan'] = $this->Profil_model->getTujuanById($id);

      $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/ubahtujuan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Profil_model->ubahDataTujuan();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data tujuan berhasil diubah!
               </div>');
         redirect('adminprofil/tujuan');
      }
   }

   // Data Guru
   public function dataguru()
   {

      $data['title'] = 'Data Guru';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['dataguru'] = $this->Profil_model->getDataGuru();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/profil/dataguru', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahdataguru()
   {
      $data['title'] = 'Tambah Data Guru';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['dataguru'] = $this->Profil_model->getDataGuru();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/dataguru', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $nama = $this->input->post('nama', true);
         $jabatan = $this->input->post('jabatan', true);
         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/profile/guru';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
            } else {
               echo $this->upload->display_errors();
            }
         }
         $data = [
            'gambar' => $gambar,
            'nama' => $nama,
            'jabatan' => $jabatan
         ];
         $this->db->insert('table_dataguru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data guru berhasil ditambahkan!
               </div>');
         redirect('adminprofil/dataguru');
      }
   }

   public function file_check()
   {
      $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
      $mime = get_mime_by_extension($_FILES['gambar']['name']);
      if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
         if (in_array($mime, $allowed_mime_type_arr)) {
            return true;
         } else {
            $this->form_validation->set_message('file_check', 'gambar harus berformat gif/jpg/png?jpeg');
            return false;
         }
      } else {
         $this->form_validation->set_message('file_check', 'Masukkan gambar.');
         return false;
      }
   }

   public function hapusdataguru($id)
   {
      $data = $this->Profil_model->getDataGuruById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/profile/guru/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_dataguru');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data guru berhasil dihapus!
               </div>');
      redirect('adminprofil/dataguru');
   }

   public function ubahdataguru($id)
   {
      $data['title'] = 'Ubah Data Guru';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['dataguru'] = $this->Profil_model->getDataGuruById($id);

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/profil/ubahdataguru', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan')
         ];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/profile/guru';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Profil_model->getDataGuruById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/profile/guru/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_dataguru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data guru berhasil diubah!
               </div>');
         redirect('adminprofil/dataguru');
      }
   }
}
