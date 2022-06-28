<?php 
include 'koneksi.php';

$nama_user 			= $_POST['nama_user'];
$alamat_user 		= $_POST['alamat_user'];
$tlp_user 			= $_POST['tlp_user'];
$email_user			= $_POST['email_user'];
$password 			= $_POST['password'];
$komunitas 			= $_POST['komunitas'];
$alamat_komunitas	= $_POST['alamat_komunitas'];
$tlp_komunitas 		= $_POST['tlp_komunitas'];
$email_komunitas 	= $_POST['email_komunitas'];

mysqli_query($koneksi, "insert into user values('','$nama_user','$alamat_user','$tlp_user','$email_user','$password','$komunitas','$alamat_komunitas','$tlp_komunitas','$email_komunitas')");

header("location:login.php");

 ?>