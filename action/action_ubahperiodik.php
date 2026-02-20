<?php

include "../config/koneksi.php";
//error_reporting(0);
	if(isset($_POST['submit'])){
		$id_user   = $_POST['id_user'];
	    $ekstra   = $_POST['ekstra'];
	    $tinggi_badan   = $_POST['tinggi_badan'];
	    $berat_badan   = $_POST['berat_badan'];
	    $jarak   = $_POST['jarak'];
	    $angka_jarak   = $_POST['angka_jarak'];
	    $waktu_tempuh   = $_POST['waktu_tempuh'];
	    $prestasi   = $_POST['prestasi'];
	    $beasiswa   = $_POST['beasiswa'];
	    //$jurusan   = $_POST['jurusan'];
	    //$jenis_daftar   = $_POST['jenis_daftar'];
	    $no_ijazah   = $_POST['no_ijazah'];
	    $no_skhus   = $_POST['no_skhus'];
	    $ukuran_seragam   = $_POST['ukuran_seragam'];

	    $update = mysqli_query($conn, "UPDATE t_periodik SET ekstra='$ekstra', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', jarak='$jarak', angka_jarak='$angka_jarak', waktu_tempuh='$waktu_tempuh', prestasi='$prestasi', beasiswa='$beasiswa', no_ijazah='$no_ijazah', no_skhus='$no_skhus', ukuran_seragam='$ukuran_seragam' WHERE id_user='$id_user'") or die(mysqli_error($conn));
	    if($update == TRUE) {

          echo "<script type='text/javascript'>
				 setTimeout(function () { 
				 swal({
				            title: 'Data Berhasil Disimpan',
				            text:  '$no_ijazah',
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
				            text:  '$no_ijazah',
				            type: 'warning',
				            timer: 2000,
				            showConfirmButton: true
				        });  
				 },10); 
				 window.setTimeout(function(){ 
				  window.location.replace('../pages/periodik.php');
				 } ,2000); 
				</script>";
        }
      
	  }
?>