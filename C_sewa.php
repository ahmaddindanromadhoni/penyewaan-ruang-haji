<?php
include'koneksi.php';

$nama_ruangan = $_POST['nama_ruangan'];
$tgl_dipesan = $_POST['tgl_dipesan'];
$lama = $_POST['lama'];
$harga_sewa = $_POST['harga_sewa'];
$jumlah_harga = $_POST['jumlah_harga'];

mysqli_query($koneksi, "INSERT INTO det_pesan VALUES('','$nama_ruangan','$tgl_dipesan','$lama','$harga_sewa','$jumlah_harga')");
header("location:konfirmasi.php?alert=BerhasilDikirim");
?>