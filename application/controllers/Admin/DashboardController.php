<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Dashboard"
			);
			$data['bagian'] 	    = $this->db->query('SELECT * FROM bagian')->num_rows();
			$data['jabatan'] 		= $this->db->query('SELECT * FROM jabatan')->num_rows();
			$data['karyawan'] 		= $this->db->query('SELECT * FROM karyawan')->num_rows();
			$this->load->view('pages/Admin/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
