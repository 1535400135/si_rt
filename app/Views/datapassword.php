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
                    <th>Tanggal</th>
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
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-id="<?= $value->id ?>"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"                      
                      data-tanggal="<?= $value->tanggal ?>"
                      data-level="<?= $value->level ?>"
                      data-no_hp="<?= $value->no_hp ?>"
                      class="btn btn-info">Detail Pengajuan</a><a href="<?= base_url('user/deletepass/'.$value->id) ?>" class="btn btn-danger">Hapus</a></td>
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
              <?php echo form_open_multipart('user/updatepassword'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden" name="id" id="id" readonly>
                    <input type="number" name="nik" id="nik" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <div class="row">
                        <input type="text" id="tanggal" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" id="level" name="level" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" id="no_hp" name="no_hp" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="password" name="password" class="form-control">
                    </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
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
      var level = $(this).data('level');
      var tanggal = $(this).data('tanggal');
      var no_hp = $(this).data('no_hp');
      $('#id').val(id);
      $('#nik').val(nik);
      $('#nama').val(nama);
      $('#level').val(level);
      $('#tanggal').val(tanggal);
      $('#no_hp').val(no_hp);
    })
  })
  </script>