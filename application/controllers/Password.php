<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');

		is_logged();

	}

	public function index()
	{
		$data['alumni'] = $this->db->get_where('tabel_alumni', ['id' => $this->session->userdata('id')])->row_array();

		$valid = $this->form_validation;

		$valid->set_rules('password_lama', 'Password Lama', 'required|trim');
		$valid->set_rules('password_baru', 'Password baru', 'required|trim|min_length[4]|matches[password_baru2]');
		$valid->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[4]|matches[password_baru]');

		$valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('matches', '{field} tidak sesuai');
		$valid->set_message('min_length', '{field} kurang dari 4 karakter');

		$valid->set_error_delimiters('<div class="text-danger">', '</div>');


		if($valid->run() == false) {
			$this->template->load('template_alumni', 'dashboard/password', $data);
        } else {
        	// echo "berhasil";
        	$id = $this->session->userdata('id');
        	$pass_lama = md5($this->input->post('password_lama'));
        	$password_baru = md5($this->input->post('password_baru'));
        	$password_baru2 = md5($this->input->post('password_baru2'));

		    $this->db->where('id', $this->session->userdata('id'));
		    $query = $this->db->get('tabel_alumni');

		    if($query->num_rows() > 0) {
		    	$row = $query->row();
		    	if($pass_lama == $row->password) {
		    		$this->db->set('password', $password_baru);
					$this->db->where('id', $id);
					$this->db->update('tabel_alumni');
	            	$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Password berhasil di ubah!</div>');
				redirect('password');
		    	} else {
		    		$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
					redirect('password');
		    	}
		    } else {
		    	$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Password gagal di ubah!</div>');
					redirect('password');
		    }

		}
	}

}