      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
              <?php echo form_open_multipart('pendatang/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control" placeholder="Masukan NIK" value="<?= $data->nik ?>">
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= $data->nama ?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="Laki-Laki" <?php if ($data->jk=='Laki-Laki') echo 'select'; ?>>Laki-Laki</option>
                      <option value="Perempuan" <?php if ($data->jk=='Perempuan') echo 'select'; ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Masuk</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tgl_in" class="form-control datetimepicker-input" data-target="#reservationdate" value="><?= $data->tgl_in ?>"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="id" value="<?= $data->id ?>" readonly>
                      <label>Tanggal Keluar</label>
                          <div class="input-group date"  id="reservationdate2" data-target-input="nearest">
                              <input type="text" name="tgl_out" class="form-control datetimepicker-input" data-target="#reservationdate2" value="><?= $data->tgl_out ?>"/>
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                    <div class="form-group">
                      <label>Pelapor</label>
                      <select class="form-control select2" name="pelapor">
                      <?php foreach($warga as $vwarga) { ?>
                      <option value="<?= $vwarga->nik ?>" <?php if ($data->pelapor==$vwarga->nik) echo 'select'; ?>><?= $vwarga->nik.' - '.$vwarga->nama ?></option>
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
  </div>
</section>