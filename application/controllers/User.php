<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('Pdf');
		// $this->load->library('form_validation');

	}

 	public function index()
	{
		$data['row'] = $this->m_login->getMember();
		$this->template->load('template', 'user/tampil', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
			[
				'is_unique' => 'Email sudah terdaftar'
			]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[passconf]', 
			array(
				'min_length' => '{field} terlalu pendek'
			));
		$this->form_validation->set_rules('passconf', 'Password', 'required|trim|matches[password]',
			array(
				'matches' => '{field} tidak sesuai!'
			));

		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		// $this->form_validation->set_message('matches', '{field} tidak sesuai!');


		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run() == false) {
			$this->template->load('template', 'user/tambah');
		} else {
			echo 'Berhasil';
		}
	}

	public function activate($id)
	{
		$this->m_login->activate($id);
		redirect('user');
	}

	public function deactivate($id)
	{
		$this->m_login->deactivate($id);
		redirect('user');
	}

	public function cetak()
	{
		$data['user'] = $this->m_login->getMember();
		$this->load->view('user/cetak_user' ,$data);
	}

	public function delete($id)
	{
		$this->m_login->deleteUser($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('user');
	}
}
