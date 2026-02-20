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
                      Daftar Ulang dan Lengkapi Berkas PPDB SMKN 1 Talaga Tahun Ajaran 2021/2022
                    </p>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Apakah Anda Sudah Melakukan Daftar Ulang?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div name="pernyataan" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="pernyataan" value="0"> &nbsp; Belum &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="pernyataan" value="1"> &nbsp; Sudah &nbsp;
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->
<?php include('../template/footer.php');?>
</body>
</html>
