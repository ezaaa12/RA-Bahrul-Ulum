<?php

class Galeri extends CI_Controller
{
   public function index()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/galeri', $data);
   }

   public function kegduha()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/duha', $data);
   }

   public function kegmanasik()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/manasik', $data);
   }

   public function kegmembatik()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/membatik', $data);
   }

   public function kegpensi()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/pensi', $data);
   }

   public function kegkartini()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/kartini', $data);
   }

   public function kegporseni()
   {

      $data['judul'] = 'Galeri';

      $this->load->view('galeri/porseni', $data);
   }
   
}
