<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_mode extends CI_Model
{

    public function getSubMenu(){

        $query = "SELECT `user_sub_menu`.*, `user_menu`. `menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        
                  ";

        return $this->db->query($query)->result_array();


        
    }
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_subMenu() {
        return $this->db->get('user_sub_menu')->result();
    }
    public function get_sm($id) {
    $this->db->where('id', $id);
    return $this->db->get('user_sub_menu')->row();
    }

    public function update_sm($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user_sub_menu', $data);
    }

    public function delete_sub($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }



}
