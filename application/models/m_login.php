<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{
	public function proses_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tabel_admin');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query;
	}

	// public function get($id = null)
	// {
	// 	$this->db->from('user');
	// 	if($id != null) {
	// 		$this->db->where('id', $id);
	// 	}
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// public function getMember()
	// {
	// 	$query = $this->db->query('SELECT * FROM user WHERE role_id = 2');
	// 	return $query;
	// }

	// public function deleteUser($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('user');
	// }

	// public function activate($id)
	// {
	// 	$this->db->set('is_active', 1);
	// 	$this->db->where('id', $id);
	// 	return $this->db->update('user');
	// 	// return $this->db->query("UPDATE user SET is_active = 1 WHERE id = '$id'");
	// } 

	// public function deactivate($id)
	// {
	// 	return $this->db->query("UPDATE user SET is_active = 0 WHERE id = '$id'");
	// }

}