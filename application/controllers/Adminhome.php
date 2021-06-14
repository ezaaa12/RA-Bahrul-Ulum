<?php

class Adminhome extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Home_model');
   }


   //SLIDER
   public function index()
   {
      $data['title'] = 'Slider';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/home/slider', $data);
      $this->load->view('templates/footer-admin');
   }

   //KEGIATAN TERBARU
   public function kegiatanterbaru()
   {
      $data['title'] = 'Kegiatan Terbaru';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kegiatan'] = $this->Home_model->getDataKegiatan();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/home/kegiatanterbaru', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahkegiatan()
   {
      $data['title'] = 'Tambah Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kegiatan'] = $this->Home_model->getDataKegiatan();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');
      $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/home/kegiatanterbaru', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $kegiatan = $this->input->post('kegiatan', true);
         $tanggal = $this->input->post('tanggal', true);
         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/menu/kegiatan';
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
            'kegiatan' => $kegiatan,
            'tanggal' => $tanggal
         ];
         $this->db->insert('table_kegterbaru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Kegiatan berhasil ditambahkan!
               </div>');
         redirect('adminhome/kegiatanterbaru');
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

   public function hapuskegiatan($id)
   {
      $data = $this->Home_model->getDataKegiatanById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/menu/kegiatan/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_kegterbaru');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Kegiatan berhasil dihapus!
               </div>');
      redirect('adminhome/kegiatanterbaru');
   }

   public function ubahkegiatan($id)
   {
      $data['title'] = 'Ubah Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kegiatan'] = $this->Home_model->getDataKegiatanById($id);

      $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/home/ubahkegiatan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'tanggal' => $this->input->post('tanggal')
         ];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/menu/kegiatan';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Home_model->getDataKegiatanById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/menu/kegiatan/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_kegterbaru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Kegiatan berhasil diubah!
               </div>');
         redirect('adminhome/kegiatanterbaru');
      }
   }


   //SAMBUTAN KEPALA SEKOLAH
   public function sambutankepsek()
   {
      $data['title'] = 'Sambutan Kepala Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['sambutan'] = $this->Home_model->getDataSambutan();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/home/sambutankepsek', $data);
      $this->load->view('templates/footer-admin');
   }

   public function ubahsambutan($id)
   {
      $data['title'] = 'Ubah Sambutan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['sambutan'] = $this->Home_model->getSambutanById($id);

      $this->form_validation->set_rules('isi', 'Isi', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/home/ubahsambutan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Home_model->ubahSambutan();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
               Data sambutan berhasil diubah!
               </div>');
         redirect('adminhome/sambutankepsek');
      }
   }

   //GALERI RANDOM
   public function galeribaru()
   {

      $data['title'] = 'Galeri Terbaru';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['gambar'] = $this->Home_model->getDatagaleri();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/home/galeribaru', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahgaleri()
   {
      $data['title'] = 'Tambah Gambar';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['gambar'] = $this->Home_model->getDataGaleri();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/home/galeribaru', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/menu/galeri';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
            } else {
               echo $this->upload->display_errors();
            }
         }
         $data = [
            'gambar' => $gambar
         ];
         $this->db->insert('table_galeribaru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Gambar berhasil ditambahkan!
               </div>');
         redirect('adminhome/galeribaru');
      }
   }

   public function hapusgaleri($id)
   {
      $data = $this->Home_model->getDataGaleriById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/menu/galeri/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_galeribaru');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
             Gambar berhasil dihapus!
               </div>');
      redirect('adminhome/galeribaru');
   }

   public function ubahgaleri($id)
   {
      $data['title'] = 'Ubah Gambar';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['gambar'] = $this->Home_model->getDataGaleriById($id);

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/home/ubahgaleri', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['gambar' => $gambar];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/menu/galeri';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Home_model->getDataGaleriById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/menu/galeri/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_galeribaru', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
             Gambar berhasil diubah!
               </div>');
         redirect('adminhome/galeribaru');
      }
   }
}
