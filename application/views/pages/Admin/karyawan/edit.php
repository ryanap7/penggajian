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
                            <?php foreach ($karyawan as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/karyawan/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="id_k">ID Karyawan</label>
                                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                        <input id="id_k" type="number" class="form-control" name="id_k" tabindex="1" value="<?= $data->id_karyawan ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan ID jabatan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Karyawan</label>
                                        <input id="nama" type="text" class="form-control" name="nama" value="<?= $data->nama_karyawan ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan nama karyawan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Jabatan</label>
                                        <select class="form-control selectric" id="jabatan" name="jabatan">
                                            <option value="" selected disabled>-- Pilih Jabatan --</option>
                                            <?php
                                            foreach ($jabatan as $d) : ?>
                                                <option <?php if ($data->id_jabatan == $d->id_jabatan) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id_jabatan ?>> <?= $d->nama_jabatan ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Bagian</label>
                                        <select class="form-control selectric" id="bagian" name="bagian">
                                            <option value="" selected disabled>-- Pilih Bagian --</option>
                                            <?php
                                            foreach ($bagian as $d) : ?>
                                                <option <?php if ($data->id_bagian == $d->id_bagian) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id_bagian ?>> <?= $d->nama_bagian ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" required=""><?= $data->alamat ?></textarea>
                                        <div class="invalid-feedback">
                                            Masukkan alamat karyawan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control datepicker" name="lahir" value="<?= $data->tanggal_lahir ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select class="form-control selectric" id="status" name="status">
                                            <option value="" selected disabled>-- Pilih Status Pernikahan --</option>
                                            <option <?php if ($data->status == "0") : echo 'selected'; ?><?php endif; ?> value=<?= $data->status ?>> Single</option>
                                            <option <?php if ($data->status == "1") : echo 'selected'; ?><?php endif; ?> value=<?= $data->status ?>> Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Keluarga Tanggungan</label>
                                        <input id="jumlah" type="number" class="form-control" name="jumlah" value="<?= $data->jumlah_keluarga ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan Jumlah keluarga tanggungan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">No. Telp</label>
                                        <input id="telp" type="number" class="form-control" name="telp" tabindex="1" value="<?= $data->telp ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan nomor telepon terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label">Status</div>
                                        <label class="custom-switch mt-2">
                                            <span class="custom-switch-description">Tidak Aktif &nbsp;</span>
                                            <input type="checkbox" name="status_kerja" value="1" class="custom-switch-input" <?php if ($data->status_kerja == '1') : echo 'checked'; ?><?php endif; ?>>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Aktif</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="text" class="form-control datepicker" value="<?= $data->tanggal_masuk ?>" name="masuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" value="<?= $data->email ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan email terlebih dahulu
                                        </div>
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