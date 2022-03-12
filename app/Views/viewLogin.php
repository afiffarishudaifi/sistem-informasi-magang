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
    <link rel="stylesheet" href="<?= base_url() ?>/docs/themeforest/base/assets/examples/css/pages/login-v2.css">
    
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
  <body class="animsition page-login-v2 layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content">
        <div class="page-brand-info">
          <div class="brand">
            <img class="brand-img" src="<?= base_url() ?>/docs/themeforest/base/assets/images/logo@2x.png" alt="...">
            <h2 class="brand-text font-size-40">Remark</h2>
          </div>
          <p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <div class="page-login-main">
          <div class="brand hidden-md-up">
            <img class="brand-img" src="<?= base_url() ?>/docs/themeforest/base/assets/images/logo-colored@2x.png" alt="...">
            <h3 class="brand-text font-size-40">Remark</h3>
          </div>
          <h3 class="font-size-24">E-Magang</h3>
          <p>Login untuk dapat akses ke sistem.</p>

          <form method="POST" action="<?= base_url('Login/loginSistem'); ?>" autocomplete="off">
            <div class="form-group form-material floating" data-plugin="formMaterial">
                <input type="text" class="form-control" id="username" name="username"
                      data-parsley-required="true" autocomplete="off" autofocus="" />
                <label class="floating-label">Username</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
                <input type="password" class="form-control" id="password" name="password"
                      data-parsley-required="true" autocomplete="off" />
                <label class="floating-label">Password</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
                <div class="col-xs-12">
                    <div id="html_element" data-callback="loginPassed"></div>
                </div>
            </div>
  	        <!-- <div class="form-group form-material floating">
  	            <select name="status" required="" class="form-control" id="status">
  	                <option value="Siswa" selected="">Peserta</option>
  	                <option value="Sekolah">Sekolah</option>
  	            </select>
  	        </div> -->
            <button type="submit" class="btn btn-primary btn-block" id="btnLogin" disabled>Sign in</button>
          </form>

          <p>Pengajuan peserta magang baru? <a href="<?= base_url('Login/registrasiSiswa'); ?>">Klik</a> untuk melakukan pengajuan</p>

          <footer class="page-copyright">
            <p>WEBSITE BY Creation Studio</p>
            <p>© 2018. All RIGHT RESERVED.</p>
          </footer>
        </div>

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
    <script>Config.set('assets', '<?= base_url() ?>/docs/themeforest/base/ssets');</script>
    
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
  	      if ('<?= $session->getFlashdata('msg'); ?>' != '') {
  	          toastr.error('<?= $session->getFlashdata('msg'); ?>')
  	      }
        });
      })(document, window, jQuery);
    </script>

    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
    
    var onloadCallback = function() {
        if (document.getElementById('reChaptcha-login') != null) {
            grecaptcha.render('reChaptcha-login', {
                'sitekey' : '6Le9lroeAAAAAGg2f6cSScCf0Rk11P7_zXeaDJCj'
            });
        }

        grecaptcha.render('html_element', {
            'sitekey' : '6Le9lroeAAAAAGg2f6cSScCf0Rk11P7_zXeaDJCj',
        });
    };
    
    function loginPassed() {
        document.getElementById('btnLogin').disabled = false;
    }
    </script>
    
  </body>
</html>
