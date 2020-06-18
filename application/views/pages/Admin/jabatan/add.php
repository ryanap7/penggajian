<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Data</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/jabatan/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label for="nama">Nama Jabatan</label>
                                    <input id="nama" type="text" class="form-control" name="nama" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan nama jabatan terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Bagian</label>
                                    <select class="form-control selectric" id="bagian" name="bagian">
                                        <option value="" selected disabled>-- Pilih Bagian --</option>
                                        <?php
                                        foreach ($bagian as $data) : ?>
                                            <option value="<?= $data->id_bagian ?>"><?= $data->nama_bagian ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gaji_pokok">Gaji Pokok</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="gaji_pokok" type="number" name="gaji_pokok" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="uang_makan">Uang Makan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="uang_makan" type="number" name="uang_makan" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ip1">Insentif Penjualan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="ip1" type="number" name="ip1" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ip2">Insentif Pengiriman</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="ip2" type="number" name="ip2" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="thr">Tunjangan Hari Raya</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="thr" type="number" name="thr" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ipk">Insentif Produktivitas Kerja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="ipk" type="number" name="ipk" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lain">Lain-Lain</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input id="lain" type="number" name="lain" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Add Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>