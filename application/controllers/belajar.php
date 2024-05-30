<?php
class belajar extends CI_Controller {
    public function __construct() {
        parent::__construct();
       
        $this->load->model('isinya_model');
    }

    public function index() {
        $data['title'] = 'Daftar Produk pada Toko Klontong';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['products'] = $this->isinya_model->get_products();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('isinya/index', $data);
        $this->load->view('templates/footer',);

    }
    public function isi() {
        $data['title'] = 'Daftar Produk pada Toko Klontong';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['products'] = $this->isinya_model->get_products();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('indek/index', $data);
        $this->load->view('templates/footer',);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'satuan' => $this->input->post('satuan')
            );

            $this->isinya_model->insert_product($data); 
            
            redirect('belajar');
        }

        $this->load->view('isinya/buat');
    }
    public function edit($kode_produk) {
        if ($_POST) {
            $data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'satuan' => $this->input->post('satuan')
            );
    
            // Update data produk ke database
            $this->isinya_model->update_products($kode_produk, $data);
    
            // Redirect ke halaman index
            redirect('belajar');
        } else {
            $data['product'] = $this->isinya_model->get_product($kode_produk);
            $judul['title'] = 'Admin | Edit';
            $this->load->view('isinya/edit', $data);
            
        }
    }
    public function delete($kode_produk) {
        $this->isinya_model->delete_product($kode_produk);
        redirect('belajar');
    }
}
?>
