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
                            <?php foreach ($bagian as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/bagian/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="nama">Nama Barang</label>
                                        <input type="hidden" name="id" value="<?= $data->id_bagian ?>">
                                        <input id="nama" type="text" class="form-control" name="nama" value="<?= $data->nama_bagian ?>" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan nama bagian terlebih dahulu
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