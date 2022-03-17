  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="<?= base_url() ?>/login/logout" class="nav-link" style="color: #dc3545;">Logout</a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= base_url() ?>/public/LOGO.png" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 16px; "><b style="text-align: center;">Pelayanan RT. 08 RW. 012</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="<?= base_url('user/me') ?>" class="d-block"><?= session()->get('nama') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if (session()->get('level')=='Ketua RT') { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>/home" class="nav-link <?php if($menu == 'Dashboard') { echo "active"; }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level')=='Sekertaris RT') { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>/home" class="nav-link <?php if($menu == 'Dashboard') { echo "active"; }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level')=='Warga') { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>/home" class="nav-link <?php if($menu == 'Dashboard') { echo "active"; }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level')!='Warga') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if($submenu=='Data') { echo 'active'; }?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kelolah Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>/warga" class="nav-link <?php if($menu == 'Warga') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Warga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/kk" class="nav-link">
                  <i class="far fa-circle nav-icon <?php if($menu == 'KK') { echo "active"; }?>"></i>
                  <p>Data KK</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if($submenu=='Sirkulasi') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sirkulasi Warga
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>/lahir" class="nav-link <?php if($menu == 'Lahir') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Lahir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/meninggal" class="nav-link <?php if($menu == 'Meninggal') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Meninggal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/pendatang" class="nav-link <?php if($menu == 'Pendatang') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tamu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/pindah" class="nav-link <?php if($menu == 'Pindah') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pindah</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if (session()->get('level')=='Ketua RT') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if($submenu=='surat') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kelolah Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/domisili" class="nav-link <?php if($menu == 'domisili') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Domisili</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/pengantar" class="nav-link <?php if($menu == 'pengantar') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/covid" class="nav-link <?php if($menu == 'covid') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Covid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/blmmenikah" class="nav-link <?php if($menu == 'belum menikah') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Belum Menikah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/sudahmenikah" class="nav-link <?php if($menu == 'sudah menikah') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Sudah Menikah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/kelahiran" class="nav-link <?php if($menu == 'kelahiran') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kelahiran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/pendatang" class="nav-link <?php if($menu == 'pendatang') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pendatang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/kematian" class="nav-link <?php if($menu == 'kematian') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kematian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/surat/pindah" class="nav-link <?php if($menu == 'pindah') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pindah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/surat/validasi" class="nav-link <?php if($menu == 'Laporan') { echo "active"; }?>">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Validasi Permintaan Surat
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level')=='Sekertaris RT') { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>/user/validasiajuan" class="nav-link <?php if($menu == 'validasi') { echo "active"; }?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Validasi Data Warga
              </p>
            </a>
          </li>  
          <?php } ?>
          <?php if (session()->get('level')!='Warga') { ?>
          <li class="nav-item">
            <a href="<?= base_url('#') ?>" class="nav-link <?php if($menu == 'Covid') { echo "active"; }?>">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Data Covid-19
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>/covid/positif" class="nav-link <?php if($submenu == 'positif') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Positif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/covid/vaksinasi" class="nav-link <?php if($submenu == 'vaksinasi') { echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Vaksinasi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/user/validasipassword" class="nav-link <?php if($menu == 'password') { echo "active"; }?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Validasi Data Password
              </p>
            </a>
          </li>
          <br>
          <br>
          <li class="nav-item">
            <a href="<?= base_url() ?>/user" class="nav-link <?php if($menu == 'Pengguna') { echo "active"; }?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna Sistem
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level')=='Warga') { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>/user/me" class="nav-link <?php if($menu == 'saya') { echo "active"; }?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Saya
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/surat/pengajuan" class="nav-link <?php if($menu == 'Pengajuan Surat') { echo "active"; }?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengajuan Surat
              </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>