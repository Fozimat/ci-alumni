<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Alumni extends CI_Model
{

    public function getAlumni()
    {
        $this->db->select('*');
        $this->db->from('tabel_alumni');
        $query = $this->db->get();
        return $query;
    }

    public function getTotal($table, $where = null)
    {
        $query = $this->db->get_where($table, $where)->num_rows();
        return $query;
    }

    public function detailAlumni($id)
    {
        $query = $this->db->query("SELECT * FROM tabel_alumni WHERE id = '$id'")->row();
        return $query;
    }

    public function cetakSemua()
    {
        $query = $this->db->query('SELECT * FROM tabel_alumni');
        return $query;
    }

    public function cetakperNISN($id)
    {
        $query = $this->db->query("SELECT * FROM tabel_alumni WHERE id = '$id'");
        return $query;
    }

    public function uploadGambar($username)
    {
        $config['upload_path']          = './upload/alumni/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $username;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function hapusGambar($id)
    {
        $hapus = $this->detailAlumni($id);
        if ($hapus->foto != "default.jpg") {
            $filename = explode(".", $hapus->foto)[0];
            return array_map('unlink', glob(FCPATH . "upload/alumni/$filename.*"));
        }
    }

    public function hapusAlumni($id)
    {
        $this->hapusGambar($id);
        $this->db->query("DELETE FROM tabel_alumni WHERE id = '$id'");
    }

    public function tambahAlumni($table, $data)
    {
        return $this->db->insert($table, $data);
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
        // $pekerjaan = $this->input->post('pekerjaan');
        $no_telp = $this->input->post('no_telp');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $username = $this->input->post('username');

        if ($_FILES['foto']['name'] != "") {
            $foto = $this->uploadGambar($username);
        } else {
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
            // 'pekerjaan' => $pekerjaan,
            'tgl_daftar' => $tgl_daftar,
            'username' => $username,
            'foto' => $foto
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tabel_alumni', $data);
    }

    //    public function aktif($nisn)
    // {
    // 	$this->db->set('status', 1);
    // 	$this->db->where('nisn', $nisn);
    // 	return $this->db->update('tabel_alumni');
    // 	// return $this->db->query("UPDATE user SET is_active = 1 WHERE nisn = '$nisn'");
    // } 

    // public function nonaktif($nisn)
    // {
    //        $this->db->set('status', 0);
    // 	$this->db->where('nisn', $nisn);
    // 	return $this->db->update('tabel_alumni');
    // }







}
