<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a href="<?= base_url('admin/client') ?>">
								<h4> Total Bagian</h4>
							</a>
						</div>
						<div class="card-body">
							<?= $bagian ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a href="<?= base_url('admin/client') ?>">
								<h4> Total Jabatan</h4>
							</a>
						</div>
						<div class="card-body">
							<?= $jabatan ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a href="<?= base_url('admin/client') ?>">
								<h4> Total Karyawan</h4>
							</a>
						</div>
						<div class="card-body">
							<?= $karyawan ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>