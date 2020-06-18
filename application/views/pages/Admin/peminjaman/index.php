<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Peminjaman</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Peminjaman</div>
			</div>
		</div>
		<div class="section-body">
			<a href="<?= base_url('admin/peminjaman/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th class="text-center">
												Nomor Pinjaman
											</th>
											<th>ID</th>
											<th>Nama Karyawan</th>
											<th>Besar Pinjaman</th>
											<th>Keterangan</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Lunas</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($peminjaman as $data) :
											$originalDate = $data->tanggal_pinjam;
											$newDate = date("d M Y", strtotime($originalDate)); ?>
											<tr>
												<td><?= $data->id_peminjaman ?></td>
												<td><?= $data->id_karyawan ?></td>
												<td><?= $data->nama_karyawan ?></td>
												<td>Rp. <?= rupiah($data->besar_pinjaman) ?></td>
												<td>
													<?php
													if ($data->keterangan === '') {
														echo "-";
													}

													?>
												</td>
												<td><?= $newDate ?></td>
												<td>
													<?php
													if ($data->tanggal_lunas === '0000-00-00') {
														echo "-";
													} else {
														$originalDate = $data->tanggal_lunas;
														$newDate = date("d M Y", strtotime($originalDate));
														echo $newDate;
													}

													?>
												</td>
												<td>
													<?php if ($data->lunas === '0') { ?>
														<div class="badges">
															<span class="badge badge-warning">Angsuran</span>
														</div>
													<?php } else { ?>
														<div class="badges">
															<span class="badge badge-primary">Lunas</span>
														</div>
													<?php } ?>
												</td>
												<td>
													<?php if($data->lunas === '0'){ ?>
														<a href="<?php echo base_url('admin/peminjaman/change/') . $data->id_peminjaman ?>" class="btn btn-info" title="Ubah Status"><i class="fa fa-check"></i> </a>
													<?php } ?>
													<a href="<?php echo base_url('admin/peminjaman/edit/') . $data->id_peminjaman ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<a href="<?php echo base_url('admin/peminjaman/delete/') . $data->id_peminjaman ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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