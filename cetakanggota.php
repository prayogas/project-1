<?php
    include "../conn.php";
require('../fpdf17/fpdf.php');

$date = date('d-m-Y');
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM data_anggota WHERE id='$_GET[id]'") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_id = "";
$column_noinduk = "";
$column_nama = "";
$column_jk = "";
$column_kelas = "";
$colom_tmpt_lhr = "";
$column_ttl = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($query))
{
	$noinduk = $row["no_induk"];
    $nama = $row['nama'];
    $jk = $row["jk"];
    $kelas = $row['kelas'];
    $ttl = $row["tgl_lahir"];
    $tgl = date('d-m-Y',strtotime($ttl));
  //  $jk = $row["jk"];
    $alamat = $row["alamat"];
    

//	$column_id = $column_id.$nim."\n";
//    $foto = $column_noinduk.$foto."\n";
//    $column_nama = $column_nama.$nama."\n";
//    $colom_tmpt_lhr = $colom_tmpt_lhr.$tlh."\n";
//    $column_ttl = $column_ttl.$ttl."\n";
//    $column_jk = $column_jk.$jk."\n";
//    $column_kelas = $column_kelas.$jurusan."\n";
}   
//Create a new PDF file
$pdf = new FPDF('L','mm',array(85,123)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('../img/logo.png',5,5,-175); 
$pdf->SetFont('Arial','B',11);  // SETINGAN UNTUK HURUF ARIAL = JENIS HURUF, B = BOLD
$pdf->Image('../assets/img/logo-kta.jpg',11,7,-175); 
$pdf->Cell(28);
$pdf->Cell(50,5,'KARTU ANGGOTA PERPUSTAKAAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(28);
$pdf->Cell(50,5,'SMA 1 SUKATANI',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(28);
$pdf->Cell(50,5,'Sukatani, cikarang Utara-Bekasi',0,0,'C');
$pdf->Ln();
$pdf->Cell(6);
$pdf->Cell(90,5,'===========================================================',0,0,'C');

//Fields Name position
$Y = 30;
$x = 50;    // UNTUK MENGATUR KE BAWAH

//$pdf->SetY($Y);
$pdf->Image('../admin/'.$foto,10,30,23,25);
$pdf->SetFont('Arial','',10);
$pdf->SetY($Y);
$pdf->Cell(25);
$pdf->Cell(25,5,'No Induk',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(5,5,$no_induk,0,0,'L');
$pdf->Ln();
$pdf->Cell(25);
$pdf->Cell(25,5,'NAMA',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(5,5,$nama,0,0,'L');
$pdf->Ln();
$pdf->Cell(25);
$pdf->Cell(25,5,'Jenis Kelamin',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(5,5,$jk,0,0,'L');
$pdf->Cell(10);
$pdf->Cell(2,5,', ',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,$tgl,0,0,'L');
$pdf->Ln();
$pdf->Cell(25);
$pdf->Cell(25,5,'Kelas',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(1);
$pdf->Cell(5,5,$kelas,0,0,'L');
$pdf->Ln();
$pdf->SetY($x);
$pdf->Cell(85);
$pdf->Cell(2,5,'Bekasi,',0,0,'R');
$pdf->Cell(1);
$pdf->Cell(20,5,$date,0,0,'L');
$pdf->Ln();
$pdf->Cell(75);
$pdf->Cell(20,5,'ttd',0,0,'R');
$pdf->Ln();
$pdf->Cell(1);
$pdf->Cell(30,4,'*) Kartu ini berlaku selama menjadi siswa.',0,0,'L');
$pdf->Cell(55);
$pdf->Cell(20,4,'Kepala Sekolah',0,0,'R');

$pdf->Output();

?>
