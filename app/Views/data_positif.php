    <!-- Main content -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('covid/save'); ?>
              <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                    <select id="nik" name="nik" class="form-control select2">
                      <?php foreach ($warga as $key) { ?>
                        <option value="<?= $key->nik ?>"><?= $key->nik.'-'.$key->nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Status COVID</label>
                      <select class="form-control" name="status">
                        <option value="POSITIF">POSITIF</option>
                        <option value="NEGATIF">NEGATIF</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Terkena</label>
                      <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tglkena" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                         <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Sembuh</label>
                      <div class="input-group date"  id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="tglsembuh" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                         <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Rumah Sakit Rujukan</label>
                      <input type="text" name="rujukan" class="form-control" placeholder="Masukan RS Rujukan">
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
        <?php echo form_open_multipart('positif'); ?>
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
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tanggal Terkena</th>
                    <th>Status COVID</th>
                    <th>Tanggal Sembuh</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nik.' - '.$value->nama ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?= $value->alamat ?></td>
                    <td><?= $value->tglkena ?></td>
                    <td><a href="#" id="set_dtl" <?php if($value->status=='NEGATIF') { echo 'class="btn btn-success"'; } else { echo 'class="btn btn-info"';} ?>
                      ><?= $value->status ?></a>
                      <a href="#" class="btn btn-warning" id="set_dtl" data-toggle="modal" data-target="#modal-detail" 
                      data-id ="<?= $value->id ?>"
                      data-kode="<?= $value->nik.'-'.$value->nama ?>"
                      data-status="<?= $value->status ?>"
                      data-tglkena="<?= $value->tglkena ?>"
                      data-tglsembuh="<?= $value->tglsembuh ?>"
                      data-rsrujukan="<?= $value->rsrujukan ?>"
                      >Ubah</a>
                      <a href="<?= base_url('covid/delete/'.$value->id) ?>" class="btn btn-danger">Hapus</a></td>
                    <td><?= $value->tglsembuh ?></td>
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
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Warga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('covid/update'); ?>
              <div class="card-body">
                  <input type="hidden" name="id" id="id">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" id="kode" class="form-control" readonly>
                  </div>
                    <div class="form-group">
                      <label>Status COVID</label>
                      <select class="form-control" name='status'>
                        <option value="POSITIF">POSITIF</option>
                        <option value="NEGATIF">NEGATIF</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Terkena</label>
                        <input type="text" name="tglkena" id="tglkena" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Tanggal Sembuh</label>
                        <div class="input-group date"  id="reservationdate3" data-target-input="nearest">
                        <input type="text" name="tglsembuh" class="form-control datetimepicker-input" data-target="#reservationdate3"/>
                         <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Rumah Sakit Rujukan</label>
                      <input type="text" name="rujukan" class="form-control" placeholder="Masukan RS Rujukan" id="rsrujukan">
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
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '#set_dtl', function() {
      var id = $(this).data('id');
      var kode = $(this).data('kode');
      var status = $(this).data('status');
      var tglkena = $(this).data('tglkena');
      var tglsembuh = $(this).data('tglsembuh');
      var rsrujukan = $(this).data('rsrujukan');
      $('#id').val(id);
      $('#kode').val(kode);
      $('#status').val(status);
      $('#tglkena').val(tglkena);
      $('#tglsembuh').val(tglsembuh);
      $('#rsrujukan').val(rsrujukan);
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
              <?php echo form_open_multipart('covid/laporanpositif'); ?>
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
                    <div class="input-group date"  id="reservationdate7" data-target-input="nearest">
                      <input type="text" name="tanggal2" class="form-control datetimepicker-input" data-target="#reservationdate7"/>
                      <div class="input-group-append" data-target="#reservationdate7" data-toggle="datetimepicker">
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