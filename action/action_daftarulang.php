<?php

include "../config/koneksi.php";
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
		$pernyataan   = $_POST['pernyataan'];
	    $nama   = $_POST['nama'];
	    $nisn   = $_POST['nisn'];

	    $update = mysqli_query($conn, "UPDATE t_user SET nisn='$nisn', pernyataan=1 WHERE id_user='$id_user'") or die(mysqli_error());
	    if($update == TRUE) {

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
				  window.location.replace('../pages/cetakdaftarulang.php');
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
				  window.location.replace('../pages/user.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>