<?php

class Admindtsiswa extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Dtsiswa_model');
   }

   //galeri internal
   public function index()
   {
      $data['title'] = 'Data Siswa';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      //Pagination
      $this->load->library('pagination');

      //Ambil Data keyword
      if ($this->input->post('submit')) {
         $data['keyword'] = $this->input->post('keyword');
         $this->session->set_userdata('keyword', $data['keyword']);
      } else {
         $data['keyword'] = $this->session->userdata('keyword');
      }

      //config
      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/admindtsiswa/index';

      $this->db->like('nama', $data['keyword']);
      $this->db->or_like('ttl', $data['keyword']);
      $this->db->or_like('jk', $data['keyword']);
      $this->db->or_like('kelompok', $data['keyword']);
      $this->db->or_like('status', $data['keyword']);
      $this->db->or_like('alamat', $data['keyword']);
      $this->db->or_like('thnajaran', $data['keyword']);
      $this->db->from('table_datasiswa');

      $config['total_rows'] = $this->db->count_all_results();
      $data['total_rows'] = $config['total_rows'];
      $config['per_page'] = 10;

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
      $data['siswa'] = $this->Dtsiswa_model->getSiswa($config['per_page'], $data['start'], $data['keyword']);

      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin', $data);
      $this->load->view('templates/topbar-admin', $data);
      $this->load->view('admin/siswa/datasiswa', $data);
      $this->load->view('templates/footer-admin');
   }

   public function tambahdatasiswa()
   {
      $data['title'] = 'Data Siswa';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      //Pagination
      $this->load->library('pagination');

      //config
      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/admindtsiswa/index';

      $config['total_rows'] = $this->db->count_all_results();
      $data['total_rows'] = $config['total_rows'];
      $config['per_page'] = 10;

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
      $data['siswa'] = $this->Dtsiswa_model->getSiswa($config['per_page'], $data['start']);


      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('ttl', 'TTL', 'required');
      $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('ayah', 'Ayah', 'required');
      $this->form_validation->set_rules('ibu', 'Ibu', 'required');
      $this->form_validation->set_rules('thnajaran', 'Tahun Ajaran', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/siswa/datasiswa', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $data = [
            'nama' => $this->input->post('nama', true),
            'ttl' => $this->input->post('ttl', true),
            'jk' => $this->input->post('jk', true),
            'kelompok' => $this->input->post('kelompok', true),
            'status' => $this->input->post('status', true),
            'alamat' => $this->input->post('alamat', true),
            'ayah' => $this->input->post('ayah', true),
            'ibu' => $this->input->post('ibu', true),
            'thnajaran' => $this->input->post('thnajaran', true)
         ];
         $this->db->insert('table_datasiswa', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data siswa berhasil ditambahkan!
               </div>');
         redirect('admindtsiswa/index');
      }
   }

   public function hapusdatasiswa($id)
   {
      $this->Dtsiswa_model->hapusdatasiswa($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-6" role="alert">
              Data siswa berhasil dihapus!
               </div>');
      redirect('admindtsiswa/index');
   }

   public function ubahdatasiswa($id)
   {
      $data['title'] = 'Ubah Data Siswa';
      $data['user'] = $this->db->get_where('table_user', ['email' => $this->session->userdata('email')])->row_array();

      $data['siswa'] = $this->Dtsiswa_model->getSiswaById($id);

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('ttl', 'TTL', 'required');
      $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('ayah', 'Ayah', 'required');
      $this->form_validation->set_rules('ibu', 'Ibu', 'required');
      $this->form_validation->set_rules('thnajaran', 'Tahun Ajaran', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header-admin', $data);
         $this->load->view('templates/sidebar-admin', $data);
         $this->load->view('templates/topbar-admin', $data);
         $this->load->view('admin/siswa/ubahsiswa', $data);
         $this->load->view('templates/footer-admin');
      } else {
         $this->Dtsiswa_model->ubahDataSiswa();
         $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-6" role="alert">
              Data siswa berhasil diubah!
               </div>');
         redirect('admindtsiswa/index');
      }
   }
}
