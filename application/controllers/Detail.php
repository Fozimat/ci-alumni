<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_dashboard');
		is_logged();

	}

	public function index()
	{
		$data['alumni'] = $this->db->get_where('tabel_alumni', ['id' => $this->session->userdata('id')])->row();
		$this->template->load('template_alumni', 'dashboard/detail', $data);

	}

}