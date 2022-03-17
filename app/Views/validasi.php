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
                    <th>Keperluan</th>
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
                    <td><?= $value->keperluan ?></td>
                    <td><?php if($value->konfirmasi==1) { ?><a href="#" id="set_dtl" data-toggle="modal" data-target="#modal-detail"
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
                      class="btn btn-info">Detail</a> <a href="<?= base_url('surat/konfirmasi/'.$value->id) ?>" class="btn btn-success">Konfirmasi</a> <a href="<?= base_url('surat/tolak/'.$value->id) ?>" class="btn btn-warning">Tolak</a><?php } else { ?><a href="#" class="btn btn-info">Sudah Di Konfirmasi</a> <a href="<?= base_url('surat/delete/'.$value->id) ?>" class="btn btn-danger">Hapus</a><?php } ?></td>
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
                    <label>NIK</label>
                    <input name="nik" id="nik" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" id="nama" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <div class="row">
                        <div class="col-6">
                          <input id="tempat" name="tempat" class="form-control" disabled>
                        </div>
                        <div class="col-6">
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control" id="tanggal" disabled />
                            </div>
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input id="jk" name="jk" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input id="alamat" name="alamat" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>RT / RW</label>
                      <div class="row">
                        <div class="col-6">
                          <input id="rt" name="rt" class="form-control" disabled>
                        </div>
                        <div class="col-6">
                          <input id="rw" name="rw" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <input id="agama" name="agama" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <input id="status" name="status" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input id="pekerjaan" name="pekerjaan" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <input id="kewarganegaraan" name="kewarganegaraan" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input id="no_hp" name="no_hp" class="form-control" disabled>
                    </div>
              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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