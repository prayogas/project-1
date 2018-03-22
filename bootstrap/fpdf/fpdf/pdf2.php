<?php 
 include "fpdf.php";
 include "../../config/koneksi.php";
 
 class PDF extends FPDF{


 
 // Load data = Pecah Array 
 function LoadData($gue){
  $data = array();
  if (is_array($gue)) {
  foreach($gue as $coba)
   $data[] = explode('|',$coba);
  }
  return $data;
 }

 // Fungsi Membuat Tabel
 function FancyTable($header, $data){
  // Colors, line width and bold font
  $this->SetFillColor(255,0,0);
  $this->SetTextColor(255);
  $this->SetDrawColor(128,0,0);
  $this->SetLineWidth(.3);
  $this->SetFont('','B');
  // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
  $w = array(15, 37, 45, 45, 40);
  for($i=0;$i<count($header);$i++)
   $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
  $this->Ln();
  // Color and font restoration
  $this->SetFillColor(224,235,255);
  $this->SetTextColor(0);
  $this->SetFont('');
  // Data
  $fill = false;
  foreach($data as $row){
   // Field Dari Database Yang Ingin ditampilkan
   // $this->Cell($w[Ubah Ini],6,$row[Ubah Ini],'LR',0,'L',$fill);
   $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
   $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill); 
   $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
   $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
   $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
   $this->Ln();
   $fill = !$fill;
  }
  // Closing line
  $this->Cell(array_sum($w),0,'','T');
 }
 }

 $pdf = new PDF();
 // Pendefinisian Header Tabel 
 $header = array('no','username','nama','alamat','hp');
 // Load Data dari Database Memilih Data Berdasarkan Tanggal yang diinput
 $dataku = mysql_query("SELECT * FROM anggota ");
 $no=1;
 while ($tampil=mysql_fetch_array($dataku)){
 
 // Simpan Kedalam Array dengan Batasan |
 @$gue[] .= $tampil['$no']."|".$tampil['username']."|".$tampil['nama']."|".$tampil['alamat']."|".$tampil['hp']."|";
 }
  $no++;
 // Cetak Laporan
 $data = $pdf->LoadData($gue);
 $pdf->SetFont('Arial','',14);
 $pdf->setTopMargin(14);
 $pdf->setLeftMargin(14);
 $pdf->AddPage();
 $pdf->FancyTable($header,$data);
 $pdf->Output();
?>