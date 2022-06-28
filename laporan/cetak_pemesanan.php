<?php
include 'fpdf.php';
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'DATA PEMESANAN PENYEWAAN RUANG', '0', '1', 'C', false);
$pdf->Ln(1);
$pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama Ruang', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tgl Pesan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Lama Hari', 1, 0, 'C');
$pdf->Cell(35, 6, 'Harga Sewa', 1, 0, 'C');
$pdf->Cell(50, 6, 'Jumlah', 1, 0, 'C');


$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM det_pesan");
while ($data = mysqli_fetch_array($sql)) {

  $no++;
  $pdf->Ln(6);
  $pdf->SetFont('Arial', '', 10);
  $pdf->Cell(8, 6, $no, 1, 0, 'C');
  $pdf->Cell(40, 6, $data['kd_ruang'], 1, 0, 'C');
  $pdf->Cell(25, 6, $data['tgl_dipesan'], 1, 0, 'C');
  $pdf->Cell(35, 6, $data['lama'], 1, 0, 'C');
  $pdf->Cell(35, 6, number_format($data['harga_sewa']) , 1, 0, 'C');
  $pdf->Cell(50, 6, $data['jumlah_harga'], 1, 0, 'C');

}


$pdf->Output();
