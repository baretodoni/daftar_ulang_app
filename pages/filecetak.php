<?php
    
    include '../config/koneksi.php';
    require('../assets/pdf/fpdf.php');
    require('../template/link.php');
    error_reporting(0);

    $id_user = $_GET['id_user'];
    $sql = mysqli_query($conn, "SELECT * FROM t_user where id_user = '$id_user'");
    $row = mysqli_fetch_assoc($sql);
    //$id_perusahaan=$row['id_perusahaan'];
    $no_pendaftaran=$row['no_pendaftaran'];
    $nisn=$row['nisn'];
    $nama=$row['nama'];
    $asal_sekolah=$row['asal_sekolah'];
    $hasil_seleksi=$row['hasil_seleksi'];
    $pernyataan =$row['pernyataan']; 

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
        $pdf->Image('../assets/img/java.png',15,10,23,28,'png');
        
        
        $pdf->Cell(195,5,'PEMERINTAH PROVINSI JAWA BARAT',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(195,5,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->Cell(195,5,'CABANG DINAS PENDIDIKAN WILAYAH IX',0,1,'C');
        $pdf->Cell(195,5,'SEKOLAH MENENGAH KEJURUAN NEGERI 1 TALAGA',0,1,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(195,4,'Bidang Keahlian : Teknologi dan Rekayasa, Teknologi Informasi dan Komunikasi, Bisnis dan Manajemen',0,1,'C');
        $pdf->Cell(195,4,'Jalan Sekolah No.20 Desa Talagakulon Kecamatan Talaga Kabupaten Majalengka Kode Pos 45463',0,1,'C');
        $pdf->Cell(195,4,'Telepon (0233) 319238 Email : admin@smkn1talaga.sch.id Website : http://smkn1talaga.sch.id',0,1,'C');
        //garis kop
        $pdf->SetLineWidth(1);
        $pdf->Line(10,43,200,43);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,44,200,44);
        //halaman untuk surat keterangan
        $pdf->SetTopMargin(10); 
        $pdf->SetLeftMargin(10); 
        $pdf->SetRightMargin(15);

        $pdf->Ln(8);
        $pdf->SetFont('Times','BU','14');
        $pdf->Cell(195,4,'SURAT KETERANGAN DAFTAR ULANG',0,1,'C');
        $pdf->SetFont('Times','','11');
        $pdf->Cell(195,6,'Nomor : 421.5/417/VII/SMK-KCD.WIL.IX/2021',0,1,'C');

        //margin isi keterangan
        $pdf->SetLeftMargin(15); 
        //$pdf->SetRightMargin(20);

        $pdf->ln(5);
        $pdf->SetFont('Times','','12');
        $pdf->MultiCell(180,5,'     Berdasarkan data yang diperoleh dari Aplikasi Daftar Ulang SMKN 1 Talaga, menyatakan bahwa: ',0,'J',false);
        
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
        $pdf->ln(5);
         $pdf->SetFont('Times','','12');
        $pdf->MultiCell(180,5,'telah melakukan Proses Daftar Ulang secara Daring. Sehingga sudah dinyatakan menjadi siswa SMKN 1 Talaga Tahun Ajaran 2021/2022.',0,'J', false);
        $pdf->MultiCell(180,5,'     Demikian surat keterangan ini dibuat dan dapat digunakan sebagaimana mestinya.',0,'J', false);

        
        $pdf->ln(35);
        $pdf->cell(120);        
        $pdf->Cell(20,5,'Talaga,'.' '.TanggalIndonesia(date('Y-m-d')),0,1,'L');
        $pdf->cell(120); 
        $pdf->Cell(30,5,'Kepala SMK Negeri 1 Talaga',0,1,'L');
        $pdf->cell(120);
        //$pdf->Image('../assets/img/ttd1.png',135,235,60,22,'png');
        $pdf->Image('../assets/img/ttdcapplt.png',120,160,55,34,'png');
        $pdf->ln(15);
        $pdf->SetFont('Times','BU',12);
        $pdf->cell(120);
        $pdf->Cell(20,5,'Drs.Nono Mardono.',0,1,'L');
        $pdf->cell(120);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(20,5,'Pembina Tingkat I',0,1,'L');
        $pdf->cell(120);
        $pdf->Cell(20,5,'NIP.196206131985121001',0,0,'L');
        //$pdf->Image('../assets/img/isook.PNG',15,258,110,15,'png');
        

        $pdf->ln(80);
        $pdf->SetFont('Times','I',10);
        $pdf->Cell(3,2,'*) Dicetak dengan menggunakan Aplikasi Daftar Ulang Online SMKN 1 Talaga yang mempunyai keterangan sesuai dengan aslinya',0,0,'L');
        
      
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',14);
      
        // mencetak string
        $pdf->Image('../assets/img/java.png',15,10,23,28,'png');
        
        
        $pdf->Cell(195,5,'PEMERINTAH PROVINSI JAWA BARAT',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(195,5,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->Cell(195,5,'CABANG DINAS PENDIDIKAN WILAYAH IX',0,1,'C');
        $pdf->Cell(195,5,'SEKOLAH MENENGAH KEJURUAN NEGERI 1 TALAGA',0,1,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(195,4,'Bidang Keahlian : Teknologi dan Rekayasa, Teknologi Informasi dan Komunikasi, Bisnis dan Manajemen',0,1,'C');
        $pdf->Cell(195,4,'Jalan Sekolah No.20 Desa Talagakulon Kecamatan Talaga Kabupaten Majalengka Kode Pos 45463',0,1,'C');
        $pdf->Cell(195,4,'Telepon (0233) 319238 Email : admin@smkn1talaga.sch.id Website : http://smkn1talaga.sch.id',0,1,'C');
        //garis kop
        $pdf->SetLineWidth(1);
        $pdf->Line(10,43,200,43);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,44,200,44);


        $pdf->Ln(8);
        $pdf->SetFont('Times','BU','14');
        $pdf->Cell(195,4,'INFORMASI PENTING',0,1,'C');

        $pdf->SetFont('Times','','12');
        $pdf->Ln(8);
        $pdf->MultiCell(180,5,'Selamat Ananda '.$nama.' telah menjadi siswa SMKN 1 Talaga. Berikut ini adalah jadwal penting yang perlu diperhatikan :',0,'J', false);
        $pdf->MultiCell(180,5,'1.Silahkan lengkapi data pada website https://daftarulang.smkn1talaga.sch.id/ sampai dengan cetak bukti kelengkapan.',0,'J', false);
        $pdf->MultiCell(180,5,'2.Batas akhir melengkapi data tanggal 14 Juli 2021 Jam 23.59 WIB.',0,'J', false);
        $pdf->MultiCell(180,5,'3.Pastikan kelengkapan data sudah diisi sampai dengan perlengkapan sekolah.',0,'J', false);
        $pdf->MultiCell(180,5,'4.Karena saat ini prosesnya daring, maka siswa tidak harus datang ke sekolah.',0,'J', false);
        $pdf->MultiCell(180,5,'5.Pengenalan Lingkungan Sekolah (PLS) akan dilaksanakan pada tanggal 21-23 Juli 2021 secara daring/online.',0,'J', false);
        $pdf->MultiCell(180,5,'6.Hal-hal lain yang tidak tercantum dalam surat ini, akan di informasikan kemudian melalui grup Whatsapp calon siswa.',0,'J', false);


        $pdf->ln(150);
        $pdf->SetFont('Times','I',10);
        $pdf->Cell(3,2,'*) Dicetak dengan menggunakan Aplikasi Daftar Ulang Online SMKN 1 Talaga yang mempunyai keterangan sesuai dengan aslinya',0,0,'L');
      
        $pdf->Output("Daftar Ulang.pdf","I");

?>
