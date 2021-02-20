<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Grafik extends CI_Model
{
    public function grafikTahunLulus()
	{
		$this->db->group_by('tahun_lulus');
        $this->db->select('tahun_lulus');
        $this->db->select("count(*) as total");
        return $this->db->from('tabel_alumni')
          ->get()
          ->result();
        //   SELECT tahun_lulus,COUNT(*) as 'total' FROM tabel_alumni GROUP BY tahun_lulus
    }
    
    public function grafikJk()
	{
		$this->db->group_by('jk');
        $this->db->select('jk');
        $this->db->select("count(*) as total");
        return $this->db->from('tabel_alumni')
          ->get()
          ->result();
	}
}