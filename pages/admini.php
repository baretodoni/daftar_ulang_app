<?php
   
  session_start();
  if (isset($_SESSION['no_pendaftaran'])){
  
  }else{
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
  <?php include('../template/head.php'); ?>
  <?php include('../template/link.php'); ?>
  <?php
    header("Cache-Control: no-cache, must-revalidate");
  ?>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>DU & LB!</span></a>
            </div>

            <div class="clearfix"></div>

            <br />
            <!-- sidebar menu -->
            <?php include('../template/sidebar.php');?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include('../template/topnav.php');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin <small>PPDB</small></h2>
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
                      Daftar Ulang dan Kelengkapan Berkas PPDB.
                    </p>
                    <a href="tambahsiswa.php" class="btn btn-primary">Tambah Siswa</a>
                    <a href="dapodik.php" target="blank" class="btn btn-success">Download Data Dapodik</a>
                     <table id="datatable" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th data-priority="1">No</th>
                          <th data-priority="2">Nomor Pendaftaran</th>
                          <th data-priority="3">Nama Siswa</th>
                          <th data-priority="5">Asal Sekolah</th>
                          <th data-priority="5">Hasil Seleksi</th>
                          <th data-priority="6">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                          include("../config/koneksi.php");
                          error_reporting(0);
                          $sql=mysqli_query($conn, "SELECT * FROM t_user WHERE level=0 order by hasil_seleksi asc");
                         
                          $no=1;
                             if($sql->num_rows > 0) {
                                while($row = $sql->fetch_assoc()) {
                                    
                                echo "

                                  <tr>
                                     <td>$no</td>
                                     <td>".$row['no_pendaftaran']."</td>
                                     <td>".$row['nama']."</td>
                                     <td>".$row['asal_sekolah']."</td>
                                     <td>".$row['hasil_seleksi']."</td>
                                     <td>
                                           <a class='btn btn-info btn-sm' href='tambahlagi.php?id_user=".$row['id_user']."'><i class= 'glyphicon glyphicon-plus'></i></a>
                                          
                                     </td>
                                 </tr>";
                                   $no++;
                             }

                           } else {
                               echo "<tr><td colspan='5'><center>Data Tidak Ditemukan</center></td></tr>";
                           }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        <!-- /page content -->

        <!--modal hapus user-->
        <div class="modal fade" id="modal_delete">
          <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:left;">Apakah Yakin Hapus ?</h4>
              </div>    
              <div class="modal-footer" style="margin:0px; border-top:0px; text-align:right;">
                <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
        <?php
           /* if($_GET['beres']){
                ?>
                    <script>
                        window.location.href = "./dataperusahaan.php"
                    </script>
                <?php
            }*/
        ?>
        <script>
        function confirm_delete(delete_url){
          $("#modal_delete").modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href', delete_url);
        }
      </script>

<?php include('../template/footer.php');?>
</body>
</html>