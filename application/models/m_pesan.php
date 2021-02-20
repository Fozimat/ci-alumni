<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model
{
    public function tampilpesan()
    {
        return $this->db->get('tabel_pesan');
    }

    public function aktif($id)
	{
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		return $this->db->update('tabel_pesan');
		// return $this->db->query("UPDATE user SET is_active = 1 WHERE id = '$id'");
    }
    
    public function nonaktif($id)
	{
        $this->db->set('status', 0);
		$this->db->where('id', $id);
		return $this->db->update('tabel_pesan');
	}

	public function hapusPesan($id)
    {
        $this->db->query("DELETE FROM tabel_pesan WHERE id = '$id'");
    }
}