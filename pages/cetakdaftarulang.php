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
                      Daftar Ulang PPDB SMKN 1 Talaga Tahun Ajaran 2021/2022
                    </p>
                    
                    <?php
                      include "../config/koneksi.php";

                      $sql = mysqli_query($conn, "SELECT * FROM t_user WHERE id_user='".$_SESSION['id_user']."'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:siswa.php");
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                      <form action="#" method="post" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="no_pendaftaran" value="<?php echo $row['no_pendaftaran'];?>" class="form-control col-md-7 col-xs-12" type="text" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">NISN<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nisn" value="<?php echo $row['nisn'];?>"  required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama" value="<?php echo $row['nama'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="asal_sekolah">Asal Sekolah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="asal_sekolah" value="<?php echo $row['asal_sekolah'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hasil_seleksi">Hasil Seleksi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="hasil_seleksi" value="<?php echo $row['hasil_seleksi'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="daftarulang">Pernyataan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          Anda <?php echo $row['nama'];?> Sudah melakukan Daftar Ulang untuk menjadi siswa SMKN 1 Talaga sesuai Hasil Seleksi PPDB tahun 2021. Silhakan pilih menu untuk Lengkapi Berkas
                        </div>
                      </div>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <?php
                              echo "
                              <a class='btn btn-primary btn-sm' href='filecetak.php?id_user=".$row['id_user']."' target='_blank'><i class= 'glyphicon glyphicon-print'></i> Cetak Bukti Daftar Ulang</a>
                              <a class='btn btn-success btn-sm' href='biodata.php'><i class= 'glyphicon glyphicon-book'></i> Lengkapi Berkas</a>
                              ";
                            ?>
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
