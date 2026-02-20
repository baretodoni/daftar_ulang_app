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
                        header("Location:kartu.php");
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                    
                    <form action="../action/action_ubahkartu.php" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kartu Keluarga Sejahtera (KKS) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="no_kks" value="<?php echo $row['no_kks'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan Nomor Kartu KKS">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anak_ke">Anak Ke - <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="number" name="anak_ke" value="<?php echo $row['anak_ke'];?>"  required="required" class="form-control col-md-4 col-xs-6" placeholder="Masukan Angka Anak Ke Berapa">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah_saudara">Jumlah Saudara<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="jumlah_saudara" value="<?php echo $row['jumlah_saudara'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Angka Jumlah Saudara" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kps_pkh">Nomor KPS/PKH<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_kps_pkh" value="<?php echo $row['no_kps_pkh'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nomor KPS/PKH">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="layak_pip">Layak PIP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="layak_pip" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="layak_pip">Penerima KIP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="penerima_kip" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kip">Nomor Kartu Indonesia Pintar (KIP)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_kip" value="<?php echo $row['no_kip'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nomor KIP">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kip">Nama Tertera di KIP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_kip" value="<?php echo $row['nama_kip'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Tertera di KIP">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alasan_pip">Alasan PIP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="alasan_pip" value="<?php echo $row['alasan_pip'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank">Bank<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="bank" value="<?php echo $row['bank'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_rekening">Nomor Rekening<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="no_rekening" value="<?php echo $row['no_rekening'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_rekening">Nama Rekening<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_rekening" value="<?php echo $row['nama_rekening'];?>"  class="form-control col-md-7 col-xs-12" disabled>
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
