<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
   public function getDataAdmin()
   {
      return $this->db->get('table_user')->result_array();
   }

   public function getAdminById($id)
   {
      return $this->db->get_where('table_user', ['id' => $id])->row_array();
   }

   public function hapusDataAdmin($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('table_user');
   }

   public function ubahDataAdmin()
   {
      $data = [
         'nama' => $this->input->post('nama'),
         'email' => $this->input->post('email'),
         'password' => md5($this->input->post('password'))
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('table_user', $data);
   }
}
