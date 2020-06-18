<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Absensi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan Absensi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/print/absensi') ?>" novalidate="">
                                <div class="row">
                                    <div class="form-group" style="margin: 30px">
                                        <button type="submit" class="btn btn-danger" tabindex="4">
                                            <i class="fa fa-print"></i>
                                            Print Laporan
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>ID</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jabatan</th>
                                            <th>Bagian</th>
                                            <th>Jam Hadir</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Tidak Hadir</th>
                                            <th>Terlambat</th>
                                            <th>Total Kehadiran</th>
                                            <th>Potongan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($absensi as $data) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->id_karyawan ?></td>
                                                <td><?= $data->nama_karyawan ?></td>
                                                <td><?= $data->nama_jabatan ?></td>
                                                <td><?= $data->nama_bagian ?></td>
                                                <td><?= $data->jam_hadir ?></td>
                                                <td><?= $data->sakit ?></td>
                                                <td><?= $data->izin ?></td>
                                                <td><?= $data->tidak_hadir ?></td>
                                                <td><?= $data->terlambat ?></td>
                                                <td><?= $data->total ?> hari</td>
                                                <td>Rp. <?= rupiah($data->potongan) ?></td>
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