<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dtsiswa_model extends CI_Model
{

   //Galeri Internal
   public function getDataSiswa()
   {
      return $this->db->get('table_datasiswa')->result_array();
   }

   public function getSiswa($limit, $start, $keyword = null)
   {
      if ($keyword) {
         $this->db->like('nama', $keyword);
         $this->db->or_like('ttl', $keyword);
         $this->db->or_like('jk', $keyword);
         $this->db->or_like('kelompok', $keyword);
         $this->db->or_like('status', $keyword);
         $this->db->or_like('alamat', $keyword);
         $this->db->or_like('thnajaran', $keyword);
      }
      return $this->db->get('table_datasiswa', $limit, $start)->result_array();
   }

   public function countAllSiswa()
   {
      return $this->db->get('table_datasiswa')->num_rows();
   }

   public function hapusdatasiswa($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_datasiswa');
   }

   public function getSiswaById($id)
   {
      return $this->db->get_where('table_datasiswa', ['id' => $id])->row_array();
   }

   public function ubahDataSiswa()
   {
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

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_datasiswa', $data);
   }
}
