<?php
$uri = service('uri');
// $session = session();
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
            <a class="animsition-link" href="<?= base_url('Peserta/Dashboard'); ?>">
                    <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                </a>
          </li>
          <li class="site-menu-category">Kegiatan Magang</li>
          <li class="site-menu-item has-sub <?php
                            if ($uri->getSegment(2) == 'Absen') {
                                echo "active";
                            } ?>">
            <a href="<?= base_url('Peserta/Absen'); ?>">
                    <i class="site-menu-icon md-notifications" aria-hidden="true"></i>
                    <span class="site-menu-title">Pengajuan Absensi</span>
                </a>
          </li>
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                    <i class="site-menu-icon md-border-color" aria-hidden="true"></i>
                    <span class="site-menu-title">Penilaian Magang</span>
                </a>
          </li>
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                    <i class="site-menu-icon md-comment-alt-text" aria-hidden="true"></i>
                    <span class="site-menu-title">Job Deksripsi</span>
                </a>
          </li>
          <li class="site-menu-category">LAPORAN</li>
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                    <i class="site-menu-icon md-assignment" aria-hidden="true"></i>
                    <span class="site-menu-title">Laporan</span>
                            <span class="site-menu-arrow"></span>
                </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a class="animsition-link" href="<?= base_url('Peserta/Admin'); ?>">
                    <span class="site-menu-title">Jobdesk Magang</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?= base_url('Peserta/IndeksPenilaian'); ?>">
                    <span class="site-menu-title">Absensi Magang</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>   
      </div>
    </div>
  </div>
</div>