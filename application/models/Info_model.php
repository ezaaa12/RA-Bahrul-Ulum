<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info_model extends CI_Model
{

   // KELAS
   public function getDataKelas()
   {
      return $this->db->get('table_kelas')->result_array();
   }

   public function getDataKelasById($id)
   {
      return $this->db->get_where('table_kelas', ['id' => $id])->row_array();
   }

   //KEGIATAN SEKOLAH
   public function getDataKegiatan()
   {
      return $this->db->get('table_kegiatan')->result_array();
   }

   public function getDataKegiatanById($id)
   {
      return $this->db->get_where('table_kegiatan', ['id' => $id])->row_array();
   }



   // KURIKULUM
   public function getDataKurikulum()
   {
      return $this->db->get('table_kurikulum')->result_array();
   }

   public function getKurikulumById($id)
   {
      return $this->db->get_where('table_kurikulum', ['id' => $id])->row_array();
   }

   public function ubahkurikulum()
   {
      $data = [
         'kurikulum' => $this->input->post('kurikulum')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_kurikulum', $data);
   }

   //FASILITAS
   //Fasilitas Sekolah
   public function getDataFasilitas()
   {
      return $this->db->get('table_fasilitas')->result_array();
   }

   public function getDataFasilitasById($id)
   {
      return $this->db->get_where('table_fasilitas', ['id' => $id])->row_array();
   }

   public function getFasilitas($limit, $start)
   {
      return $this->db->get('table_fasilitas', $limit, $start)->result_array();
   }

   public function countAllFasilitas()
   {
      return $this->db->get('table_fasilitas')->num_rows();
   }

   //Fasilitas permainan
   public function getDataPermainan()
   {
      return $this->db->get('table_fpermainan')->result_array();
   }

   public function getDataPermainanById($id)
   {
      return $this->db->get_where('table_fpermainan', ['id' => $id])->row_array();
   }

   public function countAllPermainan()
   {
      return $this->db->get('table_fpermainan')->num_rows();
   }

   public function getPermainan($limit, $start)
   {
      return $this->db->get('table_fpermainan', $limit, $start)->result_array();
   }



   // PRESTASI
   public function getDataPrestasi()
   {
      return $this->db->get('table_prestasi')->result_array();
   }

   public function getPrestasiById($id)
   {
      return $this->db->get_where('table_prestasi', ['id' => $id])->row_array();
   }

   public function hapusprestasi($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_prestasi');
   }

   public function ubahDataPrestasi()
   {
      $data = [
         'prestasi' => $this->input->post('prestasi')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_prestasi', $data);
   }
}
