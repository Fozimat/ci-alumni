<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
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

    public function editAlumni()
    {
        $id = $this->input->post('id');
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $tahun_lulus = $this->input->post('tahun_lulus');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $username = $this->input->post('username');


        
        if($_FILES['foto']['name']!=""){
            $foto = $this->uploadGambar($username);
         }else{
           $foto = $this->input->post("gambar_lama");
         }

        $data = [
            'id' => $id,
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
            'tgl_daftar' => $tgl_daftar,
            'foto' => $foto
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tabel_alumni', $data);
    }

    public function checkPassword($id, $pass_lama)
    {
        $this->db->where('id', $id);
        $this->db->where('password', $pass_lama);        
        $query = $this->db->get('tabel_admin');
        return $query->num_rows();
    }

}