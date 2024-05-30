<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('user');
              }
        $this->form_validation->set_rules('email', 'Email' , 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password' , 'trim|required');
        
        if($this->form_validation->run() == false)
       {
        $this->load->view('templates/auth_header' );
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
        
    } else{
        
        $this-> _login();

         }
   }

   private function _login()
   {
        
       $email = $this->input->post('email');
       $password = $this->input->post('password');

       $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
       //jika usernya ada
       if($user){
        //jika usernya aktif
                 if($user['is_active'] == 1) {
                    //cek password
                    if(password_verify($password, $user['password'])){

                        $data =[
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],

                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('berhasil', 'Login berhasil! Selamat datang, ' . $user['name'] . '!');
                        if($user['role_id'] == 1) {
                            redirect('admin');
                        }else{

                            redirect('user');
                        }
                        
                    } else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">password salah</div>');
                        redirect('auth');
                          }
                    } else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email ini belom aktif</div>');
                        redirect('auth');
                       }
                    } else{
                       $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email gak terdaftar</div>');
                       redirect('auth');
                       }
   }

    public function registration()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'email ini sudah pernah terdaftar '
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches'=> 'Password dont match!',
            'min_length'=> 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false){
            $this->load->view('templates/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');

        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()

                

             ] ;
             $this->db->insert('user', $data);
             $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">selamat akun lu udah berhasil di buat.tolong login wir</div>');
             redirect('auth');
        }
    }

    public function Logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">lu udah logout sekarang</div>');
        redirect('auth');

       
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }



}