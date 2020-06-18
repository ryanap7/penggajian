<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data BPJS Ketenagakerjaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data BPJS Ketenagakerjaan</div>
            </div>
        </div>
        <div class="section-body">
            <a href="<?= base_url('admin/bpjs/ketenagakerjaan/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
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
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Perhitungan Dasar</th>
                                            <th>JHT Perusahaan</th>
                                            <th>JHT Karyawan</th>
                                            <th>Jenis JKK</th>
                                            <th>JKK</th>
                                            <th>JKM</th>
                                            <th>JP Perusahaan</th>
                                            <th>JP Karyawan</th>
                                            <th>Total Iuran Ketenagakerjaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bpjs as $data) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->id_karyawan ?></td>
                                                <td><?= $data->nama_karyawan ?></td>
                                                <td>Rp. <?= rupiah($data->perhitungan_dasar) ?></td>
                                                <td>Rp. <?= rupiah($data->jht_perusahaan) ?></td>
                                                <td>Rp. <?= rupiah($data->jht_karyawan) ?></td>
                                                <td><?= $data->jenis_jkk ?></td>
                                                <td>Rp. <?= rupiah($data->jkk) ?></td>
                                                <td>Rp. <?= rupiah($data->jkm) ?></td>
                                                <td>Rp. <?= rupiah($data->jp_perusahaan) ?></td>
                                                <td>Rp. <?= rupiah($data->jp_karyawan) ?></td>
                                                <td>Rp. <?= rupiah($data->total) ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/bpjs/ketenagakerjaan/edit/') . $data->id_bpjs ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
                                                    <a href="<?php echo base_url('admin/bpjs/ketenagakerjaan/delete/') . $data->id_bpjs ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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