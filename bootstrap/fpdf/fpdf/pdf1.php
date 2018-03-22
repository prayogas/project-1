<?php
//koneksi ke database
mysql_connect("localhost","root","");
mysql_select_db("absen");

//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM absen ORDER BY no");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}

//mengisi judul dan header tabel
$judul = "ABSENSI MAHASISWA PRANATA" ;
$header = array(
array("label"=>"NO", "length"=>10, "align"=>"L"),
array("label"=>"NIM", "length"=>30, "align"=>"L"),
array("label"=>"NAMA", "length"=>50, "align"=>"L"),
array("label"=>"KELAS", "length"=>20, "align"=>"L"),
);

//memanggil FPDF
require_once ("fpdf.php");
$pdf = new FPDF();
$pdf->setTopMargin(20);
$pdf->setLeftMargin(50);
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(110,10, $judul, '0', 1, 'C');

//Header Table
$pdf->SetFont('','B','9');
$pdf->SetFillColor(30,144,255); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(110,180,230); //warna border
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//menampilkan data table
$pdf->SetFillColor(224,235,255); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

//output file pdf
$pdf->Output();
?>