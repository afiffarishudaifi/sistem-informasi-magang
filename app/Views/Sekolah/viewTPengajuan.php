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
                                <th>Nama Peserta</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Pengantar</th>
                                <th>Proposal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Pengantar</th>
                                <th>Proposal</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengajuan as $item) {
                            ?>
                                <tr>
                                    <td width="1%"><?= $no++; ?></td>
                                    <td><?= $item['nama_siswa']; ?></td>
                                    <td><?= $item['waktu_mulai']; ?></td>
                                    <td><?= $item['waktu_selesai']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#pengantarModal" data-whatever="<?= $item['pengantar']; ?>" name="btn-detail">
                                            Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $item['proposal']; ?>" name="btn-detail">
                                            Lihat
                                        </a>
                                    </td>
                                    <td><?= $item['status_pengajuan']; ?></td>
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

    <!-- Modal Proposal-->
    <div class="modal fade example-modal-lg" aria-hidden="true" id="exampleModal" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleOptionalLarge">Proposal Pengajuan Magang</h4>
                </div>
                <div class="modal-body">
                    <iframe class="pdf" src="" width="100%" height="400"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Pengantar-->
    <div class="modal fade example-modal-lg" aria-hidden="true" id="pengantarModal" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleOptionalLarge">Surat Pengantar Pengajuan Magang</h4>
                </div>
                <div class="modal-body">
                    <iframe class="pdf" src="" width="100%" height="400"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Footer -->
    <?= $this->include("Sekolah/layout/footer") ?>
    <?= $this->include("Sekolah/layout/js_tabel") ?>

    <script>

        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
            modal.find('.pdf').attr('src', '<?= base_url() ?>' + recipient)
        })

        $('#pengantarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
            modal.find('.pdf').attr('src', '<?= base_url() ?>' + recipient)
        })
    </script>


</body>

</html>
