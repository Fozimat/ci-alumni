<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->library('Pdf');

        is_logged_in();
    }

    public function index()
    {
        $data['laporan'] = $this->m_laporan->tampillaporan();
        $this->template->load('template', 'laporan/tampil', $data);
    }

    public function cetakTahun()
    {
        $tahun = $this->m_laporan->cariTahun();
        // var_dump($tahun);
        global $title;
        $fpdf = new PDF('L');
        $title = 'SMP NEGERI 10 TANJUNGPINANG';
        // $print = $this->db->get('tabel_alumni')->result();
        // $total = $this->db->get('tabel_alumni')->num_rows();
        $fpdf->SetTitle($title);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->SetFont('times', 'B', 14);
        // $fpdf->Cell(277,10,'Alumni Terdaftar : '.$total. ' Orang',0,1,'C');
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
        foreach ($tahun as $data) {
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
}
