<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_alumni');
		$this->load->library('Pdf');

		is_logged_in();
	}

	public function index()
	{
		$data['row'] = $this->m_alumni->getAlumni();
		$this->template->load('template', 'alumni/tampil', $data);
	}

	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nisn', 'NISN', 'required|integer|is_unique[tabel_alumni.nisn]');
		$valid->set_rules('nama', 'Nama', 'required');
		$valid->set_rules('jk', 'Jenis Kelamin', 'required');
		$valid->set_rules('tahun_masuk', 'Tahun Masuk', 'required|integer');
		$valid->set_rules('tahun_lulus', 'Tahun Lulus', 'required|integer');
		$valid->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[tabel_alumni.email]');
		$valid->set_rules('alamat', 'Alamat', 'required');
		// $valid->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$valid->set_rules('no_telp', 'No Handphone', 'required|integer');

		$valid->set_rules('username', 'Username', 'required|is_unique[tabel_alumni.username]|min_length[4]');
		$valid->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[password2]',
			[
				'matches' => 'Password tidak sesuai',
				'min_length' => 'Password terlalu pendek'
			]
		);

		$valid->set_rules(
			'password2',
			'Password',
			'required|trim|matches[password1]',
			[
				'matches' => 'Password tidak sesuai',
				'min_length' => 'Password terlalu pendek'
			]
		);

		$valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('integer', '{field} harus angka');
		$valid->set_message('valid_email', '{field} tidak valid');
		$valid->set_message('is_unique', '{field} sudah pernah didaftarkan');

		$valid->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($valid->run() == false) {
			$this->template->load('template', 'alumni/tambah');
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
			// $pekerjaan = $this->input->post('pekerjaan');
			$no_telp = $this->input->post('no_telp');
			$password = md5($this->input->post('password1'));
			$username = $this->input->post('username');

			$foto = $this->m_alumni->uploadGambar($username);


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
				// 'pekerjaan' => $pekerjaan,
				'foto' => 	$foto,
				'username' => $username,
				'password' => $password,
				'tgl_daftar' => time(),
			];

			$this->m_alumni->tambahAlumni('tabel_alumni', $data);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('alumni');
		}
	}

	public function detail($nisn)
	{
		$data['alumni'] = $this->m_alumni->detailAlumni($nisn);
		$this->template->load('template', 'alumni/detail', $data);
	}

	public function edit($id)
	{
		$data['alumni'] = $this->m_alumni->detailALumni($id);
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
		// $valid->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$valid->set_rules('no_telp', 'No Handphone', 'required|integer');

		$valid->set_message('required', '{field} tidak boleh kosong');
		$valid->set_message('integer', '{field} harus angka');
		$valid->set_message('valid_email', '{field} tidak valid');
		$valid->set_message('is_unique', '{field} sudah pernah didaftarkan');

		$valid->set_rules('username', 'Username', 'required|min_length[4]');

		$valid->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($valid->run() == false) {
			$this->template->load('template', 'alumni/edit', $data);
		} else {
			$this->m_alumni->editAlumni();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('alumni');
		}
	}

	public function hapus($nisn)
	{
		$this->m_alumni->hapusAlumni($nisn);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('alumni');
	}


	function cetakAlumni()
	{
		global $title;
		$fpdf = new PDF('L');
		$title = 'SMP NEGERI 10 TANJUNGPINANG';
		$print = $this->db->get('tabel_alumni')->result();
		$total = $this->db->get('tabel_alumni')->num_rows();
		$fpdf->SetTitle($title);
		$fpdf->AliasNbPages();
		$fpdf->AddPage();
		$fpdf->SetFont('times', 'B', 14);
		$fpdf->Cell(277, 10, 'LAPORAN DATA ALUMNI', 0, 1, 'C');
		$fpdf->SetFont('times', 'B', 11);
		$fpdf->Ln(5);
		$fpdf->Cell(8, 7, 'No', 1, 0, 'C');
		$fpdf->Cell(50, 7, 'Nama', 1, 0, 'C');
		$fpdf->Cell(25, 7, 'Tahun masuk', 1, 0, 'C');
		$fpdf->Cell(25, 7, 'Tahun lulus', 1, 0, 'C');
		$fpdf->Cell(30, 7, 'No Telp', 1, 0, 'C');
		$fpdf->Cell(50, 7, 'Alamat', 1, 0, 'C');
		$fpdf->Cell(50, 7, 'Email', 1, 0, 'C');
		$fpdf->Cell(40, 7, 'Tanggal Daftar', 1, 1, 'C');
		$no = 1;
		foreach ($print as $data) {
			$fpdf->SetFont('times', '', 11);
			$fpdf->Cell(8, 7, $no, 1, 0, 'C');
			$fpdf->Cell(50, 7, $data->nama, 1, 0);
			$fpdf->Cell(25, 7, $data->tahun_masuk, 1, 0, 'C');
			$fpdf->Cell(25, 7, $data->tahun_lulus, 1, 0, 'C');
			$fpdf->Cell(30, 7, $data->no_telp, 1, 0);
			$fpdf->Cell(50, 7, $data->alamat, 1, 0);
			$fpdf->Cell(50, 7, $data->email, 1, 0);
			$fpdf->Cell(40, 7, date('d-m-Y, H:i', $data->tgl_daftar), 1, 1, 'C');
			$no++;
		}
		$fpdf->Ln(5);
		$fpdf->Cell(277, 10, 'Tanjungpinang, . . . . . . . . . . . . 2020', 0, 1, 'R');
		$fpdf->Ln(10);
		$fpdf->Cell(498, 10, '(Kepala Sekolah)', 0, 1, 'C');
		$fpdf->Output();
	}

	function cetakAlumniSatu($nisn)
	{
		global $title;
		$fpdf = new PDF('L');
		$title = 'SMP NEGERI 10 TANJUNGPINANG';
		$print = $this->m_alumni->cetakperNISN($nisn);
		$fpdf->SetTitle($title);
		$fpdf->AliasNbPages();
		$fpdf->AddPage();
		$fpdf->SetFont('times', 'B', 14);
		$fpdf->SetFont('times', 'B', 11);
		$fpdf->Ln(5);




		foreach ($print->result() as $data) {

			$fpdf->SetFont('times', '', 14);

			$fpdf->Cell(60, 10, 'Nama ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->nama, 0, 1);

			$fpdf->Cell(60, 10, 'NISN ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->nisn, 0, 1);

			$fpdf->Cell(60, 10, 'Jenis Kelamin ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->jk, 0, 1);

			$fpdf->Cell(60, 10, 'Tahun Masuk ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->tahun_masuk, 0, 1);

			$fpdf->Cell(60, 10, 'Tahun Lulus ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->tahun_lulus, 0, 1);

			$fpdf->Cell(60, 10, 'Tanggal Lahir ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->tgl_lahir, 0, 1);

			$fpdf->Cell(60, 10, 'Tempat Lahir ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->tempat_lahir, 0, 1);

			$fpdf->Cell(60, 10, 'Alamat ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->alamat, 0, 1);

			$fpdf->Cell(60, 10, 'No Handphone ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->no_telp, 0, 1);

			$fpdf->Cell(60, 10, 'Email ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, $data->email, 0, 1);

			$fpdf->Cell(60, 10, 'Tanggal Daftar ', 0, 0, 'L');
			$fpdf->Cell(20, 10, ' : ', 0, 0, 'L');
			$fpdf->Cell(60, 10, date('m-m-Y, H:i', $data->tgl_daftar), 0, 0);

			$fpdf->Cell(40, 7, $fpdf->Image(base_url('upload/alumni/' . $data->foto), 170, 60, 60, 0), 0, 0);


			$fpdf->Ln(10);
		}
		$fpdf->Ln(-10);
		$fpdf->Cell(230, 10, 'Tanjungpinang, . . . . . . . . . . . . 2020', 0, 1, 'R');
		$fpdf->Ln(15);
		$fpdf->Cell(385, 10, '(Kepala Sekolah)', 0, 1, 'C');
		$fpdf->Output();
	}
}
