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
              <a href="dashboard.php" class="site_title"><i class="fa fa-paw"></i> <span>PKL!</span></a>
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
                    <h2>Data Siswa <small>Tambahan</small></h2>
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
                      Data Siswa Tambahan.
                    </p>
                    
                     <?php
                      include "../config/koneksi.php";

                      $id_user = $_GET['id_user'];
                      $sql = mysqli_query($conn, "SELECT * FROM t_user WHERE id_user='$id_user'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:tambahlagi.php");
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    <form action="../action/action_tambahlagi.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="id_user" value="<?php echo $row['id_user'];?>" required="required" class="form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_pendaftaran">Nomor Pendaftaran<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_pendaftaran" value="<?php echo $row['no_pendaftaran'];?>" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div name="jenis_kelamin" class="btn-group" data-toggle="buttons">
                        
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
                            </label>
                            
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jurusan">Kompetensi Keahlian<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<select id="heard" name="jurusan" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="TKJ">TKJ</option>
                            <option value="RPL">RPL</option>
                            <option value="AKL">AKL</option>
                            <option value="BDP">BDP</option>
                            <option value="TKRO">TKRO</option>
                            <option value="TBSM">TBSM</option>
                          </select>-->
                          <div name="jurusan" class="btn-group" data-toggle="buttons">
                        
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="TKJ"> TKJ
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="RPL"> RPL
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="AKL"> AKL
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="BDP"> BDP
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="TKRO"> TKRO
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jurusan" value="TBSM"> TBSM
                            </label>
                          </div>
                        </div>
                      </div>

                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_masuk">Tangal Masuk<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tanggal_masuk" value="2021-07-19" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div-->
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>


                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->
<?php include('../template/footer.php');?>
</body>
</html>
