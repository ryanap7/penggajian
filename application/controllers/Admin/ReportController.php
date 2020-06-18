<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
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
				'title' => "Laporan Absensi"
			);
			$data['absensi']	 	= $this->db->query("SELECT * FROM absensi INNER JOIN karyawan ON absensi.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian ")->result();
			$this->load->view('pages/Admin/laporan/absensi.php', $data);
		} else {
			redirect('/');
		}
	}

	public function print_absensi()
	{
		$data	 			= $this->db->query("SELECT * FROM absensi INNER JOIN karyawan ON absensi.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian ")->result();
		$pdf = new Pdf2(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetPrintFooter(false);
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
		$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
		$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">ID</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Nama Karyawan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="70px">Jabatan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="30px">Sakit</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="30px">Izin</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="50px">Tidak Hadir</th>						
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="50px">Terlambat</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="50px">Total Kehadiran</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="50px">Potongan</th>
					</tr>';
		if (!empty($data)) {
			foreach ($data as $row) {
				$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->id_karyawan . '</td>
							<td style="border:1px solid #ddd;">' . $row->nama_karyawan . '</td>						
							<td style="border:1px solid #ddd;">' . $row->nama_jabatan . '</td>
							<td style="border:1px solid #ddd;">' . $row->sakit . '</td>						
							<td style="border:1px solid #ddd;">' . $row->izin . '</td>
							<td style="border:1px solid #ddd;">' . $row->tidak_hadir . '</td>
							<td style="border:1px solid #ddd;">' . $row->terlambat . '</td>
							<td style="border:1px solid #ddd;">' . $row->total . ' Hari</td>						
							<td style="border:1px solid #ddd;">' . $row->potongan . '</td>
						</tr>';
			}
		} else {
			echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
		$pdf->lastPage();
		// ob_clean();
		$pdf->Output('Laporan-SewaAmbulance-.pdf', 'I');
	}

	public function gaji_kotor()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Laporan Gaji Kotor"
			);
			$data['jabatan']	 	= $this->db->query("SELECT * FROM jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian")->result();
			$this->load->view('pages/Admin/laporan/gaji_kotor.php', $data);
		} else {
			redirect('/');
		}
	}

	public function print_gaji_kotor()
	{
		$data	 			= $this->db->query("SELECT * FROM jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian ")->result();
		$pdf = new Pdf4(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetPrintFooter(false);
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
		$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
		$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Jabatan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Bagian</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Gaji Kotor</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Total Potongan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="100px">Gaji Bersih</th>
					</tr>';
		if (!empty($data)) {
			foreach ($data as $row) {
				$potongan = $row->uang_makan + $row->insentif_penjualan + $row->insentif_pengiriman + $row->thr + $row->insentif_produktivitas_kerja + $row->lain_lain;
				$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->nama_jabatan . '</td>						
							<td style="border:1px solid #ddd;">' . $row->nama_bagian . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($row->gaji_pokok) . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($potongan) . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($row->gaji_kotor) . '</td>
							</tr>';
			}
		} else {
			echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
		$pdf->lastPage();
		// ob_clean();
		$pdf->Output('Laporan-SewaAmbulance-.pdf', 'I');
	}

	public function gaji_bersih()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Laporan Gaji Kotor"
			);
			$data['penggajian']	 	= $this->db->query("SELECT * FROM penggajian INNER JOIN karyawan ON penggajian.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian")->result();
			$this->load->view('pages/Admin/laporan/gaji_bersih.php', $data);
		} else {
			redirect('/');
		}
	}

	public function print_gaji_bersih()
	{
		$data	 			= $this->db->query("SELECT * FROM penggajian INNER JOIN karyawan ON penggajian.id_karyawan = karyawan.id INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan INNER JOIN bagian ON jabatan.id_bagian = bagian.id_bagian ")->result();
		$pdf = new Pdf3(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetPrintFooter(false);
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
		$table = '<table stripped style="border:1px solid #ddd;padding:4px;">';
		$table .= '<tr align="cent" bgcolor="#ccc">
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">ID</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Nama Karyawan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="70px">Jabatan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">Gaji Kotor</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="95px">Total Potongan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="90px">Gaji Bersih</th>
					</tr>';
		if (!empty($data)) {
			foreach ($data as $row) {
				$potongan = $row->potongan_absen + $row->pinjaman + $row->bpjs1 + $row->bpjs2;
				$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->id_karyawan . '</td>
							<td style="border:1px solid #ddd;">' . $row->nama_karyawan . '</td>						
							<td style="border:1px solid #ddd;">' . $row->nama_jabatan . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($row->gaji_kotor) . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($potongan) . '</td>
							<td style="border:1px solid #ddd;">Rp.' . rupiah($row->gaji_bersih) . '</td>
							</tr>';
			}
		} else {
			echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
		$pdf->lastPage();
		// ob_clean();
		$pdf->Output('Laporan-SewaAmbulance-.pdf', 'I');
	}
}
