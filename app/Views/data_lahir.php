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
              <?php echo form_open_multipart('lahir/save'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Keluarga</label>
                      <select class="form-control" name="no_kk">
                        <?php foreach ($no_kk as $key) { ?>
                        <option value="<?= $key->no_kk ?>"><?= $key->no_kk.' - '.$key->nama ?></option>
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
  <div class="card-footer clearfix">
    <div class="row">
      <div class="col-4">
      <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#modal-tambah" style="margin-right: 20px"><i class="fas fa-plus"></i> Tambah Data</button><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-laporan">Cetak Laporan</a>
      </div>
      <div class="col-3">
        <?php echo form_open_multipart('lahir'); ?>
        <label>Dari Tanggal</label>
        <div class="input-group date"  id="reservationdate5" data-target-input="nearest">
          <input type="text" name="tanggal1" class="form-control datetimepicker-input" data-target="#reservationdate5"/>
          <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
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
    <!-- Main content -->
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
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Keluarga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?= $value->no_kk ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-nama="<?= $value->nama ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-jk="<?= $value->jk ?>"
                      data-no_kk="<?= $value->no_kk ?>"
                      class="btn btn-info">Detail</a> <a href="<?= base_url('lahir/ubah/'.$value->id) ?>" class="btn btn-warning">Ubah</a> <a href="<?= base_url('lahir/delete/'.$value->id) ?>" class="btn btn-danger">Hapus</a></td>
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
  <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" id="tanggal" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" disabled />
                        </div>
                      </div>  
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" id="jk" name="jk" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nomor KK</label>
                      <input type="text" id="no_kk" name="alamat" class="form-control" disabled>
                    </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '#set_dtl', function() {
      var nama = $(this).data('nama');
      var tanggal = $(this).data('tanggal');
      var jk = $(this).data('jk');
      var no_kk = $(this).data('no_kk');
      $('#nama').val(nama);
      $('#tanggal').val(tanggal);
      $('#jk').val(jk);
      $('#no_kk').val(no_kk);
    })
  })
  </script>
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
              <?php echo form_open_multipart('lahir/laporan'); ?>
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