<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Grafik extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->model('m_grafik');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['thn'] = $this->m_grafik->grafikTahunLulus();
        $data['jns'] = $this->m_grafik->grafikJk();
        // $this->load->view('contoh', $data);
        $this->template->load('template', 'grafik/tampil', $data);
    }
}