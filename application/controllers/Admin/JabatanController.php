<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanController extends CI_Controller
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
				'title' => "Data Jabatan"
			);
			$data['jabatan']	 	= $this->db->query("SELECT * FROM jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian")->result();
			$this->load->view('pages/Admin/jabatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Jabatan"
			);
			$data['bagian']			= $this->db->query("SELECT * FROM bagian")->result();
			$this->load->view('pages/Admin/jabatan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$nama                   = $this->input->post('nama');
		$bagian                 = $this->input->post('bagian');
		$gaji_pokok             = $this->input->post('gaji_pokok');
		$uang_makan             = $this->input->post('uang_makan');
		$ip1                    = $this->input->post('ip1');
		$ip2                    = $this->input->post('ip2');
		$thr                    = $this->input->post('thr');
		$ipk                    = $this->input->post('ipk');
		$lain                   = $this->input->post('lain');
		$gaji_kotor				= $gaji_pokok + $uang_makan + $ip1 + $ip2 + $thr + $ipk + $lain;

		$data = array(
			'nama_jabatan'					=> $nama,
			'id_bagian'						=> $bagian,
			'gaji_pokok'					=> $gaji_pokok,
			'uang_makan'					=> $uang_makan,
			'insentif_penjualan'			=> $ip1,
			'insentif_pengiriman'			=> $ip2,
			'thr'							=> $thr,
			'insentif_produktivitas_kerja'	=> $ipk,
			'lain_lain'						=> $lain,
			'gaji_kotor'					=> $gaji_kotor,
		);

		$this->db->insert('jabatan', $data);
		redirect('admin/jabatan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Jabatan"
			);
			$where = array('id_jabatan' => $id);
			$data['jabatan'] 		= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id'")->result();
			$data['bagian']         = $this->db->query("SELECT * FROM bagian")->result();
			$this->load->view('pages/Admin/jabatan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$nama                   = $this->input->post('nama');
		$bagian                 = $this->input->post('bagian');
		$gaji_pokok             = $this->input->post('gaji_pokok');
		$uang_makan             = $this->input->post('uang_makan');
		$ip1                    = $this->input->post('ip1');
		$ip2                    = $this->input->post('ip2');
		$thr                    = $this->input->post('thr');
		$ipk                    = $this->input->post('ipk');
		$lain                   = $this->input->post('lain');
		$gaji_kotor				= $gaji_pokok + $uang_makan + $ip1 + $ip2 + $thr + $ipk + $lain;

		$data = array(
			'nama_jabatan'					=> $nama,
			'id_bagian'						=> $bagian,
			'gaji_pokok'					=> $gaji_pokok,
			'uang_makan'					=> $uang_makan,
			'insentif_penjualan'			=> $ip1,
			'insentif_pengiriman'			=> $ip2,
			'thr'							=> $thr,
			'insentif_produktivitas_kerja'	=> $ipk,
			'lain_lain'						=> $lain,
			'gaji_kotor'					=> $gaji_kotor,
		);
		$where = array('id_jabatan' => $id);
		$this->db->update('jabatan', $data, $where);
		redirect('admin/jabatan');
	}

	public function delete($id)
	{
		$where = array('id_jabatan' => $id);
		$this->db->delete('jabatan', $where);
		redirect('admin/jabatan');
	}
}
