    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $warga ?></h3>
                <p>Warga</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('warga') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $kk ?></h3>
                <p>Kartu Keluarga</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('kk') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $laki ?></h3>
                <p>Laki-Laki</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $perempuan ?></h3>
                <p>Perempuan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $lahir ?></h3>
                <p>Kelahiran</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('lahir') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $mati ?></h3>
                <p>Meninggal</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('meninggal') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $tamu ?></h3>
                <p>Tamu</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('pendatang') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $pindah ?></h3>
                <p>Pindah</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if (session()->get('level')!='Warga') { ?>
              <a href="<?= base_url('pindah') ?>" class="small-box-footer">SELENGKAPNYA</a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $vaksinasi ?></h3>
                <p>Total Warga Yang Di Vaksin</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $positif ?></h3>
                <p>Positif Covid-19</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->