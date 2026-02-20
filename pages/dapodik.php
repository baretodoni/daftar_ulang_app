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
<h3><center>Data Dapodik</center></h3>
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
          <th>Jenis Kelamin</th>
          <th>NIK</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Nomor Akta Kelahiran</th>
          <th>Agama</th>
          <th>Kewarganegaraan</th>
          <th>Berkebutuhan Khusus</th>
          <th>Alamat</th>
          <th>Dusun</th>
          <th>RT</th>
          <th>RW</th>
          <th>Kelurahan</th>
          <th>Kecamatan</th>
          <th>Kode POS</th>
          <th>Tinggal Bersama</th>
          <th>Moda Transportasi</th>
          <th>No KKS</th>
          <th>Anak Ke</th>
          <th>Jumlah Saudara</th>
          <th>No KPS/PKH</th>
          <th>Layak PIP</th>
          <th>Penerima KIP</th>
          <th>Nomor KIP</th>
          <th>Nama KIP</th>
          <th>Nama Ayah</th>
          <th>NIK Ayah</th>
          <th>Tahun Lahir Ayah</th>
          <th>Pendidikan Ayah</th>
          <th>Pekerjaan Ayah</th>
          <th>Penghasilan Ayah</th>
          <th>Nama Ibu</th>
          <th>NIK Ibu</th>
          <th>Tahun Lahir Ibu</th>
          <th>Pendidikan Ibu</th>
          <th>Pekerjaan Ibu</th>
          <th>Penghasilan Ibu</th>
          <th>Nama Wali</th>
          <th>NIK Wali</th>
          <th>Tahun Lahir Wali</th>
          <th>Pendidikan Wali</th>
          <th>Pekerjaan Wali</th>
          <th>Penghasilan Wali</th>
          <th>Telepon Rumah</th>
          <th>Nomor HP</th>
          <th>Email</th>
          <th>Ekstra</th>
          <th>Tinggi Badan</th>
          <th>Berat Badan</th>
          <th>Jarak</th>
          <th>Jarak dalam KM</th>
          <th>Waktu Tempuh dalam Menit</th>
          <th>Jurusan</th>
          <th>Jenis Daftar</th>
          <th>Tanggal Masuk</th>
          <th>Nomor Ijazah</th>
          <th>Ukuran Seragam</th>

        </tr>
      <tbody>
        <?php
          include("../config/koneksi.php");
          error_reporting(0);
          $sql=mysqli_query($conn, "SELECT * FROM t_user LEFT JOIN t_biodata ON t_user.id_user = t_biodata.id_user LEFT JOIN t_keluarga ON t_user.id_user = t_keluarga.id_user LEFT JOIN t_periodik ON t_user.id_user = t_periodik.id_user WHERE t_user.level=0 order by t_user.hasil_seleksi asc");
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

                    if($row['berkebutuhan_khusus']==0){
                      $bekus = "Tidak";
                    }else{
                      $bekus = "Ya";
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
                     <td>".$row['jenis_kelamin']."</td>
                     <td>'".$row['nik']."</td>
                     <td>".$row['tempat_lahir']."</td>
                     <td>".$row['tanggal_lahir']."</td>
                     <td>".$row['no_akta_lahir']."</td>
                     <td>".$row['agama']."</td>
                     <td>".$row['kewarganegaraan']."</td>
                     <td>".$bekus."</td>
                     <td>".$row['alamat']."</td>
                     <td>".$row['dusun']."</td>
                     <td>".$row['rt']."</td>
                     <td>".$row['rw']."</td>
                     <td>".$row['kelurahan']."</td>
                     <td>".$row['kecamatan']."</td>
                     <td>".$row['kode_pos']."</td>
                     <td>".$row['tempat_tinggal']."</td>
                     <td>".$row['moda_transportasi']."</td>
                     <td>".$row['no_kks']."</td>
                     <td>".$row['anak_ke']."</td>
                     <td>".$row['jumlah_saudara']."</td>
                     <td>".$row['no_kps_pkh']."</td>
                     <td>".$row['layak_pip']."</td>
                     <td>".$row['penerima_kip']."</td>
                     <td>".$row['no_kip']."</td>
                     <td>".$row['nama_kip']."</td>
                     <td>".$row['nama_ayah']."</td>
                     <td>".$row['nik_ayah']."</td>
                     <td>".$row['tahun_lahir_ayah']."</td>
                     <td>".$row['pendidikan_ayah']."</td>
                     <td>".$row['pekerjaan_ayah']."</td>
                     <td>".$row['penghasilan_ayah']."</td>
                     <td>".$row['nama_ibu']."</td>
                     <td>".$row['nik_ibu']."</td>
                     <td>".$row['tahun_lahir_ibu']."</td>
                     <td>".$row['pendidikan_ibu']."</td>
                     <td>".$row['pekerjaan_ibu']."</td>
                     <td>".$row['penghasilan_ibu']."</td>
                     <td>".$row['nama_wali']."</td>
                     <td>".$row['nik_wali']."</td>
                     <td>".$row['tahun_lahir_wali']."</td>
                     <td>".$row['pendidikan_wali']."</td>
                     <td>".$row['pekerjaan_wali']."</td>
                     <td>".$row['penghasilan_wali']."</td>
                     <td>".$row['telepon_rumah']."</td>
                     <td>".$row['no_hp']."</td>
                     <td>".$row['email']."</td>
                     <td>".$row['ekstra']."</td>
                     <td>".$row['tinggi_badan']."</td>
                     <td>".$row['berat_badan']."</td>
                     <td>".$row['jarak']."</td>
                     <td>".$row['angka_jarak']."</td>
                     <td>".$row['waktu_tempuh']."</td>
                     <td>".$row['jurusan']."</td>
                     <td>".$row['jenis_daftar']."</td>
                     <td>".$row['tanggal_masuk']."</td>
                     <td>".$row['no_ijazah']."</td>
                     <td>".$row['ukuran_seragam']."</td>
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