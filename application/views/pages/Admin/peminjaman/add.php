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
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/peminjaman/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label>Pilih Karyawan</label>
                                    <select class="form-control selectric" id="karyawan" name="karyawan">
                                        <option value="" selected disabled>-- Pilih Karyawan --</option>
                                        <?php
                                        foreach ($karyawan as $data) : ?>
                                            <option value="<?= $data->id ?>"><?= $data->id_karyawan . ' | ' . $data->nama_karyawan ?></option>
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
                                        <input id="besar_pinjaman" type="number" name="besar_pinjaman" tabindex="1" value="0" class="form-control currency" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea class="form-control" name="ket"></textarea>
                                    <div class="invalid-feedback">
                                        Masukkan keterangan terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="text" class="form-control datepicker" name="tgl">
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