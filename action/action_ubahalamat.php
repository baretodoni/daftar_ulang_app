<?php

include "../config/koneksi.php";
//error_reporting(0);
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
	    $alamat   = $_POST['alamat'];
	    $rt   = $_POST['rt'];
	    $rw   = $_POST['rw'];
	    $dusun   = $_POST['dusun'];
	    $kelurahan   = $_POST['kelurahan'];
	    $kecamatan   = $_POST['kecamatan'];
	    $kode_pos   = $_POST['kode_pos'];
	    $tempat_tinggal   = $_POST['tempat_tinggal'];
	    $moda_transportasi   = $_POST['moda_transportasi'];

	    $update = mysqli_query($conn, "UPDATE t_biodata SET alamat='$alamat', rt='$rt', rw='$rw', dusun='$dusun', kelurahan='$kelurahan', kecamatan='$kecamatan', kode_pos='$kode_pos', tempat_tinggal='$tempat_tinggal', moda_transportasi='$moda_transportasi' WHERE id_user='$id_user'") or die(mysqli_error($conn));
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$kode_pos',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/kartu.php');
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
				            text:  '$kode_pos',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/alamat.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>