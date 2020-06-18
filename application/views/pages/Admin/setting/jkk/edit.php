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
                            <?php foreach ($jkk as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/setting/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="nama">Jenis JKK</label>
                                        <input type="hidden" name="id" value="<?= $data->id_jkk ?>">
                                        <input id="nama" type="text" class="form-control" name="nama" value="<?= $data->nama_jkk ?>" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan Jenis JKK terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="presentase">Presentase</label>
                                        <input id="presentase" type="text" class="form-control" name="presentase" tabindex="1" value="<?= $data->rate ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Presentase terlebih dahulu
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