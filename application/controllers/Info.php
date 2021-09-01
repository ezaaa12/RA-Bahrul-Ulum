<?php

class Info extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Info_model');
      //pagination
      $this->load->library('pagination');
   }


   public function index()
   {

      $data['judul'] = 'Info';
      $data['kelas'] = $this->Info_model->getDataKelas();
      $data['kurikulum'] = $this->Info_model->getDataKurikulum();
      $data['prestasi'] = $this->Info_model->getDataPrestasi();
      $data['kegiatan'] = $this->Info_model->getDataKegiatan();


      $this->load->view('templates/header', $data);
      $this->load->view('info/index');
      $this->load->view('templates/footer');
   }

   public function fasilitas()
   {

      $data['judul'] = 'Fasilitas Sekolah';

      //pagination

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/Info/fasilitas';

      $config['total_rows'] = $this->Info_model->countAllFasilitas();
      $config['per_page'] = 9;

      //styling
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';

      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</a></li>';

      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</a></li>';

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link teal" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</a></li>';

      $config['attributes'] = ['class' => 'page-link'];

      //initialize
      $this->pagination->initialize($config);

      $data['start'] = $this->uri->segment(3);
      $data['fasilitas'] = $this->Info_model->getFasilitas($config['per_page'], $data['start']);

      $this->load->view('templates/header', $data);
      $this->load->view('info/sekolah', $data);
      $this->load->view('templates/footer');
   }

   public function permainan()
   {

      $data['judul'] = 'Fasilitas Permainan';

      //pagination

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/Info/permainan';

      $config['total_rows'] = $this->Info_model->countAllPermainan();
      $config['per_page'] = 6;

      //styling
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';

      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</a></li>';

      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</a></li>';

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link teal" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</a></li>';

      $config['attributes'] = ['class' => 'page-link'];

      //initialize
      $this->pagination->initialize($config);

      $data['start'] = $this->uri->segment(3);
      $data['permainan'] = $this->Info_model->getPermainan($config['per_page'], $data['start']);

      $this->load->view('templates/header', $data);
      $this->load->view('info/permainan', $data);
      $this->load->view('templates/footer');
   }
}
