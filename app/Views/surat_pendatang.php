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
                    <th>Jenis Kelamin</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
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
                    <td><?= $value->tgl_in.' - '.$value->tgl_out ?></td>
                    <td><?= $value->pelapor ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-id="<?= $value->id ?>"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tgl1="<?= $value->tgl_in ?>"
                      data-tgl2="<?= $value->tgl_out ?>"
                      data-jk="<?= $value->jk ?>"
                      data-pelapor="<?= $value->pelapor ?>"
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
              <?php echo form_open_multipart('surat/cetakpendatang'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="kode" id="kode">
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
                      <label>Tanggal Masuk</label>
                      <input type="text" id="tgl1" name="tgl1" class="form-control datetimepicker-input" data-target="#reservationdate" readonly />
                    </div>
                    <div class="form-group">
                      <label>Tanggal Keluar</label>
                      <input type="text" id="tgl2" name="tgl2" class="form-control datetimepicker-input" data-target="#reservationdate" readonly />
                    </div>
                    <div class="form-group">
                      <label>Pelapor</label>
                      <input type="text" id="pelapor" name="pelapor" class="form-control" readonly>
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
      var id = $(this).data('id');
      var kode = $(this).data('kode');
      var nik = $(this).data('nik');
      var nama = $(this).data('nama');
      var tgl1 = $(this).data('tgl1');
      var tgl2 = $(this).data('tgl2');
      var jk = $(this).data('jk');
      var pelapor = $(this).data('pelapor');
      $('#id').val(id);
      $('#kode').val(kode);
      $('#nik').val(nik);
      $('#nama').val(nama);
      $('#tgl1').val(tgl1);
      $('#tgl2').val(tgl2);
      $('#jk').val(jk);
      $('#pelapor').val(pelapor);
    })
  })
  </script>