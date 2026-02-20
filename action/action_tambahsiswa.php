<!DOCTYPE html>
<html>
<head>
  <?php include('../template/head.php'); ?>
  <?php include('../template/link.php'); ?>
</head>
<?php
//error_reporting(0);
include "../config/koneksi.php";

	if(isset($_POST['submit'])){
	    
	    $no_pendaftaran    = $_POST['no_pendaftaran'];
	    $nisn    = $_POST['nisn'];
	    $nama = $_POST['nama'];
	    $asal_sekolah = $_POST['asal_sekolah'];
	   	$hasil_seleksi = $_POST['hasil_seleksi'];
	   	$level = $_POST['level'];

	    

	    $perintah=mysqli_query($conn,"INSERT INTO t_user (no_pendaftaran, password, nisn, nama, asal_sekolah, hasil_seleksi, level, pernyataan, tahap_daftar) VALUES ('$no_pendaftaran', 'c4ca4238a0b923820dcc509a6f75849b', '$nisn', '$nama', '$asal_sekolah', '$hasil_seleksi', '$level', 0, 3)");


        if($perintah == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$nama',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/admini.php');
				  //window.location='../pages/dataperusahaan.php';
				  
				 } ,1000);
				</script>";
          
        }
        else 
        {
        echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Gagal Disimpan',
				            text:  '$nama',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/tambahsiswa.php');
				 } ,2000); 
				</script>";
        }
      }

      ?>
     <!--memberi timeout di pesan berhasil-->
      <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(200, 0).slideUp(200, function(){
                $(this).remove(); 
            });
        }, 800);
      </script>
