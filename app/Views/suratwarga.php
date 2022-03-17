    <!-- Main content -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('surat/savepengajuan'); ?>
              <div class="card-body">
                  <?php foreach ($warga as $key) { ?>
                  <div class="form-group">
                    <label>NIK</label>
                      <input type="text" name="nik" class="form-control" value="<?= $key['nik'] ?>" readonly>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $key['nama'] ?>" readonly>
                  </div>
                  <?php } ?>
                    <div class="form-group">
                      <label>Keperluan</label>
                      <select class="form-control select2" name="keperluan">
                        <option value="Surat Domisili">Surat Domisili</option>
                        <option value="Surat Pengantar">Surat Pengantar</option>
                        <option value="Surat Belum Menikah">Surat Belum Menikah</option>
                        <option value="Surat Sudah Menikah">Surat Sudah Menikah</option>
                        <option value="Surat Kelahiran">Surat Kelahiran</option>
                        <option value="Surat Pendatang">Surat Pendatang</option>
                        <option value="Surat Kematian">Surat Kematian</option>
                        <option value="Surat Pindah">Surat Pindah</option>
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
                    <th>Tanggal Pengajuan</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
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
                    <td><?php if ($value->konfirmasi==1) { echo '<a href="#" class="btn btn-info">Belum Dikonfirmasi</a>'; } elseif ($value->konfirmasi==2) { echo '<a href="#" class="btn btn-info">Sedang Di Proses</a>'; }?></td>
                    <td><?php if($value->konfirmasi==1) { echo 'Mohon Menunggu Konfirmasi RT'; } else { echo 'Silakan Menghubungi Ketua RT'; } ?></td>
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