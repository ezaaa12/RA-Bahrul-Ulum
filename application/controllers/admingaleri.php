<?php

class Admingaleri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();

      $this->load->model('Galeri_model');

      //Pagination
      $this->load->library('pagination');
   }

   //galeri internal
   public function galeriinternal()
   {
      $data['title'] = 'Galeri Kegiatan Internal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      //PAGINATION

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/admingaleri/galeriinternal';

      $config['total_rows'] = $this->Galeri_model->countAllInternal();
      $config['per_page'] = 12;


      //styling
      $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul></nav>';

      $config['first_link'] = 'First';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</a></li>';

      $config['last_link'] = 'Last';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</a></li>';

      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</a></li>';

      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</a></li>';

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</a></li>';

      $config['attributes'] = ['class' => 'page-link'];

      //initialize
      $this->pagination->initialize($config);

      $data['start'] = $this->uri->segment(3);
      $data['galeri'] = $this->Galeri_model->getInternal($config['per_page'], $data['start']);

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/galeri/ginternal', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahinternal()
   {
      $data['title'] = 'Tambah Gambar Kegiatan Internal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['galeri'] = $this->Galeri_model->getGInternal();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/ginternal', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/galeri/internal';
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
         $this->db->insert('table_galinternal', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Gambar berhasil ditambahkan!
               </div>');
         redirect('admingaleri/galeriinternal');
      }
   }

   public function hapusinternal($id)
   {
      $data = $this->Galeri_model->getGInternalById(
         $id
      );
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/galeri/internal/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_galinternal');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
             Gambar berhasil dihapus!
               </div>');
      redirect('admingaleri/galeriinternal');
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


   public function ubahinternal($id)
   {
      $data['title'] = 'Ubah Gambar Kegiatan Internal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['galeri'] = $this->Galeri_model->getGInternalById($id);

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/ubahinternal', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['gambar' => $gambar];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/galeri/internal';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Galeri_model->getGInternalById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/galeri/internal/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_galinternal', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
            Gambar berhasil diubah!
               </div>');
         redirect('admingaleri/galeriinternal');
      }
   }

   //galeri eksternal
   public function galerieksternal()
   {
      $data['title'] = 'Galeri Kegiatan Eksternal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      //PAGINATION

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/admingaleri/galerieksternal';

      $config['total_rows'] = $this->Galeri_model->countAllEksternal();
      $config['per_page'] = 12;


      //styling
      $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul></nav>';

      $config['first_link'] = 'First';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</a></li>';

      $config['last_link'] = 'Last';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</a></li>';

      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</a></li>';

      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</a></li>';

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</a></li>';

      $config['attributes'] = ['class' => 'page-link'];

      //initialize
      $this->pagination->initialize($config);

      $data['start'] = $this->uri->segment(3);
      $data['galeri'] = $this->Galeri_model->getEksternal($config['per_page'], $data['start']);

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/galeri/geksternal', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambaheksternal()
   {
      $data['title'] = 'Tambah Gambar Kegiatan Eksternal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();
      $data['galeri'] = $this->Galeri_model->getGEksternal();

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/geksternal', $data);
         $this->load->view('templates/footer-admin');
      } else {

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['upload_path'] = './assets/img/galeri/eksternal';
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
         $this->db->insert('table_galeksternal', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Gambar berhasil ditambahkan!
               </div>');
         redirect('admingaleri/galerieksternal');
      }
   }

   public function hapuseksternal($id)
   {
      $data = $this->Galeri_model->getGEksternalById($id);
      $gambar = $data['gambar'];

      @unlink(FCPATH . './assets/img/galeri/eksternal/' . $gambar);

      $this->db->where('id', $id);
      $this->db->delete('table_galeksternal');

      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
             Gambar berhasil dihapus!
               </div>');
      redirect('admingaleri/galerieksternal');
   }

   public function ubaheksternal($id)
   {
      $data['title'] = 'Ubah Gambar Kegiatan Eksternal';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['galeri'] = $this->Galeri_model->getGEksternalById($id);

      $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_check');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/galeri/ubaheksternal', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = ['gambar' => $gambar];

         $gambar = $_FILES['gambar']['name'];

         $config['upload_path'] = './assets/img/galeri/eksternal';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size']     = '2048';

         $this->load->library('upload', $config);

         if ($gambar != null) {
            $get = $this->Galeri_model->getGEksternalById($id);
            $old_image = $get['gambar'];

            @unlink(FCPATH . './assets/img/galeri/eksternal/' . $old_image);

            if ($this->upload->do_upload('gambar')) {
               $data['gambar'] = $this->upload->data('file_name');
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('table_galeksternal', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
            Gambar berhasil diubah!
               </div>');
         redirect('admingaleri/galerieksternal');
      }
   }
}
