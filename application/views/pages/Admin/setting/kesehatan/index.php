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
                            <h4>Komponen Kesehatan</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($kesehatan as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/setting/kesehatan/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="bpjs_perusahaan">BPJS Perusahaan</label>
                                        <input type="hidden" name="id" value="<?= $data->id_kesehatan ?>">
                                        <input id="bpjs_perusahaan" type="text" class="form-control" name="bpjs_perusahaan" value="<?= $data->bpjs_perusahaan ?>" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan BPJS Perusahaan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=bpjs_karyawan>BPJS Karyawan</label>
                                        <input id="bpjs_karyawan" type="text" class="form-control" name="bpjs_karyawan" value="<?= $data->bpjs_karyawan ?>" tabindex=" 1" required>
                                        <div class="invalid-feedback">
                                            Masukkan BPJS Karyawan terlebih dahulu
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