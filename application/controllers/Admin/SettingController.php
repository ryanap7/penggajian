<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingController extends CI_Controller
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
				'title' => "Pengaturan Jenis JKK"
			);
			$data['jkk']         = $this->db->query("SELECT * FROM setting_jenis_jkk")->result();
			$this->load->view('pages/Admin/setting/jkk/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Pengaturan Jenis JKK"
			);
			$this->load->view('pages/Admin/setting/jkk/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$nama                       = $this->input->post('nama');
		$prensetase                 = $this->input->post('presentase');

		$data = array(
			'nama_jkk'           	=> $nama,
			'rate'					=> $prensetase
		);
		$this->db->insert('setting_jenis_jkk', $data);
		redirect('admin/setting');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Pengaturan Jenis JKK"
			);
			$where = array('id_jkk' => $id);
			$data['jkk']         = $this->db->query("SELECT * FROM setting_jenis_jkk WHERE id_jkk = $id")->result();
			$this->load->view('pages/Admin/setting/jkk/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id                         = $this->input->post('id');
		$nama                       = $this->input->post('nama');
		$prensetase                 = $this->input->post('presentase');

		$data = array(
			'nama_jkk'           	=> $nama,
			'rate'					=> $prensetase
		);

		$where = array('id_jkk' => $id);
		$this->db->update('setting_jenis_jkk', $data, $where);
		redirect('admin/setting');
	}

	public function delete($id)
	{
		$where = array('id_jkk' => $id);
		$this->db->delete('setting_jenis_jkk', $where);
		redirect('admin/setting');
	}

	public function absensi()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Pengaturan Absensi"
			);
			$data['absensi'] 		= $this->db->query("SELECT * FROM setting_absensi WHERE id_setting_absensi='1'")->result();
			$this->load->view('pages/Admin/setting/absensi/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function ketenagakerjaan()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Pengaturan Komponen Ketenagakerjaan"
			);
			$data['ketenagakerjaan'] 		= $this->db->query("SELECT * FROM setting_ketenagakerjaan WHERE id_ketenagakerjaan='1'")->result();
			$this->load->view('pages/Admin/setting/ketenagakerjaan/index.php', $data);
		} else {
			redirect('/');
		}
	}
	public function kesehatan()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Pengaturan Komponen Kesehatan"
			);
			$data['kesehatan'] 		= $this->db->query("SELECT * FROM setting_kesehatan WHERE id_kesehatan='1'")->result();
			$this->load->view('pages/Admin/setting/kesehatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function absensi_update()
	{
		$id         	        	= $this->input->post('id');
		$jam_masuk                  = $this->input->post('jam_masuk');
		$hari_kerja                	= $this->input->post('hari_kerja');
		$potongan                 	= $this->input->post('potongan');
		$jam_kerja          	    = $this->input->post('jam_kerja');
		$tidak_hadir                = $this->input->post('tidak_hadir');
		$izin                 		= $this->input->post('izin');
		$sakit                 		= $this->input->post('sakit');

		$data = array(
			'jam_masuk'				=> $jam_masuk,
			'hari_kerja'			=> $hari_kerja,
			'potongan_telat'		=> $potongan,
			'jam_kerja'				=> $jam_kerja,
			'tidak_hadir'			=> $tidak_hadir,
			'izin'					=> $izin,
			'sakit'					=> $sakit
		);

		$where = array('id_setting_absensi' => $id);
		$this->db->update('setting_absensi', $data, $where);
		redirect('admin/setting/absensi');
	}
	public function kesehatan_update()
	{
		$id         	        	= $this->input->post('id');
		$bpjs_perusahaan            = $this->input->post('bpjs_perusahaan');
		$bpjs_karyawan              = $this->input->post('bpjs_karyawan');

		$data = array(
			'bpjs_perusahaan'		=> $bpjs_perusahaan,
			'bpjs_karyawan'			=> $bpjs_karyawan
		);

		$where = array('id_kesehatan' => $id);
		$this->db->update('setting_kesehatan', $data, $where);
		redirect('admin/setting/kesehatan');
	}

	public function ketenagakerjaan_update()
	{
		$id         	        	= $this->input->post('id');
		$jht_perusahaan             = $this->input->post('jht_perusahaan');
		$jht_karyawan              	= $this->input->post('jht_karyawan');
		$jkm                 		= $this->input->post('jkm');
		$jp_perusahaan         	    = $this->input->post('jp_perusahaan');
		$jp_karyawan                = $this->input->post('jp_karyawan');

		$data = array(
			'jht_perusahaan'		=> $jht_perusahaan,
			'jht_karyawan'			=> $jht_karyawan,
			'jkm'					=> $jkm,
			'jp_perusahaan'			=> $jp_perusahaan,
			'jp_karyawan'			=> $jp_karyawan
		);

		$where = array('id_ketenagakerjaan' => $id);
		$this->db->update('setting_ketenagakerjaan', $data, $where);
		redirect('admin/setting/ketenagakerjaan');
	}
}
