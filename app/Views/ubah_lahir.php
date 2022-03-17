      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <?php echo form_open_multipart('lahir/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>">
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $data->tanggal ?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option value="Laki-Laki" <?php if($data->jk=='Laki-Laki') { echo 'select'; } ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if($data->jk=='Perempuan') { echo 'select'; } ?>>Perempuan</option>
                      </select>
                      <input type="hidden" name="id" value="<?= $data->id ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Keluarga</label>
                      <select class="form-control" name="no_kk">
                        <?php foreach ($no_kk as $key) { ?>
                        <option value="<?= $key->no_kk ?>" <?php if($data->no_kk==$key->no_kk) { echo 'select'; } ?>><?= $key->no_kk.' - '.$key->nama ?></option>
                      <?php } ?>
                      </select>
                    </div>
              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
        </div>
    
  </div>
</section>