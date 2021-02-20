<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function tampilLaporan()
    {
        
    }

    public function cariTahun()
    {
        $tahun = $this->input->post('tahun', true);
        $this->db->like('tahun_lulus', $tahun);
        return $this->db->get('tabel_alumni')->result();
    }
}