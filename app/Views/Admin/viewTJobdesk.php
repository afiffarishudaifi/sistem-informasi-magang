<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>E-Magang BANKESBANPOL</title>

  <link rel="apple-touch-icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/tables/datatable.css">


  <!-- Fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/font-awesome/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/material-design/material-design.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/forms/layouts.css">

  <!-- Scripts -->
  <script src="<?= base_url() ?>/docs/themeforest/global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="animsition">

  <?= $this->include("Admin/layout/nav") ?>

  <?= $this->include("Admin/layout/sidebar") ?>

  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title"><?= $judul; ?></h1>
      <div class="page-header-actions">
        <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah Data</button>
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
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $no = 1;
              foreach ($jobdesk as $item) {
              ?>
                <tr>
                  <td width="1%"><?= $no++; ?></td>
                  <td><?= $item['nama_siswa']; ?></td>
                  <td><?= $item['nama_jobdesk']; ?></td>
                  <td><?= $item['deskripsi']; ?></td>
                  <td><?= $item['waktu_mulai']; ?> - <?= $item['waktu_selesai']; ?></td>
                  <td><?= $item['status_jobdesk']; ?></td>
                  <td>
                    <center>
                      <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal" name="btn-edit" onclick="detail_edit(<?= $item['id_jobdesk']; ?>)" class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                      <a href="" class="btn btn-sm btn-delete btn-danger" onclick="Hapus(<?= $item['id_jobdesk']; ?>)" data-toggle="modal" data-target="#deleteModal" data-id="<?= $item['id_jobdesk']; ?>">Hapus</a>
                    </center>
                  </td>
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

  <!-- Start Modal Add Class-->
  <form action="<?php echo base_url('Admin/Jobdesk/add_jobdesk'); ?>" method="post" id="form_add" data-parsley-validate="true" autocomplete="off">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <?= csrf_field(); ?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Jobdesk </h5>
            <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group form-material">
              <label class="form-control-label">Nama Siswa</label>
              <select name="input_siswa" id="input_siswa" class="form-control">
                <?php foreach ($siswa as $value) { ?>
                  <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Judul Jobdesk</label>
              <input type="text" class="form-control" id="input_nama" name="input_nama" data-parsley-required="true" placeholder="Masukkan Nama Jobdesk" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Deskripsi</label>
              <textarea class="form-control" id="input_deskripsi" name="input_deskripsi" rows="2"></textarea>
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Waktu Mulai</label>
              <input type="datetime-local" value="<?= date('Y-m-d') ?>T00:00" class="form-control" id="input_waktu_mulai" name="input_waktu_mulai" data-parsley-required="true" placeholder="Masukkan Waktu Mulai" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Waktu Selesai</label>
              <input type="datetime-local" value="<?= date('Y-m-d') ?>T00:00" class="form-control" id="input_waktu_selesai" name="input_waktu_selesai" data-parsley-required="true" placeholder="Masukkan Waktu Selesai" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Status Jobdesk</label>
              <select name="input_status" class="form-control" id="input_status">
                <option value="Selesai" selected="">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" id="batal_add" data-dismiss="modal">Batal</button>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Modal Add Class-->

  <!-- Modal Edit Class-->
  <form action="<?php echo base_url('Admin/Jobdesk/update_jobdesk'); ?>" method="post" id="form_edit" data-parsley-validate="true" autocomplete="off">
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <?= csrf_field(); ?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Jobdesk </h5>
            <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_jobdesk" id="id_jobdesk">

            <div class="form-group form-material">
              <label class="form-control-label">Nama Siswa</label>
              <select name="edit_siswa" id="edit_siswa" class="form-control">
                <?php foreach ($siswa as $value) { ?>
                  <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Nama Jobdesk</label>
              <input type="text" class="form-control" id="edit_nama" name="edit_nama" data-parsley-required="true" placeholder="Masukkan Nama Jobdesk" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Deskripsi</label>
              <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="2"></textarea>
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Waktu Mulai</label>
              <input type="datetime-local" value="<?= date('d/m/Y') ?>T00:00" class="form-control" id="edit_waktu_mulai" name="edit_waktu_mulai" data-parsley-required="true" placeholder="Masukkan Waktu Mulai" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Waktu Selesai</label>
              <input type="datetime-local" value="<?= date('d/m/Y') ?>T00:00" class="form-control" id="edit_waktu_selesai" name="edit_waktu_selesai" data-parsley-required="true" placeholder="Masukkan Waktu Selesai" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Status Jobdesk</label>
              <select name="edit_status" class="form-control" id="edit_status">
                <option value="Selesai" selected="">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
              </select>
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
  <form action="<?php echo base_url('Admin/Jobdesk/delete_jobdesk'); ?>" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <h4>Apakah Ingin menghapus job deskripsi ini?</h4>

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
  <?= $this->include("Admin/layout/js_tabel") ?>

  <script>
    function Hapus(id) {
      $('.id').val(id);
      $('#deleteModal').modal('show');
    };

    $(function() {
      $('#batal').on('click', function() {
        $('#form_add')[0].reset();
        $('#form_edit')[0].reset();
        $("#input_siswa").val('');
        $("#input_nama").val('');
        $("#input_deskripsi").val('');
        $("#input_waktu_mulai").val('');
        $("#input_waktu_selesai").val('');
        $("#input_status").val('');
      });

      $('#batal_add').on('click', function() {
        $('#form_add')[0].reset();
        $("#input_siswa").val('');
        $("#input_nama").val('');
        $("#input_deskripsi").val('');
        $("#input_waktu_mulai").val('');
        $("#input_waktu_selesai").val('');
        $("#input_status").val('');
      });

      $('#batal_up').on('click', function() {
        $('#form_edit')[0].reset();
        $("#edit_siswa").val('');
        $("#edit_nama").val('');
        $("#edit_deskripsi").val('');
        $("#edit_waktu_mulai").val('');
        $("#edit_waktu_selesai").val('');
        $("#edit_status").val('');
      });
    })

    function detail_edit(isi) {
      $.getJSON('<?php echo base_url('Admin/Jobdesk/data_edit'); ?>' + '/' + isi, {},
        function(json) {
          $('#id_jobdesk').val(json.id_jobdesk);
          $('edit_nama').val(json.nama_jobdesk)
          $('#edit_deskripsi').val(json.deskripsi);
          $('#edit_waktu_mulai').val(json.waktu_mulai);
          $('#edit_waktu_selesai').val(json.waktu_selesai);
          $('#edit_status').val(json.status_jobdesk);

          $('#edit_siswa').append('<option selected value="' + json.id_siswa + '">' + json.nama_siswa +
            '</option>');
          $('#edit_siswa').select2('data', {
            id: json.id_siswa,
            text: json.nama_siswa
          });
          $('#edit_siswa').trigger('change');
        });
    }
  </script>


</body>

</html>