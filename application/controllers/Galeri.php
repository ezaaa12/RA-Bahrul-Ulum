<?php

class Galeri extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Galeri_model');
      //pagination
      $this->load->library('pagination');
   }

   public function index()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/galeri', $data);
   }

   public function keginternal()
   {

      $data['judul'] = 'Galeri';

      //PAGINATION

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/galeri/keginternal';

      $config['total_rows'] = $this->Galeri_model->countAllInternal();
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
      $data['galeri'] = $this->Galeri_model->getInternal($config['per_page'], $data['start']);

      $this->load->view('galeri/internal', $data);
   }

   public function kegeksternal()
   {

      $data['judul'] = 'Galeri';

      //PAGINATION

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/galeri/kegeksternal';

      $config['total_rows'] = $this->Galeri_model->countAllEksternal();
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
      $data['galeri'] = $this->Galeri_model->getEksternal($config['per_page'], $data['start']);

      $this->load->view('galeri/eksternal', $data);
   }
}
