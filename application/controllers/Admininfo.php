<?php

class Admininfo extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Info_model');
   }

   // KELAS
   public function kelas()
   {
      $data['title'] = 'Info Kelas';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kelas'] = $this->Info_model->getDataKelas();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/info/kelas', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahdatakelas()
   {
      $data['title'] = 'Tambah Data Kelas';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['kelas'] = $this->Info_model->getDataKelas();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');
      $this->form_validation->set_rules('kelas', 'Kelas', 'required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/kelas', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $kelas = $this->input->post('kelas', true);
         $keterangan = $this->input->post('keterangan', true);
         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/info/kelas';
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
            'kelas' => $kelas,
            'keterangan' => $keterangan
         ];
         $this->db->insert('table_kelas', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data kelas berhasil ditambahkan!
               </div>');
         redirect('admininfo/kelas');
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

   public function hapusdatakelas($id)
   {
      $data = $this->Info_model->getDataKelasById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/info/kelas/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_kelas');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data kelas berhasil dihapus!
               </div>');
      redirect('admininfo/kelas');
   }

   public function ubahdatakelas($id)
   {
      $data['title'] = 'Ubah Data Kelas';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kelas'] = $this->Info_model->getDataKelasById($id);

      $this->form_validation->set_rules('kelas', 'Kelas', 'required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahdatakelas', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'kelas' => $this->input->post('kelas'),
            'keterangan' => $this->input->post('keterangan')
         ];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/info/kelas';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Info_model->getDataKelasById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/info/kelas/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_kelas', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data kelas berhasil diubah!
               </div>');
         redirect('admininfo/kelas');
      }
   }


   //KEGIATAN SEKOLAH
   public function kegiatan()
   {
      $data['title'] = 'Kegiatan Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kegiatan'] = $this->Info_model->getDataKegiatan();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/info/kegiatan', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahkegiatan()
   {
      $data['title'] = 'Tambah Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['kegiatan'] = $this->Info_model->getDataKegiatan();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');
      $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/kegiatan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $kegiatan = $this->input->post('kegiatan', true);
         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/info/kegiatan';
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
            'kegiatan' => $kegiatan
         ];
         $this->db->insert('table_kegiatan', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Kegiatan berhasil ditambahkan!
               </div>');
         redirect('admininfo/kegiatan');
      }
   }

   public function hapuskegiatan($id)
   {
      $data = $this->Info_model->getDataKegiatanById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/info/kegiatan/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_kegiatan');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Kegiatan berhasil dihapus!
               </div>');
      redirect('admininfo/kegiatan');
   }

   public function ubahkegiatan($id)
   {
      $data['title'] = 'Ubah Kegiatan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kegiatan'] = $this->Info_model->getDataKegiatanById($id);

      $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahkegiatan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'kegiatan' => $this->input->post('kegiatan')
         ];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/info/kegiatan';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Info_model->getDataKegiatanById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/info/kegiatan/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_kegiatan', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Kegiatan berhasil diubah!
               </div>');
         redirect('admininfo/kegiatan');
      }
   }

   // KURIKULUM
   public function Kurikulum()
   {
      $data['title'] = 'Kurikulum';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kurikulum'] = $this->Info_model->getDataKurikulum();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/info/kurikulum', $data);
      $this->load->view('templates/footer-admin');
   }

   public function ubahkurikulum($id)
   {
      $data['title'] = 'Ubah Kurikulum';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['kurikulum'] = $this->Info_model->getKurikulumById($id);

      $this->form_validation->set_rules('kurikulum', 'Kurikulum', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahkurikulum', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Info_model->ubahKurikulum();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
               Data kurikulum berhasil diubah!
               </div>');
         redirect('admininfo/kurikulum');
      }
   }

   //FASILITAS
   //Fasilitas Sekolah
   public function Fasilitas()
   {
      $data['title'] = 'Fasilitas Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['fasilitas'] = $this->Info_model->getDataFasilitas();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/info/fasilitas', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahfasilitas()
   {
      $data['title'] = 'Tambah Fasilitas Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['fasilitas'] = $this->Info_model->getDataFasilitas();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/fasilitas', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/info/fasilitassekolah';
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
         $this->db->insert('table_fasilitas', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Fasilitas sekolah berhasil ditambahkan!
               </div>');
         redirect('admininfo/fasilitas');
      }
   }

   public function hapusfasilitas($id)
   {
      $data = $this->Info_model->getDataFasilitasById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/info/fasilitassekolah/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_fasilitas');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
             Fasilitas sekolah berhasil dihapus!
               </div>');
      redirect('admininfo/fasilitas');
   }

   public function ubahfasilitas($id)
   {
      $data['title'] = 'Ubah Fasilitas Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['fasilitas'] = $this->Info_model->getDataFasilitasById($id);

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahfasilitas', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['gambar' => $gambar];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/info/fasilitassekolah';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Info_model->getDataFasilitasById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/info/fasilitassekolah/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_fasilitas', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
             Fasilitas sekolah berhasil diubah!
               </div>');
         redirect('admininfo/fasilitas');
      }
   }

   //Fasilitas Permainan
   public function Permainan()
   {
      $data['title'] = 'Fasilitas Permainan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['permainan'] = $this->Info_model->getDataPermainan();

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/info/permainan', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahpermainan()
   {
      $data['title'] = 'Tambah Fasilitas Permainan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['permainan'] = $this->Info_model->getDataPermainan();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/permainan', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/info/fasilitaspermainan';
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
         $this->db->insert('table_fpermainan', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Fasilitas permainan berhasil ditambahkan!
               </div>');
         redirect('admininfo/permainan');
      }
   }

   public function hapuspermainan($id)
   {
      $data = $this->Info_model->getDataPermainanById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/info/fasilitaspermainan/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_fpermainan');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
             Fasilitas permainan berhasil dihapus!
               </div>');
      redirect('admininfo/permainan');
   }

   public function ubahpermainan($id)
   {
      $data['title'] = 'Ubah Fasilitas Permainan';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['permainan'] = $this->Info_model->getDataPermainanById($id);

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahpermainan', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['gambar' => $gambar];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/info/fasilitaspermainan';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Info_model->getDataPermainanById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/info/fasilitaspermainan/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_fpermainan', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
             Fasilitas Permainan berhasil diubah!
               </div>');
         redirect('admininfo/permainan');
      }
   }


   // PRESTASI
   public function Prestasi()
   {
      $data['title'] = 'Prestasi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['prestasi'] = $this->Info_model->getDataPrestasi();

      $this->form_validation->set_rules('prestasi', 'Prestasi', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/prestasi', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->db->insert('table_prestasi', ['prestasi' => $this->input->post('prestasi')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data prestasi berhasil ditambahkan!
               </div>');
         redirect('admininfo/prestasi');
      }
   }

   public function hapusprestasi($id)
   {
      $this->Info_model->hapusprestasi($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data prestasi berhasil dihapus!
               </div>');
      redirect('admininfo/prestasi');
   }

   public function ubahprestasi($id)
   {
      $data['title'] = 'Ubah Prestasi Sekolah';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['prestasi'] = $this->Info_model->getPrestasiById($id);

      $this->form_validation->set_rules('prestasi', 'Prestasi', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/info/ubahprestasi', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Info_model->ubahDataPrestasi();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data prestasi berhasil diubah!
               </div>');
         redirect('admininfo/prestasi');
      }
   }
}
