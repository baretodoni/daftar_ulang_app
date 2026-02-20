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
	    $id_user    = $_POST['id_user'];
	    $no_pendaftaran    = $_POST['no_pendaftaran'];
	    $jenis_kelamin = $_POST['jenis_kelamin'];
	    $jurusan = $_POST['jurusan'];
	    $kewarganegaraan = 'Indonesia';
	    $jenis_daftar=1;
	    $tanggal_masuk = '2021-07-19';

			/*$perintah1 = "INSERT INTO t_biodata (id_user, no_pendaftaran, jenis_kelamin, kewarganegaraan) OUTPUT INSERTED.('$id_user', '$no_pendaftaran', '$jenis_kelamin', 'Indonesia') INTO t_periodik(id_user, no_pendaftaran, jurusan, jenis_daftar, tanggal_masuk) VALUES('$id_user', '$no_pendaftaran',$jurusan,1,'2021-07-19')";*/

			$perintah1 = sprintf("INSERT INTO t_biodata (id_user, no_pendaftaran, jenis_kelamin, kewarganegaraan) VALUES ('%s', '%s', '%s', '%s')", $id_user, $no_pendaftaran, $jenis_kelamin, $kewarganegaraan);
	    $perintah2 = sprintf("INSERT INTO t_periodik (id_user, no_pendaftaran, jurusan, jenis_daftar, tanggal_masuk) VALUES ('%s', '%s', '%s', '%d', '%s')", $id_user, $no_pendaftaran, $jurusan, $jenis_daftar,$tanggal_masuk);
	    $perintah3 = sprintf("INSERT INTO t_keluarga (id_user, no_pendaftaran) VALUES ('%s', '%s')", $id_user, $no_pendaftaran);

	   /* $perintah = "INSERT INTO t_biodata (id_user, no_pendaftaran, jenis_kelamin, kewarganegaraan) VALUE ('$id_user', '$no_pendaftaran', '$jenis_kelamin', 'Indonesia')";
	    $perintah .= "INSERT INTO t_periodik (id_user, no_pendaftaran, jurusan, jenis_daftar, tanggal_masuk) VALUE ('$id_user', '$no_pendaftaran', '$jurusan',1, '2021-07-19')";*/


	    $eksekusi = mysqli_query($conn,$perintah1);

        if($eksekusi == TRUE) {
        	mysqli_query($conn, $perintah2);
        	mysqli_query($conn, $perintah3);

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$no_pendaftaran',
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
				            text:  '$no_pendaftaran',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/tambahlagi.php');
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
