<?php include('link.php');?>
<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?php 
                        include "../config/koneksi.php";
                      $perintah="select * from t_user where no_pendaftaran ='".$_SESSION['no_pendaftaran']."'";
                      $hasil=mysqli_query($conn,$perintah);
                      $data=mysqli_fetch_array($hasil);
                      { 
                        echo "$data[nama]";
                      }
                    ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->

<!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            
          </div>
          <div class="modal-body">Silahkan klik Logout untuk keluar dan Klik Cancel untuk batal</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../action/action_logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>