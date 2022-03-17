      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <?php echo form_open_multipart('warga/ajukan'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control" placeholder="Masukan NIK" value="<?= $data->nik ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= $data->nama ?>">
                  </div>
                  <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="text" name="tempat" class="form-control" placeholder="Masukan Tempat Lahir" value="<?= $data->tempat ?>">
                        </div>
                        <div class="col-6">
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $data->tanggal ?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option <?php if($data->jk=='Laki-Laki') echo 'select'; ?> value="Laki-Laki">Laki-Laki</option>
                        <option <?php if($data->jk=='Perempuan') echo 'select'; ?> value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?= $data->alamat ?>">
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="number" name="rt" class="form-control" placeholder="Masukan RT" value="<?= $data->rt ?>">
                        </div>
                        <div class="col-6">
                          <input type="number" name="rw" class="form-control" placeholder="Masukan RW" value="<?= $data->rw ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama">
                        <option <?php if($data->agama=='Islam') echo 'select'; ?> value="Islam">Islam</option>
                        <option <?php if($data->agama=='Kristen') echo 'select'; ?> value="Kristen">Kristen</option>
                        <option <?php if($data->agama=='Hindu') echo 'select'; ?> value="Hindu">Hindu</option>
                        <option <?php if($data->agama=='Budha') echo 'select'; ?>value="Budha">Budha</option>
                        <option <?php if($data->agama=='Katolik') echo 'select'; ?> value="Katolik">Katolik</option>
                        <option <?php if($data->agama=='Konghucu') echo 'select'; ?> value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <select class="form-control" name="status">
                        <option <?php if($data->status=='Belum Menikah') echo 'select'; ?> value="Belum Menikah">Belum Menikah</option>
                        <option <?php if($data->status=='Menikah') echo 'select'; ?> value="Menikah">Menikah</option>
                        <option <?php if($data->status=='Cerai') echo 'select'; ?> value="Cerai">Cerai</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" value="<?= $data->pekerjaan ?>">
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <input type="text" name="kewarganegaraan" class="form-control" value="<?= $data->kewarganegaraan ?>">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="number" name="no_hp" class="form-control" placeholder="Masukan Nomor HP" value="<?= $data->no_hp ?>">
                    </div>
              <div class="modal-footer justify-content-between">
              <a href="<?= base_url('warga') ?>" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section>