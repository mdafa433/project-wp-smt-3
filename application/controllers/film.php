<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class film extends CI_Controller {

	public function sedang_tayang()
	{
		$data['title'] = 'Sedang Tayang | Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();	
		$this->load->view('templates/header',$data); 
		$this->load->view('templates/sidebar',$data); 
		$this->load->view('templates/topbar',$data); 
		$this->load->view('film/live');
		$this->load->view('templates/footer'); 
	}
	public function akan_tayang()
	{
		$data['title'] = 'Akan Tayang | Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data); 
		$this->load->view('templates/sidebar',$data); 
		$this->load->view('templates/topbar',$data); 
		$this->load->view('film/soon');
		$this->load->view('templates/footer'); 
	}
	public function cinema(){
		
			$data['title'] = 'Cinema';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/header',$data); 
			$this->load->view('templates/sidebar',$data); 
			$this->load->view('templates/topbar',$data); 
			$this->load->view('member/daftar_film');
			$this->load->view('templates/footer'); 
		
	}
}
