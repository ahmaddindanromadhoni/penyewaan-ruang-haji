<?php
include'../koneksi.php';

$kd_gedung = $_GET['kd_gedung'];

mysqli_query($koneksi, "delete from gedung where kd_gedung='$kd_gedung'");
header("location:gedung.php");
?>