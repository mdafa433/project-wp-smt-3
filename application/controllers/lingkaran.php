<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lingkaran extends CI_Controller {
    public function index() {
        $data['title'] = 'Lingkaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data); 
		$this->load->view('templates/sidebar',$data); 
		$this->load->view('templates/topbar',$data); 
        $this->load->view('hitung/lingkaran_view');
        
    }

    public function hitung() {
        $data['title'] = 'Lingkaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $jari_jari = $this->input->post('jari_jari'); // Ubah dari 'radius' ke 'jari_jari'
        // Cek apakah $jari_jari adalah kelipatan 7
        if ($jari_jari % 7 == 0) {
            $phi = 22 / 7;
        } else {
            $phi = 3.14;
        }
        $luas = $phi * $jari_jari * $jari_jari;
        $total['luas'] = $luas;
        $this->load->view('templates/header',$data); 
		$this->load->view('templates/sidebar',$data); 
		$this->load->view('templates/topbar',$data); 
        $this->load->view('hitung/hitung', $total);
        
    }
}