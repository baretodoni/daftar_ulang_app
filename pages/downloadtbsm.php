<?php
// Fungsi header dengan mengirimkan raw data excel
//header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
//header("Content-Disposition: attachment; filename=Data Perusahaan.xls");
 
// Tambahkan table
//include "cetakall.php"; 
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Cetak</title>
        
    </head>
<body>
<h3><center>Data Pendaftar TBSM</center></h3>
  <table border="1">
        <tr>
          <th>No</th>
          <th>Nomor Pendaftaran</th>
          <th>NISN</th>
          <th>Nama</th>
          <th>Asal Sekolah</th>
          <th>Hasil Seleksi</th>
          <th>Status Daftar Ulang</th>
          <th>Status Pemesanan</th>
          <th>Tahap Pendaftaran</th>
        </tr>
      <tbody>
        <?php
          include("../config/koneksi.php");
          error_reporting(0);
          $sql=mysqli_query($conn, "SELECT * FROM t_user LEFT JOIN t_biodata ON t_user.id_user = t_biodata.id_user LEFT JOIN t_keluarga ON t_user.id_user = t_keluarga.id_user LEFT JOIN t_periodik ON t_user.id_user = t_periodik.id_user WHERE t_user.level=0 AND t_periodik.jurusan='TBSM' order by t_user.hasil_seleksi asc");
          $no=1;
             if($sql->num_rows > 0) {
                while($row = $sql->fetch_assoc()) {
                  if($row['pernyataan']==0){
                      $sudar = "Belum Daftar Ulang";
                    }else{
                      $sudar = "Sudah Daftar Ulang";
                    }

                    if($row['status_pemesanan']==0){
                      $supes = "Belum Pesan";
                    }else{
                      $supes = "Sudah Pesan";
                    }
                echo "

                  <tr>
                     <td>$no</td>
                     <td>".$row['no_pendaftaran']."</td>
                     <td>".$row['nisn']."</td>
                     <td>".$row['nama']."</td>
                     <td>".$row['asal_sekolah']."</td>
                     <td>".$row['hasil_seleksi']."</td>
                     <td>".$sudar."</td>
                     <td>".$supes."</td>
                     <td>".$row['tahap_daftar']."</td>
                     
                 </tr>";
                   $no++;
             }

           } else {
               echo "<tr><td colspan='8'><center>Data Tidak Ditemukan</center></td></tr>";
           }
          ?>
      </tbody>
    </table>
    </body>
</html>