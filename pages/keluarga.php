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

                      $sql = mysqli_query($conn, "SELECT * FROM t_keluarga LEFT JOIN t_user ON t_keluarga.id_user = t_user.id_user WHERE t_keluarga.id_user='".$_SESSION['id_user']."'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:keluarga.php");

                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                    
                    <form action="../action/action_ubahkeluarga.php" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ayah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nama_ayah" value="<?php echo $row['nama_ayah'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan nama Lengkap Ayah Contoh : Asep Doni Pradana" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik_ayah">NIK Ayah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="nik_ayah" value="<?php echo $row['nik_ayah'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan NIK Ayah Contoh :3210031212120002" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_lahir_ayah">Tahun Lahir Ayah <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <input type="number" name="tahun_lahir_ayah" value="<?php echo $row['tahun_lahir_ayah'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Tahun Lahir Contoh : 1980">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan_ayah">Pendidikan Ayah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pendidikan_ayah" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Sekolah</option>
                            <option value="2">Putus SD</option>
                            <option value="3">SD</option>
                            <option value="4">SMP</option>
                            <option value="5">SMA</option>
                            <option value="6">D1</option>
                            <option value="7">D2</option>
                            <option value="8">D3</option>
                            <option value="9">DIV/S1</option>
                            <option value="10">S2</option>
                            <option value="11">S3</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan_ayah">Pekerjaan Ayah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pekerjaan_ayah" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Bekerja</option>
                            <option value="2">Nelayan</option>
                            <option value="3">Petani</option>
                            <option value="4">Peternak</option>
                            <option value="5">PNS/TNI/POLRI</option>
                            <option value="6">Karyawan Swasta</option>
                            <option value="7">Pedagang Kecil</option>
                            <option value="8">Pedagang Besar</option>
                            <option value="9">Wiraswasta</option>
                            <option value="10">Wirausaha</option>
                            <option value="11">Buruh</option>
                            <option value="12">Pensiunan</option>
                            <option value="13">Meninggal Dunia</option>
                            <option value="99">Lain-Lain</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_ayah">Penghasilan Ayah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="penghasilan_ayah" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="<500.000"><500.000</option>
                            <option value="500.000 - 999.999">500.000 - 999.999</option>
                            <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                            <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                            <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                            <option value=">20 Juta">>20 Juta</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berkebutuhan_khusus_ayah">Berkebutuhan Khusus Ayah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="berkebutuhan_khusus_ayah" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nama_ibu" value="<?php echo $row['nama_ibu'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan nama Lengkap Ibu Contoh : Puji Siti Nurpatmah" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik_ibu">NIK Ibu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="nik_ibu" value="<?php echo $row['nik_ibu'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan NIK Ibu Contoh : 3210031212120002" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_lahir_ibu">Tahun Lahir Ibu <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="number" name="tahun_lahir_ibu" value="<?php echo $row['tahun_lahir_ibu'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan tahun Lahir Contoh : 1980">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan_ibu">Pendidikan Ibu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pendidikan_ibu" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Sekolah</option>
                            <option value="2">Putus SD</option>
                            <option value="3">SD</option>
                            <option value="4">SMP</option>
                            <option value="5">SMA</option>
                            <option value="6">D1</option>
                            <option value="7">D2</option>
                            <option value="8">D3</option>
                            <option value="9">DIV/S1</option>
                            <option value="10">S2</option>
                            <option value="11">S3</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan_ibu">Pekerjaan Ibu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pekerjaan_ibu" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Bekerja</option>
                            <option value="2">Nelayan</option>
                            <option value="3">Petani</option>
                            <option value="4">Peternak</option>
                            <option value="5">PNS/TNI/POLRI</option>
                            <option value="6">Karyawan Swasta</option>
                            <option value="7">Pedagang Kecil</option>
                            <option value="8">Pedagang Besar</option>
                            <option value="9">Wiraswasta</option>
                            <option value="10">Wirausaha</option>
                            <option value="11">Buruh</option>
                            <option value="12">Pensiunan</option>
                            <option value="13">Meninggal Dunia</option>
                            <option value="99">Lain-Lain</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_ibu">Penghasilan Ibu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="penghasilan_ibu" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="<500.000"><500.000</option>
                            <option value="500.000 - 999.999">500.000 - 999.999</option>
                            <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                            <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                            <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                            <option value=">20 Juta">>20 Juta</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berkebutuhan_khusus_ibu">Berkebutuhan Khusus Ibu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="berkebutuhan_khusus_ibu" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Wali <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nama_wali" value="<?php echo $row['nama_wali'];?>" class="form-control col-md-7 col-xs-12" type="text" placeholder="Masukan nama Lengkap Wali Contoh : Sierra Berlliana">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik_ayah">NIK Wali<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="nik_wali" value="<?php echo $row['nik_wali'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan NIK Wali Contoh : 3210030303030001">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_lahir_ayah">Tahun Lahir Wali <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="number" name="tahun_lahir_wali" value="<?php echo $row['tahun_lahir_wali'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Tahun Lahir Contoh: 1980">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan_wali">Pendidikan Wali<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pendidikan_wali" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Sekolah</option>
                            <option value="2">Putus SD</option>
                            <option value="3">SD</option>
                            <option value="4">SMP</option>
                            <option value="5">SMA</option>
                            <option value="6">D1</option>
                            <option value="7">D2</option>
                            <option value="8">D3</option>
                            <option value="9">DIV/S1</option>
                            <option value="10">S2</option>
                            <option value="11">S3</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pekerjaan_wali">Pekerjaan Wali<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="pekerjaan_wali" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="1">Tidak Bekerja</option>
                            <option value="2">Nelayan</option>
                            <option value="3">Petani</option>
                            <option value="4">Peternak</option>
                            <option value="5">PNS/TNI/POLRI</option>
                            <option value="6">Karyawan Swasta</option>
                            <option value="7">Pedagang Kecil</option>
                            <option value="8">Pedagang Besar</option>
                            <option value="9">Wiraswasta</option>
                            <option value="10">Wirausaha</option>
                            <option value="11">Buruh</option>
                            <option value="12">Pensiunan</option>
                            <option value="13">Meninggal Dunia</option>
                            <option value="99">Lain-Lain</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_wali">Penghasilan Wali<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="penghasilan_wali" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="<500.000"><500.000</option>
                            <option value="500.000 - 999.999">500.000 - 999.999</option>
                            <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                            <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                            <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                            <option value=">20 Juta">>20 Juta</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telepon_rumah">Nomor Telepon Rumah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="number" name="telepon_rumah" value="<?php echo $row['telepon_rumah'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Nomor Telepon Contoh 0233319238">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_hp">Nomor Handphone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="number" name="no_hp" value="<?php echo $row['no_hp'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Nomor Handphone Contoh 085324020100" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control col-md-4 col-xs-6" placeholder="Mauskan Email Contoh : siasdon@gmail.com">
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
