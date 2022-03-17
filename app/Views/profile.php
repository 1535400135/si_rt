      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <?php
            if (!empty(session()->getFlashdata('gagal'))) { ?>
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo session()->getFlashdata('gagal'); ?>
            </div>
          <?php } ?>
          <?php
            if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo session()->getFlashdata('success'); ?><p>Silahkan Menunggu Konfirmasi Selanjutnya</p>
            </div>
          <?php } ?>
          <?php
            if (!empty(session()->getFlashdata('done'))) { ?>
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo session()->getFlashdata('done'); ?>
            </div>
          <?php } ?>
              <div class="card">
                <?php echo form_open_multipart('warga/update'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" value="<?= $data->nik ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= $data->nama ?>" disabled>
                  </div>
                  <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="text" name="tempat" class="form-control" placeholder="Masukan Tempat Lahir" value="<?= $data->tempat ?>" disabled>
                        </div>
                        <div class="col-6">
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $data->tanggal ?>" disabled />
                            </div>
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" class="form-control" name="jk" value="<?= $data->jk ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?= $data->alamat ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="number" name="rt" class="form-control" placeholder="Masukan RT" value="<?= $data->rt ?>" disabled>
                        </div>
                        <div class="col-6">
                          <input type="number" name="rw" class="form-control" placeholder="Masukan RW" value="<?= $data->rw ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <input type="text" name="agama" class="form-control" value="<?= $data->agama ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <input type="text" name="status" class="form-control" value="<?= $data->status ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" value="<?= $data->pekerjaan ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <input type="text" name="kewarganegaraan" class="form-control" value="<?= $data->kewarganegaraan ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="number" name="no_hp" class="form-control" placeholder="Masukan Nomor HP" value="<?= $data->no_hp ?>" disabled>
                    </div>
                  <div class="modal-footer justify-content-between">
              <a  href="<?= base_url('user/ubahprofile/'.$data->nik) ?>" class="btn btn-primary">Ubah Profile</a>
              <a href="<?= base_url() ?>/#" class="btn btn-warning" data-toggle="modal" data-target="#modal-password">Ubah Password</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-password">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('user/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden=" name="nik" class="form-control" value="<?= session()->get('nik') ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="text" name="password" class="form-control">
                  </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>