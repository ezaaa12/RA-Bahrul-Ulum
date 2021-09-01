<?php

class Vpembelajaran extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Video_model');
      //pagination
      $this->load->library('pagination');
   }

   public function index()
   {

      $data['judul'] = 'Video Pembelajaran';

      //PAGINATION

      $config['base_url'] = 'http://localhost/RA-Bahrul-Ulum/vpembelajaran/index';

      $config['total_rows'] = $this->Video_model->getAllDataVideo();
      $config['per_page'] = 4;

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
      $data['video'] = $this->Video_model->getVideo($config['per_page'], $data['start']);

      $this->load->view('templates/header', $data);
      $this->load->view('video/pembelajaran', $data);
      $this->load->view('templates/footer');
   }
}
