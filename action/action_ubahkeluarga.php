<?php

include "../config/koneksi.php";
//error_reporting(0);
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
	    $nama_ayah   = $_POST['nama_ayah'];
	    $nik_ayah   = $_POST['nik_ayah'];
	    $tahun_lahir_ayah   = $_POST['tahun_lahir_ayah'];
	    $pendidikan_ayah   = $_POST['pendidikan_ayah'];
	    $pekerjaan_ayah   = $_POST['pekerjaan_ayah'];
	    $penghasilan_ayah   = $_POST['penghasilan_ayah'];
	    $berkebutuhan_khusus_ayah   = $_POST['berkebutuhan_khusus_ayah'];

	    $nama_ibu   = $_POST['nama_ibu'];
	    $nik_ibu   = $_POST['nik_ibu'];
	    $tahun_lahir_ibu   = $_POST['tahun_lahir_ibu'];
	    $pendidikan_ibu   = $_POST['pendidikan_ibu'];
	    $pekerjaan_ibu   = $_POST['pekerjaan_ibu'];
	    $penghasilan_ibu   = $_POST['penghasilan_ibu'];
	    $berkebutuhan_khusus_ibu   = $_POST['berkebutuhan_khusus_ibu'];

	    $nama_wali   = $_POST['nama_wali'];
	    $nik_wali   = $_POST['nik_wali'];
	    $tahun_lahir_wali   = $_POST['tahun_lahir_wali'];
	    $pendidikan_wali   = $_POST['pendidikan_wali'];
	    $pekerjaan_wali   = $_POST['pekerjaan_wali'];
	    $penghasilan_wali   = $_POST['penghasilan_wali'];

	    $telepon_rumah   = $_POST['telepon_rumah'];
	    $no_hp   = $_POST['no_hp'];
	    $email   = $_POST['email'];

	    $update = mysqli_query($conn, "UPDATE t_keluarga SET nama_ayah='$nama_ayah', nik_ayah='$nik_ayah', tahun_lahir_ayah='$tahun_lahir_ayah', pendidikan_ayah='$pendidikan_ayah', pekerjaan_ayah='$pekerjaan_ayah', penghasilan_ayah='$penghasilan_ayah', berkebutuhan_khusus_ayah='$berkebutuhan_khusus_ayah', nama_ibu='$nama_ibu', nik_ibu='$nik_ibu', tahun_lahir_ibu='$tahun_lahir_ibu', pendidikan_ibu='$pendidikan_ibu', pekerjaan_ibu='$pekerjaan_ibu', penghasilan_ibu='$penghasilan_ibu', berkebutuhan_khusus_ibu='$berkebutuhan_khusus_ibu', nama_wali='$nama_wali', nik_wali='$nik_wali', tahun_lahir_wali='$tahun_lahir_wali', pendidikan_wali='$pendidikan_wali', pekerjaan_wali='$pekerjaan_wali', penghasilan_wali='$penghasilan_wali', telepon_rumah='$telepon_rumah', no_hp='$no_hp', email='$email' WHERE id_user='$id_user'") or die(mysqli_error($conn));
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$nama_ayah',
				            type: 'success',
				            timer: 1000,
				            showConfirmButton: true
				        });  
				 },10);
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/periodik.php');
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
				            text:  '$nama_ayah',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/keluarga.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>