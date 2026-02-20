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

                      $sql = mysqli_query($conn, "SELECT * FROM t_periodik LEFT JOIN t_user ON t_periodik.id_user = t_user.id_user WHERE t_periodik.id_user='".$_SESSION['id_user']."'");
                      if(mysqli_num_rows($sql) == 0){
                        header("Location:periodik.php");
                        //echo "Tidak ada Data";
                      }else{
                        $row = mysqli_fetch_assoc($sql);
                      }
                      
                      ?>
                    
                    
                    <form action="../action/action_ubahperiodik.php" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rencana Ekstrakurikuler <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" name="ekstra" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="3">Kerohanian</option>
                            <option value="7">PMR</option>
                            <option value="8">Paskibra</option>
                            <option value="9">PKS</option>
                            <option value="10">Komunitas Pecinta Alam</option>
                            <option value="11">Pramuka</option>
                            <option value="14">Kesenian</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinggi_badan">Tinggi Badan<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" name="tinggi_badan" value="<?php echo $row['tinggi_badan'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Tinggi Badan Contoh: 179">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berat_badan">Berat Badan<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" name="berat_badan" value="<?php echo $row['berat_badan'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Berat Badan Contoh: 65">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jarak">Jarak ke Sekolah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="jarak" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="<1 KM"><1 KM</option>
                            <option value=">1 KM">>1 KM</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="angka_jarak">Sebutkan Jarak<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" name="angka_jarak" value="<?php echo $row['angka_jarak'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Jarak dalam KM Contoh : 5">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waktu_tempuh">Waktu Tempuh ke Sekolah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="waktu_tempuh" value="<?php echo $row['waktu_tempuh'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Waktu Tempuh dalam Menit Contoh : 30" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prestasi">Prestasi Bidang Pendidikan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="prestasi" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="beasiswa">Penerima Beasiswa<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="beasiswa" class="form-control">
                            <option value="">Pilih..</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jurusan">Kompetensi Keahlian<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="jurusan" value="<?php echo $row['jurusan'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_daftar">Jenis Daftar<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name="jenis_daftar" class="form-control" disabled="">
                            <!--<option value="">Pilih..</option>-->
                            <option value="1">Siswa Baru</option>
                            <!--<option value="2">Pindahan</option>-->
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIS <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nis" value="<?php echo $row['nis'];?>" class="form-control col-md-7 col-xs-12" type="text" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_masuk">Tanggal Masuk<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tanggal_masuk" value="<?php echo $row['tanggal_masuk'];?>"  class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ujian">Nomor Ujian <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <input type="number" name="no_ujian" value="<?php echo $row['no_ujian'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Nomor Ujian Sekolah" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ijazah">Nomor Seri Ijazah <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <input type="text" name="no_ijazah" value="<?php echo $row['no_ijazah'];?>" class="form-control col-md-4 col-xs-6" placeholder="Masukan Nomor Ijazah Contoh: Dn-0223334" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_skhus">Nomor SKHUS <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="text" name="no_skhus" value="<?php echo $row['no_skhus'];?>"  class="form-control col-md-7 col-xs-12" placeholder="Masukan Nomor Hasil Ujian Sekolah Contoh: SH-0223334">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ukuran_seragam">Ukuran Seragam <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <img src="../assets/img/seragam.jpg" />
                          <select id="heard" name="ukuran_seragam" class="form-control" required>
                            <option value="">Pilih..</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="XXXL">XXXL</option>
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





