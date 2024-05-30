<?php
class isinya_model extends CI_Model
{
    public function insert_product($data)
    {
        return $this->db->insert('isinya', $data);
    }

    public function get_products()
    {
        return $this->db->get('isinya')->result_array();
    }

    public function get_product($kode_produk) {
        $this->db->where('kode_produk', $kode_produk);
        return $this->db->get('isinya')->row();
    }
    public function update_products($kode_produk, $data) {
        $this->db->where('kode_produk', $kode_produk);
        return $this->db->update('isinya', $data);
    }

    public function delete_product($kode_produk)
    {
        $this->db->where('kode_produk', $kode_produk);
        $this->db->delete('isinya');
    }
}
