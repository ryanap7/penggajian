<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

	public function check_admin($email, $password)
	{
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		$query = $this->db->get();

		return $query;
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}
}
