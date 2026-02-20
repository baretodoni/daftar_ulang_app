
    <!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="<?php echo $url['base_url'];?>assets/production/images/img.jpg" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Welcome,</span>
        <h2>
          <?php 
                include "../config/koneksi.php";
              $perintah="select * from t_user where no_pendaftaran ='".$_SESSION['no_pendaftaran']."'";
              $hasil=mysqli_query($conn,$perintah);
              $data=mysqli_fetch_array($hasil);
              { 
                echo "$data[nama]";
              }
            ?>
      
      </h2>
  </div>
</div>
<!-- /menu profile quick info --> 

<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <?php
                    $level = $data['level'];
                    if($level==1){
                  ?>
                    <li><a><i class="fa fa-database"></i><span class="fa fa-chevron-down"> </span>Data Master</a>
                        <ul class="nav child_menu">
                          <li><a href="admini.php">Data Siswa</a></li>
                          <li><a href="datadaftarulang1.php">Daftar Ulang Tahap 1</a></li>
                          <li><a href="datadaftarulang2.php">Daftar Ulang Tahap 2</a></li>
                          <li><a href="datadaftarulang3.php">Daftar Ulang Tahap 3</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-database"></i><span class="fa fa-chevron-down"> </span>DU KK</a>
                        <ul class="nav child_menu">
                          <li><a href="sudasupesrpl.php">RPL</a></li>
                          <li><a href="sudasupestkj.php">TKJ</a></li>
                          <li><a href="sudasupesakl.php">AKL</a></li>
                          <li><a href="sudasupesbdp.php">BDP</a></li>
                          <li><a href="sudasupestkro.php">TKRO</a></li>
                          <li><a href="sudasupestbsm.php">TBSM</a></li>
                        </ul>
                    </li>

                  <?php
                    }else{

                  ?>

                  <li><a href="user.php"><i class="fa fa-database"></i> Daftar Ulang</a></li>
                  <li><a><i class="fa fa-book"></i><span class="fa fa-chevron-down"></span> Lengkapi Berkas</a>
                      <ul class="nav child_menu">
                      <li><a href="biodata.php">Lengkapi Biodata</a></li>
                      <li><a href="alamat.php">Lengkapi Data Alamat</a></li>
                      <li><a href="kartu.php">Lengkapi Data Kartu-Kartu</a></li>
                      <li><a href="keluarga.php">Lengkapi Data Keluarga</a></li>
                      <li><a href="periodik.php">Lengkapi Data Periodik</a></li>
                      <li><a href="buktiakhir.php">Cetak Bukti Kelengkapan</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>



            </div>
            <!-- /sidebar menu -->