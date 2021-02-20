<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');

		is_logged();

	}

	public function index()
	{
		$data['alumni'] = $this->db->get_where('tabel_alumni', ['id' => $this->session->userdata('id')])->row();
		$data['jenis'] = ['Pria', 'Wanita'];

		$valid = $this->form_validation;

		$valid->set_rules('nisn', 'NISN', 'required|integer');
        $valid->set_rules('nama', 'Nama', 'required');
        $valid->set_rules('jk', 'Jenis Kelamin', 'required');
        $valid->set_rules('tahun_masuk', 'Tahun Masuk', 'required|integer');
        $valid->set_rules('tahun_lulus', 'Tahun Lulus', 'required|integer');
        $valid->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        // $valid->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        // $valid->set_rules('reg[tgl_lahir]', 'Date of birth', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		$valid->set_rules('email', 'Email', 'required|valid_email');
		$valid->set_rules('alamat', 'Alamat', 'required');
		$valid->set_rules('no_telp', 'No Handphone', 'required|integer');

		$valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('integer', '{field} harus angka');
		$valid->set_message('valid_email', '{field} tidak valid');
		$valid->set_message('is_unique', '{field} sudah pernah didaftarkan');

		$valid->set_error_delimiters('<div class="text-danger">', '</div>');

		if($valid->run() == false) {
			$this->template->load('template_alumni', 'dashboard/edit', $data);
		} else {
			$this->m_dashboard->editAlumni();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('detail');

		}
	}

}