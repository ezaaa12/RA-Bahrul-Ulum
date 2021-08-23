<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{
   public function getDataTahun()
   {
      return $this->db->get('table_thnajaran')->result_array();
   }

   public function getTahunById($id)
   {
      return $this->db->get_where('table_thnajaran', ['id' => $id])->row_array();
   }

   public function hapusDataTahun($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_thnajaran');
   }

   public function ubahDataTahun()
   {
      $data = [
         'thnajaran' => $this->input->post('thnajaran')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_thnajaran', $data);
   }
}
