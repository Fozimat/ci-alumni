<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function getAdmin()
    {
        return $this->db->get('tabel_admin');
    }

}