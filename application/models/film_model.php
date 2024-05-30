<?php
class Film_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_films() {
        return $this->db->get('film')->result();
    }
    public function get_film($id) {
    $this->db->where('id', $id);
    return $this->db->get('film')->row();
}

    public function add_film($data) {
        return $this->db->insert('film', $data);
    }

    public function update_film($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('film', $data);
    }

    public function delete_film($id) {
        $this->db->where('id', $id);
        return $this->db->delete('film');
    }
}