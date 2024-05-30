<?php
class coming_soon_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_films() {
        return $this->db->get('coming_soon')->result();
    }
    public function get_film($id) {
    $this->db->where('id', $id);
    return $this->db->get('coming_soon')->row();
}

    public function add_film($data) {
        return $this->db->insert('coming_soon', $data);
    }

    public function update_film($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('coming_soon', $data);
    }

    public function delete_film($id) {
        $this->db->where('id', $id);
        return $this->db->delete('coming_soon');
    }
}