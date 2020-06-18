<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url('admin/dashboard') ?>">SI Penggajian</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('admin/dashboard') ?>">SIP</a>
		</div>
		<?php if ($this->session->userdata('role') === '1') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'bagian'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/bagian') ?>">
						<i class="fas fa-list-alt"></i>
						<span>Data Bagian</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'jabatan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/jabatan') ?>">
						<i class="fas fa-tasks"></i>
						<span>Data Jabatan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'karyawan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/karyawan') ?>">
						<i class="fas fa-id-card"></i>
						<span>Data Karyawan</span>
					</a>
				</li>
				<li class="dropdown <?= $this->uri->segment(2) == 'bpjs'  ? 'active' : ''; ?>">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Data BPJS</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?= base_url('admin/bpjs/ketenagakerjaan') ?>">BPJS Ketenagakerjaan</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/bpjs') ?>">BPJS Kesehatan</a></li>
					</ul>
				</li>

				<li class="menu-header">Transaksi</li>
				<li class="<?= $this->uri->segment(2) == 'peminjaman'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/peminjaman') ?>">
						<i class="fas fa-table"></i>
						<span>Peminjaman</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'absensi'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/absensi') ?>">
						<i class="fas fa-table"></i>
						<span>Absensi</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'penggajian'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/penggajian') ?>">
						<i class="fas fa-table"></i>
						<span>Penggajian</span>
					</a>
				</li>

				<li class="menu-header">Laporan</li>
				<li class="<?= $this->uri->segment(2) == 'report'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/report/absensi') ?>">
						<i class="fas fa-table"></i>
						<span>Laporan Absensi</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'gaji_kotor'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/gaji_kotor') ?>">
						<i class="fas fa-table"></i>
						<span>Laporan Gaji Kotor</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'gaji_bersih'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/gaji_bersih') ?>">
						<i class="fas fa-table"></i>
						<span>Laporan Gaji Bersih</span>
					</a>
				</li>

				<li class="menu-header">Pengaturan</li>
				<li class="<?= $this->uri->segment(3) == 'absensi'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/setting/absensi') ?>">
						<i class="fas fa-clock"></i>
						<span>Absensi</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'setting'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/setting') ?>">
						<i class="fa fa-money-check"></i>
						<span>Jenis JKK</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(3) == 'ketenagakerjaan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/setting/ketenagakerjaan') ?>">
						<i class="fas fa-clock"></i>
						<span>Komponen Ketenagakerjaan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(3) == 'kesehatan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/setting/kesehatan') ?>">
						<i class="fa fa-money-check"></i>
						<span>Komponen Kesehatan</span>
					</a>
				</li>
			</ul>
		<?php } ?>
	</aside>
</div>