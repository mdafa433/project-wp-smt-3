<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library("session");
		$this->load->model('Menu_mode');
		$this->load->model('menuu_model');
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->where('id !=', 1);
		$this->db->where('id !=', 2);
		$this->db->where('id !=', 3);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!</div>');
			redirect('menu');
		}
	}
	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_mode', 'menu');
		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New SubMenu added!</div>');
			redirect('menu/submenu');
		}
	}
	public function editm($id) {
        if ($_POST) {
            $data = array(
                'menu' => $this->input->post('menu'),
            );
    
            // Update data produk ke database
            $this->menuu_model->update_menu($id, $data);
    
            // Redirect ke halaman index
            redirect('menu');
        } else {
            $data['m'] = $this->menuu_model->get_m($id);
			$data['title'] = 'Edit Menu';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
			$this->load->view('templates/footer',);
            
		}
	}
	public function editsub($id) {
        if ($_POST) {
            $data = array(
                'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            );
            $this->Menu_mode->update_sm($id, $data);
            redirect('menu/submenu');
        } else {
            $data['sm'] = $this->Menu_mode->get_sm($id);
			$data['title'] = 'Edit SubMenu';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	        $this->load->model('Menu_mode', 'menu');
		    $data['subMenu'] = $this->menu->getSubMenu();
		    $data['menu'] = $this->db->get('user_menu')->result_array();
			$this->form_validation->set_rules('menu_id', 'Menu', 'required');
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_sub', $data);
			$this->load->view('templates/footer',);
            
		}
	}
	
	public function delete($id) {
        $this->Menu_mode->delete_sub($id);
        redirect('menu/submenu');
    }
	public function delete2($id) {
        $this->menuu_model->delete_mn($id);
        redirect('menu');
    }
	
}
