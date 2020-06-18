<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggajianController extends CI_Controller
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
				'title' => "Data Penggajian"
			);
			$data['penggajian']	 	= $this->db->query("SELECT * FROM penggajian INNER JOIN karyawan ON penggajian.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian")->result();
			$this->load->view('pages/Admin/penggajian/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Penggajian"
			);
			$data['karyawan']			= $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/penggajian/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$karyawan                   = $this->input->post('karyawan');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = $karyawan");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];

			$result1						= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}

			$result2						= $this->db->query("SELECT * FROM absensi WHERE id_karyawan = $karyawan");

			if ($result2->num_rows() > 0) {
				$data				= $result2->row_array();
				$potongan_absen		= $data['potongan'];
			}

			$result3						= $this->db->query("SELECT * FROM peminjaman WHERE id_karyawan = $karyawan AND status = '1'");

			if ($result3->num_rows() > 0) {
				$data				= $result3->row_array();
				$besar_pinjaman		= $data['besar_pinjaman'];
			} else {
				$besar_pinjaman = '0';
			}

			$result4						= $this->db->query("SELECT * FROM bpjs_ketenagakerjaan WHERE id_karyawan = $karyawan");

			if ($result4->num_rows() > 0) {
				$data				= $result4->row_array();
				$bpjs1				= $data['total'];
			}

			$result5						= $this->db->query("SELECT * FROM bpjs_kesehatan WHERE id_karyawan = $karyawan");

			if ($result5->num_rows() > 0) {
				$data				= $result5->row_array();
				$bpjs2				= $data['total'];
			}

			$gaji_bersih = $gaji_kotor - $potongan_absen - $besar_pinjaman - $bpjs1 - $bpjs2;
		}
		$data = array(
			'id_karyawan'					=> $karyawan,
			'gaji_kotor'					=> $gaji_kotor,
			'potongan_absen'				=> $potongan_absen,
			'pinjaman'						=> $besar_pinjaman,
			'bpjs1'							=> $bpjs1,
			'bpjs2'							=> $bpjs2,
			'gaji_bersih'					=> $gaji_bersih
		);

		$this->db->insert('penggajian', $data);
		redirect('admin/penggajian');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Penggajian"
			);
			$where = array('id_penggajian' => $id);
			$data['penggajian'] 			= $this->db->query("SELECT * FROM penggajian WHERE id_penggajian='$id'")->result();
			$data['karyawan'] 	        	= $this->db->query("SELECT * FROM karyawan")->result();
			$this->load->view('pages/Admin/penggajian/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id							= $this->input->post('id');
		$karyawan                   = $this->input->post('karyawan');
		$result						= $this->db->query("SELECT * FROM karyawan WHERE id = $karyawan");

		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$id_jabatan		= $data['id_jabatan'];

			$result1						= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan");

			if ($result1->num_rows() > 0) {
				$data			= $result1->row_array();
				$gaji_kotor		= $data['gaji_kotor'];
			}

			$result2						= $this->db->query("SELECT * FROM absensi WHERE id_karyawan = $karyawan");

			if ($result2->num_rows() > 0) {
				$data				= $result2->row_array();
				$potongan_absen		= $data['potongan'];
			}

			$result3						= $this->db->query("SELECT * FROM peminjaman WHERE id_karyawan = $karyawan AND status = '1'");

			if ($result3->num_rows() > 0) {
				$data				= $result3->row_array();
				$besar_pinjaman		= $data['besar_pinjaman'];
			} else {
				$besar_pinjaman = '0';
			}

			$result4						= $this->db->query("SELECT * FROM bpjs_ketenagakerjaan WHERE id_karyawan = $karyawan");

			if ($result4->num_rows() > 0) {
				$data				= $result4->row_array();
				$bpjs1				= $data['total'];
			}

			$result5						= $this->db->query("SELECT * FROM bpjs_kesehatan WHERE id_karyawan = $karyawan");

			if ($result5->num_rows() > 0) {
				$data				= $result5->row_array();
				$bpjs2				= $data['total'];
			}

			$gaji_bersih = $gaji_kotor - $potongan_absen - $besar_pinjaman - $bpjs1 - $bpjs2;
		}
		$data = array(
			'id_karyawan'					=> $karyawan,
			'gaji_kotor'					=> $gaji_kotor,
			'potongan_absen'				=> $potongan_absen,
			'pinjaman'						=> $besar_pinjaman,
			'bpjs1'							=> $bpjs1,
			'bpjs2'							=> $bpjs2,
			'gaji_bersih'					=> $gaji_bersih
		);

		$where = array('id_penggajian' => $id);
		$this->db->update('penggajian', $data, $where);
		redirect('admin/penggajian');
	}

	public function delete($id)
	{
		$where = array('id_penggajian' => $id);
		$this->db->delete('penggajian', $where);
		redirect('admin/penggajian');
	}

	public function download($id)
	{
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		//$pdf->SetPrintHeader(false);
		//$pdf->SetPrintFooter(false);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);
		$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
		$penggajian	 			= $this->db->query("SELECT * FROM penggajian WHERE id_penggajian=$id")->result();
		$html = '';
		$pdf->writeHTML($html, true, false, true, false, '');
		$table = '<table stripped style="; padding:4px;">';
		foreach ($penggajian as $row) {
			$date = date(' d-m-Y');
			$id_karyawan = $row->id_karyawan;
			$karyawan	 			= $this->db->query("SELECT * FROM karyawan WHERE id=$id_karyawan")->result();
			$table = '<table style="padding:4xpx;padding-top: -30px">';
			$table .= '<tr>
			<th style="" align="right"><strong>Periode #</strong></th>
			<td>' . $date . '</td>
			</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -30px">';
			$tablekiri .= '<tr>
			<th style="" align="left"><strong>DIBERIKAN KEPADA</strong></th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		foreach ($karyawan as $row) {
			$id_jabatan = $row->id_jabatan;
			$jabatan	 			= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan=$id_jabatan")->result();
			$table = '<table style="padding:4xpx;padding-top:-23px">';
			$tablekiri = '<table style="padding-top: -22px">';
			$tablekiri .= '<tr>
			<th style="" align="left">Nama : ' . $row->nama_karyawan . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		foreach ($jabatan as $row) {
			$tablekiri = '<table style="padding-top: -18px">';
			$tablekiri .= '<tr>
			<th style="" align="left">Jabatan : ' . $row->nama_jabatan . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table style="; padding: 10px;">';
		foreach ($penggajian as $row) {
			$date = date(' d-m-Y');
			$id_karyawan = $row->id_karyawan;
			$karyawan	 			= $this->db->query("SELECT * FROM karyawan WHERE id=$id_karyawan")->result();
			$table = '<table style="padding:4xpx;padding-top: -30px">';
			$table .= '<tr>
			<th style="" align="left"><strong>Potongan</strong></th>
			</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -30px">';
			$tablekiri .= '<tr>
			<th style="" align="left"><strong>Penghasilan</strong></th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', 90, $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top:-23px">';
			$table .= '<tr>
						<th style="" align="left">Potongan Absensi : </th>
						<td>Rp. ' . rupiah($row->potongan_absen) . '</td>
					</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -22px">';
			$tablekiri .= '<tr>
			<th align="left" style="padding-">Gaji Pokok : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			Rp. ' . rupiah($row->gaji_kotor) . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top:-20px">';
			$table .= '<tr>
						<th style="" align="left">Pinjaman : </th>
						<td>Rp. ' . rupiah($row->pinjaman) . '</td>
					</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top:-15px">';
			$table .= '<tr>
						<th style="" align="left">BPJS Ketenagakerjaan : </th>
						<td>Rp. ' . rupiah($row->bpjs1) . '</td>
					</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top:-10px">';
			$table .= '<tr>
						<th style="" align="left">BPJS Kesehatan : </th>
						<td>Rp. ' . rupiah($row->bpjs2) . '</td>
					</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top: -2px">';
			$table .= '<tr>
						<th style="" align="right"><strong>Penerimaan Bersih</strong></th>
						<td>Rp. ' . rupiah($row->gaji_bersih) . '</td>
					</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		$pdf->SetFont('times', 'B', 12);
		$table = '<table style="padding:4xpx;">';
		$table .= '<tr>
						<th style="font-size: 26px;color: red">Lunas</th>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		$now = date('d-m-Y');

		$pdf->lastPage();
		// ob_clean();
		foreach ($karyawan as $row) {
			$invioce = $row->id_karyawan;
		}
		$pdf->Output('SlipGaji-' . $invioce . '.pdf', 'I');
	}
}
