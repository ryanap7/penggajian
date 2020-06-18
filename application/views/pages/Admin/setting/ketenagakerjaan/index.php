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
                            <h4>Komponen Ketenagakerjaan</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($ketenagakerjaan as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/setting/ketenagakerjaan/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="jht_perusahaan">JHT Perusahaan</label>
                                        <input type="hidden" name="id" value="<?= $data->id_ketenagakerjaan ?>">
                                        <input id="jht_perusahaan" type="text" class="form-control" name="jht_perusahaan" value="<?= $data->jht_perusahaan ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan JHT Perusahaan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jht_karyawan">JHT Karyawan</label>
                                        <input id="jht_karyawan" type="text" class="form-control" name="jht_karyawan" value="<?= $data->jht_karyawan ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan JHT Karyawan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jkm">JKM</label>
                                        <input id="jkm" type="text" class="form-control" name="jkm" value="<?= $data->jkm ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan JKM terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jp_perusahaan">JP Karyawan</label>
                                        <input id="jp_perusahaan" type="text" class="form-control" name="jp_perusahaan" value="<?= $data->jp_perusahaan ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan JP Perusahaan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jp_karyawan">JP Karyawan</label>
                                        <input id="jp_karyawan" type="text" class="form-control" name="jp_karyawan" value="<?= $data->jp_karyawan ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan JP Karyawan terlebih dahulu
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