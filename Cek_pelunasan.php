<?php 

include 'koneksi.php';

$nama_user = $_POST['nama_user'];
$tgl_pesan = $_POST['tgl_pesan'];
$jumlah_harga = $_POST['jumlah_harga'];
$no_rekening = $_POST['no_rekening'];

mysqli_query($koneksi, "INSERT INTO pesan  VALUES('','$nama_user','$tgl_pesan','$jumlah_harga','$no_rekening')");
header("location:data_pelunasan.php");
?>