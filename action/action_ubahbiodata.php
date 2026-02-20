<?php

include "../config/koneksi.php";
//error_reporting(0);
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
	    $nik   = $_POST['nik'];
	    $tempat_lahir   = $_POST['tempat_lahir'];
	    $tanggal_lahir   = $_POST['tanggal_lahir'];
	    $no_akta_lahir   = $_POST['no_akta_lahir'];
	    $agama   = $_POST['agama'];
	   // $berkebutuhan_khusus   = $_POST['berkebutuhan_khusus'];

	    $update = mysqli_query($conn, "UPDATE t_biodata SET nik='$nik', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_akta_lahir='$no_akta_lahir', agama='$agama' WHERE id_user='$id_user'") or die(mysqli_error($conn));
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$nik',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/alamat.php');
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
				            text:  '$nik',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/biodata.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>