<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?= $this->include("Admin/layout/head_tabel"); ?>

<body class="animsition">

    <?= $this->include("Admin/layout/nav") ?>

    <?= $this->include("Admin/layout/sidebar") ?>

    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title"><?= $judul; ?></h1>
            <div class="page-header-actions">
                <!-- <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" -->
                <!-- data-target="#addModal"><i class="fa fa-plus"></i> Tambah Data</button> -->
            </div>
        </div>

        <div class="page-content">

            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>

                <div class="panel-body">
                	<form method="POST">
                		<div class="row">
                			<div class="col-md-4">
                				<div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="tanggal" name="tanggal">
                                </div>
                			</div>
                		</div>
                	</form>
                	<div class="row" style="padding-top: 10px;padding-bottom: 10px;">
                		<div class="col-md-2">
                			<button class="btn btn-sm btn-success"><span class="fa fa-print"></span> Cetak</button>
                		</div>
                	</div>
                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch table">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Siswa</th>
                                <th style="text-align: center;">Alamat Siswa</th>
                                <th style="text-align: center;">Jurusan</th>
                                <th style="text-align: center;">Asal sekolah</th>
                                <th style="text-align: center;">Mulai Magang</th>
                                <th style="text-align: center;">Selesai Magang</th>
                                <th style="text-align: center;">Status Magang</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->

        </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>

    <?= $this->include("Admin/layout/js_tabel") ?>

    <script>
    	$('#tanggal').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        $(function() {            
            /* Isi Table */
            $('.table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "ajax": {
                    "url": "<?= base_url() ?>/Admin/LaporanPeserta/data/" + $('#tanggal').val(),
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "nama_siswa"
                    },
                    {
                        "data": "alamat_siswa"
                    },
                    {
                        "data": "jurusan"
                    },
                    {
                        "data": "nama_sekolah"
                    },
                    {
                        "data": "waktu_mulai"
                    },
                    {
                        "data": "waktu_selesai"
                    },
                    {
                        "data": "status"
                    }
                ],
                dom: 'Bfrtip'
            });
            /* Isi Table */
        });

        $('#tanggal').on('apply.daterangepicker', function(ev, picker) {
            var tanggal = picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY');
            $('.table').DataTable().ajax.url('<?= base_url() ?>/Admin/LaporanPeserta/data/' + tanggal).load();
        });
    </script>

</body>

</html>