<?php 

$koneksi = mysqli_connect('localhost','root','','db_penyewaan');
if(mysqli_connect_errno()){
	echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
 ?>