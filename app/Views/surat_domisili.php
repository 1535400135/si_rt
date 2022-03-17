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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No KK</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nik ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?php if (!empty($value->no_kk)) { echo $value->no_kk; } else { echo "No. KK Belum Dimasukan"; } ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tempat="<?= $value->tempat ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-jk="<?= $value->jk ?>"
                      data-alamat="<?= $value->alamat ?>"
                      data-rt="<?= $value->rt ?>"
                      data-rw="<?= $value->rw ?>"
                      data-agama="<?= $value->agama ?>"
                      data-status="<?= $value->status ?>"
                      data-pekerjaan="<?= $value->pekerjaan ?>"
                      data-kewarganegaraan="<?= $value->kewarganegaraan ?>"
                      data-no_hp="<?= $value->no_hp ?>"
                      class="btn btn-info">Cetak Surat</a>
                    </td>
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
              <?php echo form_open_multipart('surat/cetakdomisili/'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="text" id="tempat" name="tempat" class="form-control" readonly>
                        </div>
                        <div class="col-6">
                              <input type="text" id="tanggal" name="tanggal" class="form-control"readonly />
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" id="jk" name="jk" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" id="alamat" name="alamat" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input type="number" id="rt" name="rt" class="form-control" readonly>
                        </div>
                        <div class="col-6">
                          <input type="number" id="rw" name="rw" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <input type="text" id="agama" name="agama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <input type="text" id="status" name="status" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <input type="text" id="kewarganegaraan" name="kewarganegaraan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="number" id="no_hp" name="no_hp" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" name="nomor_surat" class="form-control">
                    </div>
                    <div class="form-group-6">
                      <label>Berakhir Tanggal</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="masa" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                        </div>  
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Cetak Surat</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '#set_dtl', function() {
      var nik = $(this).data('nik');
      var nama = $(this).data('nama');
      var tempat = $(this).data('tempat');
      var tanggal = $(this).data('tanggal');
      var jk = $(this).data('jk');
      var alamat = $(this).data('alamat');
      var rt = $(this).data('rt');
      var rw = $(this).data('rw');
      var agama = $(this).data('agama');
      var status = $(this).data('status');
      var pekerjaan = $(this).data('pekerjaan');
      var kewarganegaraan = $(this).data('kewarganegaraan');
      var no_hp = $(this).data('no_hp');
      $('#nik').val(nik);
      $('#nama').val(nama);
      $('#tempat').val(tempat);
      $('#tanggal').val(tanggal);
      $('#jk').val(jk);
      $('#alamat').val(alamat);
      $('#rt').val(rt);
      $('#rw').val(rw);
      $('#agama').val(agama);
      $('#status').val(status);
      $('#pekerjaan').val(pekerjaan);
      $('#kewarganegaraan').val(kewarganegaraan);
      $('#no_hp').val(no_hp);
    })
  })
  </script>