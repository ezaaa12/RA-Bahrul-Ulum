<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

   //Galeri Internal
   public function getGInternal()
   {
      return $this->db->get('table_galinternal')->result_array();
   }

   public function getGInternalById($id)
   {
      return $this->db->get_where('table_galinternal', ['id' => $id])->row_array();
   }

   public function getInternal($limit, $start)
   {
      return $this->db->get('table_galinternal', $limit, $start)->result_array();
   }

   public function countAllInternal()
   {
      return $this->db->get('table_galinternal')->num_rows();
   }

   //Galeri Eksternal
   public function getGEksternal()
   {
      return $this->db->get('table_galeksternal')->result_array();
   }

   public function getGEksternalById($id)
   {
      return $this->db->get_where('table_galeksternal', ['id' => $id])->row_array();
   }

   public function getEksternal($limit, $start)
   {
      return $this->db->get('table_galeksternal', $limit, $start)->result_array();
   }

   public function countAllEksternal()
   {
      return $this->db->get('table_galeksternal')->num_rows();
   }
}
