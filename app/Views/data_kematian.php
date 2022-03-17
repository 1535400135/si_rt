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
              <?php echo form_open_multipart('meninggal/save'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <select class="form-control select2" name="nik">
                      <?php foreach($warga as $vwarga) { ?>
                        <?php if ($vwarga->ket== 1) {
                          echo '<option value="'.$vwarga->nik.'">'.$vwarga->nik.' - '.$vwarga->nama .'</option>';
                        } } ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Kematian</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                    <div class="form-group">
                      <label>Penyebab</label>
                      <input type="text" name="penyebab" class="form-control" placeholder="Masukan Penyebab Kematian">
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
        <?php echo form_open_multipart('kematian'); ?>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
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
                      data-id="<?= $value->id ?>"
                      data-nik="<?= $value->nik ?>"
                      data-tanggal="<?= $value->tanggal ?>"
                      data-penyebab="<?= $value->penyebab ?>"
                      class="btn btn-warning">Ubah</a> <a href="<?= base_url('meninggal/delete/'.$value->nik) ?>" class="btn btn-danger">Hapus</a></td>
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
              <?php echo form_open_multipart('meninggal/update'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                      <label>Tanggal Kematian</label>
                          <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" id="tanggal" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="id" id="id" readonly>
                    <div class="form-group">
                      <label>Penyebab</label>
                      <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Masukan Penyebab Kematian">
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
      var tanggal = $(this).data('tanggal');
      var penyebab = $(this).data('penyebab');
      $('#nik').val(nik);
      $('#tanggal').val(tanggal);
      $('#id').val(id);
      $('#penyebab').val(penyebab);
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
              <?php echo form_open_multipart('meninggal/laporan'); ?>
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