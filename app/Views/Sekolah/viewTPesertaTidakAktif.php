<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?= $this->include("Sekolah/layout/head_tabel"); ?>

<body class="animsition">

    <?= $this->include("Sekolah/layout/nav") ?>

    <?= $this->include("Sekolah/layout/sidebar") ?>

    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title"><?= $judul; ?></h1>
            <div class="page-header-actions">
            </div>
        </div>

        <div class="page-content">

            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Sekolah</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Alamat Siswa</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Sekolah</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Alamat Siswa</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                    $no = 1;
                    foreach ($siswa as $item) {
                    ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_siswa']; ?></td>
                                <td><?= $item['nama_sekolah']; ?></td>
                                <td><?= $item['status']; ?></td>
                                <td><?= $item['alamat_siswa']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->
        </div>
    </div>
    <!-- End Page -->

    <!-- Footer -->
    <?= $this->include("Sekolah/layout/footer") ?>

    <?= $this->include("Sekolah/layout/js_tabel") ?>

</body>

</html>
