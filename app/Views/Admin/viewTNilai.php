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
                <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#addModal"><i
                        class="fa fa-plus"></i> Tambah Data</button>
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
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Kate</td>
                                <td>5516 Adolfo Rode</td>
                                <td>Littelhaven</td>
                                <td>26</td>
                                <td>2014/06/13</td>
                                <td>$635,852</td>
                            </tr>
                            <tr>
                                <td>Chester</td>
                                <td>14095 Kling Gateway</td>
                                <td>Andresmouth</td>
                                <td>21</td>
                                <td>2014/09/27</td>
                                <td>$177,404</td>
                            </tr>
                            <tr>
                                <td>Melany</td>
                                <td>1100 Steve Pines</td>
                                <td>Immanuelfort</td>
                                <td>12</td>
                                <td>2014/06/28</td>
                                <td>$162,453</td>
                            </tr>
                            <tr>
                                <td>Thea</td>
                                <td>26114 Narciso Lodge</td>
                                <td>East Opal</td>
                                <td>64</td>
                                <td>2014/11/12</td>
                                <td>$581,736</td>
                            </tr>
                            <tr>
                                <td>Kreiger</td>
                                <td>111 Hershel Stream</td>
                                <td>Hermannborough</td>
                                <td>36</td>
                                <td>2013/11/27</td>
                                <td>$921,021</td>
                            </tr>
                            <tr>
                                <td>Simonis</td>
                                <td>0778 Elvis Spurs</td>
                                <td>Harrisfurt</td>
                                <td>62</td>
                                <td>2013/05/28</td>
                                <td>$336,046</td>
                            </tr>
                            <tr>
                                <td>Afton</td>
                                <td>57724 Ernser Crossroad</td>
                                <td>Lake Charity</td>
                                <td>30</td>
                                <td>2017/04/28</td>
                                <td>$597,775</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->

        </div>
    </div>
    <!-- End Page -->

    <!-- Start Modal Add Class-->
    <form action="<?php echo base_url('Admin/Nilai/add_nilai'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Nilai </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Nilai</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Nilai" autocomplete="off" />
                            <span class="text-danger" id="error_nama"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="batal_add"
                            data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Add Class-->

    <!-- Modal Edit Class-->
    <form action="<?php echo base_url('Admin/Nilai/update_nilai'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Nilai </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_nilai" id="id_nilai">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Nilai</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Nilai" autocomplete="off" />
                            <span class="text-danger" id="error_edit_nama"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="batal_up" data-dismiss="modal">Batal</button>
                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Edit Class-->

    <!-- Start Modal Delete Class -->
    <form action="<?php echo base_url('Admin/Nilai/delete_nilai'); ?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Apakah Ingin menghapus nilai ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete Class -->


    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>

    <script>
    function Hapus(id) {
        $('.id').val(id);
        $('#deleteModal').modal('show');
    };
    </script>

    <?= $this->include("Admin/layout/js_tabel") ?>
</body>

</html>