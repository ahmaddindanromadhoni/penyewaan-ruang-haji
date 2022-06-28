<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$email_user = $_POST['email_user'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM user WHERE email_user='$email_user' AND password='$password'");
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data) > 0){
	$d = mysqli_fetch_object($data);
	$_SESSION['status_login'] = true;
	$_SESSION['a_global'] = $d;
	$_SESSION['id'] = $d->id_user;
	echo'<script>window.location="index.php"</script>';
}else{
	echo"
	<script>
	alert('Username Dan Password Tidak Terdaftar');
	document.location.href ='login.php?usrnm%psswrdtidkterdaftar';
	</script>
	";
}
?>