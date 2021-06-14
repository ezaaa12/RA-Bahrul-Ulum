<?php

class Galeri extends CI_Controller
{
   public function index()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/galeri', $data);
   }
}
