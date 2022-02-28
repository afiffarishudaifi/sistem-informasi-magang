<?php
$uri = service('uri');
$session = session();
?>
<div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category">General</li>
          <li class="site-menu-item <?php
                                    if ($uri->getSegment(2) == 'Dashboard') {
                                      echo "active";
                                    } ?>">
            <a class="animsition-link" href="<?= base_url('Admin/Dashboard'); ?>">
              <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
              <span class="site-menu-title">Dashboard</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if (
                                              $uri->getSegment(2) == 'Admin' || $uri->getSegment(2) == 'IndeksPenilaian' ||
                                              $uri->getSegment(2) == 'Jabatan' || $uri->getSegment(2) == 'Jobdesk' ||
                                              $uri->getSegment(2) == 'Sekolah' || $uri->getSegment(2) == 'Sertifikat' || $uri->getSegment(2) == 'Peserta'
                                            ) {
                                              echo "active";
                                            } ?>">
            <a href="javascript:void(0)">
              <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
              <span class="site-menu-title">Data Master</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Admin') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Admin'); ?>">
                  <span class="site-menu-title">Admin</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'IndeksPenilaian') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/IndeksPenilaian'); ?>">
                  <span class="site-menu-title">Indeks Penilaian</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Jabatan') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Jabatan'); ?>">
                  <span class="site-menu-title">Jabatan</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Jobdesk') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Jobdesk'); ?>">
                  <span class="site-menu-title">Job Deskripsi</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Sekolah') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Sekolah'); ?>">
                  <span class="site-menu-title">Sekolah</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Sertifikat') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Sertifikat'); ?>">
                  <span class="site-menu-title">Sertifikat</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'Peserta') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/Peserta'); ?>">
                  <span class="site-menu-title">Peserta Magang</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-category">Kegiatan Magang</li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'Timeline') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/Timeline'); ?>">
              <i class="site-menu-icon md-calendar" aria-hidden="true"></i>
              <span class="site-menu-title">Timeline Peserta</span>
            </a>
          </li>
          <li class="site-menu-item has-sub ">
            <a href="javascript:void(0)">
              <i class="site-menu-icon md-notifications-none" aria-hidden="true"></i>
              <span class="site-menu-title">Pengajuan Magang</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'Absen') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/Absen'); ?>">
              <i class="site-menu-icon md-notifications" aria-hidden="true"></i>
              <span class="site-menu-title">Pengajuan Absensi</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'Nilai') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/Nilai'); ?>">
              <i class="site-menu-icon md-border-color" aria-hidden="true"></i>
              <span class="site-menu-title">Penilaian Magang</span>
            </a>
          </li>
          <li class="site-menu-item has-sub <?php
                                            if ($uri->getSegment(2) == 'JobdeskPeserta') {
                                              echo "active";
                                            } ?>">
            <a href="<?= base_url('Admin/JobdeskPeserta'); ?>">
              <i class="site-menu-icon md-comment-alt-text" aria-hidden="true"></i>
              <span class="site-menu-title">Job Deksripsi</span>
            </a>
          </li>
          <li class="site-menu-category">LAPORAN</li>
          <li class="site-menu-item has-sub <?php
                                            if (
                                              $uri->getSegment(2) == 'LaporanPeserta' || $uri->getSegment(2) == 'LaporanAbsensi' ||
                                              $uri->getSegment(2) == 'LaporanPenilaian'
                                            ) {
                                              echo "active";
                                            } ?>">
            <a href="javascript:void(0)">
              <i class="site-menu-icon md-assignment" aria-hidden="true"></i>
              <span class="site-menu-title">Laporan</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'LaporanPeserta') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/LaporanPeserta'); ?>">
                  <span class="site-menu-title">Peserta Magang</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'LaporanAbsensi') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/LaporanAbsensi'); ?>">
                  <span class="site-menu-title">Absensi Magang</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'LaporanAbsensi') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="">
                  <span class="site-menu-title">Penilaian Magang</span>
                </a>
              </li>
              <li class="site-menu-item <?php
                                        if ($uri->getSegment(2) == 'LaporanJobdesk') {
                                          echo "active";
                                        } ?>">
                <a class="animsition-link" href="<?= base_url('Admin/LaporanJobdesk'); ?>">
                  <span class="site-menu-title">Jobdesk Magang</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item <?php
                                    if ($uri->getSegment(2) == 'Profil') {
                                      echo "active";
                                    } ?>">
            <a class="animsition-link" href="<?= base_url('Admin/Profil'); ?>">
              <i class="site-menu-icon md-pin-drop" aria-hidden="true"></i>
              <span class="site-menu-title">Pengaturan Profil</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>