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
                <th>Nilai Awal</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nilai Awal</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $no = 1;
              foreach ($indeks as $item) {
              ?>
                <tr>
                  <td width="1%"><?= $no++; ?></td>
                  <td><?= $item['angka_awal']; ?></td>
                  <td><?= $item['angka_akhir']; ?></td>
                  <td><?= $item['keterangan']; ?></td>
                  <td>
                    <center>
                      <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal" name="btn-edit" onclick="detail_edit(<?= $item['id_indeks']; ?>)" class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                      <a href="" class="btn btn-sm btn-delete btn-danger" onclick="Hapus(<?= $item['id_indeks']; ?>)" data-toggle="modal" data-target="#deleteModal" data-id="<?= $item['id_indeks']; ?>">Hapus</a>
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
  <form action="<?php echo base_url('Admin/IndeksPenilaian/add_indeks'); ?>" method="post" id="form_add" data-parsley-validate="true" autocomplete="off">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <?= csrf_field(); ?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Indeks Penilaian</h5>
            <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group form-material">
              <label class="form-control-label">Angka Nilai Awal</label>
              <input type="number" class="form-control" id="input_angka_awal" name="input_angka_awal" data-parsley-required="true" placeholder="Masukkan Angka Nilai Awal" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Angka Nilai Akhir</label>
              <input type="number" class="form-control" id="input_angka_akhir" name="input_angka_akhir" data-parsley-required="true" placeholder="Masukkan Angka Nilai Akhir" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Keterangan</label>
              <textarea class="form-control" id="input_keterangan" name="input_keterangan" rows="2"></textarea>
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
  <form action="<?php echo base_url('Admin/IndeksPenilaian/update_indeks'); ?>" method="post" id="form_edit" data-parsley-validate="true" autocomplete="off">
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <?= csrf_field(); ?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Indeks Penilaian</h5>
            <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_indeks" id="id_indeks">

            <div class="form-group form-material">
              <label class="form-control-label">Angka Nilai Awal</label>
              <input type="number" class="form-control" id="edit_angka_awal" name="edit_angka_awal" data-parsley-required="true" placeholder="Masukkan Angka Nilai Awal" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Angka Nilai Akhir</label>
              <input type="number" class="form-control" id="edit_angka_akhir" name="edit_angka_akhir" data-parsley-required="true" placeholder="Masukkan Angka Nilai Akhir" autocomplete="off" />
            </div>

            <div class="form-group form-material">
              <label class="form-control-label">Keterangan</label>
              <textarea class="form-control" id="edit_keterangan" name="edit_keterangan" rows="2"></textarea>
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
  <form action="<?php echo base_url('Admin/IndeksPenilaian/delete_indeks'); ?>" method="post">
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

            <h4>Apakah Ingin menghapus indeks penilaian ini?</h4>

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
        $("#input_angka_awal").val('');
        $("#input_angka_akhir").val('');
        $("#input_keterangan").val('');
      });

      $('#batal_add').on('click', function() {
        $('#form_add')[0].reset();
        $("#input_angka_awal").val('');
        $("#input_angka_akhir").val('');
        $("#input_keterangan").val('');
      });

      $('#batal_up').on('click', function() {
        $('#form_edit')[0].reset();
        $("#edit_angka_awal").val('');
        $("#edit_angka_akhir").val('');
        $("#edit_keterangan").val('');
      });
    })

    function detail_edit(isi) {
      $.getJSON('<?php echo base_url('Admin/IndeksPenilaian/data_edit'); ?>' + '/' + isi, {},
        function(json) {
          $('#id_indeks').val(json.id_indeks);
          $('#edit_angka_awal').val(json.angka_awal);
          $('#edit_angka_akhir').val(json.angka_akhir);
          $('#edit_keterangan').val(json.keterangan);
        });
    }
  </script>

</body>

</html>