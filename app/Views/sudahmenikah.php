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
                    <th>agama</th>
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
                    <td><?= $value->agama ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-no_kk ="<?= $value->no_kk ?>"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tempat="<?= $value->tempat ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-jk="<?= $value->jk ?>"
                      data-agama="<?= $value->agama ?>"
                      data-pekerjaan="<?= $value->pekerjaan ?>"
                      data-alamat="<?= $value->alamat ?>"
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
              <?php echo form_open_multipart('surat/cetaksdhnikah/'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="no_kk" id="no_kk" readonly>
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
                      <input type="text" id="agama" name="agama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" id="alamat" name="alamat" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Pilih NIK Pasangan</label>
                      <select class="form-control select2" name='pasangan'>
                        <?php foreach ($warga as $value) { ?>
                        <option value="<?= $value->nik ?>"><?= $value->nik.'-'.$value->nama ?></option>
                        <?php } ?>
                      </select>
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
      var no_kk = $(this).data('no_kk');
      var nik = $(this).data('nik');
      var nama = $(this).data('nama');
      var tempat = $(this).data('tempat');
      var tanggal = $(this).data('tanggal');
      var jk = $(this).data('jk');
      var agama = $(this).data('agama');
      var pekerjaan = $(this).data('pekerjaan');
      var alamat = $(this).data('alamat');
      $('#no_kk').val(no_kk);
      $('#nik').val(nik);
      $('#nama').val(nama);
      $('#jk').val(jk);
      $('#tempat').val(tempat);
      $('#tanggal').val(tanggal);
      $('#agama').val(agama);
      $('#pekerjaan').val(pekerjaan);
      $('#alamat').val(alamat);
    })
  })
  </script>