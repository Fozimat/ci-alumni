<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_login');

	}

	public function index()
	{
		if($this->session->userdata('status') == "login"){
			redirect('home');
		}
		$this->load->view('login');
	}

	public function login()
	{
		$valid = $this->form_validation;
		$valid->set_rules('username', 'username', 'required', 
			array('required' => '%s tidak boleh kosong'
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
			$this->load->view('login');
		} else {
			$query = $this->m_login->proses_login($username, $password);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$param = array(
					'nama' => $row->nama,
					'foto' => $row->foto,
					'status' => 'login'
				);
				$this->session->set_userdata($param);
				redirect('home');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
				redirect('auth');
			}
		}
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}