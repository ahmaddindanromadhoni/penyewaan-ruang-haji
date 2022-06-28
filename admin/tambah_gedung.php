<?php
include'../koneksi.php';

$nama_gedung = htmlspecialchars($_POST['nama_gedung']);
$alamat_gedung = htmlspecialchars($_POST['alamat_gedung']);

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar_gedung']['name'];
$ukuran = $_FILES['gambar_gedung']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:data_gedung.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['gambar_gedung']['tmp_name'], './ruang/'.$rand.'_'.$filename);

		mysqli_query($koneksi, "INSERT INTO gedung VALUES('','$nama_gedung','$alamat_gedung','$xx')");
		header("location:gedung.php?alert=berhasil");
	}else{
		header("location:data_gedung.php?alert=gagal_ukuran");
	}

}
?>