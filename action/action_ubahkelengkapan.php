<?php

include "../config/koneksi.php";
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
		$status_pemesanan   = $_POST['status_pemesanan'];

	    $update = mysqli_query($conn, "UPDATE t_periodik SET status_pemesanan=1 WHERE id_user='$id_user'") or die(mysqli_error());
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  'Berhasil',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/buktiakhir.php');
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
				            text:  'Gagal',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/buktiakhir.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>