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
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/setting/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label for="nama">Jenis JKK</label>
                                    <input id="nama" type="text" class="form-control" name="nama" tabindex="1" autofocus required>
                                    <div class="invalid-feedback">
                                        Masukkan Jenis JKK terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="presentase">Presentase</label>
                                    <input id="presentase" type="text" class="form-control" name="presentase" tabindex="1" autofocus required>
                                    <div class="invalid-feedback">
                                        Masukkan Presentase terlebih dahulu
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