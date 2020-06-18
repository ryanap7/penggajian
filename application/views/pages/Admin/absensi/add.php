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
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/absensi/store') ?>" novalidate="">
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
                                    <label for="jam_hadir">Jam Hadir</label>
                                    <input id="jam_hadir" type="time" class="form-control" name="jam_hadir" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan jam hadir terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sakit">Sakit</label>
                                    <input id="sakit" type="number" class="form-control" name="sakit" tabindex=" 1" required>
                                    <div class="invalid-feedback">
                                        Masukkan jumlah sakit terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="izin">Izin</label>
                                    <input id="izin" type="number" class="form-control" name="izin" tabindex=" 1" required>
                                    <div class="invalid-feedback">
                                        Masukkan jumlah izin terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tidak_hadir">Tidak Hadir</label>
                                    <input id="tidak_hadir" type="number" class="form-control" name="tidak_hadir" tabindex=" 1" required>
                                    <div class="invalid-feedback">
                                        Masukkan jumlah tidak hadir terlebih dahulu
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