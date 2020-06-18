<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$data['karyawan']	 	= $this->db->query("SELECT * FROM jabatan INNER JOIN karyawan ON jabatan.id_jabatan = karyawan.id_jabatan INNER JOIn bagian ON karyawan.id_bagian = bagian.id_bagian")->result();
			$this->load->view('pages/Admin/karyawan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$data['jabatan']		= $this->db->query("SELECT * FROM jabatan")->result();
			$data['bagian']			= $this->db->query("SELECT * FROM bagian")->result();
			$this->load->view('pages/Admin/karyawan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id         	        = $this->input->post('id');
		$nama                   = $this->input->post('nama');
		$jabatan                = $this->input->post('jabatan');
		$bagian                 = $this->input->post('bagian');
		$alamat          	    = $this->input->post('alamat');
		$lahir            	    = $this->input->post('lahir');
		$status                 = $this->input->post('status');
		$jumlah                 = $this->input->post('jumlah');
		$telp                   = $this->input->post('telp');
		$status_kerja           = $this->input->post('status_kerja');
		$masuk                  = $this->input->post('masuk');
		$email                  = $this->input->post('email');

		if ($status_kerja == NULL) {
			$status_kerja = 0;
		} else {
			$status_kerja = 1;
		}

		$data = array(
			'id_karyawan'				=> $id,
			'nama_karyawan'				=> $nama,
			'id_jabatan'				=> $jabatan,
			'id_bagian'					=> $bagian,
			'alamat'					=> $alamat,
			'tanggal_lahir'				=> $lahir,
			'status'					=> $status,
			'jumlah_keluarga'			=> $jumlah,
			'telp'						=> $telp,
			'status_kerja'				=> $status_kerja,
			'tanggal_masuk'				=> $masuk,
			'email'						=> $email
		);

		$this->db->insert('karyawan', $data);
		redirect('admin/karyawan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$where = array('id' => $id);
			$data['karyawan'] 		= $this->db->query("SELECT * FROM karyawan WHERE id='$id'")->result();
			$data['jabatan']        = $this->db->query("SELECT * FROM jabatan")->result();
			$data['bagian']         = $this->db->query("SELECT * FROM bagian")->result();
			$this->load->view('pages/Admin/karyawan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id         	        = $this->input->post('id');
		$id_k         	        = $this->input->post('id_k');
		$nama                   = $this->input->post('nama');
		$jabatan                = $this->input->post('jabatan');
		$bagian                 = $this->input->post('bagian');
		$alamat          	    = $this->input->post('alamat');
		$lahir            	    = $this->input->post('lahir');
		$status                 = $this->input->post('status');
		$jumlah                 = $this->input->post('jumlah');
		$telp                   = $this->input->post('telp');
		$status_kerja           = $this->input->post('status_kerja');
		$masuk                  = $this->input->post('masuk');
		$email                  = $this->input->post('email');

		if ($status_kerja == NULL) {
			$status_kerja = 0;
		} else {
			$status_kerja = 1;
		}

		$data = array(
			'id_karyawan'				=> $id_k,
			'nama_karyawan'				=> $nama,
			'id_jabatan'				=> $jabatan,
			'id_bagian'					=> $bagian,
			'alamat'					=> $alamat,
			'tanggal_lahir'				=> $lahir,
			'status'					=> $status,
			'jumlah_keluarga'			=> $jumlah,
			'telp'						=> $telp,
			'status_kerja'				=> $status_kerja,
			'tanggal_masuk'				=> $masuk,
			'email'						=> $email
		);

		$where = array('id' => $id);
		$this->db->update('karyawan', $data, $where);
		redirect('admin/karyawan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('karyawan', $where);
		redirect('admin/karyawan');
	}
}
