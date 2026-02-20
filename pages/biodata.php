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
                    <h2>Lengkapi Data <small>PPDB</small></h2>
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

                      $sql = mysqli_query($conn, "SELECT * FROM t_biodata LEFT JOIN t_user ON t_biodata.id_user = t_user.id_user WHERE t_biodata.id_user='".$_SESSION['id_user']."'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:biodata.php");
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                    
                    <form action="../action/action_ubahbiodata.php" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="no_pendaftaran" value="<?php echo $row['no_pendaftaran'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan Nomor Pendaftaran" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">NISN<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nisn" value="<?php echo $row['nisn'];?>" placeholder="Masukan NISN Contoh : 0002123123" required="required" class="form-control col-md-7 col-xs-12" disabled="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama" value="<?php echo $row['nama'];?>" placeholder="Masukan Nama Lengkap Contoh : Asep Doni Pradana"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="asal_sekolah">Asal Sekolah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="asal_sekolah" value="<?php echo $row['asal_sekolah'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Mauskan Asal Sekolah" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div name="jenis_kelamin" class="btn-group" data-toggle="buttons">
                          	<?php
                          		if($row['jenis_kelamin']=="L"){
                          	?>
                            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
                            </label>
                            <?php
                            	}else{
                            ?>
                            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                            </label>
                            <?php
                            	}
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="nik" value="<?php echo $row['nik'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan NIK Contoh : 3210031212120001" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Kab/Kota Contoh : Majalengka" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Tanggal Lahir Tgl/Bln/Thn" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_akta_lahir">Nomor Akta Kelahiran<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_akta_lahir" value="<?php echo $row['no_akta_lahir'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nomor Registrasi Akta di Akta Kelahiran">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="agama" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kewarganegaraan">Kewarganegaraan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kewarganegaraan" value="<?php echo $row['kewarganegaraan'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Kewarganegaraan" disabled>
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berkebutuhan_khusus">Berkebutuhan Khusus<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <select id="heard" name="berkebutuhan_khusus" class="form-control">
	                            <option value="">Pilih..</option>
	                            <option value="Tidak">Tidak</option>
	                            <option value="Ya">Ya</option>
	                          </select>
                        </div>
                      </div>-->
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
