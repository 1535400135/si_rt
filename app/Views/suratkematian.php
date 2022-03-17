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
                    <th>Tanggal Kematian</th>
                    <th>Penyebab</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nik ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->penyebab ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-id ="<?= $value->id ?>"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-penyebab="<?= $value->penyebab ?>"
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
              <?php echo form_open_multipart('surat/cetakkematian/'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" readonly id="id" name="id">
                    <label>NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Kematian</label>
                    <input type="text" id="tanggal" name="tanggal" class="form-control"readonly />
                    </div>
                    <div class="form-group">
                      <label>Penyebab</label>
                      <input type="text" id="penyebab" name="penyebab" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" name="nomor_surat" class="form-control">
                    </div>
                    <!--<div class="form-group-6">
                      <label>Berakhir Tanggal</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="masa" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                        </div>-->
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
      var id = $(this).data('id');
      var nik = $(this).data('nik');
      var nama = $(this).data('nama');
      var tanggal = $(this).data('tanggal');
      var penyebab = $(this).data('penyebab');
      $('#id').val(id);
      $('#nik').val(nik);
      $('#nama').val(nama);
      $('#penyebab').val(penyebab);
      $('#tanggal').val(tanggal);
    })
  })
  </script>