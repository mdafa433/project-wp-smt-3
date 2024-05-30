<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class role_model extends CI_Model
{
    public function insert_r($data)
    {
        return $this->db->insert('user_role', $data);
    }

    public function get_role()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function get_r($id) {
        $this->db->where('id', $id);
        return $this->db->get('user_role')->row();
    }
    public function update_role($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user_role', $data);
    }



}
