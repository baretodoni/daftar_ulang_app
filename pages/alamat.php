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
                    <h2>Data Daftar Ulang <small>PPDB</small></h2>
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
                      Lengkapi Data PPDB SMKN 1 Talaga Tahun Ajaran 2021/2022
                    </p>
                    
                    <?php
                      include "../config/koneksi.php";

                      $sql = mysqli_query($conn, "SELECT * FROM t_biodata LEFT JOIN t_user ON t_biodata.id_user = t_user.id_user WHERE t_biodata.id_user='".$_SESSION['id_user']."'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:alamat.php");
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                    
                    <form action="../action/action_ubahalamat.php" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="alamat" value="<?php echo $row['alamat'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan Nama Jalan Contoh : Jalan Sukanagara No 1" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rt">RT/RW<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="number" name="rt" value="<?php echo $row['rt'];?>"  required="required" class="form-control col-md-4 col-xs-6" placeholder="Masukan RT Contoh : 002">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="number" name="rw" value="<?php echo $row['rw'];?>"  required="required" class="form-control col-md-4 col-xs-6" placeholder="Masukan RW Contoh : 003">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dusun">Nama Dusun/Blok<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="dusun" value="<?php echo $row['dusun'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Dusun/Blok Contoh: Blok Rabu" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelurahan">Desa/Kelurahan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kelurahan" value="<?php echo $row['kelurahan'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Desa/Kelurahan Contoh: Cikijing" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kecamatan" value="<?php echo $row['kecamatan'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Kecamatan Contoh: Cikijing" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_pos">Kode POS<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="kode_pos" value="<?php echo $row['kode_pos'];?>" placeholder="Masukan Kode POS Contoh: 45466 "  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_tinggal">Tempat Tinggal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="tempat_tinggal" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Bersama Orang Tua</option>
                            <option value="2">Wali</option>
                            <option value="3">Kos</option>
                            <option value="4">Asrama</option>
                            <option value="5">Panti Asuhan</option>
                            <option value="6">Pesantren</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="moda_transportasi">Moda Transportasi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="moda_transportasi" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Jalan Kaki</option>
                            <option value="2">Kendaraan Pribadi</option>
                            <option value="3">Kendaraan Umum</option>
                          </select>
                        </div>
                      </div>
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
