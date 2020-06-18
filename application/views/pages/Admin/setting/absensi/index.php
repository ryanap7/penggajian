<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengaturan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Absensi</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($absensi as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/setting/absensi/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="jam_masuk">Jam Masuk</label>
                                        <input type="hidden" name="id" value="<?= $data->id_setting_absensi ?>">
                                        <input id="jam_masuk" type="time" class="form-control" name="jam_masuk" value="<?= $data->jam_masuk ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan jam masuk terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hari_kerja">Hari Kerja</label>
                                        <input id="hari_kerja" type="number" class="form-control" name="hari_kerja" value="<?= $data->hari_kerja ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan hari kerja terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="potongan">Potongan Telat/Menit</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="potongan" type="number" name="potongan" tabindex="1" value="<?= $data->potongan_telat ?>" class="form-control currency" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_kerja">Jam Kerja/Menit</label>
                                        <input id="jam_kerja" type="number" class="form-control" name="jam_kerja" value="<?= $data->jam_kerja ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan jam kerja terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tidak_hadir">Tidak Hadir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="tidak_hadir" type="number" name="tidak_hadir" tabindex="1" value="<?= $data->tidak_hadir ?>" class="form-control currency" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="izin">Izin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="izin" type="number" name="izin" tabindex="1" value="<?= $data->izin ?>" class="form-control currency" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sakit">Sakit</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="sakit" type="number" name="sakit" tabindex="1" value="<?= $data->sakit ?>" class="form-control currency" required>
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