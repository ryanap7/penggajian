<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($peminjaman as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/peminjaman/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label>Pilih Karyawan</label>
                                        <input type="hidden" name="id" value="<?= $data->id_peminjaman ?>">
                                        <select class="form-control selectric" id="karyawan" name="karyawan">
                                            <option value="" selected disabled>-- Pilih Karyawan --</option>
                                            <?php
                                            foreach ($karyawan as $d) : ?>
                                                <option <?php if ($data->id_karyawan == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->nama_karyawan ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="besar_pinjaman">Besar Pinjaman</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="besar_pinjaman" type="number" value="<?= $data->besar_pinjaman ?>" name="besar_pinjaman" tabindex="1" value="0" class="form-control currency" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan</label>
                                        <textarea class="form-control" name="ket"><?= $data->keterangan ?></textarea>
                                        <div class="invalid-feedback">
                                            Masukkan keterangan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
                                        <input type="text" value="<?= $data->tanggal_pinjam ?>" class="form-control datepicker" name="tgl">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Edit Data
                                        </button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>