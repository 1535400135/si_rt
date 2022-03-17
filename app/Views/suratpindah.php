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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Pindah</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nik ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->tglpindah ?></td>
                    <td><?= $value->alasan ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tglpindah="<?= $value->tglpindah ?>"
                      data-jk="<?= $value->jk ?>"
                      data-alasan="<?= $value->alasan ?>"
                      class="btn btn-info">Cetak Surat</a></td>
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
              <h4 class="modal-title">Detail Data Pendatang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('surat/cetakpindah'); ?>
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
                    <label>Jenis Kelamin</label>
                    <input type="text" id="jk" name="jk" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Pindah</label>
                      <input type="text" id="tglpindah" name="tglpindah" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Alasan</label>
                      <input type="text" id="alasan" name="alasan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" name="nomor_surat" class="form-control">
                    </div>
                    <!--<div class="form-group">
                      <label>Berlaku sampai</label>
                        <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                          <input type="text" name="massa" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                    </div> -->
                  <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-info">Cetak Surat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '#set_dtl', function() {
      var nik = $(this).data('nik');
      var jk = $(this).data('jk');
      var nama = $(this).data('nama');
      var tglpindah = $(this).data('tglpindah');
      var alasan = $(this).data('alasan');
      $('#nik').val(nik);
      $('#jk').val(jk);
      $('#nama').val(nama);
      $('#tglpindah').val(tglpindah);
      $('#alasan').val(alasan);
    })
  })
  </script>