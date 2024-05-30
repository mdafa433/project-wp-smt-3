<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class coming_soon extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('coming_soon_model');
    }

    public function index() 
    {             
        $data['films'] = $this->coming_soon_model->get_films();
        $judul['title']='Add Film | Coming Soon';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('coming_film/index', $data);
        $this->load->view('templates/footer');
    }
    public function user() 
    {
        $data['films'] = $this->coming_soon_model->get_films();
        $judul['title']='Coming Soon';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('coming_user/index', $data);
        $this->load->view('templates/footer');
    }

    public function add() {
        $data['title'] = 'Add Film | Coming Soon';
        if ($_POST) {
        
        $data = [
            'judul_film' => $this->input->post('judul_film'),
            'genre' => $this->input->post('genre')  
        ];

        // Tambahan kode untuk mengunggah poster
        $config['upload_path'] = './uploads/'; // Sesuaikan dengan folder penyimpanan Anda
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('poster')) {
            $upload_data = $this->upload->data();
            $data['poster'] = $upload_data['file_name'];

            // Simpan data film ke database, termasuk nama gambar poster
            $this->coming_soon_model->add_film($data);

            // Redirect ke halaman index
            redirect('coming_soon');
        } else {
            // Jika gagal mengunggah gambar, Anda dapat menangani kesalahan di sini
        }
        
    } else {
        $judul['title']='Admin | Tambahkan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
        $this->load->view('coming_film/add');
        $this->load->view('templates/footer');
    }
}

public function edit($id) {
    if ($_POST) {
        $data = array(
            'judul_film' => $this->input->post('judul_film'),
            'genre' => $this->input->post('genre')
        );

        // Cek apakah ada gambar baru diunggah
        if ($_FILES['new_poster']['name']) {
            $config['upload_path'] = './uploads/'; // Sesuaikan dengan folder penyimpanan Anda
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('new_poster')) {
                $upload_data = $this->upload->data();
                $data['poster'] = $upload_data['file_name'];
                $old_poster = $data['film']['poster'];
                if ($old_poster != 'default.jpg') {
                    unlink(FCPATH . './upload/' . $old_poster);
                }

                

                $new_poster = $this->upload->data('file_name');
                $this->db->set('poster', $new_poster);
            } else {
                echo $this->upload->display_errors();
            }
        }

        // Update data film ke database
        $this->coming_soon_model->update_film($id, $data);

        // Redirect ke halaman index
        redirect('coming_soon');
    } else {
        $data['film'] = $this->coming_soon_model->get_film($id);
        $judul['title'] = 'Admin | Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('coming_film/edit', $data);
        $this->load->view('templates/footer');
    }
}

    public function delete($id) {
        $this->coming_soon_model->delete_film($id);
        redirect('coming_soon');
    }

    

}
