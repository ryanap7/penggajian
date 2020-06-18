<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data BPJS Kesehatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data BPJS Kesehatan</div>
            </div>
        </div>
        <div class="section-body">
            <a href="<?= base_url('admin/bpjs/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Add Data</a><br><br>
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
                                            <th>Jumlah Keluarga Tanggungan</th>
                                            <th>BPJS Perusahaan</th>
                                            <th>BPJS Karyawan</th>
                                            <th>Total Iuran Kesehatan</th>
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
                                                <td><?= $data->jumlah_keluarga ?></td>
                                                <td>Rp. <?= rupiah($data->bpjs_perusahaan) ?></td>
                                                <td>Rp. <?= rupiah($data->bpjs_karyawan) ?></td>
                                                <td>Rp. <?= rupiah($data->total) ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/bpjs/edit/') . $data->id_kesehatan ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
                                                    <a href="<?php echo base_url('admin/bpjs/delete/') . $data->id_kesehatan ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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