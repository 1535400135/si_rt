      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <?php echo form_open_multipart('user/ajukan'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" value="<?= $data->nik ?>" readonly>
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
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $data->tanggal ?>"/>
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
                        <option value="Laki-Laki" <?php if($data->jk=='Laki-Laki') { echo 'select'; } ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if($data->jk=='Perempuan') { echo 'select'; } ?>>Perempuan</option>
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
                        <option value="Islam" <?php if($data->agama=='Islam') { echo 'select'; } ?>>Islam</option>
                        <option value="Kristen" <?php if($data->agama=='Kristen') { echo 'select'; } ?>>Kristen</option>
                        <option value="Hindu" <?php if($data->agama=='Hindu') { echo 'select'; } ?>>Hindu</option>
                        <option value="Budha" <?php if($data->agama=='Budha') { echo 'select'; } ?>>Budha</option>
                        <option value="Katolik" <?php if($data->agama=='Katolik') { echo 'select'; } ?>>Katolik</option>
                        <option value="Konghucu" <?php if($data->agama=='Konghucu') { echo 'select'; } ?>>Konghucu</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <select class="form-control" name="status">
                        <option value="Belum Menikah" <?php if($data->status=='Belum Menikah') { echo 'select'; } ?>>Belum Menikah</option>
                        <option value="Menikah" <?php if($data->status=='Menikah') { echo 'select'; } ?>>Menikah</option>
                        <option value="Cerai" <?php if($data->status=='Cerai') { echo 'select'; } ?>>Cerai</option>
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
              <a href="<?= base_url('user/me') ?>" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>