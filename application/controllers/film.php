<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Film_model');
    }

    public function index() 
    {
        
            
        $data['films'] = $this->Film_model->get_films();
        $judul['title']='Film';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('film/index', $data);
        $this->load->view('templates/footer');
    }
    public function user() 
    {
        $data['films'] = $this->Film_model->get_films();
        $judul['title']='Sedang Tayang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('film_user/index', $data);
        $this->load->view('templates/footer');
    }

    public function add() {
        $data['title'] = 'Add Film | Sedang Tayang';
        if ($_POST) {
        
        $data = [
            'judul_film' => $this->input->post('judul_film'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'studio' => $this->input->post('studio')
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
            $this->Film_model->add_film($data);

            // Redirect ke halaman index
            redirect('film');
        } else {
            // Jika gagal mengunggah gambar, Anda dapat menangani kesalahan di sini
        }
    } else {
        $judul['title']='Admin | Tambahkan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$judul);
        $this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
        $this->load->view('film/add');
        $this->load->view('templates/footer');
    }
}

public function edit($id) {
    if ($_POST) {
        $data = array(
            'judul_film' => $this->input->post('judul_film'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'studio' => $this->input->post('studio')
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
        $this->Film_model->update_film($id, $data);

        // Redirect ke halaman index
        redirect('film');
    } else {
        $data['film'] = $this->Film_model->get_film($id);
        $judul['title'] = 'Admin | Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('film/edit', $data);
        $this->load->view('templates/footer');
    }
}

    public function delete($id) {
        $this->Film_model->delete_film($id);
        redirect('film');
    }

    

}
