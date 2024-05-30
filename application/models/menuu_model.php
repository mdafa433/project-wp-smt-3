<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menuu_model extends CI_Model
{
    public function insert_m($data)
    {
        return $this->db->insert('user_menu', $data);
    }

    public function get_menu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function get_m($id) {
        $this->db->where('id', $id);
        return $this->db->get('user_menu')->row();
    }
    public function update_menu($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user_menu', $data);
    }

    public function delete_mn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }



}
