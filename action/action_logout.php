<?php
  include_once '../config/koneksi.php';
  session_start();
  
    $_SESSION["id_user"];
    $_SESSION["nama"];
    $_SESSION["pernyataan"];
    unset($_SESSION["id_user"]);
    unset($_SESSION["nama"]);
    unset($_SESSION["pernyataan"]);
    session_unset();
    session_destroy();
    header("location: ../index.php");
 ?>