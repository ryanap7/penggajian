<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeminjamanController extends CI_Controller
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
				'title' => "Data Peminjaman"
			);
			$data['peminjaman']	 	= $this->db->query("SELECT *, peminjaman.status as lunas FROM peminjaman INNER JOIN karyawan ON peminjaman.id_karyawan = karyawan.id")->result();
			$this->load->view('pages/Admin/peminjaman/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Peminjaman"
			);
			$data['karyawan']			= $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/peminjaman/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$karyawan               = $this->input->post('karyawan');
		$besar_pinjaman         = $this->input->post('besar_pinjaman');
		$ket            		= $this->input->post('ket');
		$tgl          		    = $this->input->post('tgl');

		$data = array(
			'id_karyawan'					=> $karyawan,
			'besar_pinjaman'				=> $besar_pinjaman,
			'keterangan'					=> $ket,
			'tanggal_pinjam'				=> $tgl,
			'status'						=> 0
		);

		$this->db->insert('peminjaman', $data);
		redirect('admin/peminjaman');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Peminjaman"
			);
			$where = array('id_peminjaman' => $id);
			$data['peminjaman'] 		= $this->db->query("SELECT * FROM peminjaman WHERE id_peminjaman='$id'")->result();
			$data['karyawan'] 	        = $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/peminjaman/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$karyawan               = $this->input->post('karyawan');
		$besar_pinjaman         = $this->input->post('besar_pinjaman');
		$ket             		= $this->input->post('ket');
		$tgl         		    = $this->input->post('tgl');

		$data = array(
			'id_karyawan'					=> $karyawan,
			'besar_pinjaman'				=> $besar_pinjaman,
			'keterangan'					=> $ket,
			'tanggal_pinjam'				=> $tgl,
			'status'						=> 0
		);
		$where = array('id_peminjaman' => $id);
		$this->db->update('peminjaman', $data, $where);
		redirect('admin/peminjaman');
	}

	public function delete($id)
	{
		$where = array('id_peminjaman' => $id);
		$this->db->delete('peminjaman', $where);
		redirect('admin/peminjaman');
	}

	public function change($id)
	{
		$lunas 		= date('Y-m-d');

		$data = array(
			'tanggal_lunas'					=> $lunas,
			'status'						=> 1
		);
		$where = array('id_peminjaman' => $id);
		$this->db->update('peminjaman', $data, $where);
		redirect('admin/peminjaman');
	}
}
