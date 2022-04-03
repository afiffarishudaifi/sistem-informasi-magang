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
            <form method="post" action="<?= base_url('Login/simpanPengajuan'); ?>" data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">

            	  <div class="form-group form-material floating" data-plugin="formMaterial">
                  <select name="input_siswa" id="input_siswa" class="form-control" required>
                      <?php foreach ($hasil as $value) { ?>
                        <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                      <?php } ?>
                    </select>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="datetime-local" class="form-control" id="input_mulai" name="input_mulai"
                      data-parsley-required="true" autocomplete="off" value="<?= date('Y-m-d') ?>T00:00" />
                    <label class="floating-label">Selesai Magang</label>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="datetime-local" class="form-control" id="input_selesai" name="input_selesai"
                      data-parsley-required="true" autocomplete="off" value="<?= date('Y-m-d') ?>T00:00" />
                    <label class="floating-label">Selesai Magang</label>
                </div>

		            <div class="form-group">
		                <label class="label"><b>File Pengantar</b></label>
		                <br>
		                  <input type="file" id="input_pengantar" data-parsley-required="true" class="dropify-event" name="input_pengantar" accept="application/pdf"
		                  />
		            </div>

		            <div class="form-group" data-plugin="formMaterial">
		                <label class="floating-label" style="text-align: left;"><b>File Pengajuan</b></label>
		                <br>
		                  <input type="file" id="input_proposal" data-parsley-required="true" class="dropify-event" name="input_proposal" accept="application/pdf"
		                  />
		            </div>

              <button type="submit" class="btn btn-primary btn-block btn-lg mt-40" id="simpan">Pengajuan</button>
            </form>
            <p>Sudah melakukan pengajuan ? <a href="<?= base_url('Login'); ?>">Klik </a>untuk login</p>
          </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
            <p>WEBSITE E-Magang</p>
            <p>© 2022. BAKESBANGPOLDAGRI.</p>
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
