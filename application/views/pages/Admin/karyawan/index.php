<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Karyawan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Karyawan</div>
			</div>
		</div>
		<div class="section-body">
			<a href="<?= base_url('admin/karyawan/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>ID Karyawan</th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bagian</th>
											<th>Alamat</th>
											<th>No. Telp</th>
											<th>Status Kerja</th>
											<th>Tanggal Masuk</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($karyawan as $data) :
											$originalDate = $data->tanggal_masuk;
											$newDate = date("d M Y", strtotime($originalDate)); ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->id_karyawan ?></td>
												<td><?= $data->nama_karyawan ?></td>
												<td><?= $data->nama_jabatan ?></td>
												<td><?= $data->nama_bagian ?></td>
												<td><?= $data->alamat ?></td>
												<td><?= $data->telp ?></td>
												<td>
													<?php if ($data->status_kerja === '0') { ?>
														<div class="badges">
															<span class="badge badge-warning">Tidak Aktif</span>
														</div>
													<?php } else { ?>
														<div class="badges">
															<span class="badge badge-primary">Aktif</span>
														</div>
													<?php } ?>
												</td>
												<td><?= $newDate ?></td>
												<td>
													<a href="<?php echo base_url('admin/karyawan/edit/') . $data->id ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<a href="<?php echo base_url('admin/karyawan/delete/') . $data->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>