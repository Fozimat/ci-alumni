<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');

		is_logged();

	}

	public function index()
	{
		$this->template->load('template_alumni', 'dashboard/alumni');

	}

	// public function detail($nisn)
	// {
	// 	// $data['alumni'] = $this->m_dashboard->detailAlumni($nisn);
	// 	$this->template->load('template', 'detail');
	// }

	// public function edit($nisn)
	// {
	// 	$data['alumni'] = $this->m_dashboard->editAlumni($nisn);
	// 	$this->template->load('template', 'dashboard/edit', $data);
	// }



}