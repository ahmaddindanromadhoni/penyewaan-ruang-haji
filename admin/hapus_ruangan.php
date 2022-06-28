<?php
include'../koneksi.php';
$kd_ruang = $_GET['kd_ruang'];

$gambar = mysqli_query($koneksi, "SELECT gambar_ruang FROM ruangan WHERE kd_ruang='$kd_ruang'");
$d = mysqli_fetch_object($gambar);
unlink('./ruang/'.$d->gambar_ruang);
mysqli_query($koneksi, "DELETE FROM ruangan WHERE kd_ruang='$kd_ruang'");
header("location:ruangan.php");
?>