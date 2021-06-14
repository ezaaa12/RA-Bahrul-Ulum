<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
   public function getDataKategori()
   {
      return $this->db->get('table_kategori')->result_array();
   }
}
