<?php

include "../config/koneksi.php";
//error_reporting(0);
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
	    $no_kks   = $_POST['no_kks'];
	    $anak_ke   = $_POST['anak_ke'];
	    $jumlah_saudara   = $_POST['jumlah_saudara'];
	    $no_kps_pkh   = $_POST['no_kps_pkh'];
	    //$layak_pip   = $_POST['layak_pip'];
	    $penerima_kip   = $_POST['penerima_kip'];
	    $no_kip   = $_POST['no_kip'];
	    $nama_kip   = $_POST['nama_kip'];

	    $update = mysqli_query($conn, "UPDATE t_biodata SET no_kks='$no_kks', anak_ke='$anak_ke', jumlah_saudara='$jumlah_saudara', no_kps_pkh='$no_kps_pkh', penerima_kip='$penerima_kip', no_kip='$no_kip', nama_kip='$nama_kip' WHERE id_user='$id_user'") or die(mysqli_error($conn));
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$anak_ke',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/keluarga.php');
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
				  window.location.replace('../pages/kartu.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>