<?php
include "../../config/koneksi.php";
require('fpdf.php');

class PDF extends FPDF {
	function header(){
		$this->SetFont('Arial','B','15'); // font tulisan , efect tulisan tebal, size font
		$this->SetTextColor(30,144,255); //warna tulisan putih
		$this->Image('../../images/logo1.jpg',20,18,-500); // input gambar, jarak top dan left, siza gambar
		$this->Cell(0,18,'LAPORAN DATA ADMIN PERPUSTAKAAN ',0,0,'C');
		$this->Ln(8);
		$this->Cell(0,18,'SMK FARMASI SARI FARMA',0,0,'C');
		$this->Ln(5);
		$this->SetDrawColor(110,180,230); //warna border
		$this->Cell(10); // margin left
		$this->Cell(170,12,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,1,'','B');

		$Fields_Name = 45; // jarak top margin dengan filed name
		$this->SetFillColor(30,144,255); // background field name
		//Bold Font for Field Name
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(255); //warna tulisan putih
		$this->SetDrawColor(110,180,230); //warna border
		$this->SetY($Fields_Name);
		$this->SetX(21); // jarak ujung kertas atas garis field name ke garis filed name berikutnya
		$this->Cell(18,7,'NO',1,0,'C',1); // jarak antara ujung kertas atau dengan field name sebelum nya dengan tulisan atau lebar kotak filed name, tinggi filed name, filed name,align nnya center jika C, left jika L, dan right jika R.
		$this->SetX(39);
		$this->Cell(28,7,'ID Admin',1,0,'C',1);
		$this->SetX(67);
		$this->Cell(45,7,'Nama',1,0,'C',1);
		$this->SetX(112);
		$this->Cell(50,7,'Alamat',1,0,'C',1);
		$this->SetX(162);
		$this->Cell(29,7,'No HP',1,0,'C',1);
		$this->Ln();
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left
		$this->Cell(10); // margin left
		$this->Cell(170,6,'','B',1); // panjang garis , margin top ke garis, kutip dua '','B' itu artinya garis , 1 biar garis nya turun
		$this->Cell(10);
		$this->Cell(170,6,'','B');
		$this->Cell(10); // margin left

		}
	function footer(){
		$this->SetY(-15); // margin bottom
		$this->SetFont('Arial','',8);
		$this->Cell(0,0,'Halaman '.$this->PageNo('{pages}'),0,0,'C'); //
// $pdf->AliasNbPages('{pages}'); // halaman yang bentuknya begini 1/3 artinya halaman satu dari 3 lembar

	}
}


$result=mysql_query("SELECT * FROM admin ");

$column_no		= "";
$column_id		= "";
$column_nama	= "";
$column_alamat	= "";
$column_hp		= "";

$no = 1;
while($row = mysql_fetch_array($result))
{
	$id 		= $row["username"];
    $nama 		= $row["nama"];
    $alamat 	= $row["alamat"];
	$hp  		= $row["hp"];


    $column_no		= $column_no.$no."\n";
	$column_id 		= $column_id.$id."\n";
    $column_nama 	= $column_nama.$nama."\n";
    $column_alamat 	= $column_alamat.$alamat."\n";
	$column_hp 		= $column_hp.$hp."\n";
	$no++;


$pdf = new PDF('P','mm','A4'); // kertas (*p) potrait , milimeter , array (panjang,lebar));
// $pdf = new PDF('L','mm','A4'); // kertas (*L) Letter (panjangxlebar)
// $pdf = new PDF('L','mm',array(85,54)); // kertas (*L) Letter (panjangxlebar) <-- khusus kartu nama -->

$pdf->setTopMargin(15);
$pdf->setLeftMargin(11);
$pdf->AddPage();
}

//Now show the columns
$Table = 52; // jarak top margin dengan table
$pdf->SetDrawColor(110,180,230); //warna border
$pdf->SetFillColor(224,235,255); //warna dalam kolom data
$pdf->SetFont('');

$pdf->SetY($Table);
$pdf->SetX(21);
$pdf->MultiCell(18,6,$column_no,1,'C');
$pdf->SetY($Table);
$pdf->SetX(39);
$pdf->MultiCell(28,6,$column_id,1,'C');
$pdf->SetY($Table);
$pdf->SetX(67);
$pdf->MultiCell(45,6,$column_nama,1,'L');
$pdf->SetY($Table);
$pdf->SetX(112);
$pdf->MultiCell(50,6,$column_alamat,1,'L');
$pdf->SetY($Table);
$pdf->SetX(162);
$pdf->MultiCell(29,6,$column_hp,1,'C');
$pdf->SetY($Table);

$pdf->Output("data_admin_perpustakaan.pdf","I");
?>