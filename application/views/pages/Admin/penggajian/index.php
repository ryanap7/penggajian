<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Penggajian</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Penggajian</div>
			</div>
		</div>
		<div class="section-body">
			<a href="<?= base_url('admin/penggajian/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bagian</th>
											<th>Gaji Kotor</th>
											<th>Potongan</th>
											<th>Pinjaman</th>
											<th>BPJS1</th>
											<th>BPJS2</th>
											<th>Gaji Bersih</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($penggajian as $data) : ?>
											<tr>
												<td><?= $data->id_karyawan ?></td>
												<td><?= $data->nama_karyawan ?></td>
												<td><?= $data->nama_jabatan ?></td>
												<td><?= $data->nama_bagian ?></td>
												<td>Rp. <?= rupiah($data->gaji_kotor) ?></td>
												<td>Rp. <?= rupiah($data->potongan_absen) ?></td>
												<td>Rp. <?= rupiah($data->pinjaman) ?></td>
												<td>Rp. <?= rupiah($data->bpjs1) ?></td>
												<td>Rp. <?= rupiah($data->bpjs2) ?></td>
												<td>Rp. <?= rupiah($data->gaji_bersih) ?></td>
												<td>
													<a href="<?php echo base_url('admin/penggajian/download/') . $data->id_penggajian ?>" class="btn btn-danger" title="Print PDF"><i class="fa fa-print"></i> </a>
													<a href="<?php echo base_url('admin/penggajian/edit/') . $data->id_penggajian ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<a href="<?php echo base_url('admin/penggajian/delete/') . $data->id_penggajian ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								Keterangan : <br>
								- BPJS1 : BPJS Ketenagakerjaan<br>
								- BPJS2 : BPJS Kesehatan <br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>