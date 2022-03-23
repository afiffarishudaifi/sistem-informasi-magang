<?php
$session = session();
?>
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
            <!-- Modal Edit Class-->
		    <form action="<?php echo base_url('Sekolah/Pengaturan/update_admin'); ?>" method="post" id="form_edit"
		        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
		        <?= csrf_field(); ?>


            <input type="hidden" style="display: none;" name="id_sekolah" id="id_sekolah" style="display: none;">

            <div class="form-group form-material">
                <label class="form-control-label">Nama Sekolah</label>
                <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                    data-parsley-required="true" placeholder="Masukkan Nama Sekolah" autocomplete="off" />
            </div>

            <div class="form-group form-material">
                <label class="form-control-label">Alamat Sekolah</label>
                <textarea class="form-control" id="edit_alamat" name="edit_alamat" rows="2"></textarea>
            </div>

            <div class="form-group form-material">
                <label class="form-control-label">No Telepon</label>
                <input type="text" class="form-control" id="edit_no_telp" name="edit_no_telp"
                    data-parsley-required="true" placeholder="Masukkan No Telepon Sekolah"
                    autocomplete="off" />
            </div>

            <div class="form-group form-material">
                <label class="form-control-label">Password</label>
                <input type="password" class="form-control" id="edit_password" name="edit_password" placeholder="Masukkan Password Sekolah"
                    autocomplete="off" />
            </div>
            <div class="form-group form-material">
                <label class="form-control-label">Ulangi Password</label>
                <input type="Password" class="form-control" id="edit_password_konfirmasi"
                    name="edit_password_konfirmasi" placeholder="Ulangi Password Sekolah" autofocus="on"
                    data-parsley-equalto="#edit_password">
            </div>

            <input type="hidden" style="display: none;" value="<?= $session->get('id_login'); ?>" name="id_sekolah" id="id_sekolah">
            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
		    </form>
		    <!-- End Modal Edit Class-->
          </div>
        </div>
        <!-- End Panel Table Individual column searching -->

      </div>
    </div>
    <!-- End Page -->

    <!-- Footer -->
    <?= $this->include("Sekolah/layout/footer") ?>

    <?= $this->include("Sekolah/layout/js_tabel") ?>

    <script>
        function Hapus(id){
            $('.id').val(id);
            $('#deleteModal').modal('show');
        };

        $(function() {

        	$.getJSON('<?php echo base_url('Sekolah/Pengaturan/data_edit'); ?>' + '/' + <?= $session->get('id_login'); ?>, {},
            function(json) {
                $('#id_sekolah').val(json.id_sekolah);
                $('#edit_username').val(json.username_sekolah);
                $('#edit_nama').val(json.nama_sekolah);
                $('#edit_alamat').val(json.alamat_sekolah);
                $('#edit_no_telp').val(json.no_telp_sekolah);
            });


            $("#edit_username").keyup(function(){

                var username = $(this).val().trim();
          
                if(username != '' && username != $('#edit_username_lama').val()){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo base_url('Sekolah/Admin/cek_username'); ?>' + '/' + username,
                        success: function (data) {
                            if(data['results']>0){
                                $("#error_edit_username").html('Username telah dipakai,coba yang lain');
                                $("#edit_username").val('');
                            }else{
                                $("#error_edit_username").html('');
                            }
                        }, error: function () {
            
                            alert('error');
                        }
                    });
                }
            });

        })

        
    </script>

  </body>
</html>
