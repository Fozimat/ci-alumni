<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengaturan extends CI_Model
{

    public function checkPassword($pass_lama, $id)
    {
        $this->db->where('id', $id);
        $this->db->where('password', $pass_lama);        
        $query = $this->db->get('tabel_admin');
        return $query->num_rows();
    }

    public function gantiPass($data, $id)
    {
        $this->db->where('password', $id);
        $this->db->update('admin', $data);
    }

    public function uploadGambar($id)
    {
        $config['upload_path']          = './upload/admin/';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
	    $config['file_name']            = $id;
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('foto')) {
	        return $this->upload->data("file_name");
	    }
	    
	    return "profile1.png";
    }

    public function editProfil()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');

        if($_FILES['foto']['name']!=""){
            $foto = $this->uploadGambar($id);
         }else{
           $foto = $this->input->post("gambar_lama");
         }


        $data = [
            'email' => $email,
            'nama' => $nama,
            'foto' => $foto
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tabel_admin', $data);
    }

}