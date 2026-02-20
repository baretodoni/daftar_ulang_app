<?php 
	
	ob_start();
	session_start();
	
	include("../config/koneksi.php");
	if(isset($_POST['submit'])) {
	    $no_pendaftaran   = $_POST['no_pendaftaran'];
	    $password   = md5($_POST['password']);
	    $sql_login  = mysqli_query($conn, "SELECT * FROM t_user WHERE no_pendaftaran = '$no_pendaftaran' AND password = '$password'");
	    if(mysqli_num_rows($sql_login)>0) {
	        $row_akun = mysqli_fetch_array($sql_login);
	        $_SESSION['no_pendaftaran'] = $row_akun['no_pendaftaran'];
	        $_SESSION['id_user'] = $row_akun['id_user'];
	        $_SESSION['nama'] = $row_akun['nama'];
	        $_SESSION['level'] = $row_akun['level'];
	        //$_SESSION['pernyataan'] = $row_akun['pernyataan'];
	        if($_SESSION['level'] == 1) {
	            header("location:../pages/admini.php");
	           //echo "Admin";
	        }else{

	        	header("location:../pages/user.php");
	        	//echo "Siswa";
	        }
	    }else {
	        //
	        header("location:../index.php");
	    }
	}
?>