<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BPJSController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');
		}
	}

	public function ketenagakerjaan_index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$data['bpjs']	 	= $this->db->query("SELECT * FROM bpjs_ketenagakerjaan INNER JOIN karyawan ON bpjs_ketenagakerjaan.id_karyawan = karyawan.id")->result();
			$this->load->view('pages/Admin/bpjs/ketenagakerjaan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function ketenagakerjaan_create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$data['karyawan']		= $this->db->query("SELECT * FROM karyawan")->result();
			$data['jkk']			= $this->db->query("SELECT * FROM setting_jenis_jkk")->result();
			$this->load->view('pages/Admin/bpjs/ketenagakerjaan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function ketenagakerjaan_store()
	{
		$karyawan                   = $this->input->post('karyawan');
		$jkk 	                    = $this->input->post('jkk');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = '$karyawan'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];

			$result1		= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}
		}
		$result2		= $this->db->query("SELECT * FROM setting_ketenagakerjaan");

		if ($result2->num_rows() > 0) {
			$data			= $result2->row_array();
			$jht_perusahaan	= $data['jht_perusahaan'];
			$jht_karyawan	= $data['jht_karyawan'];
			$jkm			= $data['jkm'];
			$jp_perusahaan	= $data['jp_perusahaan'];
			$jp_karyawan	= $data['jp_karyawan'];

			$x				= $gaji_kotor * ($jht_perusahaan / 100);
			$y				= $gaji_kotor * ($jht_karyawan / 100);
			$a				= $gaji_kotor * ($jkm / 100);
			$b				= $gaji_kotor * ($jp_perusahaan / 100);
			$c				= $gaji_kotor * ($jp_karyawan / 100);
		}

		$result3			= $this->db->query("SELECT * FROM setting_jenis_jkk WHERE nama_jkk = '$jkk'");

		if ($result3->num_rows() > 0) {
			$data			= $result3->row_array();
			$rate			= $data['rate'];

			$z				= $gaji_kotor * ($rate / 100);
		}

		$total = $x + $y + $z + $a + $b + $b + $c;

		$data = array(
			'id_karyawan'				=> $karyawan,
			'perhitungan_dasar'			=> $gaji_kotor,
			'jht_perusahaan'			=> $x,
			'jht_karyawan'				=> $y,
			'jenis_jkk'					=> $jkk,
			'jkk'						=> $z,
			'jkm'						=> $a,
			'jp_perusahaan'				=> $b,
			'jp_karyawan'				=> $c,
			'total'						=> $total
		);

		$this->db->insert('bpjs_ketenagakerjaan', $data);
		redirect('admin/bpjs/ketenagakerjaan');
	}

	public function ketenagakerjaan_edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$where = array('id' => $id);
			$data['bpjs'] 			= $this->db->query("SELECT * FROM bpjs_ketenagakerjaan WHERE id_bpjs='$id'")->result();
			$data['karyawan']		= $this->db->query("SELECT * FROM karyawan")->result();
			$data['jkk']			= $this->db->query("SELECT * FROM setting_jenis_jkk")->result();
			$this->load->view('pages/Admin/bpjs/ketenagakerjaan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function ketenagakerjaan_update()
	{
		$id							= $this->input->post('id');
		$karyawan                   = $this->input->post('karyawan');
		$jkk 	                    = $this->input->post('jkk');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = '$karyawan'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];

			$result1		= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}
		}
		$result2		= $this->db->query("SELECT * FROM setting_ketenagakerjaan");

		if ($result2->num_rows() > 0) {
			$data			= $result2->row_array();
			$jht_perusahaan	= $data['jht_perusahaan'];
			$jht_karyawan	= $data['jht_karyawan'];
			$jkm			= $data['jkm'];
			$jp_perusahaan	= $data['jp_perusahaan'];
			$jp_karyawan	= $data['jp_karyawan'];

			$x				= $gaji_kotor * ($jht_perusahaan / 100);
			$y				= $gaji_kotor * ($jht_karyawan / 100);
			$a				= $gaji_kotor * ($jkm / 100);
			$b				= $gaji_kotor * ($jp_perusahaan / 100);
			$c				= $gaji_kotor * ($jp_karyawan / 100);
		}

		$result3			= $this->db->query("SELECT * FROM setting_jenis_jkk WHERE nama_jkk = '$jkk'");

		if ($result3->num_rows() > 0) {
			$data			= $result3->row_array();
			$rate			= $data['rate'];

			$z				= $gaji_kotor * ($rate / 100);
		}

		$total = $x + $y + $z + $a + $b + $b + $c;

		$data = array(
			'id_karyawan'				=> $karyawan,
			'perhitungan_dasar'			=> $gaji_kotor,
			'jht_perusahaan'			=> $x,
			'jht_karyawan'				=> $y,
			'jenis_jkk'					=> $jkk,
			'jkk'						=> $z,
			'jkm'						=> $a,
			'jp_perusahaan'				=> $b,
			'jp_karyawan'				=> $c,
			'total'						=> $total
		);

		$where = array('id_bpjs' => $id);
		$this->db->update('bpjs_ketenagakerjaan', $data);
		redirect('admin/bpjs/ketenagakerjaan');
	}

	public function ketenagakerjaan_delete($id)
	{
		$where = array('id_bpjs' => $id);
		$this->db->delete('bpjs_ketenagakerjaan', $where);
		redirect('admin/bpjs/ketenagakerjaan');
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$data['bpjs']	 	= $this->db->query("SELECT * FROM bpjs_kesehatan INNER JOIN karyawan ON bpjs_kesehatan.id_karyawan = karyawan.id")->result();
			$this->load->view('pages/Admin/bpjs/kesehatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$data['karyawan']		= $this->db->query("SELECT * FROM karyawan")->result();
			$data['jkk']			= $this->db->query("SELECT * FROM setting_jenis_jkk")->result();
			$this->load->view('pages/Admin/bpjs/kesehatan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$karyawan                   = $this->input->post('karyawan');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = '$karyawan'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];
			$jumlah			= $data['jumlah_keluarga'];

			$result1		= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}
		}
		$result2		= $this->db->query("SELECT * FROM setting_kesehatan");

		if ($result2->num_rows() > 0) {
			$data				= $result2->row_array();
			$bpjs_perusahaan	= $data['bpjs_perusahaan'];
			$bpjs_karyawan	= $data['bpjs_karyawan'];

			$x				= $gaji_kotor * ($bpjs_perusahaan / 100);
			$y				= $gaji_kotor * (($bpjs_karyawan * $jumlah) / 100);
		}

		$total = $x + $y;

		$data = array(
			'id_karyawan'				=> $karyawan,
			'perhitungan_dasar'			=> $gaji_kotor,
			'bpjs_perusahaan'			=> $x,
			'bpjs_karyawan'				=> $y,
			'total'						=> $total
		);

		$this->db->insert('bpjs_kesehatan', $data);
		redirect('admin/bpjs');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data BPJS"
			);
			$where = array('id' => $id);
			$data['bpjs'] 			= $this->db->query("SELECT * FROM bpjs_kesehatan WHERE id_kesehatan='$id'")->result();
			$data['karyawan']		= $this->db->query("SELECT * FROM karyawan")->result();
			$data['jkk']			= $this->db->query("SELECT * FROM setting_jenis_jkk")->result();
			$this->load->view('pages/Admin/bpjs/kesehatan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id							= $this->input->post('id');
		$karyawan                   = $this->input->post('karyawan');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = '$karyawan'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];
			$jumlah			= $data['jumlah_keluarga'];

			$result1		= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}
		}
		$result2		= $this->db->query("SELECT * FROM setting_kesehatan");

		if ($result2->num_rows() > 0) {
			$data				= $result2->row_array();
			$bpjs_perusahaan	= $data['bpjs_perusahaan'];
			$bpjs_karyawan	= $data['bpjs_karyawan'];

			$x				= $gaji_kotor * ($bpjs_perusahaan / 100);
			$y				= $gaji_kotor * (($bpjs_karyawan * $jumlah) / 100);
		}

		$total = $x + $y;

		$data = array(
			'id_karyawan'				=> $karyawan,
			'perhitungan_dasar'			=> $gaji_kotor,
			'bpjs_perusahaan'			=> $x,
			'bpjs_karyawan'				=> $y,
			'total'						=> $total
		);
		$where = array('id_kesehatan' => $id);
		$this->db->update('bpjs_kesehatan', $data);
		redirect('admin/bpjs');
	}

	public function delete($id)
	{
		$where = array('id_kesehatan' => $id);
		$this->db->delete('bpjs_kesehatan', $where);
		redirect('admin/bpjs');
	}
}
