<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('m_beranda');
        $this->load->model('m_alumni');
        $this->load->model('m_grafik');
    }

    public function index()
    {
        $data['row'] = $this->m_beranda->getAlumni();
        $data['thn'] = $this->m_grafik->grafikTahunLulus();
        $data['jns'] = $this->m_grafik->grafikJk();

        $this->load->view('beranda/tampil', $data);
        // $cek = $this->db->get('tabel_alumni')->result();
        // var_dump($cek[0]->nama);
        // die();
    }

    public function daftar()
    {
        $valid = $this->form_validation;

		$valid->set_rules('nisn', 'NISN', 'required|integer|is_unique[tabel_alumni.nisn]');
        $valid->set_rules('nama', 'Nama', 'required');
        $valid->set_rules('jk', 'Jenis Kelamin', 'required');
        $valid->set_rules('tahun_masuk', 'Tahun Masuk', 'required|integer');
        $valid->set_rules('tahun_lulus', 'Tahun Lulus', 'required|integer');
        $valid->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        // $valid->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        // $valid->set_rules('reg[tgl_lahir]', 'Date of birth', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[tabel_alumni.email]');
		$valid->set_rules('alamat', 'Alamat', 'required');
        $valid->set_rules('username', 'Username', 'required|is_unique[tabel_alumni.username]|min_length[4]');
        $valid->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', 
            [
                'matches' => 'Password tidak sesuai',
                'min_length' => 'Password terlalu pendek'
            ]);

        $valid->set_rules('password2', 'Password', 'required|trim|matches[password1]',
            [
                'matches' => 'Password tidak sesuai',
                'min_length' => 'Password terlalu pendek'
            ]);

		$valid->set_rules('no_telp', 'No Handphone', 'required|integer');

		$valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('integer', '{field} harus angka');
		$valid->set_message('valid_email', '{field} tidak valid');
		$valid->set_message('is_unique', '{field} sudah pernah didaftarkan');

		$valid->set_error_delimiters('<div class="text-danger">', '</div>');

		if($valid->run() == false) {
			$this->load->view('beranda/daftar');
		} else {
			$nisn = $this->input->post('nisn');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $tahun_masuk = $this->input->post('tahun_masuk');
            $tahun_lulus = $this->input->post('tahun_lulus');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$password = md5($this->input->post('password1'));
            $no_telp = $this->input->post('no_telp');
            $username = $this->input->post('username');

            $foto = $this->m_beranda->uploadGambar($username);


			$data = [
				'nisn' => $nisn,
                'nama' => $nama,
                'jk' => $jk,
                'tahun_masuk' => $tahun_masuk,
                'tahun_lulus' => $tahun_lulus,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
				'email' => $email,
				'alamat' => $alamat,
				'no_telp' => $no_telp,
                'password' => $password,
                'foto' => 	$foto,
                'tgl_daftar' => time(),
                'username' => $username
			];

			$this->m_beranda->tambahAlumni('tabel_alumni', $data);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('beranda');

		}
    }

    public function pesan()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('pesan', 'Pesan', 'required');

        $valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('valid_email', '{field} tidak valid');

        if($valid->run() == false) {
            $data['row'] = $this->m_beranda->getAlumni();
            $data['loker'] = $this->m_beranda->tampilLoker();
            $data['event'] = $this->m_beranda->tampilKegiatan();
            
            $this->load->view('beranda/tampil', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $pesan = $this->input->post('pesan');

            $data = [
                'nama' => $nama,
                'email' => $email,
                'pesan' => $pesan,
                'jam' => date('Y-m-d H:i:s') ,
                'status' => 0
            ];

            $this->m_beranda->kirimPesan('tabel_pesan', $data);
            $this->session->set_flashdata('flash', 'Dikirimkan');
			redirect('beranda#footer-page');

        }
    }

    

}