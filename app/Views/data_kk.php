    <!-- Main content -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('kk/save'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>Nomor KK</label>
                    <input type="number" name="no_kk" class="form-control" placeholder="Masukan Nomor KK" required>
                  </div>
                  <div class="form-group">
                    <label>Kepala Keluarga</label>
                    <select class="form-control select2" name="nik">
                      <option>-= Silakahkan Pilih Anggota KK =-</option>
                      <?php foreach ($nik as $vnik) { ?>
                        <?php if (empty($vnik->no_kk)) { ?>
                          <option value="<?= $vnik->nik ?>"><?= $vnik->nik.' - '.$vnik->nama ?></option>
                      <?php } else { 
                        echo '<option value="'.$vnik->nik.'" disabled>'.$vnik->nik.' - '.$vnik->nama.'</option>';
                      } } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required>
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="number" name="rt" class="form-control" placeholder="Masukan RT" required>
                        </div>
                        <div class="col-6">
                          <input type="number" name="rw" class="form-control" placeholder="Masukan RW" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <input type="text" name="kelurahan" class="form-control" placeholder="Masukan Kelurahan" required>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" name="kecamatan" class="form-control" placeholder="Masukan Kecamatan" required>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="kota" class="form-control" placeholder="Masukan Kota" required>
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
  <div class="card-footer clearfix">
    <div class="row">
      <div class="col-4">
      <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#modal-tambah" style="margin-right: 20px"><i class="fas fa-plus"></i> Tambah Data</button><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-laporan">Cetak Laporan</a>
      </div>
      <div class="col-3">
        <?php echo form_open_multipart('kk'); ?>
        <label>Dari Tanggal</label>
        <div class="input-group date"  id="reservationdate" data-target-input="nearest">
          <input type="text" name="tanggal1" class="form-control datetimepicker-input" data-target="#reservationdate"/>
          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>
      <div class="col-3">
        <label>Sampai Tanggal</label>
        <div class="input-group date"  id="reservationdate2" data-target-input="nearest">
          <input type="text" name="tanggal2" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
          <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>
      <div class="col-1">
        <button type="submit" class="btn btn-warning">Sortir</button>
      </div>
      <?php echo form_close(); ?>
    </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-users mr-1"></i>
                  <?= $title ?>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Kartu Keluarga</th>
                    <th>Kepala Keluarga</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Anggota Keluarga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->no_kk ?></td>
                    <td><?php if (!empty($value->nik)) { echo $value->nik; } else { echo "Data Belum Dimasukan"; } ?></td>
                    <td><?= $value->alamat ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><a href="<?= base_url('kk/detail/'.$value->no_kk) ?>" class="btn btn-info">Lihat Anggota Keluarga</a></td>
                    <td><a href="<?= base_url('kk/ubah/'.$value->no_kk) ?>" class="btn btn-warning">Ubah</a> <a href="<?= base_url('kk/delete/'.$value->no_kk) ?>" class="btn btn-danger">Hapus</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>  
                </div>
              </div><!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade" id="modal-laporan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cetak laporan KK</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('kk/laporan'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>Dari Tanggal</label>
                    <div class="input-group date"  id="reservationdate4" data-target-input="nearest">
                      <input type="text" name="tanggal1" class="form-control datetimepicker-input" data-target="#reservationdate4"/>
                      <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Dari Tanggal</label>
                    <div class="input-group date"  id="reservationdate3" data-target-input="nearest">
                      <input type="text" name="tanggal2" class="form-control datetimepicker-input" data-target="#reservationdate3"/>
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>