<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>E-Magang BAKESBANGPOLDAGRI</title>
    
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
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/pages/register-v3.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/vendor/toastr/toastr.min.css">
    
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition page-register-v3 layout-full">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle">
        <div class="panel">
          <div class="panel-body">
            <div class="brand">
              <h2 class="brand-text font-size-18">E-Magang</h2>
            </div>
            <form method="post" action="<?= base_url('Login/simpanSiswa'); ?>" data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_nama">
                    <input type="text" class="form-control" id="input_nama" name="input_nama"
                        data-parsley-required="true" autocomplete="off" autofocus="" />
                    <label class="floating-label">Nama Peserta Magang</label>
                </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_sekolah">
                  <select name="input_sekolah" id="input_sekolah" class="form-control">
                    <?php foreach ($sekolah as $value) { ?>
                      <option value="<?= $value['id_sekolah'] ?>"><?= $value['nama_sekolah'] ?></option>
                    <?php } ?>
                  </select>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_nis">
                  <input type="text" class="form-control" id="input_nis" name="input_nis"
                        data-parsley-required="true" autocomplete="off" />
                  <label class="floating-label">Nomor Induk</label>
                    <span class="text-danger" id="error_nis"></span>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_username">
                  <input type="text" class="form-control" id="input_username" name="input_username"
                        data-parsley-required="true" autocomplete="off" />
                  <label class="floating-label">Username Peserta Magang</label>
                    <span class="text-danger" id="error_username"></span>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_password">
                  <input type="Password" class="form-control" id="input_password" name="input_password"
                      data-parsley-required="true" autofocus="on">
                  <label class="floating-label">Password Peserta Magang</label>
              </div>
              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_konfirmasi_password">
                  <input type="Password" class="form-control" id="input_password_konfirmasi" name="input_password_konfirmasi"
                      data-parsley-required="true" autofocus="on" data-parsley-equalto="#input_password">
                  <label class="floating-label">Ulangi Password</label>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_email">
                  <input type="email" class="form-control" id="input_email" name="input_email"
                        data-parsley-required="true" autocomplete="off" />
                  <label class="floating-label">Email Peserta Magang</label>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_no_telp">
                  <input type="number" class="form-control" id="input_no_telp" name="input_no_telp"
                        data-parsley-required="true" autocomplete="off" />
                  <label class="floating-label">No Telp</label>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_alamat">
                  <textarea class="form-control" id="input_alamat" name="input_alamat" data-parsley-required="true" ></textarea>
                  <label class="floating-label">Alamat Peserta Magang</label>
              </div>

              <div class="form-group form-material floating" data-plugin="formMaterial" id="see_jurusan">
                  <input type="text" class="form-control" id="input_jurusan" name="input_jurusan"
                        data-parsley-required="true" autocomplete="off" />
                  <label class="floating-label">Jurusan/Program Studi</label>
              </div>

              <div class="form-group" id="see_foto">
                <label class="label"><b>Foto Peserta Magang</b></label>
                <br>
                  <input type="file" id="input_foto" class="dropify-event" data-parsley-required="true" name="input_foto" accept="image/png, image/gif, image/jpeg"
                  />
              </div>

              <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign up</button>
            </form>
            <p>Sudah melakukan registrasi ? <a href="<?= base_url('Login/pengajuanMagang'); ?>">Klik </a>untuk pengajuan magang</p>
          </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
          <p>WEBSITE BY Creation Studio</p>
          <p>© 2018. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
          </div>
        </footer>
      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/animsition/animsition.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/switchery/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/intro-js/intro.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/screenfull/screenfull.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/vendor/toastr/toastr.min.js"></script>
    
    <!-- Scripts -->
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Component.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Base.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Config.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Menubar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/GridMenu.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/Sidebar.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Section/PageAside.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Plugin/menu.js"></script>
    
    <script src="<?= base_url() ?>/docs/themeforest/global/js/config/colors.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/config/tour.js"></script>
    <script>Config.set('assets', '<?= base_url() ?>/docs/themeforest/base/assets');</script>
    
    <!-- Page -->
    <script src="<?= base_url() ?>/docs/themeforest/base/assets/js/Site.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/asscrollable.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/slidepanel.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/switchery.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/jquery-placeholder.js"></script>
    <script src="<?= base_url() ?>/docs/themeforest/global/js/Plugin/material.js"></script>
    <script src="<?= base_url() ?>/docs/tambahan/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
    
    <script>
      (function(document, window, $){
        'use strict';

        $("#input_username").keyup(function(){

            var username = $(this).val().trim();
      
            if(username != ''){
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Peserta/cek_username'); ?>' + '/' + username,
                    success: function (data) {
                        if(data['results']>0){
                            $("#error_username").html('Username telah dipakai,coba yang lain');
                            $("#input_username").val('');
                        }else{
                            $("#error_username").html('');
                        }
                    }, error: function () {
        
                        alert('error');
                    }
                });
            }
      
          });
        $("#edit_username").keyup(function(){

            var username = $(this).val().trim();
      
            if(username != '' && username != $('#edit_username_lama').val()){
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Peserta/cek_username'); ?>' + '/' + username,
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

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
          if ('<?= $session->getFlashdata('sukses'); ?>' != '') {
  	          toastr.success('<?= $session->getFlashdata('sukses'); ?>')
  	      }
        });
      })(document, window, jQuery);
    </script>
    
  </body>
</html>
