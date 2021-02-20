<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Beranda extends CI_Model
{
    public function tambahAlumni($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function getAlumni()
    {
        $this->db->select('*');
        $this->db->from('tabel_alumni');
        $query = $this->db->get();
        return $query;
    }

    public function uploadGambar($username)
    {
        $config['upload_path']          = './upload/alumni/';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
	    $config['file_name']            = $username;
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('foto')) {
	        return $this->upload->data("file_name");
	    }
	    
	    return "default.jpg";
    }

    public function kirimPesan($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function proses_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tabel_alumni');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query;
    }
}