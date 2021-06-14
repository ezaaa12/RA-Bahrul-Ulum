<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
   // Profil Sekolah
   public function getDataProfil()
   {
      return $this->db->get('table_profil')->result_array();
   }

   public function getProfilById($id)
   {
      return $this->db->get_where('table_profil', ['id' => $id])->row_array();
   }

   public function ubahProfil()
   {
      $data = [
         'profil' => $this->input->post('profil')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_profil', $data);
   }

   // Visi Sekolah
   public function getDataVisi()
   {
      return $this->db->get('table_visi')->result_array();
   }

   public function getDataVisiById($id)
   {
      return $this->db->get_where('table_visi', ['id' => $id])->row_array();
   }

   public function ubahVisi()
   {
      $data = [
         'visi' => $this->input->post('visi')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_visi', $data);
   }

   // Tujuan
   public function getDataMisi()
   {
      return $this->db->get('table_misi')->result_array();
   }

   public function getMisiById($id)
   {
      return $this->db->get_where('table_misi', ['id' => $id])->row_array();
   }

   public function hapusmisi($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_misi');
   }

   public function ubahDataMisi()
   {
      $data = [
         'misi' => $this->input->post('misi')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_misi', $data);
   }

   // Tujuan
   public function getDataTujuan()
   {
      return $this->db->get('table_tujuan')->result_array();
   }

   public function getTujuanById($id)
   {
      return $this->db->get_where('table_tujuan', ['id' => $id])->row_array();
   }

   public function hapustujuan($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_tujuan');
   }

   public function ubahDataTujuan()
   {
      $data = [
         'tujuan' => $this->input->post('tujuan')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_tujuan', $data);
   }

   // Data Guru
   public function getDataGuru()
   {
      return $this->db->get('table_dataguru')->result_array();
   }

   public function getDataGuruById($id)
   {
      return $this->db->get_where('table_dataguru', ['id' => $id])->row_array();
   }
}
