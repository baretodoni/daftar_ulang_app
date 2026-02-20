<!DOCTYPE html>
<html>
<head>
    <?php
    include '../config/koneksi.php'; 
    session_start();
    if(isset($_SESSION['no_pendaftaran'])){

    }else{
      header("location:../index.php");

    }
    ?>
  <?php include('../template/head.php'); ?>
  <?php include('../template/link.php'); ?>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="siswa.php" class="site_title"><i class="fa fa-paw"></i> <span>DU & LB!</span></a>
            </div>

            <div class="clearfix"></div>

            <?php include('../template/sidebar.php'); ?>
            

            <br />
            
          </div>
        </div>
         <?php include('../template/topnav.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Daftar Ulang dan Lengkapi Berkas<small>PPDB</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <h1>Coming Soon</h1>

                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->
<?php include('../template/footer.php');?>
</body>
</html>
