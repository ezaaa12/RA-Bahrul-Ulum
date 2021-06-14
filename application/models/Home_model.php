<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
   //KEGIATAN TERBARU
   public function getDataKegiatan()
   {
      return $this->db->get('table_kegterbaru')->result_array();
   }

   public function getDataKegiatanById($id)
   {
      return $this->db->get_where('table_kegterbaru', ['id' => $id])->row_array();
   }


   //SAMBUTAN
   public function getDataSambutan()
   {
      return $this->db->get('table_sambutan')->result_array();
   }

   public function getSambutanById($id)
   {
      return $this->db->get_where('table_sambutan', ['id' => $id])->row_array();
   }

   public function ubahSambutan()
   {
      $data = [
         'isi' => $this->input->post('isi'),
         'jabatan' => $this->input->post('jabatan'),
         'nama' => $this->input->post('nama')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_sambutan', $data);
   }

   //GALERI TERBARU
   public function getDataGaleri()
   {
      return $this->db->get('table_galeribaru')->result_array();
   }

   public function getDataGaleriById($id)
   {
      return $this->db->get_where('table_galeribaru', ['id' => $id])->row_array();
   }
}
