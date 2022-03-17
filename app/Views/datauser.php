    <!-- Main content -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('user/save'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <select class="form-control select2" name="nik">
                      <option>-= Silahkan Pilih NIK =-</option>
                      <?php foreach ($warga as $key) {
                        if ($key->ket==0) {
                        echo '<option value="'.$key->nik.'">'.$key->nik.'-'.$key->nama.'</option>';
                        } else {
                          echo '<option value="'.$key->nik.'" disabled>'.$key->nik.'-'.$key->nama.'</option>';
                        } } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                  </div>
                  <div class="form-group">
                    <label>Pilih Level</label>
                    <select class="form-control select2" name="level">
                      <option value="Sekertaris RT">Sekertaris RT</option>
                      <option value="Warga">Warga</option>
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
      <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#modal-lg" style="margin-right: 20px"><i class="fas fa-plus"></i> Tambah Data</button><a href="#" class="btn btn-success">Cetak Laporan</a>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Level</th>
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
                    <td><?= $value->level ?></td>
                    <td><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
                      data-id="<?= $value->id ?>"
                      data-nik="<?= $value->nik ?>"
                      data-nama="<?= $value->nama ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-level="<?= $value->level ?>"
                      class="btn btn-info">Ubah</a><a href="<?= base_url('user/delete/'.$value->nik) ?>" class="btn btn-danger">Hapus</a></td>
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
              <?php echo form_open_multipart('user/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="text" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                      <option value="Sekertaris RT">Sekertaris RT</option>
                      <option value="Warga">Warga</option>
                    </select>
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
      var level = $(this).data('level');
      $('#id').val(id);
      $('#nik').val(nik);
      $('#level').val(level);
    })
  })
  </script>