<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiController extends CI_Controller
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
				'title' => "Data Absensi"
			);
			$data['absensi']	 	= $this->db->query("SELECT * FROM absensi INNER JOIN karyawan ON absensi.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian ")->result();
			$this->load->view('pages/Admin/absensi/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Absensi"
			);
			$data['karyawan']			= $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/absensi/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$karyawan                   = $this->input->post('karyawan');
		$jam_hadir                  = $this->input->post('jam_hadir');
		$sakit	                    = $this->input->post('sakit');
		$izin           	        = $this->input->post('izin');
		$tidak_hadir                = $this->input->post('tidak_hadir');
		$result						= $this->db->query("SELECT * FROM setting_absensi WHERE id_setting_absensi = '1'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$jam_masuk		= $data['jam_masuk'];
			$hari_kerja		= $data['hari_kerja'];
			$potongan_telat	= $data['potongan_telat'];
			$potongan_alpa	= $data['tidak_hadir'];
			$potongan_sakit	= $data['sakit'];
			$potongan_izin	= $data['izin'];


			if ($jam_hadir > $jam_masuk) {
				$date1 = strtotime($jam_masuk);
				$date2 = strtotime($jam_hadir);
				$interval = $date2 - $date1;
				$seconds = $interval % 60;
				$minutes = floor(($interval % 3600) / 60);
				$hours = floor($interval / 3600);
				$terlambat = $minutes . " menit";
			} else {
				$terlambat = "0 menit";
			}

			$total	= $hari_kerja - $sakit - $izin - $tidak_hadir;

			$potongan_absen = ($tidak_hadir * $potongan_alpa) + ($sakit * $potongan_sakit) + ($izin * $potongan_izin) + ($minutes * $potongan_telat);
		}
		$data = array(
			'id_karyawan'					=> $karyawan,
			'jam_hadir'						=> $jam_hadir,
			'sakit'							=> $sakit,
			'izin'							=> $izin,
			'tidak_hadir'					=> $tidak_hadir,
			'terlambat'						=> $terlambat,
			'total'							=> $total,
			'potongan'						=> $potongan_absen
		);

		$this->db->insert('absensi', $data);
		redirect('admin/absensi');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Absensi"
			);
			$where = array('id_absensi' => $id);
			$data['absensi'] 			= $this->db->query("SELECT * FROM absensi WHERE id_absen='$id'")->result();
			$data['karyawan'] 	        = $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/absensi/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id							= $this->input->post('id');
		$karyawan                   = $this->input->post('karyawan');
		$jam_hadir                  = $this->input->post('jam_hadir');
		$sakit	                    = $this->input->post('sakit');
		$izin           	        = $this->input->post('izin');
		$tidak_hadir                = $this->input->post('tidak_hadir');
		$result						= $this->db->query("SELECT * FROM setting_absensi WHERE id_setting_absensi = '1'");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$jam_masuk		= $data['jam_masuk'];
			$hari_kerja		= $data['hari_kerja'];
			$potongan_telat	= $data['potongan_telat'];
			$potongan_alpa	= $data['tidak_hadir'];
			$potongan_sakit	= $data['sakit'];
			$potongan_izin	= $data['izin'];


			if ($jam_hadir > $jam_masuk) {
				$date1 = strtotime($jam_masuk);
				$date2 = strtotime($jam_hadir);
				$interval = $date2 - $date1;
				$seconds = $interval % 60;
				$minutes = floor(($interval % 3600) / 60);
				$hours = floor($interval / 3600);
				$terlambat = $minutes . " menit";
			} else {
				$terlambat = "0 menit";
			}

			$total	= $hari_kerja - $sakit - $izin - $tidak_hadir;

			$potongan_absen = ($tidak_hadir * $potongan_alpa) + ($sakit * $potongan_sakit) + ($izin * $potongan_izin) + ($minutes * $potongan_telat);
		}
		$data = array(
			'id_karyawan'					=> $karyawan,
			'jam_hadir'						=> $jam_hadir,
			'sakit'							=> $sakit,
			'izin'							=> $izin,
			'tidak_hadir'					=> $tidak_hadir,
			'terlambat'						=> $terlambat,
			'total'							=> $total,
			'potongan'						=> $potongan_absen
		);

		$where = array('id_absen' => $id);
		$this->db->update('absensi', $data, $where);
		redirect('admin/absensi');
	}

	public function delete($id)
	{
		$where = array('id_absen' => $id);
		$this->db->delete('absensi', $where);
		redirect('admin/absensi');
	}
}
