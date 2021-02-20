<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_beranda');

    }

    public function index()
    {
        if($this->session->userdata('status') == "login_alumni"){
            redirect('dashboard');
        }
        $this->load->view('beranda/login');
    }

    public function login()
        {
            
            $valid = $this->form_validation;
            $valid->set_rules('username', 'Username', 'required', 
                array('required' => '%s tidak boleh kosong',
                )
            );

            $valid->set_rules('password', 'Password', 'required|min_length[4]', 
                array('required' => '{field} tidak boleh kosong',
                      'min_length' => '%s lebih dari 4'
                )
            );

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
                    

            if($valid->run() == false) {
                $this->load->view('beranda/login');
            } else {
                $query = $this->m_beranda->proses_login($username, $password);
                if($query->num_rows() > 0) {
                    $row = $query->row();
                    $param = array(
                        'nama' => $row->nama,
                        'foto' => $row->foto,
                        'status' => 'login_alumni',
                        'email' => $row->email,
                        'id' => $row->id
                    );
                    $this->session->set_userdata($param);

                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
                    redirect('login/login');
                }
                // var_dump($query->num_rows());
                // die();
            }
        

        }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/login');
    }

}