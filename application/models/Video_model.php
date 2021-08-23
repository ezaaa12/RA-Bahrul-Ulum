<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
   // video
   public function getDataVideo()
   {
      return $this->db->get('table_video')->result_array();
   }

   public function getVideoById($id)
   {
      return $this->db->get_where('table_video', ['id' => $id])->row_array();
   }

   public function hapusvideo($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_video');
   }

   public function ubahvideo()
   {
      $data = [
         'tittle' => $this->input->post('tittle'),
         'link' => $this->input->post('link')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_video', $data);
   }

   //buat dashboard
   public function getAllDataVideo()
   {
      return $this->db->get('table_video')->num_rows();
   }
}
