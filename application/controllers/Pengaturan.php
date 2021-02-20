<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pengaturan');
        is_logged_in();
    }

    public function index()
    {
        $data['admin'] = $this->m_admin->getAdmin()->row();

        $valid = $this->form_validation;
        $valid->set_rules('email', 'Email', 'required');
        $valid->set_rules('nama', 'Nama', 'required');

        $valid->set_error_delimiters('<div class="text-danger">', '</div>');

        if($valid->run() == false) {
            $this->template->load('template', 'pengaturan/tampil', $data);
        } else {
            $this->m_pengaturan->editProfil();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('pengaturan');

            

        }
    }

    public function password()
    {
        $data['admin'] = $this->m_admin->getAdmin()->row();

        $valid = $this->form_validation;
        $valid->set_rules('pass_lama', 'Password Lama', 'required');
        $valid->set_rules('pass_baru', 'Password Baru', 'required|min_length[4]');
        $valid->set_rules('ulangi_pass', 'Password', 'required|matches[pass_baru]');

        $valid->set_error_delimiters('<div class="text-danger">', '</div>');

        if($valid->run() == false) {
            $this->template->load('template', 'pengaturan/password',$data);
        } else {
            $id = $this->input->post('id');
            $pass_lama = md5($this->input->post('pass_lama'));
            $pass_baru = md5($this->input->post('pass_lama'));
            $ulangi_pass = md5($this->input->post('ulangi_pass'));
            $cek = $this->m_pengaturan->checkPassword($pass_lama, $id);
            if($cek > 0 ) {
                $data = [
                    'password' => $pass_baru
                ];
                $this->m_pengaturan->gantiPass($data, $id);
                $this->session->set_flashdata('flash', 'Diubah');
			    redirect('pengaturan/password');
            } else {
                echo 'salah';
            }
        }

    }

}