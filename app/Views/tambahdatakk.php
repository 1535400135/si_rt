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
                        	<label>Nomor Kartu Kependudukan</label>
                        	<input class="form-control" type="number" name="nik" id="nis" placeholder="Masukan Nomor Induk KTP" required>
                    	</div>
                    	<div class="form-group">
                    		<label>Pilih Kepala Kelurga</label>
                    		<select class="form-control" name="kepalakeluarga">
                          <option></option>  
                        </select>
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
                        <label>Kelurahan</label>
                        <input class="form-control" type="text" name="kelurahan" placeholder="Masukan Kelurahan" required>
                      </div>
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input class="form-control" type="text" name="kecamatan" placeholder="Masukan Kecamatan" required>
                      </div>
                      <div class="form-group">
                        <label>Kota</label>
                        <input class="form-control" type="text" name="kota" placeholder="Masukan Kota" required>
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