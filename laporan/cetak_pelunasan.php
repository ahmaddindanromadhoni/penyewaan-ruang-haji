<?php
include 'fpdf.php';
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'DATA PELUNASAN PENYEWAAN RUANG', '0', '1', 'C', false);
$pdf->Ln(1);
$pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama User', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tgl Pesan', 1, 0, 'C');
$pdf->Cell(40, 6, 'Uang', 1, 0, 'C');
$pdf->Cell(40, 6, 'No Rekening', 1, 0, 'C');
$pdf->Cell(20, 6, 'Status', 1, 0, 'C');


$no = 0;
$data = mysqli_query($koneksi,"SELECT * FROM pesan LEFT JOIN user USING (id_user) ORDER BY no_pesan DESC");
while ($d = mysqli_fetch_array($data)) {

  $no++;
  $pdf->Ln(6);
  $pdf->SetFont('Arial', '', 10);
  $pdf->Cell(8, 6, $no, 1, 0, 'C');
  $pdf->Cell(40, 6, $d['nama_user'], 1, 0, 'C');
  $pdf->Cell(25, 6, $d['tgl_pesan'], 1, 0, 'C');
  $pdf->Cell(40, 6, number_format($d['uang']), 1, 0, 'C');
  $pdf->Cell(40, 6, $d['no_rekening'], 1, 0, 'C');
  $pdf->Cell(20, 6, ($d['status'] == 0)? 'Pending':'Selesai', 1, 0, 'C');

}


$pdf->Output();
