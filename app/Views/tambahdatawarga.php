<section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-lg-12">
        		<div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?= base_url('warga/save'); ?>" method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- checkbox -->
                    	<div class="form-group">
                        	<label>Nomor Induk Kependudukan</label>
                        	<input class="form-control" type="number" name="nik" id="nis" placeholder="Masukan Nomor Induk KTP" required>
                    	</div>
                    	<div class="form-group">
                    		<label>Nama Lengkap</label>
                    		<input class="form-control" type="text" name="nama_skl" id="nama" placeholder="Masukan Nama Lengkap" required>
                    	</div> 
                    	<div class="form-group">
                    		<label>Tempat / Tanggal Lahir</label>
                        <div class="row">
                          <div class="col-6">
                            <input class="form-control" type="text" name="tempat" id="nama" placeholder="Tempat Lahir" required>  
                          </div>
                          <div class="col-6">
                            <div class="input-group date"  id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
                          </div>
                        </div>
                    	</div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat" placeholder="Masukan Alamat" required>
                      </div>
                      <div class="form-group">
                        <label>RT / RW</label>
                        <div class="row">
                          <div class="col-6">
                            <input class="form-control" type="text" name="rt" placeholder="Masukan RT" required="">
                          </div>
                          <div class="col-6">
                            <input class="form-control" type="text" name="rw" placeholder="Masukan RW" required="">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="Lajang">Lanjang</option>
                          <option value="Menikah">Menikah</option>
                          <option value="Cerai">Cerai</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input class="form-control" type="text" name="pekerjaan" placeholder="Masukan Pekerjaan" required>
                      </div>
                      <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <input class="form-control" type="text" name="kewarganegaraan" placeholder="Masukan Kewarganegaraan" required>
                      </div>
                      <div class="form-group">
                        <label>Nomor Telp / HP</label>
                        <input class="form-control" type="number" name="nomorhp" placeholder="Masukan Nomor Telp / HP" required>
                      </div>
                  	</div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                  </div>
              </form>
          </div>
          </div> 
</div>
</div>
</div>
</section>
</div>