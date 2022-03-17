      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
              <?php echo form_open_multipart('kk/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>Nomor KK</label>
                    <input type="number" name="no_kk" class="form-control" value="<?= $data->no_kk ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Kepala Keluarga</label>
                    <select class="form-control select2" name="nik" <?php if (empty($data->nik)) {
                      echo 'disabled';
                    } ?> required>
                      <?php if (!empty($nik)) { foreach ($nik as $vnik) { ?>
                      <option value="<?= $vnik->nik ?>" <?php if ($data->nik==$vnik->nik) { echo 'select';
                      } ?>><?= $vnik->nama ?></option>
                      <?php } } else { echo '<option>Masukan Data Warga</option>'; } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="<?= $data->alamat ?>" required>
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="number" name="rt" class="form-control" value="<?= $data->rt ?>" required>
                        </div>
                        <div class="col-6">
                          <input type="number" name="rw" class="form-control" value="<?= $data->rw ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <input type="text" name="kelurahan" class="form-control" value="<?= $data->kelurahan ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" name="kecamatan" class="form-control" value="<?= $data->kecamatan ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" name="kota" class="form-control" value="<?= $data->kota ?>" required>
                    </div>
              <div class="modal-footer justify-content-between">
              <a href="<?= base_url('kk') ?>" class="btn btn-default">Close</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</section>