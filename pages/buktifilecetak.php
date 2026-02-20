<?php
    
    include '../config/koneksi.php';
    require('../assets/pdf/fpdf.php');
    require('../template/link.php');
    error_reporting(0);

    $id_user = $_GET['id_user'];
    //$sql = mysqli_query($conn, "SELECT * FROM t_user LEFT JOIN t_biodata ON t_user.id_user = t_biodata.id_user LEFT JOIN t_keluarga ON t_user.id_user = t_keluarga.id_user LEFT JOIN t_periodik ON t_user.id_user = t_periodik.id_user WHERE t_user.id_user");
    $sql = mysqli_query($conn, "SELECT * FROM t_user LEFT JOIN t_biodata ON t_user.id_user = t_biodata.id_user LEFT JOIN t_keluarga ON t_user.id_user = t_keluarga.id_user LEFT JOIN t_periodik ON t_user.id_user = t_periodik.id_user WHERE t_user.id_user = '$id_user'");
   
    $row = mysqli_fetch_assoc($sql);
    //$id_perusahaan=$row['id_perusahaan'];
    $no_pendaftaran=$row['no_pendaftaran'];
    $nisn=$row['nisn'];
    $nama=$row['nama'];
    $asal_sekolah=$row['asal_sekolah'];
    $hasil_seleksi=$row['hasil_seleksi'];
    $pernyataan =$row['pernyataan']; 
    $nama_ayah = $row['nama_ayah'];
    $ukuran_seragam = $row['ukuran_seragam'];
    $jurusan = $row['jurusan'];

    function TanggalIndonesia($date) {
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';
 
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
 
    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
        }

        $tanggalIndonesia = "".$tgl . " " . $bln . " " . $thn;
        return $tanggalIndonesia;
    }

    //$pdf = new FPDF('P','mm',array(215, 330));
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetTopMargin(10); 
        $pdf->SetLeftMargin(15); 
        $pdf->SetRightMargin(15); 
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',14);
        // mencetak string
        $pdf->Image('../assets/img/logo_koperasi.png',15,10,27,28,'png');
        
         $pdf->Ln(3);
        $pdf->Cell(195,5,'KOPERASI',0,1,'C');
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(195,5,'"MEKARRAHARJA"',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(195,5,'SMK NEGERI 1 TALAGA KABUPATEN MAJALENGKA',0,1,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(195,5,'Alamat : Talaga-Bantarujeg Desa Mekarraharja Kecamatan Talaga Kabupaten Majalengka',0,1,'C');
        $pdf->Cell(195,5,'SK Menkop KUKM Nomor: 008387/BH/M.KUKM.2/V/2018',0,1,'C');
        //garis kop
        $pdf->SetLineWidth(1);
        $pdf->Line(10,43,200,43);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,44,200,44);
        //halaman untuk surat keterangan
        $pdf->SetTopMargin(10); 
        $pdf->SetLeftMargin(10); 
        $pdf->SetRightMargin(15);

        $pdf->Ln(16);
        $pdf->SetFont('Times','BU','14');
        $pdf->Cell(195,4,'SURAT PESANAN PERLENGKAPAN SISWA',0,1,'C');

        //margin isi keterangan
        $pdf->SetLeftMargin(15); 
        //$pdf->SetRightMargin(20);

        $pdf->ln(5);
        $pdf->SetFont('Times','','12');
        $pdf->MultiCell(180,5,'     Yang bertanda tangan dibawah ini adalah orang tua dari siswa berikut: ',0,'J',false);
        
        $pdf->SetFont('Times','','12');
        //$pdf->SetLeftMargin(35);
        $pdf->Cell(50,5,'Nomor Pendaftaran',0,0,'L');
        $pdf->Cell(1,5,'   :',0,0,'L'); 
        $pdf->Cell(1,5,'     '.$no_pendaftaran,0,1,'L');
        $pdf->Cell(50,5,'NISN',0,0,'L');
        $pdf->Cell(1,5,'   :',0,0,'L');
        $pdf->Cell(1,5,'     '.$nisn,0,1,'L');
        $pdf->Cell(50,5,'Nama',0,0,'L');
        $pdf->Cell(1,5,'   :',0,0,'L');
        $pdf->Cell(1,5,'     '.$nama,0,1,'L');
        $pdf->Cell(50,5,'Asal Sekolah',0,0,'L');
        $pdf->Cell(1,5,'   :',0,0,'L');
        $pdf->Cell(1,5,'     '.$asal_sekolah,0,1,'L');
        $pdf->Cell(50,5,'Hasil Seleksi',0,0,'L');
        $pdf->Cell(1,5,'   :',0,1,'L');
        $pdf->Ln(4);
        $pdf->SetFont('Times','BU','12');
        $pdf->Cell(180,5,''.$hasil_seleksi,0,1,'C');

        $pdf->ln(3);
        $pdf->SetFont('Times','','12');
        $pdf->Cell(50,5,'Ukuran Seragam',0,0,'L');
        $pdf->Cell(1,5,'   :',0,0,'L');
        $pdf->Cell(1,5,'     '.$ukuran_seragam,0,1,'L');
         $pdf->Cell(50,5,'Rincian',0,0,'L');
        $pdf->Cell(1,5,'   :',0,1,'L');

        if($jurusan=='RPL'){
        $pdf->Image('../assets/img/harga_satuan_rpl.PNG',40,115,135,55,'png');
        }elseif($jurusan=='TKJ'){
        $pdf->Image('../assets/img/harga_satuan_tkj.PNG',40,115,135,55,'png');
        }elseif($jurusan=='TKRO'){
        $pdf->Image('../assets/img/harga_satuan_tkro.PNG',40,115,135,55,'png');
        }elseif($jurusan=='AKL'){
        $pdf->Image('../assets/img/harga_satuan_akl.PNG',40,115,135,55,'png');
        }elseif($jurusan=='TBSM'){
        $pdf->Image('../assets/img/harga_satuan_tbsm.PNG',40,115,135,55,'png');
        }elseif($jurusan=='BDP'){
        $pdf->Image('../assets/img/harga_satuan_bdp.PNG',40,115,135,55,'png');
        }else{
                $pdf->MultiCell(180,5,'Silahkan Logout dan Login Ulang',0,'J', false);
        }
        $pdf->ln(63);
        $pdf->MultiCell(180,5,'     Berdasarkan rincian tersebut, maka saya memesan perlengkapan siswa dari Koperasi Mekaraharja SMKN 1 Talaga.',0,'J', false);
        $pdf->MultiCell(180,5,'     Demikian surat pesanan ini saya buat atas dasar kesadaran dan tidak ada paksaan dari pihak lain.',0,'J', false);

        
        $pdf->ln(5);
        $pdf->cell(120);        
        $pdf->Cell(20,5,'Talaga,'.' '.TanggalIndonesia(date('Y-m-d')),0,1,'L');
        $pdf->cell(120); 
        $pdf->Cell(30,5,'Orang Tua/Wali',0,1,'L');
        $pdf->ln(1);
        $pdf->cell(128,5,'ttd',0,1,'R');
        //$pdf->Image('../assets/img/ttd1.png',135,235,60,22,'png');
        //$pdf->Image('../assets/img/ttdcapplt.png',120,160,55,34,'png');
        $pdf->ln(5);
        $pdf->SetFont('Times','U',12);
        $pdf->cell(120);
        $pdf->Cell(20,5,''.$nama_ayah,0,1,'L');
        $pdf->cell(120);
        /*$pdf->SetFont('Times','',12);
        $pdf->Cell(20,5,'Pembina Tingkat I',0,1,'L');
        $pdf->cell(120);
        $pdf->Cell(20,5,'NIP.196206131985121001',0,0,'L');*/
        //$pdf->Image('../assets/img/isook.PNG',15,258,110,15,'png');
        
        $pdf->ln(14);
        $pdf->SetFont('Times','',11);
        $pdf->MultiCell(180,5,'Info : Bagi yang ingin mengangsur pembayaran seragam, dapat mentransfer ke rekening BRI 1108 0100 8713 503 a.n Yulianti Nur Ifani dan mengirim bukti transfer ke nomor WA : +62 852-9513-1114 (Ibu Yuli)',0,'J', false);
        $pdf->ln(10);
        $pdf->SetFont('Times','I',10);
        $pdf->MultiCell(180,5,'*) Dicetak dan ditandatangani secara digital dengan menggunakan Aplikasi Pemesanan Online SMKN 1 Talaga yang mempunyai keterangan sesuai dengan aslinya',0,'J', false);
        
      

        $pdf->Output("Bukti Kelengkapan.pdf","I");

?>
