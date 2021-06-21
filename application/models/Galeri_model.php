<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

   //KATEGORI
   public function getDataKategori()
   {
      return $this->db->get('table_kategori')->result_array();
   }

   public function getKategoriById($id)
   {
      return $this->db->get_where('table_kategori', ['id' => $id])->row_array();
   }

   public function hapusKategori($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_kategori');
   }

   public function ubahDataKategori()
   {
      $data = [
         'kategori' => $this->input->post('kategori')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_kategori', $data);
   }
}
