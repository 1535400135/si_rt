      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
              <?php echo form_open_multipart('kk/saveanggota'); ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label>Nomor KK</label>
                    <input type="number" name="no_kk" class="form-control" value="<?= $data->no_kk ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label>Kepala Keluarga</label>
                    <input type="number" name="nik" class="form-control" value="<?= $data->nik ?>" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $data->alamat ?>" readonly>
                  </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label>Anggota Keluarga</label>
                    <select class="form-control select2" name="anggota_kk">
                      <option>-= Silakahkan Pilih Kepala Keluarga =-</option>
                      <?php foreach ($nik as $vnik) { ?>
                        <?php if (empty($vnik->no_kk)) { ?>
                          <option value="<?= $vnik->nik ?>"><?= $vnik->nik.' - '.$vnik->nama ?></option>
                      <?php } else { 
                        echo '<option value="'.$vnik->nik.'" disabled>'.$vnik->nik.' - '.$vnik->nama.'</option>';
                      } } ?>
                    </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label>Hubungan Keluarga</label>
                    <select class="form-control" name="hubungan">
                      <option value="Istri">Istri</option>
                      <option value="Anak">Anak</option>
                      <option value="Orang Tua">Orang Tua</option>
                      <option value="Mertua">Mertua</option>
                      <option value="Menantu">Menantu</option>
                      <option value="Cucu">Cucu</option>
                      <option value="Famili Lain">Famili Lain</option>
                    </select>
                    </div>
                  </div>
                  <div class="col-5"></div>
                  <div class="col-6">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </div>
                </div>
              </div>
          <?php echo form_close(); ?>
          <div class="tab-content p-0">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Hubungan Keluarga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($anggota as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nik ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?= $value->hubungan ?></td>
                    <td><a href="<?= base_url('kk/deleteanggota/'.$value->nik) ?>" class="btn btn-danger">Hapus</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>  
                </div>
          </div>
        </div>
    </div>
  </div>
</section>