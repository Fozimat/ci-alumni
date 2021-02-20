<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('m_pesan');
        is_logged_in();
    }

    public function index()
    {
        $data['pesan'] = $this->m_pesan->tampilpesan();
        $this->template->load('template', 'pesan/tampil', $data);
    }

    public function aktif($id)
	{
		$this->m_pesan->aktif($id);
		redirect('pesan');
    }
    
    public function nonaktif($id)
	{
		$this->m_pesan->nonaktif($id);
		redirect('pesan');
	}

    public function hapus($id)
    {
        $this->m_pesan->hapusPesan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pesan');
    }
}