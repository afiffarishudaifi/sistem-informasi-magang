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
                                <th>No</th>
                                <th>Peserta</th>
                                <th>Kedisiplinan</th>
                                <th>Tanggung Jawab</th>
                                <th>Kerja Sama</th>
                                <th>Kerajinan</th>
                                <th>Inisiatif</th>
                                <th>Jumlah</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Peserta</th>
                                <th>Kedisiplinan</th>
                                <th>Tanggung Jawab</th>
                                <th>Kerja Sama</th>
                                <th>Waktu Selesai</th>
                                <th>Inisiatif</th>
                                <th>Jumlah</th>
                                <th>Nilai</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nilai as $item) {
                            ?>
                                <tr>
                                    <td width="1%"><?= $no++; ?></td>
                                    <td><?= $item['nama_siswa']; ?></td>
                                    <td><?= $item['kedisiplinan']; ?></td>
                                    <td><?= $item['tanggung_jawab']; ?></td>
                                    <td><?= $item['kerja_sama']; ?></td>
                                    <td><?= $item['kerajinan']; ?></td>
                                    <td><?= $item['inisiatif']; ?></td>
                                    <td><?= $item['jumlah']; ?></td>
                                    <td><?= $item['rata_rata']; ?></td>
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
