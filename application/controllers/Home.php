<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_alumni');
		$this->load->model('m_grafik');

		is_logged_in();
	}

 	public function index()
	{

		$hitung = $this->m_alumni->getTotal('tabel_alumni');
		$pesan = $this->m_alumni->getTotal('tabel_pesan');
		$unpesan = $this->m_alumni->getTotal('tabel_pesan', 'status = 0');


		$admin = $this->m_alumni->getTotal('tabel_admin');

		$data = [
			'hitung' => $hitung,
			'admin' => $admin,
			'pesan' => $pesan,
			'unpesan' => $unpesan,
			'thn' => $this->m_grafik->grafikTahunLulus(),
        	'jns' => $this->m_grafik->grafikJk()
		];

		$this->template->load('template', 'dashboard', $data);
	}

}
